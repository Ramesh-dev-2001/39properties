<?php        
    require_once("include/layout.php"); 
?>
    <body>
        <div id="page-wrapper">
            <div class="row"> 
                <?php
                    include("include/header.php");
                ?>
                <div class="full-row">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="text-secondary double-down-line text-center mb-5">Agent</h2>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="hover-zoomer bg-white shadow-one mb-4">
                                    <div class="overflow-hidden"> <img src="images/01.jpg" alt="aimage"> </div>
                                    <div class="py-3 text-center">
                                        <h5 class="text-secondary hover-text-success">Agent Name</h5>
                                        <span>39properties - Agent</span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    include("include/footer.php");
                ?>
                <a href="#" class="bg-success text-white hover-text-success" id="scroll"><i class="fas fa-angle-up"></i></a> 
            </div>
        </div>
    </body>
</html> 