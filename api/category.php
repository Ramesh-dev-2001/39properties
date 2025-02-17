<?php

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost')?'/properties':'';
include($_SERVER['DOCUMENT_ROOT'].$host_name.'/common/constants.php');
 
$type = $_REQUEST['type'];

switch($type){
    case "add_category":
        addCategory($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/categories/categorylist.php');
        exit; 
    break;
    case "update_category":
        updateCategory($_REQUEST);
        header('Location: ' . MASTER_URL . '/views/categories/categorylist.php');
        exit; 
    break;
    case"delete_category":
        $categoryId = $_REQUEST['categoryId'];
        if($categoryId > 0){
            deleteCategory($categoryId);
            echo '1';
        }
        exit;
    break;
    case "change_category_status":   
        if($_REQUEST) {
            updateCategoryStatus($_REQUEST);
        }
        echo '1';
        exit;
    default:
    break;
}
?>