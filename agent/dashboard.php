<?php 
  require_once("common/layout.php");
  session_start();

  if(!isset($_SESSION['ID'])){
    header('Location:' .AGENT_URL);
  }
?>

<body>    
  <?php 
      include("common/header.php");
  ?> 
  <div class="container-fluid">
  <div class="row">
      <?php 
          include("common/leftpanel.php");
      ?> 
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">   
        <section class="content-header pt-2 pb-2 mb-3 border-bottom">
            <h3>Dashboard</h3>
        </section> 
        <section class="content">
          <div class="row">	 
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="<?php echo AGENT_URL;?>/views/profile/profile.php" title="Profile">
                  <img height="62" width="92" class="img-responsive" src="<?php echo AGENT_URL;?>/images/user.png" alt=""><center>Profile</center>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="<?php echo AGENT_URL;?>/views/changePassword/changePassword.php" title="changePwd">
                  <img height="62" width="92" class="img-responsive" src="<?php echo AGENT_URL;?>/images/lock.png" alt=""><center>Change Password</center>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="<?php echo AGENT_URL;?>/views/properties/propertieslist.php" title="properties">
                  <img height="62" width="92" class="img-responsive" src="<?php echo AGENT_URL;?>/images/building.jpg" alt=""><center>Properties</center>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="<?php echo AGENT_URL;?>/views/customerconnects/customerconnects.php" title="customerList">
                  <img height="62" width="92" class="img-responsive" src="<?php echo AGENT_URL;?>/images/team.png" alt=""><center>Customers List</center>
                </a>
            </div>	 
          </div>
        </section>
      </main>
  </div>
  </div>
</body>
</html>
