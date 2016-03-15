<?php
function redirect_to($new_location)
{
	header("Location: ".$new_location);
	exit;
}
function confirm_query($result)
{
	if(!$result)
    {
    	global $connection;
 		die("Fail to execute".mysqli_error($connection));
    }
}
	//select topic name
function select_Domain()
{
	global $connection;
	$stmt = $connection->prepare("call getTopic()");
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;
}
//select topic name by id
function select_Domain_Name($id)
{
	global $connection;
	$stmt = $connection->prepare("call getTopicName(?)");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;
}
	//select topic Id
function select_Domain_id($domainName)
{
	global $connection;
	$stmt = $connection->prepare("call getTopicid(?)");
	$stmt->bind_param('s',$domainName);
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;
}
//select question name to add option
function selectQuestion()
{
	global $connection;
	$stmt = $connection->prepare("call selectQuestion()");
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;

}
function selectOption($id)
{
	global $connection;
	$stmt=$connection->prepare("call selectOption(?)");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//select Exam Time from Database
function SelectExamTime($id)
{
	global $connection;
	$stmt=$connection->prepare("call ExamTime(?)");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//Select question for quiz
function getQuestion($cname)
{
	global $connection;
	$stmt = $connection->prepare("call getQuestion(?)");
	$stmt->bind_param('s',$cname);
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;

}
//checking for set/unset question or count the number of set question
function CountVisibleQuestion($cname)
{
	global $connection;
	$stmt=$connection->prepare("call CountVisibleQuestion(?)");
	$stmt->bind_param('s',$cname);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
} 
//select Date and Time of Exam
function SelectExamDateTime($cid,$todayDate)
{
	global $connection;
	$stmt=$connection->prepare("call SelectExamDate(?,?)");
	$stmt->bind_param('ss',$cid,$todayDate);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//get exam notification for Admin panel
function getNotification()
{
	global $connection;
	$stmt=$connection->prepare("call getNotify()");
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//get exam notification for update with Id
function getNotificationWithId($id)
{
	global $connection;
	$stmt=$connection->prepare("call getNotifyWithId(?)");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//select Question for exam Generation
function selectQuestionforEgeneration($cname)
{
	global $connection;
	$stmt = $connection->prepare("call QuestionforEgeneration(?)");
	$stmt->bind_param('s',$cname);
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;

}
//select exam date for a partcular course
function selectDate($cname)
{
	global $connection;
	$result1=select_Domain_id($cname);
	while ($row=$result1->fetch_assoc()) {
		$id=$row['Topic_id'];
	}
	$stmt=$connection->prepare("call selectDate(?)");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//select uname and pword for Admin
function selectPwdUnm($uname,$pword)
{
	global $connection;
	$stmt=$connection->prepare("call selectPwdUnm(?,?)");
	$stmt->bind_param('ss',$uname,$pword);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//select Admin profile
function slectAdminProfile($aid)
{
	global $connection;
	$stmt=$connection->prepare("call slectAdminProfile(?)");
	$stmt->bind_param('i',$aid);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
//select Admin profile pic
function AdminPfofilepic($id)
{
	global $connection;
	$stmt=$connection->prepare("call AdminPfofilepic(?)");
	$stmt->bind_param('s',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
function profilepic($email)
{
	global $connection;
	$stmt=$connection->prepare("call Profilepic(?)");
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
?>