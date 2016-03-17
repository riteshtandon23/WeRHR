<?php
	session_start();
	$type=$_SESSION['Type'];
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);

	session_destroy();

	if($type==="Admin")
	{
		header('Location: AdminLogin.php');
	}else
	{
		header('Location: login.php');
	}

?>