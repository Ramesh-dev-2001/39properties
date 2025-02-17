<?php
function getLoginAccount($data = array())
{
    $con = dbconnection();

    $sql = sprintf("SELECT * FROM `loginAccounts` WHERE type = '%s' AND email = '%s' AND password = '%s' AND 
        status = 'A'", $data['type'], $data['email'], md5($data['password']));  
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function getLoginAcc($loginId)
{
    $con = dbconnection();

    $whereCls ='';
    if($loginId){
        $whereCls = '  where id = '.$loginId;
    }

    $sql = sprintf("SELECT * FROM loginAccounts $whereCls");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function updatePwd($newPwd,$loginId)
{
    $con = dbconnection();
    $sql = sprintf("UPDATE loginAccounts SET  password ='%s' WHERE id ='%s'",md5($newPwd),$loginId);

    $result = $con->query($sql);
    return $result;
}
function addAgentLogin($data = array())
{
    $con = dbconnection();
     
    $sql = sprintf("INSERT INTO loginAccounts(`agentId`,`type`,`email`,`password`) 
                    VALUES('%s','%s','%s','%s')",
                    $data['agentId'],$data['type'],$data['email'],$data['password']);
      
    $con->query($sql);
    return true;
}