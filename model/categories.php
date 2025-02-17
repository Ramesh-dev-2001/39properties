<?php
function getCategories($categoryId = 0)
{
    $con = dbconnection();
    $whereCls = '';
    if($categoryId > 0){
        $whereCls = 'WHERE status = "A" AND id = ' . $categoryId;
    }
    $sql = sprintf("SELECT * FROM categories $whereCls");  
    
    $result = $con->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);

}
function addCategory($data = array())
{
    
    $con = dbconnection();

    $sql = sprintf("INSERT INTO categories (categoryName) VALUES ('%s')",$data['categoryName']);

    $result = $con->query($sql);
    return  $result; 
}

function updateCategory($data=array())
{
    $con = dbconnection();
    $sql = sprintf("UPDATE categories SET  categoryName='%s' WHERE id ='%s'",$data['categoryName'],$data['categoryId']);

    $result = $con->query($sql);
    return $result;
}

function deleteCategory($categoryId =0)
{

    $con = dbconnection();

    $sql ="DELETE FROM categories WHERE id = $categoryId ";

    $result = $con->query($sql);
    return $result;
}

function updateCategoryStatus($data = array())
{
    $con = dbconnection();
      
    $sql = sprintf("UPDATE categories SET status='%s' WHERE id ='%s'",$data['status'],$data['categoryId']);
    $con->query($sql);
    
    return true; 
}