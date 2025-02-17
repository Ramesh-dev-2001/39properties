<?php
function getCountriesList($countryId = 0)
{
    $con = dbconnection();
    $whereCls = '';
    if($countryId){
        $whereCls = " AND id = ".$countryId;
    }

    $sql = sprintf("SELECT * FROM countries WHERE status !='D' $whereCls");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
function addCountry($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO countries (name) VALUES ('%s')",$data['countryName']);

    $result = $con->query($sql);
    return  $result; 
}
function updateCountry($data=array())
{
    $con = dbconnection();
    $sql = sprintf("UPDATE countries SET  name='%s' WHERE id ='%s'",$data['countryName'],$data['countryId']);

    $result = $con->query($sql);
    return $result;
}
function updateCountryStatus($data= array())
{
    $con = dbconnection();

    $sql = sprintf("UPDATE countries SET status='%s' WHERE id='%s'", $data['status'], $data['countryId']);

    $result = $con->query( $sql);
    return $result;
}