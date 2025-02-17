<?php
 
function dbconnection()
{
    $host       = 'localhost';
    $username   = 'root';
    $password   = '';
    $database   = 'properties';
    
    $mysqlConnection = new mysqli($host,$username,$password,$database);
    
    if ($mysqlConnection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqlConnection -> connect_error;
        exit();
    } else {
         return $mysqlConnection;
    }   
}