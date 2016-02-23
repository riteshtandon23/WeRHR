<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
if(isset($_POST['submit']))
	{
    	$domain_id = $_POST['topicId'];
    	$date=$_POST['Edate'];
        $start_time = $_POST['Stime'];
    	$end_time = $_POST['Etime'];
    	$total_question = $_POST['TotalQuestion'];
    	$positive_mark = $_POST['Pmark'];
    	$negative_mark = $_POST['Nmark'];
    	$exam_date=date_create($date);
    	$exam_date=date_format($exam_date,"Y-m-d");
    	$domainID= select_Domain_id($domain_id);

    	if(isset($domainID))
    	{
    		 while($row =$domainID->fetch_assoc())
			{
				$temp=$row["Topic_id"];
			}
            $stmt = $connection->prepare("call addExam(?,?,?,?,?,?,?)");
            $stmt->bind_param('isssiii', $temp, $exam_date, $start_time, $end_time, $total_question, $positive_mark,$negative_mark);
            $result = $stmt->execute();
    		if($result)
    		{
        		echo "Success";
        		redirect_to("addChallenge.php");
    		}else
    		{
	        	die("Database connection fail".$connection->connect_errno." ".$temp);
    		}
    	}
	}

?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>