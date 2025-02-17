<?php        
    require_once("../../common/layout.php");
    session_start();
    $type = 'add_state';
    $stateId  = '';
    if (isset($_GET['stateId'])) {
        $type = "update_state";
        $stateId         = $_GET['stateId'];
        $stateDetails    = getStates(0,$stateId);
        $stateDetails    = $stateDetails[0];

    }
    
    $countries =getCountriesList();
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
          <h1 class="h2">Add State</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/countries/statelist.php">
                State list
            </a>
          </div>
        </div>
          <div class="col-md-7 col-lg-8">
            <form method="post" enctype="multipart/form-data" action="<?php echo API_URL; ?>/countries.php" id="formId">    
            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
            <input type="hidden" name="stateId" id="stateId" value="<?php echo $stateId; ?>">
              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label for="countryId" class="form-label">Select Country</label>
                  <div class="input-group has-validation">
                  <select class="form-select" name="countryId" id="countryId" onchange="getStates()">
                      <option value="">Select country</option>
                      <?php 
                      foreach($countries as $country) {
                        $selected = ($country['id'] == $stateDetails['countryId'])? 'selected':'';
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
                  <label for="stateName" class="form-label">State Name:</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="stateName" name="stateName" value="<?php echo (isset($stateDetails['name']) && $stateDetails['name']!='')?$stateDetails['name']:'';?>">
                  </div>
                  <span style="color:red;" id="errorstateName"></span>
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
function formValidation() {
  var valid = true;

  var countryId = document.getElementById('countryId').value;
    if (countryId === '') {
        document.getElementById('errorcountryId').innerText = 'This field is required.';
        valid = false;
    } else {
        document.getElementById('errorcountryId').innerText = '';
    }

    var stateName = document.getElementById('stateName').value.trim();
    var errorStateName = validateName(stateName);
    if (errorStateName !== '') {
        document.getElementById('errorstateName').innerText = errorStateName;
        valid = false;
    } else {
        document.getElementById('errorstateName').innerText = '';
    }

    if (valid) {
        document.getElementById('formId').submit();
    }
}
</script>