<?php
 include_once('include/connect_open.php');

session_start();
$message="";

if(count($_POST)>0) {
$result = mysqli_query($connection,"SELECT * FROM user1 WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
if(is_array($row)) {

$_SESSION["email"] = $row['email'];
header("Location:profile.php");
} else {
$message = "Invalid Username or Password!";
die($message);
}
}
if(isset($_SESSION["user_id"])) {

}
 include_once('include/connection_close.php');
?>



 