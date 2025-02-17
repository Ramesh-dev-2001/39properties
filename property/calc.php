<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Real Estate PHP">
        <meta name="keywords" content="">
        <meta name="author" content="Unicoder">
        <link rel="shortcut icon" href="images/favicon.ico">
		<title>Real Estate PHP</title>
		<?php        
			require_once("include/layout.php"); 
		?>
    </head>
    <body>
        <div id="page-wrapper">
            <div class="row"> 
                <?php 
                    include("include/header.php");
                ?>
                <!--	Banner   --->
                <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Property</b></h2>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="breadcrumb" class="float-left float-md-right">
                                    <ol class="breadcrumb bg-transparent m-0 p-0">
                                        <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">User Listed Property</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--	Banner   --->
                
                <!--	Submit property   -->
                <div class="full-row bg-gray">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <h2 class="text-secondary double-down-line text-center">EMI Calculator</h2>
                            </div>
                        </div>
                        <center>
                        <table class="items-list col-lg-6 table-hover" style="border-collapse:inherit;">
                            <thead>
                                <tr  class="bg-secondary">
                                    <th class="text-white font-weight-bolder">Term</th>
                                    <th class="text-white font-weight-bolder">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center font-18">
                                    <td><b>Amount</b></td>
                                    <td><b></b></td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Total Duration</b></td>
                                    <td><b></b></td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Interest Rate</b></td>
                                    <td><b></b></td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Total Interest</b></td>
                                    <td><b></b></td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Total Amount</b></td>
                                    <td><b></b></td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Pay Per Month (EMI)</b></td>
                                    <td><b></b></td>
                                </tr>
                            </tbody>
                        </table> 
                        </center>
                    </div>
                </div>
                <!--	Submit property   -->
                
                <?php include("include/footer.php");?>
                <a href="#" class="bg-success text-white hover-text-success" id="scroll"><i class="fas fa-angle-up"></i></a> 
            </div>
        </div>
    </body>
</html>

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
