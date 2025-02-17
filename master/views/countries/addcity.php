<?php        
    require_once("../../common/layout.php");
    session_start();
    $type = 'add_city';
    $cityId  ='';
    if (isset($_GET['cityId'])) {
        $type = "update_city";
        $cityId         = $_GET['cityId'];
        $cityDetails    = getCities(0,$cityId);
        $cityDetails    = $cityDetails[0];

    }
    $countries =getCountriesList();
    $states    = getStates();
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
            <h1 class="h2">Add City</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/countries/citylist.php">
                  City list
              </a>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" method="post" enctype="multipart/form-data" action="<?php echo API_URL; ?>/countries.php" id="formId">    
            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
            <input type="hidden" name="cityId" id="cityId" value="<?php echo $cityId; ?>">
              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label for="country" class="form-label">Country</label>
                  <div class="input-group has-validation">
                    <select class="form-select" name="countryId" id="countryId" onchange="getStates()">
                      <option value="">Select country</option>
                      <?php 
                      foreach($countries as $country) {
                        $selected = ($country['id'] == $cityDetails['countryId'])? 'selected':'';
                        echo '<option value="'.$country['id'].'" '.$selected.'>'.$country['name'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <span style="color:red;" id="errorcountryId"></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <label for="state" class="form-label">State</label>
                  <div class="input-group has-validation">
                    <select class="form-select" name="stateId" id="stateId">
                    <option selected disabled value="">Select state</option>
                      <?php 
                      foreach($states as $state) {
                      $selected = ($state['id'] == $cityDetails['stateId'])? 'selected':'';
                      echo '<option value="'.$state['id'].'" '.$selected.'>'.$state['name'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <span style="color:red;" id="errorstateId"></span>
                </div>
              </div>
            
              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label for="cityName" class="form-label">City Name:</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="cityName" name="cityName" value="<?php echo (isset($cityDetails['name']) && $cityDetails['name']!='')?$cityDetails['name']:'';?>">
                  </div>
                  <span style="color:red;" id="errorcityName"></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                  <button class="btn btn-primary mb-4" type="button" onclick="formValidation()">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </main>
    </div>
    </div>
  </body>
</html>
<script>

function getStates() {
    let countryId = document.getElementById('countryId').value;
    var url     = '<?php echo API_URL; ?>/countries.php';
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

function formValidation() {
    var valid = true;

    var countryId = document.getElementById('countryId').value;
    if (countryId === '') {
        document.getElementById('errorcountryId').innerText = 'This field is required.';
        valid = false;
    } else {
        document.getElementById('errorcountryId').innerText = '';
    }

    var stateId = document.getElementById('stateId').value;
    if (stateId === '') {
        document.getElementById('errorstateId').innerText = 'This field is required.';
        valid = false;
    } else {
        document.getElementById('errorstateId').innerText = '';
    }

    var cityName = document.getElementById('cityName').value.trim();
    var errorcityName = validateName(cityName);
    if (errorcityName !== '') {
        document.getElementById('errorcityName').innerText = errorcityName;
        valid = false;
    } else {
        document.getElementById('errorcityName').innerText = '';
    }
    if (valid) {
        document.getElementById('formId').submit();
    }

    return valid;
}
</script>