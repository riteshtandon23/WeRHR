<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
require("vendor/autoload.php");
use Mailgun\Mailgun;
if(isset($_POST['submit']))
	{
    	$domain_id = $_POST['topicId'];
    	$date=$_POST['Edate'];
        $start_time = $_POST['Stime'];
    	$end_time = $_POST['Etime'];
    	$total_question = $_POST['TotalQuestion'];
    	$exam_date=date_create($date);
    	$exam_date=date_format($exam_date,"Y-m-d");
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
                            $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                        'to'      => $value, 
                                        'subject' => 'Exam Notification', 
                                        'text'    => 'Hello, '.$fname.' your '.$domain_id.' exam is on '.$exam_date.' from '.$start_time.' to '.$end_time.'. So be prepared.'));
                            $msg = 'Recovery link is being sent! Please check your email';
                    }

                }
        		redirect_to("Exam_Details.php");
    		}else
    		{
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