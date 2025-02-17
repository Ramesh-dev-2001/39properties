<?php

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost')?'/properties':'';
include($_SERVER['DOCUMENT_ROOT'].$host_name.'/common/constants.php');
 
$type = $_REQUEST['type'];

switch($type){
    case "add_feature":
        addFeature($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/features/featureslist.php');
        exit; 
    break;
    case "update_feature":
        updateFeature($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/features/featureslist.php');
        exit; 
    break;
    case"delete_feature":
        $featureId = $_REQUEST['featureId'];
        if($featureId > 0){
            deleteFeature($featureId);
            echo '1';
        }
        exit;
    break;
    case "change_feature_status":   
        if($_REQUEST) {
            updateFeatureStatus($_REQUEST);
        }
        echo '1';
        exit;
    default:
    break;
}
?>