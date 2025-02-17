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
                <?php include("include/header.php");?>
                <!--	Banner   --->
                <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Profile</b></h2>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="breadcrumb" class="float-left float-md-right">
                                    <ol class="breadcrumb bg-transparent m-0 p-0">
                                        <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--	Banner   --->
                <!--	Submit property   -->
                <div class="full-row">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="text-secondary double-down-line text-center">Profile</h2>
                            </div>
                        </div>
                        <div class="dashboard-personal-info p-5 bg-white">
                            <form action="#" method="post">
                            <h5 class="text-secondary border-bottom-on-white pb-3 mb-4">Feedback Form</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="user-id">Full Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                                    </div>                
                                    
                                    <div class="form-group">
                                        <label for="phone">Contact Number</label>
                                        <input type="number" name="phone"  class="form-control" placeholder="Enter Phone" maxlength="10">
                                    </div>

                                    <div class="form-group">
                                        <label for="about-me">Your Feedback</label>
                                        <textarea class="form-control" name="content" rows="7" placeholder="Enter Text Here...."></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mb-4" name="insert" value="Send Feedback">
                                </div>
                                </form>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="user-info mt-md-50"> <img src="images/01.jpg" alt="userimage">
                                        <div class="mb-4 mt-3">
                                        </div>
                                        
                                        <div class="font-18">
                                            <div class="mb-1 text-capitalize"><b>Name:</b> User/agent/builder name</div>
                                            <div class="mb-1"><b>Email:</b> User/agent/builder@gmail.com</div>
                                            <div class="mb-1"><b>Contact:</b> 9703982155</div>
                                            <div class="mb-1 text-capitalize"><b>Role:</b> user</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
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
