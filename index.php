<?php        
    require_once("property/include/layout.php"); 
    require_once("property/common.php"); 
    $countRent  = 0;
    $countSale  = 0;
    $categories = getCategories();
    $saleType   = getSaleType();
    $UsersList  = getUsers();
    $countUsers = count($UsersList);
    $propertiesByOrder = getPropertyByOrder();
    $properties = getProperty();
    foreach ($properties as $prop) {
        if ($prop['saletypeId'] == 1) {
            $countRent++;
        } elseif ($prop['saletypeId'] == 2) {
            $countSale++;
        }
    }
    $countProperty  = count($properties);
    
?>
<body>
    <div id="page-wrapper">
        <div class="row"> 
            <?php 
                include("property/include/header.php");
            ?>
            
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('property/images/banner/rshmpg.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4"><span class="text-success">Let us</span><br>
                                Guide you Home</h1>
                                <form method="post" action="<?php echo PROPERTY_URL;?>/propertygrid.php" id="formId" onsubmit="return formValidation()">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="categoryName" id="categoryName">
                                                    <option value="">Select Type</option>
                                                    <?php 
                                                        foreach($categories as $category) {
                                                            echo '<option value="'.$category['id'].'">'.$category['categoryName'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="saleType" id="saleType">
                                                    <option value="">Select Status</option>
                                                    <?php
                                                        foreach($saleType as $sType) {
                                                            echo '<option value="'.$sType['id'].'">'.$sType['name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" name="filter" class="btn btn-success w-100">Search Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">What We Do</h2>
                        </div>
                    </div>
                    <div class="text-box-one">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
                                    <i class="flaticon-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Selling Service</a></h5>
                                    <p>Our expert team will help you navigate the selling process from start to finish. We provide market analysis, 
                                        strategic marketing, and negotiation support to ensure you get the best price for your property.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
                                    <i class="flaticon-for-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Rental Service</a></h5>
                                    <p>Looking for a rental property or seeking tenants for your investment? We manage both sides of the 
                                        rental process, helping landlords find qualified tenants and assisting renters in finding their ideal homes.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
                                    <i class="flaticon-list text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Property Listing</a></h5>
                                    <p>Our extensive property listings cover a wide range of residential and commercial options. 
                                        We leverage advanced marketing techniques to showcase your property and attract potential buyers or renters.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
                                    <i class="flaticon-diagram text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Legal Investment</a></h5>
                                    <p>Navigating the legal aspects of property transactions can be complex. Our team provides legal investment advice, 
                                        ensuring you understand all regulations and requirements related to your transactions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-4">Recent Property</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                    <div class="row">
                                        <?php foreach($propertiesByOrder as $propertyByOrd): ?>
                                        <div class="col-md-6 col-lg-4">
                                            <a href="<?php echo PROPERTY_URL;?>/propertydetail.php?<?php echo base64_encode('id='.$propertyByOrd['id']);?>" class="text-dark" onclick="updateViews(<?php echo $propertyByOrd['id'];?>)"> 
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative"> 
                                                        <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyByOrd['agentId'];?>/<?php echo $propertyByOrd['mainImage'];?>" alt="pimage" height="250px">
                                                        <div class="featured bg-success text-white">New</div>
                                                        <div class="sale bg-success text-white text-capitalize"><?php echo $propertyByOrd['saleType'];?></div>
                                                        <div class="price text-primary">
                                                            <b>₹
                                                                <?php 
                                                                    if (in_array($propertyByOrd['categoryId'],[1,3,4])) {
                                                                        echo formatIndianNumber($propertyByOrd['price']);
                                                                    } else {
                                                                        echo 'Negotiable';
                                                                    }
                                                                ?>
                                                            </b>
                                                            <span class="text-white"><?php echo $propertyByOrd['areaSize'];?> sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-1">
                                                            <span class="location text-capitalize">
                                                                <i class="fas fa-map-marker-alt text-success"></i> 
                                                                <?php 
                                                                    echo $propertyByOrd['area'].', '.$propertyByOrd['cityName'];
                                                                ?>
                                                            </span>
                                                        </div>
                                                            <div class="bg-gray quantity px-4 pt-4">
                                                            <ul>
                                                                <li><span><?php echo $propertyByOrd['areaSize'];?></span> Sqft</li>
                                                                <?php 
                                                                    if (in_array($propertyByOrd['categoryId'],[1,3,4])) {
                                                                ?>
                                                                        <li><span><?php echo $propertyByOrd['bhk'];?></span> BHK</li>
                                                                        <li><span><?php echo $propertyByOrd['bathroom'];?></span> Baths</li>
                                                                        <li><span><?php echo $propertyByOrd['hall'];?></span> Hall</li>
                                                                <?php 
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                ?>                                                             
                                                            </ul>
                                                        </div>
                                                        <div class="p-4 d-inline-block w-100">
                                                            <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $propertyByOrd['agentName'];?></div>
                                                            <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i><?php echo $propertyByOrd['createdStr'];?> </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="full-row living bg-one overlay-secondary-half" style="background-image: url('property/images/01.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="living-list pr-4">
                                <h3 class="pb-4 mb-3 text-white">Why Choose Us</h3>
                                <ul>
                                    <li class="mb-4 text-white d-flex"> 
                                        <i class="flaticon-reward flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Top Rated</h5>
                                            <p>We pride ourselves on our stellar reputation and consistently high ratings from our clients. Your satisfaction is our greatest reward.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex"> 
                                        <i class="flaticon-real-estate flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Experience Quality</h5>
                                            <p>We are dedicated to delivering high-quality service in every interaction. From initial consultations to closing deals, we ensure a seamless and stress-free experience.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex"> 
                                        <i class="flaticon-seller flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Experienced Agents</h5>
                                            <p>Our agents are highly trained professionals with in-depth knowledge of the local market.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">How It Work</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">1</div>
                                <div class="left-arrow">
                                    <i class="flaticon-investor flat-medium icon-success" aria-hidden="true"></i>
                                </div>
                                <h5 class="text-secondary mt-5 mb-4">Discussion</h5>
                                <p>We begin with an open conversation to understand your needs, preferences, and goals. Our team listens carefully to your requirements, ensuring we’re aligned from the start.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">2</div>
                                <div class="left-arrow"><i class="flaticon-search flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Files Review</h5>
                                <p>After our initial discussion, we conduct a thorough review of all necessary documents and information. This includes property listings, legal documents, and any pertinent financial details, allowing us to provide you with informed recommendations.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">3</div>
                                <div><i class="flaticon-handshake flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Acquire</h5>
                                <p>Once we've identified the right properties or opportunities, we guide you through the acquisition process. Whether buying or selling, our experienced agents will negotiate on your behalf, ensuring you get the best possible deal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="full-row overlay-secondary mb-5" style="background-image: url('property/images/breadcromb.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="fact-counter">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    
                                <div class="count-num text-success my-4" data-speed="3000" data-stop="10"><?php echo $countProperty;?></div>
                                    <div class="text-white h5">Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    
                                    <div class="count-num text-success my-4" data-speed="3000" data-stop="5"><?php echo $countSale;?></div>
                                    
                                    <div class="text-white h5">Sale Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    
                                    <div class="count-num text-success my-4" data-speed="3000" data-stop=""><?php echo $countRent;?></div>
                                
                                    <div class="text-white h5">Rent Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-man flat-large text-white" aria-hidden="true"></i>
                                
                                    <div class="count-num text-success my-4" data-speed="3000" data-stop=""><?php echo $countUsers;?></div>
                                    <div class="text-white h5">Registered Users</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                include("./property/include/footer.php");
            ?>

            <a href="#" class="bg-success text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 

        </div>
    </div>
    </body>
</html>
 
<script>
    function formValidation() {
        const categoryName  =   $('#categoryName').val(); 
        const saleType      =   $('#saleType').val(); 
        let city            =   $('#city').val(); 
        city  = city.trim();
        let errFlag = 0;

        $("#categoryName").css("border", "");
        $("#saleType").css("border", "");
        $("#city").css("border", "");

        if(!categoryName) {
            $("#categoryName").css("border", "1px solid red");
            errFlag +=1;
        } 
        if(!saleType) {
            $("#saleType").css("border", "1px solid red");
            errFlag +=1;
        }         
        if(!city) {
            $("#city").css("border", "1px solid red");
            errFlag +=1;
        } 
        
        if(errFlag) {
            return false;
        } else {
            var urlVariables = 'categoryName='+encodeURIComponent(categoryName)+'&saleType='+encodeURIComponent(saleType)+'&city='+encodeURIComponent(city);
            var url = '<?php echo PROPERTY_URL;?>/propertygrid.php?'+window.btoa(urlVariables);
            window.location.replace(url);  
        }

        return false;
    }
    
    $("#city").autocomplete({  
        source: "<?php echo PROPERTY_URL;?>/ajax.php?type=auto", 
        select: function( event, ui ) {        
            event.preventDefault();    
            $("#city").val(ui.item.value);  
        } 
    });

    function updateViews(propertyId)
    {
        var url     = '<?php echo PROPERTY_URL; ?>/ajax.php'; 
        $.post(url, {type:"update_property_views",propertyId:propertyId},function(data) {});
        return true;
    }
    
</script>