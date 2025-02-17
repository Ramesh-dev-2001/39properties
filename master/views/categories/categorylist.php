<?php        
    require_once("../../common/layout.php");
    session_start();
    $categories = getCategories();
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
          <h1 class="h2">Categories</h1>
          <div class="btn-toolbar mb-md-0">
            <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/categories/addcategory.php">
              Add Category
            </a>
          </div>
        </div>    
          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i= 1;
                foreach ($categories as $category) { 
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $category['categoryName'];?></td>
                <td>
                    <?php if ($category['status'] == 'A'): ?>
                        Active
                    <?php else: ?>
                        InActive
                    <?php endif; ?>
                </td>
                <td>
                <?php 
                    if($category['status'] === 'I') { 
                ?>
                    <a href="javascript:void(0);" onclick="activeStatus(<?php echo $category['id'];?>)">Active</a>
                <?php
                    } else {
                ?>
                    <a href="javascript:void(0);" onclick="inactiveStatus(<?php echo $category['id'];?>)">InActive</a>
                <?php
                    }
                ?>/
                  <a href="<?php echo MASTER_URL;?>/views/categories/addcategory.php?categoryId=<?php echo $category['id']?>">Edit</a>/
                  <a href="javascript:void(0)" onclick="deleteCategory(<?php echo $category['id'];?>)">Delete</a>
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

function deleteCategory(categoryId)
{
    if (confirm("Are you sure you want to delete data")) {
    var url     = '<?php echo API_URL; ?>/category.php';
    var data    = {type:'delete_category',categoryId:categoryId};
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
function inactiveStatus(categoryId)
    {
        updateStatus(categoryId,'I');
    }
    
    function activeStatus(categoryId)
    {
        updateStatus(categoryId,'A');
    }
    
    function updateStatus(categoryId,status,)
    {
        if (confirm("Are sure want update status..")) {
            var url     = '<?php echo API_URL; ?>/category.php';
            var data    = {type:'change_category_status',categoryId:categoryId,status:status};
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