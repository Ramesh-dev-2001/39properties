<?php 

$host_name = ($_SERVER['HTTP_HOST'] == 'localhost')?'/properties':'/';
include($_SERVER['DOCUMENT_ROOT'].$host_name.'/common/constants.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="39 properties PHP">
        <meta name="keywords" content="">
        <meta name="author" content="Unicoder">
		<meta name="google-signin-client_id" content="1067574441602-vb8lia3m1enbrtt8140r127gkq5i8o9o.apps.googleusercontent.com">
		<link rel="shortcut icon" href="<?php echo PROPERTY_URL?>/images/logo/favicon.ico">
		<title>39properties.com</title>

		<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

		<link href="<?php echo PROPERTY_URL;?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/bootstrap-slider.css" rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/jquery-ui.css" rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/layerslider.css" rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/color.css" id="color-change" rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/owl.carousel.min.css" rel="stylesheet">

		<link href="<?php echo PROPERTY_URL;?>/css/font-awesome.min.css"rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/fonts/flaticon/flaticon.css"rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/style.css"rel="stylesheet">
		<link href="<?php echo PROPERTY_URL;?>/css/login.css"rel="stylesheet">

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script src="<?php echo PROPERTY_URL;?>/js/greensock.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/layerslider.transitions.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/layerslider.kreaturamedia.jquery.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/popper.min.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/bootstrap.min.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/owl.carousel.min.js"></script> 
	
		<script src="<?php echo PROPERTY_URL;?>/js/jquery.dependClass-0.1.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/draggable-0.1.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/jquery.slider.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/wow.js"></script> 
		<script src="<?php echo PROPERTY_URL;?>/js/custom.js"></script>	
	
	</head>