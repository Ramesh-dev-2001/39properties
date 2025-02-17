<?php
function getCities($stateId = 0,$cityId=0)
{
    
    $con = dbconnection();
    $whereCls = '';
    if($stateId){
        $whereCls = " AND stateId = ".$stateId;
    }
    if($cityId){
        $whereCls = " AND id = ".$cityId;
    }

    $sql = sprintf("SELECT * FROM city WHERE status !='D'  $whereCls");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}

function getSearchCity($term = '') {
    $con = dbconnection();

    $term = $con->real_escape_string($term);

    $sql = sprintf("SELECT * FROM city WHERE status='A' AND name LIKE '%%%s%%'", $term);
    
    $result = $con->query($sql);
    
    if ($result === false) {
        error_log($con->error);
        return [];
    }
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
function addCity($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO city (countryId,stateId,name) VALUES ('%s','%s','%s')",$data['countryId'],$data['stateId'],$data['cityName']);

        $result = $con->query($sql);
        return  $result; 
}
function updateCity($data=array())
{
    $con = dbconnection();
    $sql = sprintf("UPDATE city SET  countryId='%s', stateId='%s', name='%s'  WHERE id ='%s'",$data['countryId'],$data['stateId'],$data['cityName'],$data['cityId']);

    $result = $con->query($sql);
    return $result;
}
function updateCityStatus($data= array())
{
    $con = dbconnection();

    $sql = sprintf("UPDATE city SET status='%s' WHERE id='%s'", $data['status'], $data['cityId']);

    $result = $con->query( $sql);
    return $result;
}