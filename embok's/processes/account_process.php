<?php

session_start();

$con = mysqli_connect("localhost","root","belikethat123","wearehr");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error()."\n";
  }

//fetching posted details
if(!empty($_POST['oldpassword']) && !empty($_POST['password'])&& !empty($_POST['password2'])){
    $opass = $_POST['oldpassword'];
    $npass = $_POST['password'];
    $rnpass = $_POST['password2'];
    $id = $_SESSION['id'];

    $query = "SELECT password FROM users WHERE Id='$id'";
    $result = $con->query($query);
    $passrow = mysqli_fetch_assoc($result);
    if($passrow['password'] == $opass){

        //Updating database
        $query = "UPDATE users SET password='$npass' WHERE Id='$id'";
        $result = $con->query($query);
            /*
            print '<script type="text/javascript">'; 
            print 'alert("Profile updated")'; 
            print '</script>'; */

            //$_SESSION['fname'] = $fname;
            //$_SESSION['lname'] = $lname;

    ?>
        <script type="text/javascript">
        alert("Password updated! Please log in");
        window.location="http://localhost/WeRHR_Login/processes/logout_process.php"
        </script>
    <?php
        //header('Location: logout_process.php');
    }else
    {   
        //ob_start();?>
        <script type="text/javascript">
        alert("Your old password is wrong! Password not updated.");
        window.location="http://localhost/WeRHR_Login/account.php"
        </script><?php 
        //header('Location: ../account.php');
        //ob_end_flush();
    }

}
else{
    echo "POST is empty!\n";
}


?>