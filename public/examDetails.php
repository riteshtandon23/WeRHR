<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
require("vendor/autoload.php");
use Mailgun\Mailgun;
$fileloc = fopen("email_templates/ExamNotification.php", 'r');
$fileread = fread($fileloc, filesize("email_templates/ExamNotification.php"));
if(isset($_POST['submit']))
	{
    	$domain_id = $_POST['topicId'];
    	$date=$_POST['inputExamdate'];
        $start_time = $_POST['Stime'];
    	$end_time = $_POST['Etime'];
    	$total_question = $_POST['TotalQuestion'];
        //echo $date;
    	$exam_date=date_create($date);
    	$exam_date=date_format($exam_date,"Y-m-d");
        // $exam_date=DateTime::createFromFormat('d/m/Y',$date);
        // $exam_date=$exam_date->format('Y-m-d');
        //echo $exam_date;
    	$domainID= select_Domain_id($domain_id);

    	if(isset($domainID))
    	{
    		 while($row =$domainID->fetch_assoc())
			{
				$temp=$row["Topic_id"];
			}
            $stmt = $connection->prepare("call addExam(?,?,?,?,?)");
            $stmt->bind_param('isssi', $temp, $exam_date, $start_time, $end_time, $total_question);
            $result = $stmt->execute();
    		if($result)
    		{
        		if(isset($_POST['multipleemail']))
                {
                    $mg = new Mailgun('key-1450c038c9c4c1a803cfa607ceff9fe6');
                    $domain = "werhr.in";
                    $email= $_POST['multipleemail'];
                    //echo $email;
                    //$arr[]=explode(",",$email);
                    //for($i=0;$i<sizeof($arr);$i++)
                    foreach ($email as $value) {
                        //$arrr=implode(" ",$arr[$i]);
                        echo $value;
                        $result=selectUserName($value);
                        $fname=null;
                        while ($row=$result->fetch_assoc()) {
                            $fname=$row['firstname'];
                        }
                        $fileread = str_replace("#fname#", $fname, $fileread);
                        $fileread = str_replace("#course#", $domain_id, $fileread);
                        $fileread = str_replace("#date#", $exam_date, $fileread);
                        $fileread = str_replace("#stime#", $start_time, $fileread);
                        $fileread = str_replace("#Eime#", $end_time, $fileread);
                            $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                        'to'      => $value, 
                                        'subject' => 'Exam Notification', 
                                        'html'    => $fileread));
                            $msg = 'Recovery link is being sent! Please check your email';
                    }

                }
        		redirect_to("Exam_Details.php?key=000000001111100");
    		}else
    		{
                redirect_to("Exam_Details.php?key=000000001111111");
	        	die("Database connection fail".$connection->connect_errno);
    		}
    	}
        
	}
    if(isset($_POST['FinalUpdate']))
    {
        $id=$_POST['id'];
        $date=$_POST['Edate'];
        $start_time = $_POST['Stime'];
        $end_time = $_POST['Etime'];
        $total_question = $_POST['TotalQuestion'];
        $exam_date=date_create($date);
        $exam_date=date_format($exam_date,"Y-m-d");
        $stmt=$connection->prepare("call updateExamDetails(?,?,?,?,?)");
        $stmt->bind_param('isssi',$id, $exam_date, $start_time, $end_time, $total_question);
        $result = $stmt->execute();
        if($result)
        {
            
            redirect_to("index1.php");
        }else
        {
            die("Database connection fail".$connection->connect_errno);
        }    
    }

?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>