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
                <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
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
                </div>
                <!--	Banner   --->
                
                <!--	Submit property   -->
                <div class="full-row bg-gray">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                            </div>
                        </div>
                        <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                            <thead>
                                    <tr  class="bg-dark">
                                    <th class="text-white font-weight-bolder">Properties</th>
                                    <th class="text-white font-weight-bolder">BHK</th>
                                    <th class="text-white font-weight-bolder">Type</th>
                                    <th class="text-white font-weight-bolder">Added Date</th>
                                    <th class="text-white font-weight-bolder">Status</th>
                                    <th class="text-white font-weight-bolder">Update</th>
                                    <th class="text-white font-weight-bolder">Delete</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="" alt="pimage">
                                        <div class="property-info d-table">
                                            <h5 class="text-secondary text-capitalize"><a href="">property name</a></h5>
                                            <span class="font-14 text-capitalize"><i class="fas fa-map-marker-alt text-success font-13"></i>&nbsp; location</span>
                                            <div class="price mt-3">
                                                <span class="text-success">$&nbsp;2548</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td class="text-capitalize">For sale/rent</td>
                                    <td>12/09/2024</td>
                                    <td class="text-capitalize">Available/sold</td>
                                    <td><a class="btn btn-info" href="">Update</a></td>
                                    <td><a class="btn btn-danger" href="">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>            
                    </div>
                </div>
                <!--	Submit property   -->
                
                <?php 
                    include("include/footer.php");
                ?>
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
