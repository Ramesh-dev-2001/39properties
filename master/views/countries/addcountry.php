<?php        
    require_once("../../common/layout.php");
    session_start();
    $type = 'add_country';
    $countryId = ''; // Initialize the variable

    if (isset($_GET['countryId'])) {
        $type = "update_country";
        $countryId = $_GET['countryId'];
        $countryDetails = getCountriesList($countryId);
        $countryDetails = $countryDetails[0];
    }
?>
<body class="bg-light">
    <?php include("../../common/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("../../common/leftpanel.php"); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add Country</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/countries/countrieslist.php">
                            Country list
                        </a>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <form class="needs-validation" method="post" enctype="multipart/form-data" action="<?php echo API_URL; ?>/countries.php" id="formId">
                        <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">  
                        <input type="hidden" name="countryId" id="countryId" value="<?php echo $countryId; ?>">    
                        <div class="row mb-3">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label for="countryName" class="form-label">Country Name:</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="countryName" name="countryName"  value="<?php echo isset($countryDetails['name']) ? $countryDetails['name'] : ''; ?>">
                                </div>
                                <span style="color:red;" id="errorcountryName"></span>
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

    var countryName = document.getElementById('countryName').value.trim();
    var errorCountryName = validateName(countryName);
    if (errorCountryName !== '') {
        document.getElementById('errorcountryName').innerText = errorCountryName;
        valid = false;
    } else {
        document.getElementById('errorcountryName').innerText = '';
    }

    if (valid) {
        document.getElementById('formId').submit();
    }
}
</script>
