<?php
session_start();

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost') ? '/properties' : '';
include($_SERVER['DOCUMENT_ROOT'] . $host_name . '/common/constants.php');

$type = $_REQUEST['type'];

switch ($type) {
    case "add_user":
        addUser($_REQUEST);
        header('Location: ' . PROPERTY_URL . '/login.php');
        exit;
    break;
    case "userLogin":
        if(isset($_REQUEST) && $_REQUEST['email'] !=='' && $_REQUEST['pwd'] !== ''){
            $resultArr = getUserAcc($_REQUEST);
            $resultArr = $resultArr['0'];
            if (is_array($resultArr) && count($resultArr) >0) {
                $_SESSION['userId'] = $resultArr['id'];
                header('Location: '.WEB_URL.'/index.php');
                exit;
            }
        }
        header('Location: '.PROPERTY_URL.'/login.php?access=1');
        exit;
    break;
    case "userLogout":
        unset($_SESSION['userId']);
        echo '1';
        exit;
    break;
    
    default:
    header('Location: '.PROPERTY_URL.'/login.php?access=1');
        break;
}
?>
