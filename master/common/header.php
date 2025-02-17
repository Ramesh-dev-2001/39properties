<?php 

if(!isset($_SESSION['id'])){
  header('Location:' .MASTER_URL);
}

    $propNotification = getNotification('property');
    $propNotification = $propNotification[0]['value'];

?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?php echo MASTER_URL?>/dashboard">
        <img src="<?php echo MASTER_URL?>/images/logo-black-new-1.png" alt="" width="40" height="25"> 39 Properties
    </a>
    
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="w-100">
    </div>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="<?php echo MASTER_URL;?>/views/properties/propertieslist.php">
                <i class="fa-solid fa-xm fa-bell"></i>
                <?php echo $propNotification;?>
            </a> 
        </div>
    </div>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="javascript:void(0)"onclick="logout()">Sign out</a>
        </div>
    </div>
</header>

<script>
	function logout(){
        var url     = '<?php echo API_URL; ?>/login.php';
        var data    = {type:'logout'};
        $.post(url,data,
            function(data,status){
                window.location = '<?php echo MASTER_URL; ?>';
            }
        );
    }
</script>