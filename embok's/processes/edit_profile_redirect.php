<?php

#This process identifies the type of user and redirect him towards his respective 'edit profile' section

session_start();
include_once("connection.php");

if($_SESSION['usertype']=='employer'){
    header('Location: http://localhost/WeRHR_Login/edit_profile_employer.php');
}
else
{
    header('Location: http://localhost/WeRHR_Login/edit_profile_user.php');
}
?>