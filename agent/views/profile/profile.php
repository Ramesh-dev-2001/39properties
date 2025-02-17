<?php        
    require_once("../../common/layout.php");
    session_start();
    $agentId = $_SESSION['AGENTID'];
    $agent = getAgents($agentId);
    $agent = $agent[0];
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-1 border-bottom">
                    <h2>Profile</h2>
                </div>
                <div class="row mt-5">
                    <div class="card" style="width:50%;">
                        <div class="card-body">
                            <p class="fs-5"><b>First Name</b><span class="ms-2"></span>: <?php echo $agent['firstName']?></p>
                            <p class="fs-5"><b>Last Name</b>&nbsp<span class="ms-2"></span>: <?php echo $agent['lastName']?></p>
                            <p class="fs-5"><b>Mobile</b><span class="ms-5"></span>: <?php echo $agent['mobile']?></p>
                            <p class="fs-5"><b>Email</b><span class="ms-5 ps-3"></span>: <?php echo $agent['email']?></p>    
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
