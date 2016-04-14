<?php require_once("../includes/dbconnection.php");?>
<?php
session_start();
//fetching posted details
if(!empty($_POST['email']) and !empty($_POST['password'])){
    $username = $_POST['email'];
    $passw = $_POST['password'];
}
else{
    echo "POST is empty!\n";
}

    
#check if user is present in the db
$query = "SELECT type,id,firstname,lastname,act_status FROM users WHERE email='$username' AND password='$passw' UNION ALL SELECT type,id,firstname,lastname,act_status FROM employers WHERE email='$username' AND password='$passw'";
#although union, result can't be of both tables as registration allowed one unique email for both tables
$result = $connection->query($query);
$row = mysqli_fetch_assoc($result);
//$username1 = $row['username'];
$_SESSION['Type'] = $row['type'];
if($result->num_rows > 0){
    $_SESSION["fname"] = $row['firstname'];
    $_SESSION["lname"] = $row['lastname'];
    $_SESSION["id"] = $row['id'];
    $_SESSION["email"]=$username;
	 $t_date=date("Y-m-d");
 $query1=mysqli_query($connection,"SELECT course_name FROM exam_generation WHERE exam_date='$t_date'");

	
      $row1=mysqli_fetch_array($query1,MYSQL_ASSOC);
   
$var=$row1['course_name'];

    
    if($row['type']=="user" AND $row['act_status']=="1")
    {
        header('Location:Instruction.php?CName='.$var);
    }
    elseif($row['type']=="employer" && $row['act_status']=="1")
    {
       header('Location:home.php'); 
    }
    else{
        $Error="You have not activated your account"; 
        header("location:login.php?Error=" . $Error); 
    }
}
else	//user does not exist
{

 $Error="Invalid Username or Password"; 
header("location:login.php?Error=" . $Error); 

 
}


?>