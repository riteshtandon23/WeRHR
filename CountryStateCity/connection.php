<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="9365";
$dbname="project";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
	die("Mysql connection failed".mysqli_connect_error()."(".Mysqli_connect_erno()
	.")");
}
?>