<?php        
    require_once("../../common/layout.php");
    session_start();
    $cities    = getCities();
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-1 mb-3 border-bottom">
          <h1 class="h2">Locations</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/countries/addcity.php">
              Add City
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6" style="width:100% !important;">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                      <li><a href="<?php echo MASTER_URL?>/views/countries/countrieslist.php">Country List</a></li>
                      <li><a href="<?php echo MASTER_URL?>/views/countries/statelist.php">State List</a></li>
                      <li class="active"><a href="javascript:void(0);">City List</a></li>
                  </ul>    
                </div><!-- nav-tabs-custom -->
          </div><!-- /.col -->
        </div> 
          <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i= 1;
                foreach ($cities as $city) { 
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $city['name'];?></td>
                <td>
                    <?php if ($city['status'] == 'A'): ?>
                        Active
                    <?php else: ?>
                        Inactive
                    <?php endif; ?>
                </td>
                <td>
                  <a href="<?php echo MASTER_URL;?>/views/countries/addcity.php?cityId=<?php echo $city['id']?>">Edit</a>
                  /
                  <?php 
                    if($city['status'] == 'A'){?>
                      <a href="javascript:void(0)" onclick="inActive(<?php echo $city['id']?>)">InActive</a>
                  <?php 
                    }else{?>
                      <a href="javascript:void(0)" onclick="active(<?php echo $city['id']?>)">Active</a>
                    <?php }
                  ?>
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
  function inActive(cityId){
    updateStatus(cityId,'I');
  }

  function active(cityId){
    updateStatus(cityId,'A');
  }

  function updateStatus(cityId,status){
    if(confirm("Are you sure you want to update status")){
      var url   = '<?php echo API_URL;?>/countries.php';
      var data  = {type:'change_status',cityId:cityId,status:status,stateId:0,countryId:0};
      $.post(url,data,
        function(data,status){
          if(data === '1'){
            alert('status updated succesfully');
            location.reload();
          }
        }
      );
      return false;
    }
  }
</script>