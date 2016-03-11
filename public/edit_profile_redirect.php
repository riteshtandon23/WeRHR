<?php

#This process identifies the type of user and redirect him towards his respective 'edit profile' section

session_start();

if($_SESSION['usertype']=='employer'){
    header('Location: edit_profile_employer.php');
}
else
{
    header('Location: edit_profile_user.php');
}
?>