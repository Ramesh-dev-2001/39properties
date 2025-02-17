<?php        
  require_once("../../common/layout.php");
  session_start();
  $agentId  = $_SESSION['AGENTID'];
  $properties = getProperty(0,$agentId);

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
            <a class="btn btn-sm btn-primary" href="<?php echo AGENT_URL?>/views/properties/addproperty.php">
              Add Property
            </a>
          </div>
        </div>

          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Category Type</th>
                  <th>Selling Type</th>
                  <th>Area</th>
                  <th>Price</th>
                  <th>Location</th>
                  <th>Views</th>
                  <th>Created On</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $i = 1;
                  foreach ($properties as $property) 
                  { 
                ?>
              <tr>
                <td><?php echo $i++;?></td>
                  <td><?php echo $property['title']; ?></td>
                  <td><?php echo $property['categoryName']; ?></td>
                  <td><?php echo $property['saleType']; ?></td>
                  <td><?php echo $property['areaSize']; ?> Sqft</td>
                  <td>₹<?php echo $property['price']; ?></td>
                  <td> <a target="__blank" href="<?php echo $property['url']; ?>">click here</a></td>
                  <td><?php echo $property['views']; ?></td>
                  <td><?php echo $property['createdOn']; ?></td>
                  <td>
                      <a class="btn btn-sm btn-primary" href="<?php echo AGENT_URL;?>/views/properties/addproperty.php?propertyId=<?php echo $property['id']?>">
                      Edit</a>
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="deleteProperty(<?php echo $property['id'];?>)">Delete</a>
                  </td>
              </tr>
              <?php } ?>
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

</script>