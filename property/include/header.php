<?php 
    session_start();
    $userId = isset($_SESSION['userId']) ?$_SESSION['userId'] : null;

?>
<!-- <marquee class="custom-marquee" behavior="scroll" direction="left" scrollamount="10" scrolldelay="85" style="background-color:#218838; color:white;">
    Exciting News! Our new product is now live and will be officially released on 12 October 2024! Stay tuned for more updates.
</marquee> -->
<header id="header" class="transparent-header-modern fixed-header-bg-white w-100 border-top">
    <div class="main-nav secondary-nav hover-success-nav py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0"> <a class="navbar-brand position-relative" href="<?php echo WEB_URL;?>"><img class="nav-logo" src="<?php echo PROPERTY_URL;?>/images/logo/black-white-bg-name.png" alt="" width="50" height="50"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown"> <a class="nav-link" href="<?php echo WEB_URL;?>" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                                
                                <li class="nav-item"> <a class="nav-link" href="<?php echo PROPERTY_URL;?>/about.php">About</a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" href="<?php echo PROPERTY_URL;?>/contact.php">Contact</a> </li>										
                                
                                <!-- <li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li> -->
                                
                                <li class="nav-item"> <a class="nav-link" target="_blank" href="<?php echo AGENT_URL;?>">Agent</a> </li>
                                <?php 
                                    if ($userId) {
                                        echo '<li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)" onclick="logout()">Logout</a></li>
                                                </ul>
                                            </li>';
                                    } else {
                                        echo '<li class="nav-item"><a class="nav-link" href="' . PROPERTY_URL . '/login.php">Login</a></li>
                                            <li class="nav-item"><a class="nav-link" href="' . PROPERTY_URL . '/register.php">Register</a></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
	function logout(){
        var url     = '<?php echo API_URL; ?>/user.php';
        var data    = {type:'userLogout'};
        $.post(url,data,
            function(data,status){
                window.location = '<?php echo WEB_URL; ?>';
            }
        );
    }
</script>