<?php

session_start();

$con = mysqli_connect("localhost","root","belikethat123","wearehr");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//fetching posted details
if(!empty($_POST['first-name']) && !empty($_POST['last-name'])&& !empty($_POST['company']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['country'])){
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $id = $_SESSION['id'];

    //Updating database
    $query = "UPDATE users SET firstname='$fname',lastname='$lname',companyName='$company',address='$address',city='$city',country='$country' WHERE Id='$id'";
	$result = $con->query($query);
	/*
	print '<script type="text/javascript">'; 
    print 'alert("Profile updated")'; 
    print '</script>'; */

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;

    header('Location: ../profile.php');

}
else{
    echo "POST is empty!\n";
}


?>