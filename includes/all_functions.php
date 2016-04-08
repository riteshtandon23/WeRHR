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
	// $stmt = $connection->prepare("call getTopic()");
	// $stmt->execute();
	// $result = $stmt->get_result();
	$query="select topic_Name from topic";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select topic name by id
function select_Domain_Name($id)
{
	global $connection;
	// $stmt = $connection->prepare("call getTopicName(?)");
	// $stmt->bind_param('i',$id);
	// $stmt->execute();
	// $result = $stmt->get_result();
	$query="select Topic_Name from topic where Topic_id='$id'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
	//select topic Id
function select_Domain_id($domainName)
{
	global $connection;
	// $stmt = $connection->prepare("call getTopicid(?)");
	// $stmt->bind_param('s',$domainName);
	// $stmt->execute();
	// $result = $stmt->get_result();
	$query="select Topic_id from topic where Topic_Name='$domainName'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select question name to add option
function selectQuestion()
{
	global $connection;
	// $stmt = $connection->prepare("call selectQuestion()");
	// $stmt->execute();
	// $result = $stmt->get_result();
	$query="select Topic_Name,Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Question_Id,Final_Question,Positive_Mark,Negative_Mark from question ORDER BY Question_Id ASC";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;

}
function selectOption($id)
{
	global $connection;
	// $stmt=$connection->prepare("call selectOption(?)");
	// $stmt->bind_param('i',$id);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Name,Positive_Mark,Negative_Mark from question where Question_Id='$id' LIMIT 1";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select Exam Time from Database
function SelectExamTime($id)
{
	global $connection;
	// $stmt=$connection->prepare("call ExamTime(?)");
	// $stmt->bind_param('i',$id);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select TIMEDIFF(End_time,Start_Time) as Time from exam_details where Topic_id='$id'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//Select question for quiz
function getQuestion($cname)
{
	global $connection;
	// $stmt = $connection->prepare("call getQuestion(?)");
	// $stmt->bind_param('s',$cname);
	// $stmt->execute();
	// $result = $stmt->get_result();
	$query="select Question_Name,Question_Type,Answer_Option,Question_Id from question where Topic_Id='$cname' AND Final_Question=1 ORDER BY Question_Id ASC";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;

}
//checking for set/unset question or count the number of set question
function CountVisibleQuestion($cname)
{
	global $connection;
	// $stmt=$connection->prepare("call CountVisibleQuestion(?)");
	// $stmt->bind_param('s',$cname);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select count(Final_Question) as Visible from question where Final_Question=1 AND Topic_Name='$cname' LIMIT 1";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
} 
//select Date and Time of Exam
function SelectExamDateTime($cid,$todayDate)
{
	global $connection;
	// $stmt=$connection->prepare("call SelectExamDate(?,?)");
	// $stmt->bind_param('ss',$cid,$todayDate);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Exam_Date,Total_Question from exam_details where Topic_id='$cid' AND Exam_Date='$todayDate'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//get exam notification for Admin panel
function getNotification()
{
	global $connection;
	// $stmt=$connection->prepare("call getNotify()");
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Topic_id,Exam_Date,Start_Time,End_Time,Total_Question,ID from exam_details where Exam_Date > DATE_SUB(CURDATE(),INTERVAL 1 DAY) ORDER BY Exam_Date ASC";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//get exam notification for update with Id
function getNotificationWithId($id)
{
	global $connection;
	// $stmt=$connection->prepare("call getNotifyWithId(?)");
	// $stmt->bind_param('i',$id);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Topic_id,Exam_Date,Start_Time,End_Time,Total_Question,ID FROM  exam_details WHERE ID ='$id'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select Question for exam Generation
function selectQuestionforEgeneration($cname)
{
	global $connection;
	// $stmt = $connection->prepare("call QuestionforEgeneration(?)");
	// $stmt->bind_param('s',$cname);
	// $stmt->execute();
	// $result = $stmt->get_result();
	$query="select Question_Id,Topic_Name,Question_Name,Exam_Date,Final_Question from question where Topic_Name='$cname' ORDER BY Question_Id ASC";
    $result = mysqli_query($connection,$query);
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
	// $stmt=$connection->prepare("call selectDate(?)");
	// $stmt->bind_param('i',$id);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Exam_Date from exam_details where Topic_id='$id'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select uname and pword for Admin
function selectPwdUnm($uname,$pword)
{
	global $connection;
	// $stmt=$connection->prepare("call selectPwdUnm(?,?)");
	// $stmt->bind_param('ss',$uname,$pword);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Admin_Name,Admin_Lastname,Contact,Address,A_ID,type from we_are_hr_admin where Admin_password='$pword' AND A_ID='$uname'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select Admin profile
function slectAdminProfile($aid)
{
	 global $connection;
	// $stmt=$connection->prepare("call slectAdminProfile(?)");
	// $stmt->bind_param('i',$aid);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Admin_Name,Admin_Lastname,Contact,Address,Email from we_are_hr_admin where A_ID='$aid'";
    $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
//select Admin profile pic
function AdminProfilepic($id)
{
	global $connection;
	// $stmt=$connection->prepare("call AdminPfofilepic(?)");
	// $stmt->bind_param('s',$id);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Profile_pic from we_are_hr_admin where A_ID='$id'";
    $result = mysqli_query($connection,$query);
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
	// $stmt=$connection->prepare("call selectTotalQuestion(?)");
	// $stmt->bind_param('s',$Edate);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Total_Question from exam_details where Exam_Date='$Edate'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
//count total question from given date
function countTotalQuestion($Edate,$TopicName)
{
	global $connection;
	// $stmt=$connection->prepare("call countTotalQuestion(?,?)");
	// $stmt->bind_param('ss',$Edate,$TopicName);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select count(Exam_Date) as TotalSet from question where Exam_Date='$Edate' AND Topic_Name='$TopicName'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
//select algorithm details
function selectAgeRange($id)
{
	global $connection;
	// $stmt=$connection->prepare("call SelectAgeRange()");
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Age_Range from age where Company='$id'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function selectAcademic($id)
{
	global $connection;
	// $stmt=$connection->prepare("call selectAcademic()");
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select DISTINCT Qualification from academic where Company='$id' ORDER BY Qualification ASC";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function selectBackground($id)
{
	global $connection;
	// $stmt=$connection->prepare("call selectBackground()");
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Experience from Background where Company='$id'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function selectTest($id)
{
	global $connection;
	// $stmt=$connection->prepare("call selectTest()");
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Test_Name from test_conduct where Company='$id'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
//with parameter
function selectAgeRangeValue($range)
{
	global $connection;
	// $stmt=$connection->prepare("call SelectAgeRangeValue(?)");
	// $stmt->bind_param('s',$range);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Percentage from Age where Age_Range='$range'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
// function selectAcademicValue($ptage,$cname)
// {
// 	global $connection;
// 	$stmt=$connection->prepare("call selectAcademicValue(?,?)");
// 	$stmt->bind_param('ss',$ptage,$cname);
// 	$stmt->execute();
// 	$result=$stmt->get_result();
// 	// $query="select Test_Name from test_conduct";
//  //     $result = mysqli_query($connection,$query);
// 	confirm_query($result);
// 	return $result;	
// }
// function selectBackgroundValue($bgrnd)
// {
// 	global $connection;
// 	$stmt=$connection->prepare("call selectBackgroundValue(?)");
// 	$stmt->bind_param('s',$bgrnd);
// 	$stmt->execute();
// 	$result=$stmt->get_result();
// 	confirm_query($result);
// 	return $result;	
// }
// function selectTestValue($tname)
// {
// 	global $connection;
// 	$stmt=$connection->prepare("call selectTestValue(?)");
// 	$stmt->bind_param('s',$tname);
// 	$stmt->execute();
// 	$result=$stmt->get_result();
// 	confirm_query($result);
// 	return $result;	
// }


//end of algoritm
//select user results
function getUserAnswer($cname)
{
	global $connection;
	// $stmt=$connection->prepare("call getUserAnswer(?)");
	// $stmt->bind_param('s',$cname);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Answer from user_answer where course_name='$cname' ORDER BY Id DESC LIMIT 1";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}

function selectPercentage($id){
	global $connection;
	// $stmt=$connection->prepare("call selectPercentage(?)");
	// $stmt->bind_param('s',$id);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select PercentageRange from academic where Qualification='$id'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function SelectQuestionAnswer($cname)
{
	global $connection;
	// $stmt=$connection->prepare("call SelectQuestionAnswer(?)");
	// $stmt->bind_param('s',$cname);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Question_Type,Answer_Option,Answer from question where Topic_Name='$cname' AND Final_Question=1 ORDER BY Question_Id ASC";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function Percentage_Result($course,$AcademicPercentage)
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Percentage from academic where Qualification='$course' AND PercentageRange='$AcademicPercentage'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function AgeRange_Result($AgeRange)
{
	global $connection;
	// $stmt=$connection->prepare("call AgeRange_Result(?)");
	// $stmt->bind_param('s',$AgeRange);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Percentage from age where Age_Range='$AgeRange'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function TestName_Result($TestName)
{
	global $connection;
	// $stmt=$connection->prepare("call TestName_Result(?)");
	// $stmt->bind_param('s',$TestName);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Percentage from test_conduct where Test_Name='$TestName'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function Background_Result($Background)
{
	global $connection;
	// $stmt=$connection->prepare("call Background_Result(?)");
	// $stmt->bind_param('s',$Background);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select Percentage from background where Experience='$Background'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}



//gash

//stored procedure is to be created
function CompanyAcademin()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select DISTINCT Company from academic";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function selectEmail()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select email from users";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;	
}
function selectUserName($arr)
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select firstname from users where email='$arr' LIMIT 1";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}

function selectUserNameAndEmail()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select firstname,email from users";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function countTotalusers()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select count(reg_date) as total from users";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function countTotalusersthisWeek()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="SELECT COUNT( reg_date ) as total FROM users WHERE reg_date > DATE_SUB( NOW( ) , INTERVAL 1 WEEK )";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function countTotalcompany()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select count(reg_date) as total from employers";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function countTotalcompanythisWeek()
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="SELECT COUNT( reg_date ) as total FROM employers WHERE reg_date > DATE_SUB( NOW( ) , INTERVAL 1 WEEK )";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function getParticipant($examName)
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	$query="select u1.firstname,u1.email from users u1 inner join participant p1 on u1.email=p1.users where ExamName='$examName'";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function getAllUsers($examName,$cname)
{
	global $connection;
	// $stmt=$connection->prepare("call Academic_Result(?,?)");
	// $stmt->bind_param('ss',$course,$AcademicPercentage);
	// $stmt->execute();
	// $result=$stmt->get_result();
	//$query="select u1.firstname,u1.email from users u1 left join participant p1 on p1.users=u1.email AND p1.ExamName ='$examName' where p1.users is null";
	$query="select email,firstname from users where email in (select username from user_courses where courses REGEXP '$cname') And email not in (select users from participant where ExamName='$examName')";
	//$query="select email,firstname from users where email in (select username from user_courses where courses REGEXP '$cname')";
     $result = mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}

?>