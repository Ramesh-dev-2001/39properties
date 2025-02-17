<?php        
    require_once("../../common/layout.php");
    session_start();
    $agentId = 0;
    $type = 'add_agent';
    if (isset($_GET['agentId'])) {
      $type = "update_agent";
      $agentId         = $_GET['agentId'];
      $agentDetails    = getAgents($agentId);
      $agentDetails    = $agentDetails[0];

  }
    $countries = getCountriesList();
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
            <h1 class="h2">Add Agent</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/agents/agentslist.php">
                  Agent List
              </a>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" method="post" enctype="multipart/form-data" id="formId" action="<?php echo API_URL; ?>/agent.php">
            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
            <input type="hidden" name="agentId" id="agentId" value="<?php echo $agentId; ?>">
              <h5 class="mb-5">Agent Details</h5>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="firstName" class="form-label">First Name</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo (isset($agentDetails['firstName']) && $agentDetails['firstName']!='')?$agentDetails['firstName']:'';?>">
                    </div>
                    <span style="color:red;" id="errorfirstName"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="lastName" class="form-label">Last Name</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo (isset($agentDetails['lastName']) && $agentDetails['lastName']!='')?$agentDetails['lastName']:'';?>">
                    </div>
                    <span style="color:red;" id="errorlastName"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="email" class="form-label" style="text-align: right;">Email</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?php echo (isset($agentDetails['email']) && $agentDetails['email']!='')?$agentDetails['email']:'';?>">
                    </div>
                    <span style="color:red;" id="erroremail"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="mobile" class="form-label">Mobile</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo (isset($agentDetails['mobile']) && $agentDetails['mobile']!='')?$agentDetails['mobile']:'';?>">
                    </div>
                    <span style="color:red;" id="errormobile"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="country" class="form-label">Country</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <select class="form-select" name="countryId" id="countryId" onchange="getStates()">
                        <option value="">Select country</option>
                        <?php 
                        foreach($countries as $country) {
                          $selected = ($country['id'] == $agentDetails['countryId'])? 'selected':'';
                          echo '<option value="'.$country['id'].'" '.$selected.'>'.$country['name'].'</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <span style="color:red;" id="errorcountryId"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="state" class="form-label">State</label>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group has-validation">
                      <select class="form-select" name="stateId" id="stateId">
                      <option selected disabled value="">Select state</option>
                        <?php 
                        foreach($states as $state) {
                        $selected = ($state['id'] == $agentDetails['stateId'])? 'selected':'';
                        echo '<option value="'.$state['id'].'" '.$selected.'>'.$state['name'].'</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <span style="color:red;" id="errorstateId"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="expiryDate" class="form-label">Expiry Date</label>
                  </div>
                  <div class="col-md-6">
                  <div class="input-group has-validation">
                        <input type="date" class="form-control" id="expiryDate" name="expiryDate" 
                              value="<?php echo (isset($agentDetails['expiryDate']) && $agentDetails['expiryDate'] != '') ? $agentDetails['expiryDate'] : ''; ?>" 
                              min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <span style="color:red;" id="errorexpiryDate"></span>
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
    var url     = '<?php echo API_URL; ?>/agent.php';
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

    var firstName = document.getElementById('firstName').value.trim();
    var lastName = document.getElementById('lastName').value.trim();
    var email = document.getElementById('email').value.trim();
    var mobile = document.getElementById('mobile').value.trim();

    var errorfirstName = validateName(firstName);
    if (errorfirstName !== '') {
        document.getElementById('errorfirstName').innerText = errorfirstName;
        valid = false;
    } else {
        document.getElementById('errorfirstName').innerText = '';
    }

    var errorLastName = validateName(lastName);
    if (errorLastName !== '') {
        document.getElementById('errorlastName').innerText = errorLastName;
        valid = false;
    } else {
        document.getElementById('errorlastName').innerText = '';
    }

    var errorEmail = validateEmail(email);
    if (errorEmail !== '') {
        document.getElementById('erroremail').innerText = errorEmail;
        valid = false;
    } else {
        document.getElementById('erroremail').innerText = '';
    }

    var errorMobile = validatePhone(mobile);
    if (errorMobile !== '') {
        document.getElementById('errormobile').innerText = errorMobile;
        valid = false;
    } else {
        document.getElementById('errormobile').innerText = '';
    }

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

    var expiryDate = document.getElementById('expiryDate').value;
    if (expiryDate === '') {
        document.getElementById('errorexpiryDate').innerText = 'This field is required.';
        valid = false;
    } else {
        document.getElementById('errorexpiryDate').innerText = '';
    }

    if (valid) {
        document.getElementById('formId').submit();
    }

    return valid;
}
</script>
