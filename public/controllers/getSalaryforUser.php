<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php 
	if(isset($_GET['Apertage']))
	{
		$AcademicPercentage=$_GET['Apertage'];
		$course=$_GET['course'];
		$AgeRange=$_GET['Ar'];
		$TestName=$_GET['tname'];
		$Background=$_GET['background'];
		$Age=null;
		$Academic=null;
		$Test=null;
		$Backgrd=null;
		$Percentage_Result=Percentage_Result($course,$AcademicPercentage);
		while ($row=$Percentage_Result->fetch_assoc()) {
			$Academic=$row['Percentage'];
		}
		$AgeRange_Result=AgeRange_Result($AgeRange);
		while ($row=$AgeRange_Result->fetch_assoc()) {
			$Age=$row['Percentage'];
		}
		$TestName_Result=TestName_Result($TestName);
		while ($row=$TestName_Result->fetch_assoc()) {

			$Test=$row['Percentage'];
		}
		$Background_Result=Background_Result($Background);
		while ($row=$Background_Result->fetch_assoc()) {
			$Backgrd=$row['Percentage'];
		}
		$total=$Academic+$Age+$Test+$Backgrd;
		echo json_encode($total);

	}
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>