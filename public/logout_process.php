<?php require_once("../includes/dbconnection.php");?>
<?php
	session_start();
	$type=$_SESSION['Type'];
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	$username=$_SESSION["email"];
	$status="InActive";
	session_destroy();

	if($type==="Admin")
	{
		header('Location: AdminLogin.php');
	}elseif($type==="employer")
	{
		$stmt=$connection->prepare("call statuscomp(?,?)");
	    $stmt->bind_param('ss',$username,$status);
	    $stmt->execute();
		header('Location: login.php');
	}else{
		$stmt=$connection->prepare("call statususer(?,?)");
	    $stmt->bind_param('ss',$username,$status);
	    $stmt->execute();
		header('Location: login.php');
	}

?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>