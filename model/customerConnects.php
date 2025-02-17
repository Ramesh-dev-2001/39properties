<?php 
function getCustomers($customerId = 0, $agentId = 0)
{
    $con = dbconnection();

    $whereCls = '';
    if($customerId){
        $whereCls = '  where cc.id = '.$customerId;
    }
    if($agentId > 0){
        $whereCls = '  where cc.agentId = '.$agentId;
    }
    $sql = ("
            SELECT 
                cc.*,
                CONCAT(a.firstName,' ',a.lastName) AS agentName,
                p.title
            FROM customerConnects cc
                INNER JOIN agents a ON a.id = cc.agentId 
                INNER JOIN properties p ON p.id = cc.propertyId
            $whereCls order by id desc");

    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
function addCustomer($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO customerConnects (propertyId, agentId, name, email, mobile, message)
        VALUES ('%s', '%s', '%s','%s','%s','%s')",
        $data['propertyId'], $data['agentId'], $data['name'], $data['email'], $data['mobile'],$data['message']);

    $result = $con->query($sql);
    return  $result; 
}