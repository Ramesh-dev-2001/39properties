<?php        
    require_once("include/layout.php"); 
    require_once("common.php"); 
    
    $searchResults              = [];
    $searchData['saleType']     = '';
    $searchData['categoryName'] = '';
    $searchData['city']         = '';
    $searchData['area']         = '';
    $cityAreaStr                = '';
    $resultsCount               = 0;  

    if($_REQUEST) { 
        $_REQUEST = parse_url($_SERVER['REQUEST_URI']);
        $queryBaseDecode    = base64_decode($_REQUEST['query']);
        parse_str(base64_decode($_REQUEST['query']), $_REQUEST);
            
        $cityAreaStr                = $_REQUEST['city'];
        $cityArea                   = isset($_REQUEST['city']) ? explode(",",$_REQUEST['city']) : []; 
        $searchData['saleType']     = $saleType       = isset($_REQUEST['saleType']) ? $_REQUEST['saleType']: 1;
        $searchData['categoryName'] = $categoryName   = isset($_REQUEST['categoryName'])? $_REQUEST['categoryName']: 1;
        
        $searchData['city']         = isset($cityArea) && isset($cityArea[0]) ? $cityArea[0] : '';
        $searchData['area']         = isset($cityArea) && isset($cityArea[1]) ? ltrim($cityArea[1]) : '';

        //pagination
        $searchData['page']         = isset($_REQUEST['page'])?$_REQUEST['page']:1;  
        $page                       = $searchData['page'];
        $limit                      = 10;  
        $searchData['offset']       = $limit * ($page-1);    
        $searchData['maxRows']      = 10;   

        $searchResults              = getSearchResults($searchData);
        
        $searchResultsArr = array();    
        if(is_array($searchResults) && count($searchResults) > 0 ) {  
            $searchResultsArr   = $searchResults[0]; 
            $resultsCount       = $searchResults[1]['propertyCount']; 
        }  
    } 
    $searchData['resultsCount']= $resultsCount = ceil($resultsCount/12);

    $categories = getCategories();
    $saleType   = getSaleType();
    $propertiesByOrder = getPropertyByOrder(1);

    function getPagination($data = array())
    {
        $paginationHtml = '
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-4">';
                    
                    if($data['page'] != 1) {                             
                        $paginationHtml .=  ' 
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="getPagination(-1)"> 
                                    <span class="page-link">Previous</span>
                                </a>
                            </li>';
                    } else if($data['page'] == 1){
                        $paginationHtml .=  ' 
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);" onclick="getPagination(-1)"> 
                                    <span class="page-link">Previous</span>
                                </a>
                            </li>';
                    }         
                        
                    for($i=1; $i<=$data['resultsCount'];$i++){ 
                        $activeCls = ($data['page'] == $i)?'active':'';
                        $paginationHtml .=  '   
                            <li class="page-item '.$activeCls.'" aria-current="page"> 
                                <a class="page-link" href="javascript:void(0);" onclick="getPagination('.$i.')"> 
                                    '.$i.'
                                </a>
                            </li>';
                    }   

                    if($data['page'] != $data['resultsCount']){                             
                        $paginationHtml .=  '
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" onclick="getPagination(0)"> Next </a>
                         </li>
                        ';
                    } 

           $paginationHtml .=  ' </ul>
                </nav>
            </div>';  
        
        return $paginationHtml;
    }

?>

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
		<title>39properties.com</title>		
    </head>
    <body> 
        <!-- Page Loader ============================= -->
        <div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
            <div class="d-flex justify-content-center y-middle position-relative">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            </div>
        </div> 

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
                                    <?php 
                                    if (!empty($searchResultsArr)) {
                                        foreach($searchResultsArr as $property) {
                                    ?> 
                                    <div class="col-md-6">
                                        <a href="propertydetail.php?<?php echo base64_encode('id='.$property['id']);?>" class="text-dark" onclick="updateViews(<?php echo $property['id'];?>)">                                        
                                            <div class="featured-thumb hover-zoomer mb-4">
                                                <div class="overlay-black overflow-hidden position-relative"> 
                                                    <img src="<?php echo WEB_URL;?>/img/<?php echo $property['agentId'];?>/<?php echo $property['mainImage'];?>" alt="pimage" height="250px">
                                                    <div class="sale bg-success text-white"><?php echo $property['saleType'];?></div>
                                                    <div class="price text-primary text-capitalize">₹
                                                        <?php 
                                                            echo (in_array($property['categoryId'],[1,3,4])) ? formatIndianNumber($property['price']) : 'Negotiable';
                                                        ?>
                                                        <span class="text-white">
                                                            <?php echo $property['areaSize'];?> Sqft
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="featured-thumb-data shadow-one">
                                                    <div class="p-4">
                                                        <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><?php echo $property['title'];?></h5>
                                                        <span class="location text-capitalize">
                                                            <i class="fas fa-map-marker-alt text-success"></i> 
                                                            <?php 
                                                                echo $property['area'].', '.$property['cityName'];
                                                            ?>
                                                        </span> 
                                                    </div>
                                                    <div class="px-4 pb-4 d-inline-block w-100">
                                                        <div class="float-left text-capitalize">
                                                            <i class="fas fa-user text-success mr-1"></i>
                                                            By : <?php echo $property['agentName'];?>
                                                        </div>
                                                        <div class="float-right">
                                                            <i class="far fa-calendar-alt text-success mr-1"></i> 
                                                            <?php echo $property['createdStr'];?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </a>
                                    </div>
                                    <?php 
                                        } 
                                    }else{
                                        echo '<div class="col-md-12"><h3>No Results Found..</h3></div>';
                                    }
                                    ?>                              

                                    <?php 
                                    if($resultsCount > 1) {
                                        echo getPagination($searchData);   
                                    }
                                    ?> 
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="sidebar-widget">
                                    <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Search Property</h4>
                                    <form method="post" action="javascript:void(0);" onsubmit="return formValidation()">
                                        <input type="hidden" id="page" name="page" value="<?php echo $searchData['page']; ?>">     
                                        <div class="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="categoryName" id="categoryName">
                                                        <option value="">Select Type</option>
                                                        <?php 
                                                            foreach($categories as $category) {
                                                                $sel = ($category['id'] == $searchData['categoryName']) ? 'selected' : '';
                                                                echo '<option value="'.$category['id'].'" '.$sel.'>'.$category['categoryName'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="saleType" id="saleType">
                                                        <option value="">Select Status</option>
                                                        <?php
                                                            foreach($saleType as $sType) {
                                                                $sel = ($sType['id'] == $searchData['saleType']) ? 'selected' : '';
                                                                echo '<option value="'.$sType['id'].'" '.$sel.'>'.$sType['name'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $cityAreaStr; ?>">
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
        
        const page          = $("#page").val();   

        if(errFlag) {
            return false;
        } else {
            var urlVariables = 'categoryName='+encodeURIComponent(categoryName)+'&saleType='+encodeURIComponent(saleType)+'&city='+encodeURIComponent(city);
            urlVariables += '&page='+page;

            var url = '<?php echo PROPERTY_URL;?>/propertygrid.php?'+window.btoa(urlVariables);
            window.location.replace(url);  
        }

        return false;
    }

    function getPagination(i)    
    {       
        var page = $("#page").val();   
        var maxPage = '<?php echo $resultsCount;?>';       
        page = parseInt(page);       
        maxPage = parseInt(maxPage);      
        if(i == '-1' && page != '1') 
        {                        
            $("#page").val(page-1);    
        } else if(i == '0' && page!=maxPage){
            $("#page").val(page+1);   
        } else {    
            $("#page").val(i);   
        }
        formValidation(0);  
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

