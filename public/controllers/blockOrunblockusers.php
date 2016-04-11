<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>

<?php 

if(isset($_GET['uname']))
{
	$type=$_GET['utype'];
	$uname=$_GET['uname'];
	$status=(int)$_GET['stat'];
	if($type==="111112")
	{
		$stmt=$connection->prepare("call blockEmployer(?,?)");
		$stmt->bind_param('si',$uname,$status);
		$result=$stmt->execute();
		
	}else{
		$stmt=$connection->prepare("call blockuser(?,?)");
		$stmt->bind_param('si',$uname,$status);
		$result=$stmt->execute();
		
	}
	if($status===1)
	{
		echo json_encode("block");
	}else{
		echo json_encode("unblock");
	}
}
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>