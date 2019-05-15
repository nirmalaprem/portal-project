<?php

session_start();
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dealportal";
$port="3306";*/

$servername = "testserv";
$username = "test";
$password = "test123";
$dbname = "dealPortal";
$port="3406";

define('MYSQL_HOSTNAME', $servername);
define('MYSQL_USERNAME', $username);
define('MYSQL_PASSWORD', $password);
define('MYSQL_DATABASE', $dbname);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}else{

}


?>
