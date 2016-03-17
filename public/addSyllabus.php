<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php session_start(); ?>
<?php
	if(isset($_POST['submit']))
	{
    	$domain_id = $_POST['topicId'];
        $_SESSION["DomainId"]=$domain_id;
    	$question_name=$_POST['questionName'];
        $questiont_type = $_POST['questionType'];
    	$question_desc = $_POST['questionDesc'];
        $question_ans = $_POST['questionAns'];
        $positive_mark = $_POST['Pmark'];
        $negative_mark = $_POST['Nmark'];
        $_SESSION["Pmark"]=$positive_mark ;
        $_SESSION["Nmark"]=$negative_mark;
    	$domainID= select_Domain_id($domain_id);
        $question_ans=ltrim($question_ans,",");
        $answeroption="";
        foreach ($_POST['option'] as $key => $value) {
            $answeroption .=$value .",";
        }
        $answeroption=substr($answeroption,0,-1);
    	if(isset($domainID))
    	{
    		 while($row =$domainID->fetch_assoc())
			{
				$temp=$row["Topic_id"];
			}
            $stmt = $connection->prepare("call addQuestion(?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssisss', $question_name, $questiont_type, $answeroption, $question_ans, $question_desc, $temp, $domain_id,$positive_mark,$negative_mark);
            $result = $stmt->execute();
    		if($result)
    		{
        		echo "Success";
        		redirect_to("addProblem.php");
    		}else
    		{
	        	die("Database connection fail".$connection->connect_errno." ".$temp);
    		}
    	}
	}
?>
<?php  
    if(isset($_POST['Agree']))
    {
        $result3=CountVisibleQuestion($_SESSION["CName"]);
        while ($row1=$result3->fetch_assoc()) {
            $visi=$row1['Visible'];
        }
        $result=select_Domain_id($_SESSION["CName"]);
        $id="";
        $time="";
        while($row=$result->fetch_assoc())
        {
            $id=$row["Topic_id"];
        }
        //$todayDate=date("Y-m-d");
        $result4=SelectExamDateTime($id,"2016-03-03");
        while ($row2=$result4->fetch_assoc()) {
            $examDate=$row2['Exam_Date'];
        }
        if($visi !== 0)
        {
            
            // if(isset($examDate))
            // {
                $result2=SelectExamTime($id);
                while($row=$result2->fetch_assoc())
                {
                    $time=$row["Time"];
                }
                $_SESSION["CId"]=$id;
                $_SESSION["TtoGo"]=$time;
                redirect_to("attempExam.php");
            }else
            {
                redirect_to("success.php");
            }
        // }else
        // {
        //     redirect_to("success.php");
        // }
    }
?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>