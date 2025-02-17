<?php        
    require_once("../../common/layout.php");
    session_start();
    $loginId = $_SESSION['ID'];
    $type = 'change_password';
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
            <h1 class="h2">Change Password</h1>
          </div>
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" method="post" action="<?php echo API_URL; ?>/login.php" id="formId">    
            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
            <input type="hidden" name="loginId" id="loginId" value="<?php echo $loginId; ?>">
              <div class="row mb-3">
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <?php
                      if (isset($_SESSION['error'])):
                    ?>
                      <div id="error-message" class="alert alert-danger">
                          <?php echo $_SESSION['error']; ?>
                      </div>
                      <?php unset($_SESSION['error']) ?>
                    <?php 
                      endif; 
                    ?>
                  </div>  
              </div>
              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label for="currentPwd" class="form-label">Current Password:</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="currentPwd" name="currentPwd" required>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label for="newPwd" class="form-label">New Password:</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="newPwd" name="newPwd" required>
                  </div>
                  <span style="color:red;" id="errornewPwd"></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <label for="confirmPwd" class="form-label">Confirm Password:</label>
                  <div class="input-group has-validation">
                    <input type="password" class="form-control" id="confirmPwd" name="confirmPwd" required >
                  </div>
                  <span style="color:red;" id="errorconfirmPwd"></span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                  <button class="btn btn-primary mb-4" type="submit" onclick="formValidation()">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </main>
    </div>
    </div>
  </body>
</html>
