<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$vis=$_GET['vis'];
		$Edate=$_GET['Edate'];
		$cname=$_GET['cname'];
		$result=selectTotalQuestion22($Edate);
		while ($row=$result->fetch_assoc()) {
			$totalQuestion=$row['Total_Question'];
		}
		$result1=countTotalQuestion($Edate,$cname);
		while ($row1=$result1->fetch_assoc()) {
			$TotalSet=$row1['TotalSet'];
		}
		if($vis==="0" || $TotalSet<$totalQuestion)
		{
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
		}else{
			echo json_encode("You already had Checked Maximum Question!!!");

		}
		
	}
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>