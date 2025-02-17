<?php
function getSaleType()
{
    $con = dbconnection();

    $sql = sprintf("SELECT * FROM saleType");  
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}