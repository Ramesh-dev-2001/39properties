<?php
function getfacings()
{
    $con = dbconnection();

    $sql = sprintf("SELECT * FROM facingtype");  
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}