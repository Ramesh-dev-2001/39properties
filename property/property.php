
<?php        
    require_once("include/layout.php");
    $categories = getCategories();
    $saleType = getSaleType(); 
    $properties = getProperty();
?>

<body>

    <!-- Page Loader
============================================================= 
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
    <div class="d-flex justify-content-center y-middle position-relative">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>
</div>-->



<div id="page-wrapper">
    <div class="row"> 
        <?php include("include/header.php");?>
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Filter Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Filter Property</li>
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
                            <?php foreach($properties as $property):?>
                            <div class="col-md-6">
                                <a href="propertydetail.php" class="text-dark">
                                
                                    <div class="featured-thumb hover-zoomer mb-4">
                                        <div class="overlay-black overflow-hidden position-relative"> 
                                            <img src="<?php echo WEB_URL;?>/img/<?php echo $property['agentId'];?>/<?php echo $property['mainImage'];?>" alt="pimage" height="250px">
                                            <div class="sale bg-success text-white"><?php echo $property['saleType'];?></div>
                                            <div class="price text-primary text-capitalize">₹<?php echo $property['price'];?> <span class="text-white"><?php echo $property['areaSize'];?> Sqft</span></div>
                                        </div>
                                        <div class="featured-thumb-data shadow-one">
                                            <div class="p-4">
                                                <h5 class="text-secondary hover-text-success mb-2 text-capitalize">
                                                <?php echo $property['title'];?></h5>
                                                <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $property['area'];?></span> </div>
                                            <div class="px-4 pb-4 d-inline-block w-100">
                                                <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : Thomas Olson</div>
                                                <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo $property['createdOn'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </a>
                            </div>
                            <?php endforeach;?>

                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled"> <span class="page-link">Previous</span> </li>
                                        <li class="page-item active" aria-current="page"> <span class="page-link"> 1 <span class="sr-only">(current)</span> </span> </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                    </ul>
                                </nav>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="sidebar-widget">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Search Property</h4>
                            <form method="post" action="#">
                                <div class="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="type">
                                                <option value="">Select Type</option>
                                                <?php 
                                                    foreach($categories as $category) {
                                                    echo '<option value="'.$category['id'].'">'.$category['categoryName'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="stype">
                                                <option value="">Select Status</option>
                                                <?php
                                                    foreach($saleType as $sType) {
                                                        echo '<option value=" '.$sType['id'].'">'.$sType['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-success w-100"><i class="fas fa-search text-white mr-2 font-13 mt-1"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="sidebar-widget">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                            <form class="d-inline-block w-100" action="calc.php" method="post">
                                <label class="sr-only">Property Amount</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" name="amount" placeholder="Property Price">
                                </div>
                                <label class="sr-only">Month</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="month" placeholder="Duration Year">
                                </div>
                                <label class="sr-only">Interest Rate</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                                </div>
                                <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calculate Instalment</button>
                            </form>
                        </div>
                        
                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
                                <li> <img src="images/01.jpg" alt="pimage">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php">Zills Home</a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> 39 Bailey Drive</span>
                                </li>
                            </ul>
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
