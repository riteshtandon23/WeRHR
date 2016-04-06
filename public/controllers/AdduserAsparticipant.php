<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php 
	if(isset($_GET['uname']))
	{
		$username=$_GET['uname'];
		$examName=$_GET['examName'];
		$vis=$_GET['vis'];
		if($vis==="1")
		{
			$stmt=$connection->prepare('call setParticipant(?,?)');
			$stmt->bind_param('ss',$username,$examName);
			$result=$stmt->execute();
			if($result)
			{
				echo "success";
			}else
			{
				echo "Fail to update";
			}
		}else{
			$stmt=$connection->prepare('call unsetParticipant(?,?)');
			$stmt->bind_param('ss',$username,$examName);
			$result=$stmt->execute();
			if($result)
			{
				echo "success";
			}else
			{
				echo "Fail to update";
			}
		}
		
		echo json_encode("success");
	}
 ?>
 <?php 
 	if(isset($_GET['examName'])){
 		$data=array();
 		$examName=$_GET['examName'];
 		$result=getParticipant($examName);
 		while ($row=$result->fetch_assoc()) {
 			$data[]=array("Fname"=>$row['firstname'],"username"=>$row['email']);
 		}
 		echo json_encode($data);
 	}
  ?>
   <?php 
 	if(isset($_GET['DexamName'])){
 		$examName=$_GET['DexamName'];
 		$data=array();
 		$result=getAllUsers($examName);
 		while ($row=$result->fetch_assoc()) {
 			$data[]=array("Fname"=>$row['firstname'],"username"=>$row['email']);
 		}
 		echo json_encode($data);
 	}
  ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>