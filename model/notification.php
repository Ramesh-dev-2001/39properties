<?php

function getNotification($key_name = '',$status = 'A')
{    
    $con = dbconnection();
    $whereCls = '';
    if($key_name){
        $whereCls = "  where keyName = '".$key_name."'";
    } 
    
    $sql = sprintf("SELECT * FROM notification $whereCls");  

    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);         
}
 
function updateNotification($key_name = '',$value = 0)
{
    $con = dbconnection();
      
    $sql = sprintf("UPDATE notification SET value='%s' WHERE keyName ='%s'",$value,$key_name);
    $con->query($sql);
    
    return true; 
}
