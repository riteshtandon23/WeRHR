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
$query = "SELECT type,id,firstname,lastname FROM users WHERE email='$username' AND password='$passw' UNION ALL SELECT type,id,firstname,lastname FROM employers WHERE email='$username' AND password='$passw'";
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
    header('Location:home.php');
}
else	//user does not exist
{
?>
    <script type="text/javascript">
        alert("Wrong credentials! Please check");
        window.location="http://localhost/WeRHR/public/login.php"
        </script>
<?php
}


?>