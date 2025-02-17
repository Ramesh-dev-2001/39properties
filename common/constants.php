<?php
ini_set('memory_limit', '-1'); 
date_default_timezone_set("Asia/Calcutta");

$host_name  = $_SERVER['HTTP_HOST'];
$http       = isset($_SERVER['HTTPS']) ? 'https' : 'http';
$base_path  = ($host_name === 'localhost') ? '/properties' : '';
$root_path  = ($host_name === 'localhost') ? '/properties' : '';

define('MASTER_URL', $http . '://' . $host_name . $base_path . '/master');
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . $root_path . '/master');
define('WEB_URL', $http . '://' . $host_name . $base_path);
define('MAIN_ROOT', $_SERVER['DOCUMENT_ROOT'] . $root_path);
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . $root_path.'/agent');
define('AGENT_URL', $http . '://' . $host_name . $base_path . '/agent');
define('URL', WEB_URL);
define('API_URL', WEB_URL .'/api');
define('PROPERTY_URL', WEB_URL .'/property');

include(MAIN_ROOT . '/config/database.php');
include(MAIN_ROOT . '/model/countries.php');
include(MAIN_ROOT . '/model/common.php');
include(MAIN_ROOT . '/model/states.php');
include(MAIN_ROOT . '/model/city.php');
include(MAIN_ROOT . '/model/facing.php');
include(MAIN_ROOT . '/model/loginAccounts.php');
include(MAIN_ROOT . '/model/property.php');
include(MAIN_ROOT . '/model/categories.php');
include(MAIN_ROOT . '/model/saleType.php');
include(MAIN_ROOT . '/model/features.php');
include(MAIN_ROOT . '/model/agent.php');
include(MAIN_ROOT . '/model/user.php');
include(MAIN_ROOT . '/model/propertyDetails.php');
include(MAIN_ROOT . '/model/customerConnects.php');
include(MAIN_ROOT . '/model/notification.php');