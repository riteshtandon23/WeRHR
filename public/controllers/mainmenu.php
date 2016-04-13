<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php 
session_start();
#check if user is present in the db
if(isset($_SESSION['email']))
{
	$uid=$_SESSION['email'];
	$query = "SELECT type,id,firstname,lastname,act_status FROM users WHERE email='$uid'";
	#although union, result can't be of both tables as registration allowed one unique email for both tables
	$result = $connection->query($query);
	$row = mysqli_fetch_assoc($result);
	//$username1 = $row['username'];
	$_SESSION['Type'] = $row['type'];
	if($result->num_rows > 0){
	    $_SESSION["fname"] = $row['firstname'];
	    $_SESSION["lname"] = $row['lastname'];
	    $_SESSION["id"] = $row['id'];
	    $status="Active";
	    if($row['type']=="user" AND $row['act_status']=="1")
	    {

	        $stmt=$connection->prepare("call statususer(?,?)");
	        $stmt->bind_param('ss',$username,$status);
	        $stmt->execute();
	        //header('Location:userHome.php');
	        redirect_to("../userHome.php");
	    }
	    else{
	        $Error="You have not activated your account or You have been blocked by the Administrator. Contact Administrator to continuing using the account. Thank You"; 
	        //header("location:login.php?Error=" . $Error); 
	    }
	}
}

 ?>
 <?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>