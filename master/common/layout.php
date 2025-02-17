<?php 

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost')?'/properties':'';
include($_SERVER['DOCUMENT_ROOT'].$host_name.'/common/constants.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>39properties.com</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <link rel="shortcut icon" href="<?php echo MASTER_URL?>/images/favicon.ico">
    <link href="<?php echo MASTER_URL?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo MASTER_URL?>/css/style.css" rel="stylesheet">
    <link href="<?php echo MASTER_URL?>/css/dashboard.css" rel="stylesheet"> 
    <link href="<?php echo MASTER_URL?>/datatables/css/dataTables.bootstrap5.css" rel="stylesheet">

    <script src="<?php echo MASTER_URL?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo MASTER_URL?>/js/custom.js"></script>
    <script src="<?php echo MASTER_URL?>/datatables/js/jquery-3.7.1.js"></script>
    <script src="<?php echo MASTER_URL?>/datatables/js/dataTables.js"></script>
    <script src="<?php echo MASTER_URL?>/datatables/js/dataTables.bootstrap5.js"></script>        
    

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
