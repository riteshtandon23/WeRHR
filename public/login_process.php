<?php require_once("../includes/dbconnection.php");?>
<?php
session_start();
//fetching posted details
if(!empty($_POST['email']) and !empty($_POST['passwd'])){
    $username = $_POST['email'];
    $passw = $_POST['passwd'];
}
else{
    echo "POST is empty!\n";
}

    
#check if user is present in the db
$query = "SELECT type,id,firstname,lastname FROM users WHERE email='$username' AND password='$passw' AND act_status=1 UNION ALL SELECT type,id,firstname,lastname FROM employers WHERE email='$username' AND password='$passw' AND act_status=1";
#although union, result can't be of both tables as registration allowed one unique email for both tables
$result = $connection->query($query);
$row = mysqli_fetch_assoc($result);
//$username1 = $row['username'];
$_SESSION['usertype'] = $row['type'];
if($result->num_rows > 0){
    $_SESSION["fname"] = $row['firstname'];
    $_SESSION["lname"] = $row['lastname'];
    $_SESSION["id"] = $row['id'];
    $_SESSION["email"]=$username;
    if($row['type']==="user")
    {
        header('Location:userHome.php');
    }else{
       header('Location:home.php'); 
    }
    
}
else	//user does not exist
{
?>
    <script type="text/javascript">
        alert("Wrong credentials! or You Have not Activate your Account, Please check your mail to activate your Account");
        window.location="http://localhost/WeRHR/public/login.php"
        </script>
<?php
}


?>