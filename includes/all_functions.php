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
	$stmt = $connection->prepare("call getTopic()");
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;
}
	//select topic Id
function select_Domain_id($domainName)
{
	global $connection;
	$stmt = $connection->prepare("call getTopicid(?)");
	$stmt->bind_param('s',$domainName);
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;
}
//select question name to add option
function selectQuestion()
{
	global $connection;
	$stmt = $connection->prepare("call selectQuestion()");
	$stmt->execute();
	$result = $stmt->get_result();
	confirm_query($result);
	return $result;

}
function selectOption($id)
{
	global $connection;
	$stmt=$connection->prepare("call selectOption(?)");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result=$stmt->get_result();
	confirm_query($result);
	return $result;
}
?>