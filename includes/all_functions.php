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
function select_Domain2()
{
	global $connection;
	$stmt = $connection->prepare("call getTopic()");
	$stmt->execute();
	$result = $stmt->fetchAll();
	//confirm_query($result);
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
	// $stmt=$connection->prepare("call Profilepic(?)");
	// $stmt->bind_param('s',$email);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Profile_pic from users where email='$email'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select Address
function selectAddress($email)
{
	global $connection;
	// $stmt=$connection->prepare("call selectAddress(?)");
	// $stmt->bind_param('s',$email);
	// $stmt->execute();
	// $result=$stmt->get_result();
		//$query="selectAddress('$email')";
	 $query="select address,city,state,country from users where email='$email'";
     $result = mysqli_query($connection,$query);
	 confirm_query($result);
	 return $result;
}
//selcet total question from given date
function selectTotalQuestion22($Edate)
{
	global $connection;
	$stmt=$connection->prepare("call selectTotalQuestion(?)");
	$stmt->bind_param('s',$Edate);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
//count total question from given date
function countTotalQuestion($Edate,$TopicName)
{
	global $connection;
	$stmt=$connection->prepare("call countTotalQuestion(?,?)");
	$stmt->bind_param('ss',$Edate,$TopicName);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
//select algorithm details
function selectAgeRange()
{
	global $connection;
	$stmt=$connection->prepare("call SelectAgeRange()");
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function selectAcademic()
{
	global $connection;
	$stmt=$connection->prepare("call selectAcademic()");
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function selectBackground()
{
	global $connection;
	$stmt=$connection->prepare("call selectBackground()");
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function selectTest()
{
	global $connection;
	$stmt=$connection->prepare("call selectTest()");
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
//with parameter
function selectAgeRangeValue($range)
{
	global $connection;
	$stmt=$connection->prepare("call SelectAgeRangeValue(?)");
	$stmt->bind_param('s',$range);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function selectAcademicValue($ptage,$cname)
{
	global $connection;
	$stmt=$connection->prepare("call selectAcademicValue(?,?)");
	$stmt->bind_param('ss',$ptage,$cname);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function selectBackgroundValue($bgrnd)
{
	global $connection;
	$stmt=$connection->prepare("call selectBackgroundValue(?)");
	$stmt->bind_param('s',$bgrnd);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function selectTestValue($tname)
{
	global $connection;
	$stmt=$connection->prepare("call selectTestValue(?)");
	$stmt->bind_param('s',$tname);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}


//end of algoritm
//select user results
function getUserAnswer($cname)
{
	global $connection;
	$stmt=$connection->prepare("call getUserAnswer(?)");
	$stmt->bind_param('s',$cname);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}

function selectPercentage($id){
	global $connection;
	$stmt=$connection->prepare("call selectPercentage(?)");
	$stmt->bind_param('s',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function SelectQuestionAnswer($cname)
{
	global $connection;
	$stmt=$connection->prepare("call SelectQuestionAnswer(?)");
	$stmt->bind_param('s',$cname);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function Percentage_Result($course,$AcademicPercentage)
{
	global $connection;
	$stmt=$connection->prepare("call Academic_Result(?,?)");
	$stmt->bind_param('ss',$course,$AcademicPercentage);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function AgeRange_Result($AgeRange)
{
	global $connection;
	$stmt=$connection->prepare("call AgeRange_Result(?)");
	$stmt->bind_param('s',$AgeRange);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function TestName_Result($TestName)
{
	global $connection;
	$stmt=$connection->prepare("call TestName_Result(?)");
	$stmt->bind_param('s',$TestName);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}
function Background_Result($Background)
{
	global $connection;
	$stmt=$connection->prepare("call Background_Result(?)");
	$stmt->bind_param('s',$Background);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;	
}

//gash

?>