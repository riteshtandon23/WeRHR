<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
	if(isset($_POST['submit']))
	{
    	$domain_id = $_POST['topicId'];
    	$question_name=$_POST['questionName'];
        $questiont_type = $_POST['questionType'];
    	$question_desc = $_POST['questionDesc'];
        $question_ans = $_POST['questionAns'];
    	$domainID= select_Domain_id($domain_id);
        $question_ans=ltrim($question_ans,",");
        $answeroption="";
        foreach ($_POST['option'] as $key => $value) {
            $answeroption .=$value .",";
        }
        $answeroption=substr($answeroption,0,-2);
    	if(isset($domainID))
    	{
    		 while($row =$domainID->fetch_assoc())
			{
				$temp=$row["Topic_id"];
			}
            $stmt = $connection->prepare("call addQuestion(?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssis', $question_name, $questiont_type, $answeroption, $question_ans, $question_desc, $temp, $domain_id);
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
if(isset($connection))
{
	mysqli_close($connection);
}
?>