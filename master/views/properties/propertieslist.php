
<?php        
    require_once("../../common/layout.php");
    session_start();
    $properties = getProperty();
    updateNotification('property', 0);
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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Properties</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/properties/addproperty.php">
                Add Property
              </a>
            </div>
          </div>

          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Agent Name</th>
                  <th>Title</th>
                  <th>Category Type</th>
                  <th>Selling Type</th>
                  <th>Area</th>
                  <th>Price</th>
                  <th>Location</th>
                  <th>Views</th>
                  <th>Created On</th>
                  <th>Action</th>
                  <th>Request Status</th>
                  <th>Feature</th>
                </tr>
            </thead>
            <tbody>
              <?php $i = 1;
                foreach ($properties as $property) 
                { 
              ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $property['agentName']; ?></td>
                    <td><?php echo $property['title']; ?></td>
                    <td><?php echo $property['categoryName']; ?></td>
                    <td><?php echo $property['saleType']; ?></td>
                    <td><?php echo $property['areaSize']; ?> Sqft</td>
                    <td>₹<?php echo $property['price']; ?></td>
                    <td><a target="__blank" href="<?php echo $property['url']; ?>">click here</a></td>
                    <td><?php echo $property['views']; ?></td>
                    <td><?php echo $property['createdStr']; ?></td>
                    <td>
                        <a href="<?php echo MASTER_URL;?>/views/properties/addproperty.php?propertyId=<?php echo $property['id']?>">Edit</a>
                        /
                        <a href="javascript:void(0)" onclick="deleteProperty(<?php echo $property['id'];?>)">Delete</a>
                        <?php
                          if($property['isApproved'] == 2) {
                        ?>/
                        <a style="color:green;" href="javascript:void(0);" onclick="approve(<?php echo $property['id'];?>)">Approve</a>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                        if($property['isApproved'] == 1) { 
                            echo 'Approved';
                        } else if($property['isApproved'] == 2) {
                            echo 'Declined';
                        } else { 
                        ?>                                                    
                        <a href="javascript:void(0);" onclick="approve(<?php echo $property['id'];?>)">Approve</a>                                                    
                        /
                        <a href="#" data-toggle="modal" onclick="decline(<?php echo $property['id'];?>)">Decline</a>                                                        
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                      if($property['isFeatured'] == 1) { 
                        echo 'Featured';
                      }else { 
                      ?>                                                    
                      <a href="javascript:void(0);" onclick="feature(<?php echo $property['id'];?>)">Feature</a>                                                                                                           
                      <?php
                      }
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
 $(document).ready(function() {
    var table = new DataTable('#example', {
        ordering: false
    });
});
  
function deleteProperty(propertyId)
  {
    if (confirm("Are you sure you want to delete data")) {
      var url     = '<?php echo API_URL; ?>/property.php';
      var data    = {type:'delete_property',propertyId:propertyId};
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
  function approve(propertyId)
    {
        updateApproveOrDecline(propertyId,1);
    }

    
    function decline(propertyId)
    {
        updateApproveOrDecline(propertyId,2);
    }
    function updateApproveOrDecline(propertyId,isApproved)
    {
        if (confirm("Are sure want update status..")) {         
            var url     = '<?php echo API_URL; ?>/property.php';
            var data    = {type:'approve_status',propertyId:propertyId,isApproved:isApproved};
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

    function feature(propertyId)
    {
        updateFeature(propertyId,1);
    }
    function updateFeature(propertyId,isFeatured)
    {
        if (confirm("Are sure want update status..")) {         
            var url     = '<?php echo API_URL; ?>/property.php';
            var data    = {type:'feature_status',propertyId:propertyId,isFeatured:isFeatured};
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