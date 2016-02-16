<?php
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","9365");
define("DB_NAME","we_are_hr");
$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(mysqli_connect_errno())
{
	die("Mysql connection failed".mysqli_connect_error()."(".Mysqli_connect_erno()
	.")");
}
?>