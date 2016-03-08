<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
	if(isset($_GET['cname']))
	{
		$eDate=array();
		$cname=$_GET['cname'];
		$result=selectDate($cname);
		while ($row=$result->fetch_assoc()) {
			$eDate[]=$row['Exam_Date'];
		}
		echo json_encode($eDate);
	}
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>