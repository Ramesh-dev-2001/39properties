<?php        
    require_once("../../common/layout.php");
    session_start();
    $features = getFeatures();
?>
  <body>    
    <?php 
        include("../../common/header.php");
    ?> 
    <div class="container-fluid">
    <div class="row">
        <?php 
            include("../../common/leftpanel.php");
        ?> 
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-3  border-bottom">
          <h1 class="h2">Features</h1>
          <div class="btn-toolbar mb-md-0">
            <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/features/addfeature.php">
              Add Feature
            </a>
          </div>
        </div>    
          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                  <th>S.No</th>
                  <th>feature Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i= 1;
                foreach ($features as $feature) { 
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $feature['name'];?></td>
                <td>
                    <?php if ($feature['status'] == 'A'): ?>
                        Active
                    <?php else: ?>
                        InActive
                    <?php endif; ?>
                </td>
                <td>
                <?php 
                    if($feature['status'] === 'I') { 
                ?>
                    <a href="javascript:void(0);" onclick="activeStatus(<?php echo $feature['id'];?>)">Active</a>
                <?php
                    } else {
                ?>
                    <a href="javascript:void(0);" onclick="inactiveStatus(<?php echo $feature['id'];?>)">InActive</a>
                <?php
                    }
                ?>/
                  <a href="<?php echo MASTER_URL;?>/views/features/addfeature.php?featureId=<?php echo $feature['id']?>">Edit</a>/
                  <a href="javascript:void(0)" onclick="deleteFeature(<?php echo $feature['id'];?>)">Delete</a>
                </td>
            </tr>
            <?php 
            }
            ?>
          </tbody>
          </table>
        </main>
    </div>
    </div>
  </body>
</html>
<script>
new DataTable('#example'); 

function deleteFeature(featureId)
{
    if (confirm("Are you sure you want to delete data")) {
    var url     = '<?php echo API_URL; ?>/feature.php';
    var data    = {type:'delete_feature',featureId:featureId};
        $.post(url,data,
        function(data){
            if(data == '1') {
            console.log(data);
            location.reload();
            }else{
            location.reload();
            }
        }
        ); 
    }  
}
function inactiveStatus(featureId)
    {
        updateStatus(featureId,'I');
    }
    
    function activeStatus(featureId)
    {
        updateStatus(featureId,'A');
    }
    
    function updateStatus(featureId,status)
    {
        if (confirm("Are sure want update status..")) {
            var url     = '<?php echo API_URL; ?>/feature.php';
            var data    = {type:'change_feature_status',featureId:featureId,status:status};
            $.post(url,data,
                function(data,status){
                    if(data === '1') {
                        alert('Status updated successfully');
                        location.reload();
                    }  
                }
            ); 
            return false;
        }
    }
</script>