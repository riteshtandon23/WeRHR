<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php session_start(); ?>
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
 	if(isset($_GET['compname']))
 	{
 		$user=$_SESSION["email"];
 		$compname=$_GET['compname'];
 		$testname=$_GET['testname'];
 		$role=$_GET['role'];
 		$Aca=null;
		$Per=null;
		$Bck=null;
		$AcademicValue=null;
		$Backgrd=null;
		$UserAge=null;
		$AgeValue=null;
		$testVal=null;
		$flag=0;
		$Total=null;
 		$result=selectuserAlgodetails($user);
 		while ($row=$result->fetch_assoc()) {
 			$Aca=$row['Academics'];
 			$Per=$row['Percentage'];
 			$Bck=$row['Background'];
 		}
 		if($Aca!==null)
 		{
 			$Percentage_Result=Percentage_ResultforUserSalaryPrediction($Aca,$compname);
			while ($row=$Percentage_Result->fetch_assoc()) {
				$PercentageRange=$row['PercentageRange'];
				$Percentage=$row['Percentage'];
				$temp=explode("-", $PercentageRange);
				if($Per>$temp[0] && $Per<$temp[1])
				{
					$AcademicValue=$Percentage;
					break;
				}
			}
			$Background_Result=Background_Result($Bck);
			while ($row=$Background_Result->fetch_assoc()) {
				$Backgrd=$row['Percentage'];
			}
			$AgeResult=AgeofUser($user);
			while ($row=$AgeResult->fetch_assoc()) {
				$UserAge=$row['age'];
			}
			$AgeRange_Result=AgeRange_ResultforUserSalaryPrediction($compname);
			while ($row=$AgeRange_Result->fetch_assoc()) {
				$AgeRange=$row['Age_Range'];
				$APercentage=$row['Percentage'];
				$temp1=explode("-", $AgeRange);
				if($UserAge>$temp1[0] && $UserAge<$temp1[1])
				{
					$AgeValue=$APercentage;
					break;
				}

			}
			$TestResult=TestResult($testname,$user);
			while ($row=$TestResult->fetch_assoc()) {

				$Total=$row['Total'];
				$Score=$row['Scores'];
			}
			$TestName_Result=TestName_ResultforUserSalaryPrediction($testname,$compname);
			while ($row=$TestName_Result->fetch_assoc()) {

				$Testpercentage=$row['Percentage'];
			}
			if($Total!==null)
			{
				$testVal=($Score/$Total)*$Testpercentage;
				$flag=1;
			}
			
			//var_dump($Testpercentage);
			//echo $testVal;
 		}
 		//echo $AcademicValue." ".$Backgrd." ".$AgeValue." ".$testVal."<br>";
		if($flag!==0)
		{
			$salary=0;
			$total=$AcademicValue+$Backgrd+$AgeValue+$testVal;
			$result5=DisplaySalaryWithRole($role,$compname);
			while ($row5=$result5->fetch_assoc()) {
				$salary=$row5['Salary_P_A'];
			}
			$salary=($salary*100000);
			$total=(($total/100)*$salary);
			echo json_encode("Your Predicted Salary is Rs. ".$total);
		}
		else
		{
			echo json_encode("You have not appear for this test");
		}

 	}
  ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>