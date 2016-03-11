<?php require_once("../includes/dbconnection.php");?>
<?php
session_start();

$type = $_GET['type'];
$id = $_GET['id'];
if($type == 1){	#if employer
	$connection->query("UPDATE employers SET act_status=1 WHERE sequence='$id'");
	print '<script type="text/javascript">'; 
	print 'alert("Successfully Activated!");';
	print 'window.location="http://localhost/WeRHR/public/login.php";';
	print '</script>';

}
elseif ($type == 2) {		#if user
	$connection->query("UPDATE users SET act_status=1 WHERE sequence='$id'");
	print '<script type="text/javascript">'; 
	print 'alert("Successfully Activated!");';
	print 'window.location="http://localhost/WeRHR/public/login.php";';
	print '</script>';
}
else{		#else link modified
	echo "Link has been modified!";
}
?>