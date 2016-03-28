<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php 
if(isset($_POST['AddAge']))
{
	$Age=$_POST['AgeRange'];
	$AgePercentage=$_POST['AgePercentage'];
	$stmt=$connection->prepare("call addAgeRangePercentage(?,?)");
	$stmt->bind_param('ss',$Age,$AgePercentage);
	$result=$stmt->execute();
	if($result)
	{
		 	redirect_to("../addAlgoDetails.php");
	}
	else{
		die("Fail to execute".mysqli_error($connection));
	}
}
 ?>
 <?php 
 if(isset($_POST['AddAca'])){

	$Academic=$_POST['Academic'];
	$AcademicPercentage=$_POST['AcademicPercentage'];
	$PercentageRange=$_POST['PercentageRange'];
	$stmt1=$connection->prepare("call addacademicnAPercentage(?,?,?)");
	$stmt1->bind_param('sss',$Academic,$AcademicPercentage,$PercentageRange);
	$result1=$stmt1->execute();
	if($result1)
	{
		 	redirect_to("../addAlgoDetails.php");
	}

 }

  ?>
  <?php 
 if(isset($_POST['AddBack'])){
 	$Background=$_POST['Background'];
	$BackgroundPercentage=$_POST['BackgroundPercentage'];
	$stmt2=$connection->prepare("call addBackgroundnPercentage(?,?)");
	$stmt2->bind_param('ss',$Background,$BackgroundPercentage);
	$result2=$stmt2->execute();
	if($result2)
	{
		 	redirect_to("../addAlgoDetails.php");
	}
 }

  ?>
  <?php 
 if(isset($_POST['AddTest'])){
 	
	$Test=$_POST['TestName'];
	$TestPercentage=$_POST['TestPercentage'];
	$stmt3=$connection->prepare("call addTestnPercentage(?,?)");
	$stmt3->bind_param('ss',$Test,$TestPercentage);
	$result3=$stmt3->execute();
	if($result3)
	{
		 	redirect_to("../addAlgoDetails.php");
	}
 }

  ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>