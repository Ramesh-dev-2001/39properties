<?php
function getAgents($agentId =0)
{
    $con = dbconnection();

    $whereCls = '';
    if($agentId){
        $whereCls = '  where id = '.$agentId;
    }

    $sql = ("SELECT * FROM agents $whereCls order by id desc");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
function addAgent($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO agents (
        firstName, lastName, email, mobile, countryId, stateId, expiryDate)
        VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
        $data['firstName'],$data['lastName'], $data['email'], $data['mobile'], $data['countryId'], $data['stateId'], $data['expiryDate']);

        $result = $con->query($sql);
        return  $result; 
}
function updateAgent($data = array())
{
    $con = dbconnection();

    $sql = sprintf("UPDATE agents SET
        firstName = '%s', lastName = '%s', email = '%s',mobile = '%s',countryId = '%s',stateId = '%s', expiryDate = '%s' 
        WHERE id = '%s'",
        $data['firstName'],$data['lastName'], $data['email'], $data['mobile'], $data['countryId'], $data['stateId'], $data['expiryDate'], $data['agentId']);

    $result = $con->query($sql);
    return $result;
}
function updateAgentStatus($data = array())
{
    $con = dbconnection();
      
    $sql = sprintf("UPDATE agents SET status='%s' WHERE id ='%s'",$data['status'],$data['agentId']);
    $con->query($sql);
    
    return true; 
}
function updateAgentApproveStatus($data = array())
{
    $con = dbconnection();         
    $sql = sprintf("UPDATE agents SET isApproved='%s' WHERE id ='%s'",$data['isApproved'],$data['agentId']);   
    $con->query($sql);       
    return true; 
}