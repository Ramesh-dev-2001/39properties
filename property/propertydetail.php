<?php        
    require_once("include/layout.php");
    require_once("common.php"); 

    $_REQUEST           = parse_url($_SERVER['REQUEST_URI']);
    $queryBaseDecode    = base64_decode($_REQUEST['query']);
    parse_str(base64_decode($_REQUEST['query']), $_REQUEST);
    
    $propertyId         = $_REQUEST['id'];
    $propertyDetails    = getProperty($propertyId);
    $propertyDetails    = $propertyDetails[0];
    $propertyAgentId    = $propertyDetails['agentId'];
    $mainImg[]          = $propertyDetails['mainImage'];
    $floorImg[]         = $propertyDetails['floorPlanImage'];
    $otherImages        = unserialize($propertyDetails['otherImages']);
    $propertyImgArr     = count($otherImages) > 0 ? array_merge($mainImg, $otherImages) : $mainImg;
    $propertyImgArr     = count($floorImg) > 0 ? array_merge($propertyImgArr, $floorImg) : $propertyImgArr;

    $featuresList       = getFeatures();
    $propertiesByOrder  = getPropertyByOrder(1);
    $propByFeature      = getPropByFeature(1);
    $userId             = isset($_SESSION['userId'])?$_SESSION['userId']:null;
    $UsersList          = getUsers($userId);
    $UsersList          = $UsersList[0];

   
?>
    <body>
        <div id="page-wrapper">
            <div class="row"> 
                <?php include("include/header.php");?>
                <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Detail</b></h2>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="breadcrumb" class="float-left float-md-right">
                                    <ol class="breadcrumb bg-transparent m-0 p-0">
                                        <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Property Detail</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="full-row">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                            <!-- Slide 1-->
                                            <?php 
                                                foreach($propertyImgArr as $index => $img){ 
                                            ?>
                                            <div class="ls-slide" data-ls="duration:3000; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;">
                                                    <img width="1920" height="1080" src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $img;?>" class="ls-bg" alt="" />
                                            </div>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize"><?php echo $propertyDetails['saleType'];?></div>
                                        <h5 class="mt-2 text-secondary text-capitalize"><?php echo $propertyDetails['title'];?></h5>
                                        <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp; <?php echo $propertyDetails['area'];?></span>
                                        <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-route text-success font-12"></i>&nbsp; <a target="_blank" href="<?php echo $propertyDetails['url']; ?>">Sitemap...</a></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-success text-left h5 my-2 text-md-right">₹
                                        <?php 
                                            echo (in_array($propertyDetails['categoryId'],[1,3,4])) ? formatIndianNumber($propertyDetails['price']) : 'Negotiable';
                                        ?>
                                        </div>
                                        <div class="text-left text-md-right">Price</div>
                                    </div>
                                </div>
                                <?php 
                                if (in_array($propertyDetails['categoryId'],[1,3,4])) {
                                ?>
                                    <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                        <ul>
                                            <li><span class="text-secondary"><?php echo $propertyDetails['areaSize'];?></span> Sqft</li>
                                            <li><span class="text-secondary"><?php echo $propertyDetails['bhk'];?></span> Bedroom</li>
                                            <li><span class="text-secondary"><?php echo $propertyDetails['bhk'];?></span> Bathroom</li>
                                            <li><span class="text-secondary">1</span> Balcony</li>
                                            <li><span class="text-secondary">1</span> Hall</li>
                                            <li><span class="text-secondary">1</span> Kitchen</li>
                                        </ul>
                                    </div>

                                    <h4 class="text-secondary my-4">Description</h4>
                                    <p><?php echo $propertyDetails['description'];?></p>
                                    
                                    <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                                    <div class="table-striped font-14 pb-2">
                                        <table class="w-100">
                                            <tbody>
                                                <tr>
                                                    <td>BHK :</td>
                                                    <td class="text-capitalize"><?php echo $propertyDetails['bhk'];?></td>
                                                    <td>Property Type :</td>
                                                    <td class="text-capitalize"><?php echo $propertyDetails['categoryName'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Floor :</td>
                                                    <td class="text-capitalize"><?php echo $propertyDetails['floor'];?></td>
                                                    <td>Total Floor :</td>
                                                    <td class="text-capitalize"><?php echo $propertyDetails['totalFloor'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>City :</td>
                                                    <td class="text-capitalize"><?php echo $propertyDetails['cityName'];?></td>
                                                    <td>State :</td>
                                                    <td class="text-capitalize"><?php echo $propertyDetails['stateName'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <h5 class="mt-5 mb-4 text-secondary">Features</h5> 
                                    <p>Features of the house:
                                        <?php
                                            $featuresIdArray = isset($propertyDetails['featuresId']) && ($propertyDetails['featuresId'] !='') ? 
                                                        unserialize($propertyDetails['featuresId']):array(); 
                                            
                                            $featuresStr = '';
                                            foreach($featuresList as $features){                                
                                                if(in_array($features['id'].'_feature', $featuresIdArray)) {
                                                    $featuresStr .= $features['name'].', ';
                                                } 
                                            }
                                            echo rtrim($featuresStr, ', ');
                                        ?> 
                                    </p>
                                    
                                    <h5 class="mt-5 mb-4 text-secondary">Floor Plans</h5>
                                    <div class="accordion" id="accordionExample">
                                        <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Floor Plans </button>
                                        <div id="collapseOne" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $propertyDetails['floorPlanImage'];?>" alt="Not Available">
                                        </div>
                                        <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Basement Floor</button>
                                        <div id="collapseTwo" class="collapse p-4" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $propertyDetails['mainImage'];?>" alt="Not Available">
                                        </div>
                                        <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Ground Floor</button>
                                        <div id="collapseThree" class="collapse p-4" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $propertyDetails['mainImage'];?>" alt="Not Available">
                                        </div>
                                    </div>
                                <?php 
                                } else { ?>
                                    <h4 class="text-secondary my-4">Description</h4>
                                    <p><?php echo $propertyDetails['description'];?></p>
                                <?php 
                                } ?>
                                <div class="property-details"> 
                                    <?php 
                                        if($userId){
                                            echo '<h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                                            <form method="post" action="#">
                                            <input type ="hidden" id="propertyId" name="propertyId" value="'.$propertyId.'">
                                            <input type ="hidden" id="agentId" name="agentId" value="'.$propertyAgentId.'">
                                                <div class="">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="' . (isset($UsersList['name']) ?$UsersList['name'] : '') . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="' . (isset($UsersList['email']) ?$UsersList['email'] : '') . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Phone" value="' . (isset($UsersList['mobile']) ?$UsersList['mobile'] : '') . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="message" name="message" placeholder="Enter Message"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-4">
                                                            <button type="button" class="btn btn-success w-100" onclick="addCustomer()">
                                                                <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1" ></i>
                                                                Contact
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>';  
                                        }else{
                                            echo '<h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                                            <form method="post" action="#">
                                            <input type ="hidden" id="propertyId" name="propertyId" value="'.$propertyId.'">
                                            <input type ="hidden" id="agentId" name="agentId" value="'.$propertyAgentId.'">
                                                <div class="">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="message" name="message" placeholder="Enter Message"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-4">
                                                            <button type="button" class="btn btn-success w-100" onclick="addCustomer()">
                                                                <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1" ></i>
                                                                Contact
                                                            </button>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>';   
                                        }
                                    ?> 
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured Property</h4>
                                <?php 
                                    foreach($propByFeature as $propByFeat): 
                                ?>
                                        <ul class="property_list_widget">
                                            <li> 
                                                <a href="propertydetail.php?<?php echo base64_encode('id='.$propByFeat['id']);?>" onclick="updateViews(<?php echo $propByFeat['id'];?>)">
                                                    <img src="<?php echo WEB_URL;?>/img/<?php echo $propByFeat['agentId'];?>/<?php echo $propByFeat['mainImage'];?>" alt="pimage">
                                                    <h6 class="text-secondary hover-text-success text-capitalize">
                                                            <?php echo $propByFeat['title'];?>                                                    
                                                    </h6>
                                                </a>
                                                <span class="font-14">
                                                    <i class="fas fa-map-marker-alt icon-success icon-small"></i>
                                                    <?php 
                                                        echo $propByFeat['area'].', '.$propByFeat['cityName'];
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                <?php 
                                    endforeach;
                                ?>

                                <div class="sidebar-widget mt-5">
                                    <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                                    <?php 
                                        foreach($propertiesByOrder as $propertyByOrd): 
                                    ?>
                                        <ul class="property_list_widget">
                                            <li>
                                                <a href="propertydetail.php?<?php echo base64_encode('id='.$propertyByOrd['id']);?>" onclick="updateViews(<?php echo $propertyByOrd['id'];?>)"> 
                                                    <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyByOrd['agentId'];?>/<?php echo $propertyByOrd['mainImage'];?>" alt="pimage">
                                                    <h6 class="text-secondary hover-text-success text-capitalize">
                                                        <?php echo $propertyByOrd['title'];?>
                                                    </h6>
                                                </a>    
                                                <span class="font-14">
                                                    <i class="fas fa-map-marker-alt icon-success icon-small"></i>
                                                    <?php 
                                                        echo $propertyByOrd['area'].', '.$propertyByOrd['cityName'];
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                    <?php 
                                        endforeach; 
                                    ?>
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
<script>

function updateViews(propertyId)
{
    var url     = '<?php echo PROPERTY_URL; ?>/ajax.php'; 
    $.post(url, {type:"update_property_views",propertyId:propertyId},function(data) {});
    return true;
}

function addCustomer(){
    const propertyId    = $('#propertyId').val();
    const agentId       = $('#agentId').val();
    const name          = $('#name').val();
    const email         = $('#email').val();
    const mobile        = $('#mobile').val();
    const message       = $('#message').val();

    var url = '<?php echo PROPERTY_URL; ?>/ajax.php'; 
    var data = {type: 'add_customer', propertyId: propertyId,agentId:agentId, name: name, email: email, mobile: mobile, message: message};

    $.post(url,data,
        function(response){
            alert('Successfuly sent your message We will connect as soon as possible');
            window.location.reload();
        }
    );
}

</script>
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

