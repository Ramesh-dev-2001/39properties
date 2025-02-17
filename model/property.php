<?php
function addProperty($data = array())
{
    $con = dbconnection();

    $sql = sprintf("INSERT INTO properties (
        agentId, title, description, categoryId, bhk, saletypeId, facingType, floor, totalFloor, price, 
        areaSize, cityId, area, address, url, userId, countryId, stateId, propertyAge,featuresId, mainImage, floorPlanImage,
        otherImages)
        VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 
                '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s','%s','%s')",
        $data['agentId'],$data['title'], $data['description'],$data['category'],$data['bhk'],$data['sellingType'], $data['facingType'], 
        $data['floor'],$data['totalFloor'],$data['price'],$data['areaSize'],$data['cityId'], $data['area'], $data['address'], $data['url'], $data['masterAgentId'],
        $data['countryId'],$data['stateId'],$data['propertyAge'] ,$data['features'], $data['mainImage'],$data['floorPlanImg'], $data['otherImages']);
        
        $result = $con->query($sql);
        $propId = isset($con->insert_id)?$con->insert_id:0;
       
        if($propId > 0){
            $sql = sprintf("INSERT INTO `propertyDetails` (propertyId, bedroom,bathroom,balcony,kitchen,hall)
                    VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
        $propId,$data['bedroom'], $data['bathroom'],$data['balcony'],$data['kitchen'],$data['hall']);
            $con->query($sql);
        }

}
function updateProperty($data = array())
{
    $con = dbconnection();

    $sql = sprintf("UPDATE properties SET
        agentId ='%s', title='%s', description='%s', categoryId='%s', bhk='%s', saletypeId='%s', facingType='%s', floor='%s', totalFloor='%s', price='%s', 
        areaSize='%s', cityId='%s', area='%s', address='%s', url='%s', userId='%s',countryId='%s', stateId='%s', propertyAge='%s',featuresId='%s', mainImage='%s', floorPlanImage='%s', otherImages='%s'
        WHERE id = '%s'",
        $data['agentId'],$data['title'], $data['description'],$data['category'],$data['bhk'],$data['sellingType'], $data['facingType'], 
        $data['floor'],$data['totalFloor'],$data['price'],$data['areaSize'],$data['cityId'], $data['area'], $data['address'],$data['url'],$data['masterAgentId'], 
        $data['countryId'],$data['stateId'],$data['propertyAge'] ,$data['features'], $data['mainImage'],$data['floorPlanImg'], $data['otherImages'], $data['propertyId']);
        
        $result = $con->query($sql);

        $sql = sprintf("UPDATE propertyDetails SET
        bedroom ='%s', bathroom='%s', balcony='%s', kitchen='%s', hall='%s' WHERE propertyId = '%s'",
        $data['bedroom'], $data['bathroom'],$data['balcony'],$data['kitchen'],$data['hall'], $data['propertyId']);
        
    $result = $con->query($sql);
    return $result;
}
function getProperty($propertyId = 0,$agentId = 0)
{
    $con = dbconnection();

    $whereCls = '';
    if($propertyId){
        $whereCls = '  where p.id = '.$propertyId;
    }
    if($agentId > 0){
        $whereCls = '  where p.agentId = '.$agentId;
    }

    $sql = ("SELECT 
            p.*,
            c.categoryName,
            s.name as saleType,
            ci.name as cityName,
            DATE_FORMAT(p.createdOn, '%d/%m/%Y') as createdStr,
            st.name as stateName,
            CONCAT(a.firstName,' ',a.lastName) AS agentName,
            pd.bedroom,pd.bathroom,pd.balcony,pd.hall,pd.kitchen
        FROM properties p
            INNER JOIN categories c on c.id = p.categoryId
            INNER JOIN saleType s on s.id = p.saletypeId
            INNER JOIN city ci on ci.id = p.cityId
            INNER JOIN states st on st.id = p.stateId
            INNER JOIN agents a on a.id = p.agentId
            LEFT JOIN propertyDetails pd on pd.propertyId = p.id
        $whereCls order by p.id desc"); 
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
function updatePropertyViews($data = array())
{
    $con = dbconnection();         
    $sql = sprintf("UPDATE properties SET `views`='%s' WHERE id ='%s'",$data['views'],$data['propertyId']); 
    $con->query($sql);       
    return true; 
}
function getPropertyByOrder($limit = 3)
{
    $con = dbconnection();

    $sql = ("
            SELECT 
                p.*,
                c.categoryName,
                s.name as saleType,
                DATE_FORMAT(p.createdOn, '%d/%m/%Y') as createdStr,
                CONCAT(a.firstName,' ',a.lastName) AS agentName,
                pd.bedroom,pd.bathroom,pd.balcony,pd.hall,pd.kitchen,
                ci.name as cityName
            FROM properties p
                INNER JOIN agents a ON a.id = p.agentId 
                INNER JOIN categories c on c.id = p.categoryId
                INNER JOIN saleType s on s.id = p.saletypeId
                INNER JOIN city ci on ci.id = p.cityId
                LEFT JOIN propertyDetails pd on pd.propertyId = p.id
            WHERE p.isApproved = 1 ORDER BY p.id DESC LIMIT $limit");
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getPropByFeature($limit = 3)
{
    $con = dbconnection();

    $sql = ("SELECT 
                p.*,
                c.categoryName,
                s.name as saleType,
                DATE_FORMAT(p.createdOn, '%d/%m/%Y') as createdStr,
                CONCAT(a.firstName,' ',a.lastName) AS agentName,
                ci.name as cityName
            FROM properties p
                INNER JOIN agents a ON a.id = p.agentId 
                INNER JOIN city ci on ci.id = p.cityId
                INNER JOIN categories c on c.id = p.categoryId
                INNER JOIN saleType s on s.id = p.saletypeId
            WHERE p.isApproved = 1 AND p.isFeatured = 1 ORDER BY p.id DESC LIMIT $limit");
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}

function getCityDetailsBySearch($data =array())
{
    $con = dbconnection();
    
    if($data['term'] !='') {
        $sql = "SELECT 
                    DISTINCT
                    c.name AS countryName,
                    s.name AS stateName,
                    ci.name AS cityName,
                    p.area
                FROM properties p 
                    LEFT JOIN `countries` c ON c.id = p.countryId
                    LEFT JOIN `states` s ON s.id = p.stateId
                    LEFT JOIN `city` ci ON ci.id = p.cityId
                WHERE ( ci.name LIKE '%".$data['term']."%'                        
                        OR p.area LIKE '%".$data['term']."%')
                ORDER BY p.id DESC ";

        $result = $con->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);         
    }  
}

function getSearchResults($data = array())
{
    $con = dbconnection();
    $resultArray = array(); 

    $orderBy = ' ORDER BY p.id DESC'; 
      
    $categoryCls = '';
    if (isset($data['categoryName']) && $data['categoryName'] != '') {
        $categoryCls = ' AND p.categoryId IN (' . $data['categoryName'] . ')'; 
    }
        
    $saleTypeCls = '';
    if (isset($data['saleType']) && $data['saleType'] != '') {
        $saleTypeCls = ' AND p.saletypeId IN (' . $data['saleType'] . ')'; 
    }

    $destinationCls = '';
      
    if ($data['city'] != '' && $data['area'] != '') {
        $destinationCls = " AND (p.area like '%" . $data['area'] . "%' AND ci.name like '%" . $data['city'] . "%')";
    } else if($data['city'] != '') {
        $destinationCls = " AND (ci.name like  '%" . $data['city'] . "%')";
    }

    $sql = "SELECT 
                SQL_CALC_FOUND_ROWS 
                p.*,
                c.name AS countryName,
                s.name AS stateName,
                ci.name AS cityName,
                p.area,
                CONCAT(a.firstName,' ',a.lastName) AS agentName,
                cg.categoryName,
                st.name as saleType,
                DATE_FORMAT(p.createdOn, '%d/%m/%Y') as createdStr
            FROM properties p 
                INNER JOIN `agents` a ON a.id = p.agentId 
                INNER JOIN categories cg on cg.id = p.categoryId
                INNER JOIN saleType st on st.id = p.saletypeId
                LEFT JOIN `countries` c ON c.id = p.countryId
                LEFT JOIN `states` s ON s.id = p.stateId
                LEFT JOIN `city` ci ON ci.id = p.cityId
            WHERE p.status = 'A' AND p.isApproved = 1  
            $categoryCls $saleTypeCls $destinationCls $orderBy
            LIMIT ".$data['offset'].",".$data['maxRows'];
          
    $result = $con->query($sql); 
    $searchResults  = $result->fetch_all(MYSQLI_ASSOC);     
    if (count($searchResults) > 0) {
        $hotelsCountQry =   "SELECT FOUND_ROWS() as propertyCount";
        $query          =   $con->query($hotelsCountQry);
        return array($searchResults,$query->fetch_assoc());
    } else {
        return array();
    }
}

function deleteProperty($propertyId =0)
{

    $con = dbconnection();

    $sql ="DELETE FROM properties WHERE id = $propertyId";

    $result = $con->query($sql);
    return $result;
}

function updatePropertyApproveStatus($data = array())
{
    $con = dbconnection();         
    $sql = sprintf("UPDATE properties SET isApproved='%s' WHERE id ='%s'",$data['isApproved'],$data['propertyId']);   
    $con->query($sql);       
    return true; 
}

function updateIsFeatured()
{
    $con = dbconnection();         
    $sql = sprintf("UPDATE properties SET isFeatured = 0"); 
    
    $con->query($sql);       
    return true; 
}
function updatePropertyFeatureStatus($data = array())
{
    $con = dbconnection();         
    $sql = sprintf("UPDATE properties SET isFeatured='%s' WHERE id ='%s'",$data['isFeatured'],$data['propertyId']); 
    
    $con->query($sql);       
    return true; 
}


?>
