<?php

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost')?'/properties':'';
include($_SERVER['DOCUMENT_ROOT'].$host_name.'/common/constants.php');
 
$type = $_REQUEST['type'];

switch($type){
    case "add_country":
        addCountry($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/countries/countrieslist.php');
        exit; 
    break;
    case "update_country":
        updateCountry($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/countries/countrieslist.php');
        exit; 
    break;
    case "add_state":
        addState($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/countries/statelist.php');
        exit; 
    break;
    case "update_state":
        updateState($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/countries/statelist.php');
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
    case "add_city":
        addCity($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/countries/citylist.php');
        exit; 
    break;
    case "update_city":
        updateCity($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/countries/citylist.php');
        exit; 
    break;
    case "change_status":
        if ($_REQUEST['countryId']){
            updateCountryStatus($_REQUEST);
        } else if($_REQUEST['cityId']){
            updateCityStatus($_REQUEST);    
        } else {
            updateStateStatus($_REQUEST);
        }
        echo '1';
    break;
    default:
    break;
}
?>