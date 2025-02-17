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
                <a class="nav-link <?php echo getActiveCls('dashboard') ?>" aria-current="page" href="<?php echo MASTER_URL; ?>/dashboard.php">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <?php
                $propertiesActive = getActiveCls('propertieslist') ?: getActiveCls('addproperty');
                ?>
                <a class="nav-link <?php echo $propertiesActive ?>" href="<?php echo MASTER_URL; ?>/views/properties/propertieslist.php">
                    <span data-feather="file"></span>
                    Properties
                </a>
            </li>
            <li class="nav-item">
            <?php
                $agentActive = getActiveCls('agentslist') ?: getActiveCls('addagent');
            ?>
            <a class="nav-link <?php echo $agentActive ?>" href="<?php echo MASTER_URL; ?>/views/agents/agentslist.php">
                    <span data-feather="shopping-cart"></span>
                    Agents
                </a>
            </li>
            <li class="nav-item">
            <?php
                $countriesActive = getActiveCls('countrieslist') ?:getActiveCls('statelist') ?: getActiveCls('citylist')?: getActiveCls('addcountry') ?: getActiveCls('addstate') ?: getActiveCls('addcity');
                ?>
            <a class="nav-link <?php echo $countriesActive ?>" href="<?php echo MASTER_URL; ?>/views/countries/countrieslist.php">
                    <span data-feather="shopping-cart"></span>
                    Countries
                </a>
            </li>
            <li class="nav-item">
                <?php
                $categoryActive = getActiveCls('categorylist') ?: getActiveCls('addcategory');
                ?>
                <a class="nav-link <?php echo $categoryActive ?>" href="<?php echo MASTER_URL; ?>/views/categories/categorylist.php">
                    <span data-feather="shopping-cart"></span>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <?php
                $featureActive = getActiveCls('featureslist') ?: getActiveCls('addfeature');
                ?>
                <a class="nav-link <?php echo $featureActive ?>" href="<?php echo MASTER_URL; ?>/views/features/featureslist.php">
                    <span data-feather="shopping-cart"></span>
                    Features
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo getActiveCls('customerconnects') ?>" aria-current="page" href="<?php echo MASTER_URL;?>/views/customerconnects/customerconnects.php">
                    <span data-feather="home"></span>
                    Customers List
                </a>
            </li>
        </ul>
        <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul> -->
    </div>
</nav>