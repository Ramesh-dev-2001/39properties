<?php
function getActiveCls($tabName = "") {

    if(stripos($_SERVER['REQUEST_URI'], $tabName) !== FALSE){
        return 'active';
    } 

    return '';
}

?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo getActiveCls('dashboard') ?>" aria-current="page" href="<?php echo AGENT_URL; ?>/dashboard.php">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo getActiveCls('profile') ?>" aria-current="page" href="<?php echo AGENT_URL; ?>/views/profile/profile.php">
                    <span data-feather="file"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo getActiveCls('changePassword') ?>" aria-current="page" href="<?php echo AGENT_URL; ?>/views/changePassword/changePassword.php">
                    <span data-feather="file"></span>
                    Change Password
                </a>
            </li>
            <li class="nav-item">
                <?php
                $propertiesActive = getActiveCls('propertieslist') ?: getActiveCls('addproperty');
                ?>
                <a class="nav-link <?php echo $propertiesActive ?>" href="<?php echo AGENT_URL; ?>/views/properties/propertieslist.php">
                    <span data-feather="file"></span>
                    Properties
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo getActiveCls('customerconnects') ?>" aria-current="page" href="<?php echo AGENT_URL; ?>/views/customerconnects/customerconnects.php">
                    <span data-feather="file"></span>
                    Customers List
                </a>
            </li>
        </ul>
    </div>
</nav>