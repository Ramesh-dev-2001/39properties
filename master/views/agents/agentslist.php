<?php        
    require_once("../../common/layout.php");
    session_start();
    $agents = getAgents();
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
          <h1 class="h2">Agents</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-primary" href="<?php echo MASTER_URL?>/views/agents/addagent.php">
              Add Agent
            </a>
          </div>
        </div>

          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Created On</th>
                  <th>Expiry Date</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>Request Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $i= 1;
                foreach ($agents as $agent) { 
                    $createdDate = (new DateTime($agent['createdOn']))->format('d/m/Y');
                    $date = DateTime::createFromFormat('Y-m-d', $agent['expiryDate']);
                    $expiryDate = $date->format('d/m/Y');
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $agent['lastName'];?> <?php echo $agent['firstName'];?></td>
                <td><?php echo $agent['email']; ?></td>
                <td><?php echo $agent['mobile']; ?></td>
                <td><?php echo $createdDate; ?></td>
                <td><?php echo $expiryDate; ?></td>
                <td>
                    <?php
                    if($agent['isApproved']) {
                        if($agent['isApproved'] != 2)
                        {
                            if($agent['status'] === 'A') { 
                                echo 'Active';                                                         
                            } else if($agent['status'] === 'S'){ 
                                echo 'Suspended'; 
                            }
                            else { 
                                echo 'InActive'; 
                            }
                        }
                        else
                        {
                            echo 'Declined';
                        }
                    } 
                    else
                    {
                        echo 'Waiting for approval';
                    }
                    ?>
                    </td>
                    <td>
                        <?php 
                    if($agent['status'] === 'S') { 
                ?>
                    <a href="javascript:void(0);" onclick="activeStatus(<?php echo $agent['id'];?>)">Release</a>
                <?php
                    } else { 
                ?>
                    <a href="javascript:void(0);" onclick="suspeninactiveStatus(<?php echo $agent['id'];?>)">Suspend</a>
                <?php
                    } 
                ?>
                    &nbsp;/ 
                    <?php 
                    if($agent['status'] === 'I') { 
                ?>
                    <a href="javascript:void(0);" onclick="activeStatus(<?php echo $agent['id'];?>)">Active</a>
                <?php
                    } else {
                ?>
                    <a href="javascript:void(0);" onclick="inactiveStatus(<?php echo $agent['id'];?>)">InActive</a>
                <?php
                    }
                ?>
                    &nbsp;/
                        <a href="<?php echo MASTER_URL;?>/views/agents/addagent.php?agentId=<?php echo $agent['id'];?>">Edit</a>
                        <?php
                            if($agent['isApproved'] == 2) {
                        ?>
                                &nbsp;/
                                <a style="color:green;" href="javascript:void(0);" onclick="approve(<?php echo $agent['id'];?>)">Approve</a>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                    <?php 
                    if($agent['isApproved'] == 1) { 
                        echo 'Approved';
                    } else if($agent['isApproved'] == 2) {
                        echo 'Declined';
                    } else { 
                    ?>                                                    
                        <a href="javascript:void(0);" onclick="approve(<?php echo $agent['id'];?>)">Approve</a>                                                    
                        &nbsp;&nbsp;/
                        <a href="#" data-toggle="modal" onclick="decline(<?php echo $agent['id'];?>)">Decline</a>                                                        
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
  new DataTable('#example'); 

  function suspeninactiveStatus(agentId)
    {
        updateStatus(agentId,'S');
    }
    function inactiveStatus(agentId)
    {
        updateStatus(agentId,'I');
    }
    
    function activeStatus(agentId)
    {
        updateStatus(agentId,'A');
    }
    
    function updateStatus(agentId,status)
    {
        if (confirm("Are sure want update status..")) {
            var url     = '<?php echo API_URL; ?>/agent.php';
            var data    = {type:'change_status',agentId:agentId,status:status};
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
    
    function approve(agentId)
    {
        updateApproveOrDecline(agentId,1);
    }

    function decline(agentId)
    {
        updateApproveOrDecline(agentId,2);
    }
    function updateApproveOrDecline(agentId,isApproved)
    {
        if (confirm("Are sure want update status..")) {         
            var url     = '<?php echo MASTER_URL;?>/common/ajax.php';
            var data    = {type:'approve_status',agentId:agentId,isApproved:isApproved};
            $.post(url,data,
                function(data,status){
                    if(data === '1') { 
                        alert('Status updated successfully');
                        window.location.reload();
                    }  
                }
            ); 
            return false;
        }
    }
</script>