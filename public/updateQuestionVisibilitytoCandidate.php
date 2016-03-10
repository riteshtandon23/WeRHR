<?php require_once("../includes/dbconnection.php");?>
<?php 
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$vis=$_GET['vis'];
		$Edate=$_GET['Edate'];
		$stmt=$connection->prepare('call setQuesVis(?,?,?)');
		$stmt->bind_param('iis',$id,$vis,$Edate);
		$result=$stmt->execute();
		if($result)
		{
			echo "success";
		}else
		{
			echo "Fail to update";
		}
	}
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>