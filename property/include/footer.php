<?php 
$PropByFeature = getPropByFeature(1);
?>
<footer class="full-row bg-secondary p-0">
            <div class="container">
                <div  class="row">
                    <div class="col-lg-12">
                        <div class="divider py-40">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="footer-widget mb-4">
                                        <div class="footer-logo mb-4"> <a href="#"><img class="logo-bottom" src="<?php echo PROPERTY_URL;?>/images/logo/black-new-1.png" alt="image" height="60"></a> </div>
                                        <p class="pb-20 text-white">                                           
                                          At 39 properties, we are passionate about connecting people with their ideal properties. With years of industry experience, our dedicated team offers personalized services in buying, selling, and renting, ensuring a seamless experience for our clients. We pride ourselves on our integrity, professionalism, and deep knowledge of the local market, making us your trusted partner in all things real estate.
                                        </p>
									</div>
                                </div>
                                <div class="col-md-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4">
                                            <div class="footer-widget footer-nav mb-4">
                                                <h4 class="widget-title text-white double-down-line-left position-relative">Support</h4>
                                                <ul class="hover-text-primary">
                                                    <li><a href="<?php echo PROPERTY_URL;?>/terms.php" class="text-white">Terms and Conditions</a></li>
                                                    <li><a href="<?php echo PROPERTY_URL;?>/questions.php" class="text-white">Frequenlty Asked Questions</a></li>
                                                    <li><a href="<?php echo PROPERTY_URL;?>/contact.php" class="text-white">Contact</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <div class="footer-widget footer-nav mb-4">
                                                <h4 class="widget-title text-white double-down-line-left position-relative">Quick Links</h4>
                                                <ul class="hover-text-primary">
                                                    <li><a href="<?php echo PROPERTY_URL;?>/about.php" class="text-white">About Us</a></li>
                                                    <?php 
                                                        foreach($PropByFeature as $propByFeat): 
                                                    ?>                               
                                                        <li>
                                                            <a href="<?php echo PROPERTY_URL;?>/propertydetail.php?<?php echo base64_encode('id='.$propByFeat['id']);?>" class="text-white">Featured Property</a></h6>
                                                        </li>
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                    <li><a href="<?php echo AGENT_URL;?>" target="_blank" class="text-white">Our Agents</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <div class="footer-widget">
                                                <h4 class="widget-title text-white double-down-line-left position-relative">Contact Us</h4>
                                                <ul class="text-white">
                                                    <li class="hover-text-primary"><i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i> Flot no 203, Rali nilayam, Near  Krishna kanth park, Madura nagar, Hyderabad.</li>
                                                    <li class="hover-text-primary"><i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i> +91 728-807-7799</li>
                                                    <li class="hover-text-primary"><i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i> info@39properties.com</li>
                                                </ul>
                                            </div>
                                            <!-- <div class="footer-widget media-widget mt-4 text-white hover-text-primary"> 
                                                <a href="#"><i class="fab fa-facebook-f"></i></a> 
                                                <a href="#"><i class="fab fa-twitter"></i></a> 
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a> 
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                                                <a href="#"><i class="fas fa-rss"></i></a> 
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-sm-6"> <span class="text-white">© <?php echo date('Y');?> 39properties - Developed By Laalabs Pvt Ltd.</span> </div>
                    <div class="col-sm-6">
                        <ul class="line-menu text-white hover-text-primary float-right">
                            <li><a href="<?php echo PROPERTY_URL;?>/terms.php">Privacy & Policy</a></li>
                            <li>|</li>
                            <li><a href="https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7" target="_blank">Site Map</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>