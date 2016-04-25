<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php session_start(); ?>
<?php 

if(isset($_POST['AddAge']))
{
	$company=$_POST['Company_Name'];
	$_SESSION['COMPNAME']=$company;
	$Age=$_POST['AgeRange'];
	$AgePercentage=$_POST['AgePercentage'];
	$stmt=$connection->prepare("call addAgeRangePercentage(?,?,?)");
	$stmt->bind_param('sss',$Age,$AgePercentage,$company);
	$result=$stmt->execute();
	if($result)
	{
		 	redirect_to("../addAlgoDetails.php?id=000011");
	}
	else{
		die("Fail to execute".mysqli_error($connection));
	}
}
 ?>
 <?php 
 if(isset($_POST['AddAca'])){
    $company=$_POST['Company_Name1'];
    $_SESSION["COMPNAME"]=$company;
	$Academic=$_POST['Academic'];
	$AcademicPercentage=$_POST['AcademicPercentage'];
	$PercentageRange=$_POST['PercentageRange'];
	$stmt1=$connection->prepare("call addacademicnAPercentage(?,?,?,?)");
	$stmt1->bind_param('ssss',$Academic,$AcademicPercentage,$PercentageRange,$company);
	$result1=$stmt1->execute();
	if($result1)
	{
		 	redirect_to("../addAlgoDetails.php?id=000011");
		//echo $company;
	}

 }

  ?>
  <?php 
 if(isset($_POST['AddBack'])){
 	$company=$_POST['Company_Name2'];
 	$_SESSION["COMPNAME"]=$company;
 	$Background=$_POST['Background'];
	$BackgroundPercentage=$_POST['BackgroundPercentage'];
	$stmt2=$connection->prepare("call addBackgroundnPercentage(?,?,?)");
	$stmt2->bind_param('sss',$Background,$BackgroundPercentage,$company);
	$result2=$stmt2->execute();
	if($result2)
	{
		 	redirect_to("../addAlgoDetails.php?id=000011");
	}
 }

  ?>
  <?php 
 if(isset($_POST['AddTest'])){
 	$company=$_POST['Company_Name3'];
 	$_SESSION["COMPNAME"]=$company;
	$courseName=$_POST['topicId'];
	$Edate=$_POST['inputExamdate'];
	// $exam_date=date_create($Edate);
 //    $exam_date=date_format($exam_date,"Y-m-d");
	$exam_date=DateTime::createFromFormat('d/m/Y',$Edate);
        $exam_date=$exam_date->format('Y-m-d');
	$TestPercentage=$_POST['TestPercentage'];
	$result25=select_Domain_id($courseName);
	while ($row25=$result25->fetch_assoc()) {
		$tid=$row25['Topic_id'];
	}
	$result26=checkforExamName($tid,$exam_date);
	if($result26->num_rows > 0){
		$Test=$courseName.$exam_date;
		$stmt3=$connection->prepare("call addTestnPercentage(?,?,?)");
		$stmt3->bind_param('sss',$Test,$TestPercentage,$company);
		$result3=$stmt3->execute();
		if($result3)
		{
			 	redirect_to("../addAlgoDetails.php?id=000011");
		}
	}else{
		redirect_to("../addAlgoDetails.php?id=000001");
		echo $exam_date." ".$tid;
	}


	
 }

  ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>