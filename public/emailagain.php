<?php require_once("../includes/dbconnection.php");?>
<?php

	    $course = $_POST['topicId'];
		$date= $_POST['Edate'];
		$stime = $_POST['Stime'];
		$etime = $_POST['Etime'];
		$email = $_POST['email'];
		$que = $_POST['que'];
		$pmark = $_POST['Pmark'];
		$nmark = $_POST['Nmark'];
		
			
			
				$name=$course. '_ '.$date;
		
			$e_date=DateTime::createFromFormat('d/m/Y',$date);
        $date1=$e_date->format('Y-m-d');
		
		
		$query1 = mysqli_query($connection,"INSERT INTO exam_generation(exam_name,course_name,exam_date,start_time,end_time,email,total_que,positive_marks,negative_marks) VALUES('$name','$course','$date1','$stime','$etime','$email','$que','$pmark','$nmark')");
		
		

?>
<?php
//session_start();
require 'sendgrid-php/vendor/autoload.php';
$topic = $_POST['topicId'];
$edate = $_POST['Edate'];
$stime = $_POST['Stime'];
$etime = $_POST['Etime'];
$email = $_POST['email'];


 //$timezone = $_SESSION['time'];
//echo $_SESSION['f_name'] . " " . $_SESSION['l_name'];
$arr=explode(',',$email);
$n=sizeOf($arr);
$mytemp=fopen("template.php","r+");
//$mytemp= file_get_contents("jobcreated.php");
 //$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
date_default_timezone_set('Asia/Kolkata');
  $time=date("l") . ", " . date("d-M-Y") . " " .date("h:i:sa") ;
  //echo $time;
   //echo date_default_timezone_get();

$mytemp=fread($mytemp,filesize("template.php"));
$mytemp=str_replace("{{date}}",$edate,$mytemp);
$mytemp=str_replace("{{tname}}",$topic,$mytemp);
$mytemp=str_replace("{{stime}}",$stime,$mytemp);
$mytemp=str_replace("{{etime}}",$etime,$mytemp);
$sendgrid = new SendGrid("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");
$email    = new SendGrid\Email();
//print_r($mytemp);
$i=0;
while($i<$n)
{
$email->addTo($arr[$i])
      ->setFrom("WeRHR@gmail.com")
      ->setSubject("exam schedule " )
      ->setHtml($mytemp);
// $email->addTo("@gmail.com")
     // ->setFrom("@gmail.com")
     // ->setSubject("" . $jobtitle)
     // ->setHtml(" ");
                      
$sendgrid->send($email);
$i=$i+1;
}
header('location:exam_company.php');
?>