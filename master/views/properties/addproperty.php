<?php        
    require_once("../../common/layout.php");
    session_start();
    $masterAgentId = $_SESSION['agentId'];
    $propertyId = '';
    $type = 'add_property';
    $propertyOtherImageArr=$featuresIdsArray = array();
    $propertyDetails['saletypeId'] = 0;
    $propertyDetails['categoryId'] = 0;
    $propertyDetails['facingType'] = 0;
    $propertyDetails['bhk']        = 0;
    $propertyDetails['floor']      = '';
    $propertyDetails['totalFloor'] = '';
    $propertyDetails['bedroom']    = '';
    $propertyDetails['bathroom']   = '';
    $propertyDetails['hall']       = '';
    $propertyDetails['balcony']    = '';
    $propertyDetails['kitchen']    = '';
    $propertyDetails['countryId']  = 0;
    $propertyDetails['stateId']    = 0;
    $propertyDetails['cityId']     = 0;
    $propertyDetails['agentId']    = 0;

    if (isset($_GET['propertyId'])) {
      $type = "update_property";
      $propertyId         = $_GET['propertyId'];
      $propertyDetails    = getProperty($propertyId);
      $propertyDetails    = $propertyDetails[0];
      $featuresIdsArray   = (($propertyDetails['featuresId']))?unserialize($propertyDetails['featuresId']):array();
      $propertyOtherImageArr    = unserialize($propertyDetails['otherImages']);
      
      if (!is_array($propertyOtherImageArr)) {
          $propertyOtherImageArr = array(); 
      }
    }

    $categories = getCategories();
    $saleType   = getSaleType();
    $features   = getFeatures();
    $agents     = getAgents();
    $facings    = getfacings();
    $countries  = getCountriesList();
    $states     = getStates();
    $cities     = getCities();
  
?>
<body class="bg-light">    
    <?php 
        include("../../common/header.php");
    ?> 
    <div class="container-fluid">
    <div class="row">
        <?php 
            include("../../common/leftpanel.php");
        ?> 
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Property</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/properties/propertieslist.php">
                Properties
            </a>
          </div>
        </div>
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" method="post" enctype="multipart/form-data" action="<?php echo API_URL; ?>/property.php" novalidate>
            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
            <input type="hidden" name="masterAgentId" id="masterAgentId" value="<?php echo $masterAgentId; ?>">
            <input type='hidden' name="propertyId" id="propertyId" value="<?php echo $propertyId;?>">
              <h5 class="mb-3">Property Details</h5>
              <div class="row mb-3">
              <div class="col-md-3">
                  <label for="agentId" class="form-label">Select Agent</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                  <select class="form-select" id="agentId" name="agentId" required>
                      <option value="0">Choose...</option>
                      <?php 
												foreach($agents as $agent) {
												$selected = ($agent['id'] == $propertyDetails['agentId'])? 'selected':'';
												echo '<option value="'.$agent['id'].'" '.$selected.'>'.$agent['firstName'].'</option>';
											 	}?>
                    </select>
                    <div class="invalid-feedback">
                      Your agent is required.
                    </div>
                  </div>
                </div>
                </div>

                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="sellingType" class="form-label">Selling Type</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="sellingType" name="sellingType" required>
                      <option value="0">Choose...</option>
                      <?php
												 foreach($saleType as $sType) {
													$selected = ($sType['id'] == $propertyDetails['saletypeId'])?'selected':'';
													echo '<option value=" '.$sType['id'].'"'.$selected.'>'.$sType['name'].'</option>';
												}?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="title" class="form-label">Title</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required value="<?php echo (isset($propertyDetails['title']) && $propertyDetails['title']!='')?$propertyDetails['title']:'';?>">
                    <div class="invalid-feedback">
                      Your title is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="Category" class="form-label">Category</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="category" name="category" required>
                      <option value="0">Choose...</option>
                      <?php 
												foreach($categories as $category) {
												$selected = ($category['id'] == $propertyDetails['categoryId'])? 'selected':'';
												echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['categoryName'].'</option>';
											 	}?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="facingType" class="form-label">Facing Type</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="facingType" name="facingType" required>
                      <option value="0">Choose...</option>
                      <?php 
												foreach($facings as $facing) {
												$selected = ($facing['id'] == $propertyDetails['facingType'])? 'selected':'';
												echo '<option value="'.$facing['id'].'" '.$selected.'>'.$facing['type'].'</option>';
											 	}?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="description" class="form-label">Description</label>
                </div>
                <div class="col-md-9">
                  <div class="input-group has-validation">
                    <textarea name="description" id="description" id="description" rows="5" cols="110" class="form-control" required><?php echo (isset($propertyDetails['description']) && $propertyDetails['description'] != '') ? $propertyDetails['description'] : ''; ?></textarea>
                    <div class="invalid-feedback">
                      Your title is required.
                    </div>
                  </div>
                </div>
                </div>
                <hr class="my-4">
                <h5 class="mb-3">Property Information</h5>
                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="bhk" class="form-label">BHK</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="bhk" name="bhk">
                      <option value="0">Choose...</option>
                      <?php 
												for($i=1;$i<=5;$i++){
												$selected = ($i == $propertyDetails['bhk'])?'selected':'';
												echo '<option value="'.$i.'"'.$selected.'>'.$i.' BHK </option>';
												}?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
                </div>

                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="floor" class="form-label">Floor</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="floor" name="floor" >
                      <option value="0">Choose...</option>
                      <?php 
												for($i=1;$i<=15;$i++){
													$selected = ($i == $propertyDetails['floor'])?'selected':'';
													echo '<option value="'.$i.'"'.$selected.'>'.$i.' Floor </option>';
													}?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
                </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="totalFloor" class="form-label">Total Floor</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="totalFloor" name="totalFloor">
                      <option value="0">Choose...</option>
                      <?php 
                        for($i=1;$i<=15;$i++){
                          $selected = ($i == $propertyDetails['totalFloor'])?'selected':'';
                          echo '<option value="'.$i.'"'.$selected.'>'.$i.' Floor </option>';
                          }?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="bedroom" class="form-label">Bedroom</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="bedroom" name="bedroom">
                      <option value="0">Select Bedroom</option>
                      <?php 
                        for($i=1;$i<=5;$i++){
                          $selected = ($i == $propertyDetails['bedroom'])?'selected':'';
                          echo '<option value="'.$i.'"'.$selected.'>'.$i.' </option>';
                          }?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="bathroom" class="form-label">Bathroom</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="bathroom" name="bathroom">
                      <option value="0">Select Bathroom</option>
                      <?php 
                        for($i=1;$i<=5;$i++){
                          $selected = ($i == $propertyDetails['bathroom'])?'selected':'';
                          echo '<option value="'.$i.'"'.$selected.'>'.$i.' </option>';
                          }?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="hall" class="form-label">Hall</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="hall" name="hall">
                      <option value="0">Select Hall</option>
                      <?php 
                        for($i=1;$i<=5;$i++){
                          $selected = ($i == $propertyDetails['hall'])?'selected':'';
                          echo '<option value="'.$i.'"'.$selected.'>'.$i.' </option>';
                          }?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="balcony" class="form-label">Balcony</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="balcony" name="balcony">
                      <option value="0">Select Balcony</option>
                      <?php 
                        for($i=1;$i<=5;$i++){
                          $selected = ($i == $propertyDetails['balcony'])?'selected':'';
                          echo '<option value="'.$i.'"'.$selected.'>'.$i.' </option>';
                          }?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="kitchen" class="form-label">Kitchen</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <select class="form-select" id="kitchen" name="kitchen">
                      <option value="0">Select Kitchen</option>
                      <?php 
                        for($i=1;$i<=5;$i++){
                          $selected = ($i == $propertyDetails['kitchen'])?'selected':'';
                          echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
                          }?>
                    </select>
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
              <div class="col-md-3">
                  <label for="areaSize" class="form-label">Area Size</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                  <input type="text" class="form-control" id="areaSize" name="areaSize" placeholder="Enter Area Size (in sqrt)" value="<?php echo (isset($propertyDetails['areaSize']) && $propertyDetails['areaSize']!='')?$propertyDetails['areaSize']:'';?>">
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
              <div class="col-md-3">
                  <label for="propertyAge" class="form-label">Property Age</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                  <input type="text" class="form-control" id="propertyAge" name="propertyAge" placeholder="Property Age" value="<?php echo (isset($propertyDetails['propertyAge']) && $propertyDetails['propertyAge']!='')?$propertyDetails['propertyAge']:'';?>">
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
              <div class="col-md-3">
                  <label for="price" class="form-label">Price</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" value="<?php echo (isset($propertyDetails['price']) && $propertyDetails['price']!='')?$propertyDetails['price']:'';?>">
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <h5 class="mb-3">Features</h5>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="features" class="form-label"></label>
                  </div>
                  <div class="col-md-6">
                  <?php
                  foreach ($features as $feature) { 
                      $checkedAme = '';
                      if(in_array($feature['id'].'_feature', $featuresIdsArray)) {
                          $checkedAme = 'checked';
                      }
                  ?>                 
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="features[]" id="features" <?php echo $checkedAme;?> value="<?php echo $feature['id'].'_feature';?>">
                    <label class="form-check-label" for="flexCheckDefault">
                      <?php echo $feature['name'];?>
                    </label>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <hr class="my-4">
              <h5 class="mb-3">Location Information</h5>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="country" class="form-label">Country</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <select class="form-select" name="countryId" id="countryId" onchange="getStates()" required>
                        <option value="">Select Country</option>
                        <?php 
                        foreach($countries as $country) {
                          $selected = ($country['id'] == $propertyDetails['countryId'])? 'selected':'';
                          echo '<option value="'.$country['id'].'" '.$selected.'>'.$country['name'].'</option>';
                        }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                        Your Country is required.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="state" class="form-label">State</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <select class="form-select" name="stateId" id="stateId"  onchange="getCity()" required>
                      <option value="">Select State</option>
                        <?php 
                        foreach($states as $state) {
                        $selected = ($state['id'] == $propertyDetails['stateId'])? 'selected':'';
                        echo '<option value="'.$state['id'].'" '.$selected.'>'.$state['name'].'</option>';
                        }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                        Your State is required.
                      </div>
                    </div>
                  </div>
                </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="city" class="form-label">City</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                  <select class="form-select" name="cityId" id="cityId" required>
                      <option value="">Select City</option>
                        <?php 
                        foreach($cities as $city) {
                        $selected = ($city['id'] == $propertyDetails['cityId'])? 'selected':'';
                        echo '<option value="'.$city['id'].'" '.$selected.'>'.$city['name'].'</option>';
                        }
                        ?>
                      </select>                    
                      <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="area" class="form-label">Area</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                  <input type="text" class="form-control" id="area" name="area" placeholder="Enter Area" required value="<?php echo (isset($propertyDetails['area']) && $propertyDetails['area']!='')?$propertyDetails['area']:'';?>">
                    <div class="invalid-feedback">
                      Selection is required.
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="address" class="form-label">Address</label>
                </div>
                <div class="col-md-9">
                  <div class="input-group has-validation">
                    <textarea name="address" id="address" id="address" rows="5" cols="110" class="form-control" required><?php echo (isset($propertyDetails['address']) && $propertyDetails['address'] != '') ? $propertyDetails['address'] : ''; ?></textarea>
                    <div class="invalid-feedback">
                      Your title is required.
                    </div>
                  </div>
                </div>
                </div>

                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="url" class="form-label">Google Link</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="url" name="url" placeholder="location URL" required value="<?php echo (isset($propertyDetails['url']) && $propertyDetails['url']!='')?$propertyDetails['url']:'';?>">
                    <div class="invalid-feedback">
                      Your title is required.
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4">
              <h5 class="mb-3">Image & Status</h5>
              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="main_image" class="form-label">Main Image</label>
                </div>
                <div class="col-md-5">
                  <div class="input-group has-validation">
                    <input type="hidden" id="mainImageDb" name="mainImageDb" value="<?php echo isset($propertyDetails['mainImage'])?($propertyDetails['mainImage']):'';?>">
                    <input type="file" name="main_image" id="main_image"  accept="image/*">
                      <?php 
                        if(isset($propertyDetails['mainImage']) && $propertyDetails['mainImage']!='') { 
                        ?>
                            <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $propertyDetails['mainImage'];?>" class="img-responsive thumbnail mt-2" id="preview_img" width="100" height="100" >
                        <?php
                          } else {
                        ?>
                            <img src="#" class="img-responsive thumbnail" id="preview_img" width="100" height="100" style="display:none;" >
                        <?php 
                        } 
                        ?>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="floorPlanImg" class="form-label">Floor Plan Image</label>
                </div>
                  <div class="col-md-5">
                    <div class="input-group has-validation">
                      <input type="hidden" id="floorPlanImgDb" name="floorPlanImgDb" value="<?php echo isset($propertyDetails['floorPlanImage'])?($propertyDetails['floorPlanImage']):'';?>">
                      <input type="file" name="floorPlanImg" id="floorPlanImg"  accept="image/*">
                      <?php 
                          if(isset($propertyDetails['floorPlanImage']) && $propertyDetails['floorPlanImage']!='') { 
                          ?>
                              <img src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $propertyDetails['floorPlanImage'];?>" class="img-responsive thumbnail mt-2" id="preview_img" width="100" height="100" >
                          <?php
                            } else {
                          ?>
                              <img src="#" class="img-responsive thumbnail" id="preview_img" width="100" height="100" style="display:none;" >
                          <?php 
                          } 
                          ?>
                    </div>
                  </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-3">
                  <label for="otherImages" class="form-label">Other Images</label>
                </div>
                <div class="col-md-5">
                  <div class="input-group has-validation">
                    <input name="image[]" type="file" id="file" multiple/>     
                    <?php							
                        $i=0;$img_db='';
                        foreach($propertyOtherImageArr as $val) {
                            $img_db=$img_db.$val.',';                                         
                    ?>						
                    <div class="col-xs-4 m-2" id="<?php echo str_replace(".","",$val);?>">
                        <img id="image<?php echo $i; ?>" style="width:100px;height:80px;" class="thumbnail" src="<?php echo WEB_URL;?>/img/<?php echo $propertyDetails['agentId'];?>/<?php echo $val;?>">
                        <a href="javascript:void(0);"><img id="close<?php echo $val; ?>" class="delete-img" src="<?php echo MASTER_URL;?>/images/cancel-icon.png"></a>
                    </div>
                    <?php	
                        $i++;
                        }
                    ?>
                    <input type="hidden" id="img_db" name="img_db" value="<?php echo rtrim($img_db,','); ?>">
                    <input type="hidden" id="img_db_original" name="img_db_original" value="<?php echo rtrim($img_db,','); ?>">
                    <input type="hidden" id="imgOther" name="imgOther" value="<?php echo $i;?>">                              
                  </div>
                </div>
              </div>

              <hr class="my-4">
              <button class="btn btn-primary mb-4" type="submit"><?php echo isset($_GET['propertyId'])? 'Update': 'Add'?></button>
            </form>
          </div>
        </main>
    </div>
    </div>
  </body>
</html>
<script>
  (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()

  function getStates() {
    let countryId = document.getElementById('countryId').value;
    var url     = '<?php echo API_URL; ?>/property.php';
      var data    = {type:'get_states',countryId:countryId};
        $.post(url,data,
          function(data){
              let optionHtml = '<option value="">Select State</option>';
              let stateData = JSON.parse(data);
              stateData.forEach(state => { 
                optionHtml += '<option value="'+state.id+'">'+state.name+'</option>';
              });
              document.getElementById('stateId').innerHTML = optionHtml;
            }
        ); 
    }
    function getCity() {
    let stateId = document.getElementById('stateId').value;
    var url     = '<?php echo API_URL; ?>/property.php';
      var data    = {type:'get_city',stateId:stateId};
        $.post(url,data,
          function(data){
              let optionHtml = '<option value="">Select City</option>';
              let cityData = JSON.parse(data);
              cityData.forEach(city => { 
                optionHtml += '<option value="'+city.id+'">'+city.name+'</option>';
              });
              document.getElementById('cityId').innerHTML = optionHtml;
            }
        ); 
    }

    var abc = 0;    
    $(document).ready(function() {
        var imgsrc= "<?php echo MASTER_URL;?>/img/static/cancel-icon.png";
        $('body').on('change', '#file', function() {
            $("#newImg").html('');
            var img_db = $('#img_db').val();
            var imgIdArray = (img_db != '')?img_db.split(','):[]; 
            if((this.files.length + imgIdArray.length) > 6)
            {
                alert("Six images should be uploaded");
                $('#imgOther').val((this.files.length + parseInt(imgOther)));
                $('#file').val('');
                return false;
            } 
            
            for (var i = 0; i < this.files.length; i++) {
                var file = this.files[i];
                if(parseInt(file.size/1024) > 1000) {
                    alert("Please select the image's below 1 Mb size");
                    document.getElementById("file").value=null; 
                    return false;
                }
             
                var reader = new FileReader();
                reader.onload = function (e) {
                    abc += 1;
                                                     
                    var imgContent = '  <div class="col-xs-4" id="abcd' + abc + '">\n\
                                            <img id="image" style="width:100px;height:80px;" class="thumbnail" src="'+e.target.result+'">\n\
                                        </div>'; 
                    $("#newImg").append(imgContent);
                }
                reader.readAsDataURL(file); 
            }
        });

        $(document).on("click",".delete-img",function(){
            var imageId = $(this).attr("id").replace('close','');
            var img_db=$("#img_db").val(); 
            if(img_db!='' && imageId!=''){
                var imgIdArray = img_db.split(',');
                imgIdArray = jQuery.grep(imgIdArray, function(value) {return value != imageId;});
                $("#img_db").val(imgIdArray.toString());
                imageId = imageId.replace(".", "");
                $("#"+imageId).remove();               
            }
        });
    });

    function deleteImag(l) {
        $("#abcd"+l).remove();
    } 

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
       
</script>