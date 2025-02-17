<?php
function getFeatures($featureId=0)
{
    $con = dbconnection();
    $whereCls = '';
    if($featureId > 0){
        $whereCls = 'WHERE status = "A" AND id = ' . $featureId;
    }

    $sql = sprintf("SELECT * FROM features $whereCls");
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
function addFeature($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO features (name) VALUES ('%s')",$data['featureName']);

    $result = $con->query($sql);
    return $result;
}
function updateFeature($data=array())
{
    $con = dbconnection();
    $sql = sprintf("UPDATE features SET  name='%s' WHERE id ='%s'",$data['featureName'],$data['featureId']);

    $result = $con->query($sql);
    return $result;
}
function deleteFeature($featureId =0)
{
    $con = dbconnection();

    $sql ="DELETE FROM features WHERE id = $featureId ";

    $result = $con->query($sql);
    return $result;
}
function updateFeatureStatus($data = array())
{
    $con = dbconnection();
      
    $sql = sprintf("UPDATE features SET status='%s' WHERE id ='%s'",$data['status'],$data['featureId']);
    $con->query($sql);
    return true; 
}