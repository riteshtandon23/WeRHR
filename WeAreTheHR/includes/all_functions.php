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
 		die("Database connection fail".mysqli_error($connection));
    }
}
function select_Domain()
{
	global $connection;
	$query="select Domain_Name";
	$query .=" from domain";
	$query .=" ORDER BY Domain_Name ASC";
	$result=mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}
function select_Domain_id($domainName)
{
	global $connection;
	$query="select Domain_ID";
	$query .=" from domain";
	$query .=" where Domain_Name='{$domainName}' LIMIT 1";
	$result=mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
}

?>