<?php

include_once("connection.php");
require("../vendor/autoload.php");
use Mailgun\Maigun;

session_start();

$fileloc = fopen("../email_templates/password_change_alert.php");
$fileread = fread($fileloc, filesize("../email_templates/password_change_alert.php"));
$fname = $_SESSION['fname'];
$fileread = str_replace("#fname#", ucfirst($fname), $fileread);
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

        # Emailing the user informing the password updation/change
        # Instantiate the client.
        $mg = new Mailgun('key-1450c038c9c4c1a803cfa607ceff9fe6');
        $domain = "werhr.in";

        # Make the call to the client.
        $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                'to'      => $email, 
                                'subject' => 'Password Changed!', 
                                'html'    => $fileread));
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