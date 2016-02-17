<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
	if(isset($_POST['submit'])){

	$topic_id=$_POST['searchtopic'];
	$new_topic=$_POST['newtopic'];
	$stmt=$connection->prepare("call updateTopic(?,?)");
	$stmt->bind_param('ss',$topic_id,$new_topic);
	$result=$stmt->execute();
	if($result)
	{
		echo "Success";
        redirect_to("addChallenge.php");
	}
	}
?>

<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>