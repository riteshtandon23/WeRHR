<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
	if(isset($_GET['QuesNo']))
	{
		session_start();
		$CName=$_SESSION["CName"];
		session_destroy();
		$userAns=$_GET['UserAns'];
		$QuestionAnswered=$_GET['QuesNo'];
		//$userAns=htmlspecialchars($userAns);
		$stmt=$connection->prepare("call userAnswer(?,?,?)");
		$stmt->bind_param('sss',$QuestionAnswered,$userAns,$CName);
		$result=$stmt->execute();
		if($result)
		{
			redirect_to("success.php");
		}else
		{
			 die("Database connection fail".mysqli_error($connection));
		}
	}else{
		echo "fail";
	}

 ?>
 <?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>