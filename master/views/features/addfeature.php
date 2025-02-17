<?php        
    require_once("../../common/layout.php");
    session_start();
    $type = 'add_feature';
    $featureId = '';

    if (isset($_GET['featureId'])) {
        $type            = "update_feature";
        $featureId      = $_GET['featureId'];
        $featureDetails = getFeatures($featureId);
        $featureDetails = $featureDetails[0];
      
    }
?>
<body class="bg-light">
    <?php include("../../common/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("../../common/leftpanel.php"); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-3 border-bottom">
                    <h1 class="h2">Add Features</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/features/featureslist.php">
                            Feature list
                        </a>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <form class="needs-validation" method="post" enctype="multipart/form-data" action="<?php echo API_URL; ?>/feature.php" id="formId">
                        <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">  
                        <input type="hidden" name="featureId" id="featureId" value="<?php echo $featureId; ?>">    
                        <div class="row mb-3">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label for="featureName" class="form-label">Feature Name:</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="featureName" name="featureName"  value="<?php echo isset($featureDetails['name']) ? $featureDetails['name'] : ''; ?>">
                                </div>
                                <span style="color:red;" id="errorfeatureName"></span>
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

    var featureName = document.getElementById('featureName').value.trim();
    if (featureName == '') {
        document.getElementById('errorfeatureName').innerText = 'This field is required';
        valid = false;
    } else {
        document.getElementById('errorfeatureName').innerText = '';
    }

    if (valid) {
        document.getElementById('formId').submit();
    }
}
</script>
