<?php 

if(!isset($_SESSION['ID'])){
  header('Location:' .AGENT_URL);
}
?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?php echo AGENT_URL?>/dashboard">
        <img src="<?php echo AGENT_URL;?>/images/logo-black-new-1.png" alt="" width="40" height="25"> 39 Properties
    </a>
    
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="w-100"></div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">           
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                                </svg> 
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li> 
                                <a class="dropdown-item" href="<?php echo AGENT_URL ?>/views/profile/profile.php">Profile</a>
                            </li>
                            <li> 
                                <a class="dropdown-item" href="javascript:void(0)" onclick="agentlogout()">Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="m-1">&nbsp;</div>
</header>

<script>
	function agentlogout(){
        var url     = '<?php echo API_URL; ?>/login.php';
        var data    = {type:'agentLogout'};
        $.post(url,data,
            function(data,status){
                window.location = '<?php echo AGENT_URL; ?>';
            }
        ); 
    }
</script>