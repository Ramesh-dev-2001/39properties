<?php 
function addpropDetails($data = array())
{   

    $con = dbconnection();

    $sql = sprintf("INSERT INTO propertydetails (propertyId, bedroom, bathroom, balcony, kitchen, hall)
                            VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
        $data['propertyId'],$data['bedroom'], $data['bathroom'],$data['balcony'],$data['kitchen'],$data['hall']);
        $result = $con->query($sql);
        return  $result;
}
?>