<?php        
    require_once("../../common/layout.php");
    session_start();
    $agentId  = $_SESSION['AGENTID'];
    $customersList = getCustomers(0,$agentId);
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
            <h1 class="h2">Customers List</h1>
          </div>

          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Property Title</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Mobile</th>
                    <th>Message</th>                
                </tr>
            </thead>
            <tbody>
              <?php $i = 1;
                foreach ($customersList as $customer) 
                { 
              ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $customer['title']; ?></td>
                    <td><?php echo $customer['name']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                    <td><?php echo $customer['mobile']; ?></td>
                    <td><?php echo $customer['message']; ?></td>
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
</script>