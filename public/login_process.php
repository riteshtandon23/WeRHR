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
    $status="Active";
    if($row['type']=="user" AND $row['act_status']=="1")
    {

        $stmt=$connection->prepare("call statususer(?,?)");
        $stmt->bind_param('ss',$username,$status);
        $stmt->execute();
        header('Location:userHome.php');
    }
    elseif($row['type']=="employer" && $row['act_status']=="1")
    {
        $stmt=$connection->prepare("call statuscomp(?,?)");
        $stmt->bind_param('ss',$username,$status);
        $stmt->execute();
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