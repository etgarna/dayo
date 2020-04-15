<?php
error_reporting (E_ALL);

define ('DS', DIRECTORY_SEPARATOR);
$sitePath = str_replace('\\','/',realpath(dirname(__FILE__)))."/";
define ('SITE_PATH', $sitePath);

//////////////////////////////////////////////////////////////////

if(isset($_SERVER['HTTPS'])){
	$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
} else{
	$protocol = 'http';
}
$serverName=$protocol."://".$_SERVER['HTTP_HOST']."/ef";
define('BASE_URL',$serverName);

////////////////////////////////////////////////////////////////////

define('DB_USER', 'dayo');
define('DB_PASS', 'quhHKYinr0q7XJTB');
define('DB_HOST', 'localhost');
define('DB_NAME', 'demo');

//define('DB_USER', 'dayo');
//define('DB_PASS', 'c7v66kkd');
//define('DB_HOST', '172.16.32.88');
//define('DB_NAME', 'dayo');

//////////////////////////////////////////////////////////////////////

$dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$dbObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbObject->exec('SET CHARACTER SET utf8');
?>