<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
$Cname=$_GET['id'];
$data=array();
$result=selectQuestionforEgeneration($Cname);
while ($row=$result->fetch_assoc()) {
	$data[]=array("TopicName"=>$row['Topic_Name'],"Question"=>$row['Question_Name'],"ExamDate"=>$row['Exam_Date']);
}
echo json_encode($data);
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>