<?php 
function addUser($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO users (name, email, mobile,password)
        VALUES ('%s', '%s', '%s','%s')",
        $data['name'], $data['email'], $data['mobile'],md5($data['pwd']));

        $result = $con->query($sql);
        return  $result; 
}


function addAuthUser($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO users (name, email)
        VALUES ('%s', '%s', '%s')",
        $data['name'], $data['email']);

        $con->query($sql);
        return isset($con->insert_id)?$con->insert_id:0;
}
function getUserAcc($data = array())
{
    $con = dbconnection();

    $sql = sprintf("SELECT * FROM `users` WHERE email = '%s' AND password = '%s'", $data['email'], md5($data['pwd']));  
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getUsers($userId =0)
{
    $con = dbconnection();

    $whereCls = '';
    if($userId){
        $whereCls = '  where id = '.$userId;
    }

    $sql = ("SELECT * FROM users $whereCls order by id desc");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
?>