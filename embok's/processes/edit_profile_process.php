<?php

session_start();
include("connection.php");

if ($_SESSION['usertype'] == 'employer') {   
    #fetching posted details
    if(!empty($_POST['first-name']) && !empty($_POST['last-name'])&& !empty($_POST['company']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['country'])){
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $id = $_SESSION['id'];

        //Updating database
        $query = "UPDATE employers SET firstname='$fname',lastname='$lname',companyName='$company',address='$address',city='$city',country='$country' WHERE id='$id'";
    	$result = $con->query($query);
    	/*
    	print '<script type="text/javascript">'; 
        print 'alert("Profile updated")'; 
        print '</script>'; */

        ##updating session's fname and lname in case if the user changes them
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;

        header('Location: ../profile.php');
    }
    else{
        echo "POST is empty!\n";
    }
}
else{
    #fetching posted details
    if(!empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['country'])){
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $id = $_SESSION['id'];

        //Updating database
        $query = "UPDATE users SET firstname='$fname',lastname='$lname',address='$address',city='$city',country='$country' WHERE id='$id'";
        $result = $con->query($query);
        /*
        print '<script type="text/javascript">'; 
        print 'alert("Profile updated")'; 
        print '</script>'; */

        #updating session's fname and lname in case if the user changes them
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;

        header('Location: ../profile.php');
    }
    else{
        echo "POST is empty!\n";
    }
}
?>