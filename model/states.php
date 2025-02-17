<?php
function getStates($countryId = 0 ,$stateId=0)
{
    $con = dbconnection();

    $whereCls = '';
    if($countryId){
        $whereCls = " AND countryId = ".$countryId;
    }
    if($stateId){
        $whereCls = " AND id = ".$stateId;
    }

    $sql = sprintf("SELECT * FROM states WHERE status !='D'  $whereCls");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}

function addState($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO states (countryId,name) VALUES ('%s','%s')",$data['countryId'],$data['stateName']);

        $result = $con->query($sql);
        return  $result; 
}
function updateState($data=array())
{
    $con = dbconnection();
    
    $sql = sprintf("UPDATE states SET countryId='%s', name='%s' WHERE id ='%s'",$data['countryId'], $data['stateName'],$data['stateId']);

    $result = $con->query($sql);
    return $result;
}

function updateStateStatus($data= array())
{
    $con = dbconnection();

    $sql = sprintf("UPDATE states SET status='%s' WHERE id='%s'", $data['status'], $data['stateId']);

    $result = $con->query( $sql);
    return $result;
}