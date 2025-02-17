<?php
session_start();

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost') ? '/properties' : '';
include($_SERVER['DOCUMENT_ROOT'] . $host_name . '/common/constants.php');

$type = $_REQUEST['type'];

switch ($type) {
    case "add_property":
        $agentId = $_REQUEST['agentId'];
        $masterAgentId = $_REQUEST['masterAgentId'];
        $propertyImageFolder = MAIN_ROOT . '/img/' . $agentId . '/';
        
        // Create folder if it doesn't exist
        if (!file_exists($propertyImageFolder)) {
            mkdir($propertyImageFolder, 0777, true);
        }
    
        $main_image='';$i=0; $floorPlanImg='';
        if (isset($_FILES) && $_FILES!='' && $_FILES["main_image"]["name"]!="")
        { 
            $extensionArray     = explode(".",$_FILES['main_image']['name']);
            $main_image         = time().$i.$i.'.'.$extensionArray[1];
            $imageUploadPath    = $propertyImageFolder.$main_image;
            compressImageAdmin($_FILES['main_image']['tmp_name'], $imageUploadPath, 25);  
        } 
        if (isset($_FILES) && $_FILES!='' && $_FILES["floorPlanImg"]["name"]!="")
        { 
            $extensionArray     = explode(".",$_FILES['floorPlanImg']['name']);
            $floorPlanImg         = time().$i.'.'.$extensionArray[1];
            $imageUploadPath    = $propertyImageFolder.$floorPlanImg;
            compressImageAdmin($_FILES['floorPlanImg']['tmp_name'], $imageUploadPath, 25);  
        } 
 
        $imgArr = [];
        // Handle additional image uploads
        if (!empty($_FILES['image']['tmp_name'])) {
            foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
                if (!empty($tmp_name)) {
                    $extension = pathinfo($_FILES['image']['name'][$key], PATHINFO_EXTENSION);
                    $imgName = time() . $key . '.' . $extension;
                    array_push($imgArr, $imgName);
    
                    $imageUploadPath = $propertyImageFolder . $imgName;
                    compressImageAdmin($tmp_name, $imageUploadPath, 25);
                }
            }
        }

        // Serialize image arrays and assign to request variables
        $_REQUEST['mainImage']      = $main_image;
        $_REQUEST['floorPlanImg']   = $floorPlanImg;
        $_REQUEST['otherImages']    = serialize($imgArr);
        $_REQUEST['features']       = isset($_REQUEST['features']) ? serialize($_REQUEST['features']) : serialize([]); 
       
        addProperty($_REQUEST);
        if($masterAgentId > 0){
            header('Location: '.AGENT_URL.'/views/properties/propertieslist.php');
        }else{
            header('Location: '.MASTER_URL.'/views/properties/propertieslist.php');
        }
        
        exit;
    break;
        
    case "update_property":
        $agentId = $_REQUEST['agentId'];
        $masterAgentId = $_REQUEST['masterAgentId'];
        $propertyImageFolder = MAIN_ROOT . '/img/' . $agentId . '/';
    
        // Create the folder if it doesn't exist
        if (!file_exists($propertyImageFolder)) {
            mkdir($propertyImageFolder, 0777, true);
        }
    
        // Handle main image upload
        $main_image = $_REQUEST['mainImageDb'];
        if (isset($_FILES['main_image']) && $_FILES['main_image']['name'] != "") {
            $extensionArray = explode(".", $_FILES['main_image']['name']);
            $main_image = time() . '.' . end($extensionArray); // Unique name based on time
            $imageUploadPath = $propertyImageFolder . $main_image;
    
            compressImageAdmin($_FILES['main_image']['tmp_name'], $imageUploadPath, 25);
    
            if ($_REQUEST['mainImageDb'] != '' && file_exists($propertyImageFolder . $_REQUEST['mainImageDb']) && $_REQUEST['mainImageDb'] != $main_image) {
                unlink($propertyImageFolder . $_REQUEST['mainImageDb']);
            }
        } else {
            $main_image = $_REQUEST['mainImageDb'];
        }
        
        $floorPlanImg = $_REQUEST['floorPlanImgDb'];
        if (isset($_FILES['floorPlanImg']) && $_FILES['floorPlanImg']['name'] != "") {
            $extensionArray = explode(".", $_FILES['floorPlanImg']['name']);
            $floorPlanImg = time() . '.' . end($extensionArray); // Unique name based on time
            $imageUploadPath = $propertyImageFolder . $floorPlanImg;
    
            compressImageAdmin($_FILES['floorPlanImg']['tmp_name'], $imageUploadPath, 25);
    
            if ($_REQUEST['floorPlanImgDb'] != '' && file_exists($propertyImageFolder . $_REQUEST['floorPlanImgDb']) && $_REQUEST['floorPlanImgDb'] != $floorPlanImg) {
                unlink($propertyImageFolder . $_REQUEST['floorPlanImgDb']);
            }
        } else {
            $floorPlanImg = $_REQUEST['floorPlanImgDb'];
        }
    
        // Handle other images upload
        $img_db = isset($_REQUEST['img_db']) ? explode(",", $_REQUEST['img_db']) : array();
        $img_db_original = isset($_REQUEST['img_db_original']) ? explode(",", $_REQUEST['img_db_original']) : array();

        foreach ($img_db_original as $image) {
            $imagePath = $propertyImageFolder . $image;
            if(!in_array($image,  $img_db) && file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        $imgArr = array_values(array_filter($img_db)); // Existing images
    
        $newImgArr = array();
    
        if (isset($_FILES['image']) && is_array($_FILES['image']['tmp_name'])) {
            foreach ($_FILES['image']['tmp_name'] as $i => $tmp_name) {
                if ($tmp_name != '') {
                    $extensionArray = explode(".", $_FILES['image']['name'][$i]);
                    $imgName = time() . $i . '.' . end($extensionArray);
                    $newImgArr[] = $imgName;
    
                    $imageUploadPath = $propertyImageFolder . $imgName;
    
                    compressImageAdmin($tmp_name, $imageUploadPath, 25);
                }
            }
        }
    
        $finalImgArr = array_merge($imgArr, $newImgArr);

        $_REQUEST['mainImage']      = $main_image;
        $_REQUEST['floorPlanImg']   = $floorPlanImg;
        $_REQUEST['otherImages']    = serialize($finalImgArr);
        $_REQUEST['features']       = isset($_REQUEST['features']) ? serialize($_REQUEST['features']) : serialize([]); 

        updateProperty($_REQUEST);
        if($masterAgentId >0){
            header('Location: '.AGENT_URL.'/views/properties/propertieslist.php');
        }else{
            header('Location: '.MASTER_URL.'/views/properties/propertieslist.php');
        }
        exit;
    break;

    case"delete_property":
        $propertyId = $_REQUEST['propertyId'];
        if($propertyId > 0){
            deleteProperty($propertyId);
            echo '1';
        }
        exit;
    break;
    case 'get_states':
        $countryId = isset($_REQUEST['countryId']) ? intval($_REQUEST['countryId']) : 0;
        if ($countryId > 0) {
            $states = getStates($countryId);
            echo json_encode($states);
        } else {
            echo json_encode([]);
        }
        exit;
    break;
    case 'get_city':
        $stateId = isset($_REQUEST['stateId']) ? intval($_REQUEST['stateId']) : 0;
        if ($stateId > 0) {
            $cities = getCities($stateId);
            echo json_encode($cities);
        } else {
            echo json_encode([]);
        }
        exit;
    break;

    case "approve_status":
        if($_REQUEST) {
            updatePropertyApproveStatus($_REQUEST); 
        }
        echo '1';
        exit;  
    break;

    case "feature_status":
        if($_REQUEST) {
            updateIsFeatured();
            updatePropertyFeatureStatus($_REQUEST); 
        }
        echo '1';
        exit;  
    break;
    
    default:
        echo json_encode(['error' => 'Invalid request type']);
        break;
}
?>
