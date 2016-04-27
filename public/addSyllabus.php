<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php session_start(); ?>
<?php
	if(isset($_POST['submitQuestion']))
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
        $question_ans=ltrim($question_ans,"/");
        $answeroption="";
        foreach ($_POST['option'] as $key => $value) {
            $answeroption .=$value ."/";
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
        		redirect_to("addProblem.php?key=000000001111100");
    		}else
    		{
                redirect_to("addProblem.php?key=000000001111111");
	        	die("Database connection fail".$connection->connect_errno." ".$temp);
    		}
    	}
	}
?>
<?php  
 date_default_timezone_set('Asia/Kolkata');
    if(isset($_POST['Agree']) && isset($_SESSION["email"]))
    {
        //echo $_SESSION["email"];
        $cn=$_SESSION["CName"];
           $todayDate=date("Y-m-d");
        //$todayDate=date("2016-04-13");
          $em=$_SESSION["email"];
          $tn=$cn.$todayDate;
          $result25=checkFormultipleattemp($em,$tn);
          //while ($row25=$result25->fetch_assoc())
            $row25=$result25->fetch_assoc();
            if(!isset($row25['SerialNo']))
            {
                    $result3=CountVisibleQuestion($_SESSION["CName"],$todayDate);
                    while ($row1=$result3->fetch_assoc()) {
                        $visi=(int)$row1['Visible'];
                    }
                    $result=select_Domain_id($_SESSION["CName"]);
                    $id="";
                    $time="";
                    while($row=$result->fetch_assoc())
                    {
                        $id=$row["Topic_id"];
                    }
                    $result4=SelectExamDateTime($_SESSION["CName"].$todayDate,$_SESSION["email"]);
                    while ($row2=$result4->fetch_assoc()) {
                        $examDate=$row2['SerialNo'];
                    }
                    if($visi !== 0)
                    {
                        
                        if(isset($examDate))
                        {
                            $result2=SelectExamTime($id);
                            while($row=$result2->fetch_assoc())
                            {
                                $time=$row["Time"];
                            }
                            $_SESSION["CId"]=$id;
                            $_SESSION["TtoGo"]=$time;
                            redirect_to("attempExam.php");
                           // echo "success";
                        }else
                        {
                           redirect_to("Instruction.php?CName=".$cn."&key=111000111&id=".$_SESSION['encryptid']);
                            //echo "no exam Available for u";
                        }
                    }else
                    {
                        redirect_to("Instruction.php?CName=".$cn."&key=111111000&id=".$_SESSION['encryptid']);
                        //echo "no question";
                    }
            }else{
                 redirect_to("Instruction.php?CName=".$cn."&key=11100011111&id=".$_SESSION['encryptid']);
            }  
          
    }
?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>