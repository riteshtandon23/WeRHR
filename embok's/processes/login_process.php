<?php

session_start();

$con = mysqli_connect("localhost","root","belikethat123","wearehr");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//fetching posted details
if(!empty($_POST['email']) and !empty($_POST['password'])){
    $username = $_POST['email'];
    $passw = $_POST['password'];
}
else{
    echo "POST is empty!\n";
}

    
#check if user is present in the db
$query = "SELECT id,firstname,lastname FROM users WHERE email='$username' AND password='$passw' UNION ALL SELECT id,firstname,lastname FROM employers WHERE email='$username' AND password='$passw'";
#although union, result can't be of both tables as registration allowed one unique email for both tables
$result = $con->query($query);
$row = mysqli_fetch_assoc($result);
//$username1 = $row['username'];
$usertype = $row['type'];
if($result->num_rows > 0){
    /*
    $fname_query = "SELECT firstname FROM users WHERE username='$username1'";
    $lname_query = "SELECT lastname FROM users WHERE username='$username1'";
    $id_query = "SELECT Id FROM users WHERE username='$username1'";
    $result1 = $con->query($fname_query);
    $result2 = $con->query($lname_query);
    $result3 = $con->query($id_query);
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    $row3 = mysqli_fetch_assoc($result3);*/
    $_SESSION["fname"] = $row['firstname'];
    $_SESSION["lname"] = $row['lastname'];
    $_SESSION["id"] = $row['Id'];
    header('Location: ../index.php');
}
else	//user does not exist
{
?>
    <script type="text/javascript">
        alert("Wrong credentials! Please check");
        window.location="http://localhost/WeRHR_Login/login.php"
        </script>
<?php
}


?>