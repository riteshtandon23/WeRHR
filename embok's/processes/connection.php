<?php
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","belikethat123");
define("DB_NAME","wearehr");
$con=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if($con->connect_errno)
{
	die("Mysql connection failed".$connection->connect_error()."(".$connection->connect_erno().")");
}
?>