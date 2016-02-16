<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="9365";
$dbname="project";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
	die("Mysql connection failed".mysqli_connect_error()."(".Mysqli_connect_erno()
	.")");
}
?>
<?php
$name="john";
$password="147";
$query="insert into test values('{$name}','{$password}')";
$result=mysqli_query($connection,$query);
if($result)
{
	echo "Success";
}else
{
	die("Database connection fail".mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Database connection</title>
</head>
<body>
<?php
/*
	while($row=mysqli_fetch_assoc($result))
	{
		var_dump($row);
		echo  $row["Name"] ."<br>";
		echo  $row["password"]. "<br>";
			
		echo "<hr/>";
	}
	*/

?>
<?php
	//mysqli_free_result($result);
?>
</body>
<html>
<?php
mysqli_close($connection);
?>