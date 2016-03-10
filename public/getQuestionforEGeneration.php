<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
$Cname=$_GET['id'];
$data=array();
$result=selectQuestionforEgeneration($Cname);
while ($row=$result->fetch_assoc()) {
	$data[]=array("QID"=>$row['Question_Id'],"TopicName"=>$row['Topic_Name'],"Question"=>$row['Question_Name'],"QuestionStatus"=>$row['Final_Question'],"ExamDate"=>$row['Exam_Date']);
	//$data[]=$row;
}
// $m =json_encode($data);
// $fp = fopen('my.json','w');
// fwrite($fp,$m);
// fclose($fp);
echo json_encode($data);

//var_dump($data);
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>