<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
session_start();
if(isset($_POST['submit']))
{
    
    if(!empty($_FILES['image']) || $_FILES['image']['size']>0){
        
        $name = mysqli_escape_string($connection,$_FILES['image']['name']);
    //echo  $name;
        $type = $_FILES['image']['type'];
        $error = $_FILES['image']['error'];
        $size = $_FILES['image']['size'];
        $temp = $_FILES['image']['tmp_name'];


        if($error > 0)
        {
         echo "eer";
        }
        else
        {
            if($size > 10000000)
                echo "Format not allowed or file size is too big!";
            elseif (substr($type,0,5)=='image') {
               
                    if($name)
                        move_uploaded_file($temp,"images/userImage/".$name);   
                        }
        }
        
}


    $fname= ($_POST['fname']);
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = ($_POST['mobile']);
        $country = ($_POST['Country']);
        $state = ($_POST['State']);
        $city = ($_POST['city']);
        $date= ($_POST['dob']);
        
        
    $query1 = mysqli_query($connection,"update users set firstname='$fname',lastname='$lname',email='$email',contact='$mobile',DOB='$date',state='$state',country='$country',city='$city', Profile_pic='$name' WHERE email='" . $_SESSION["email"] . "'");
    if($query1)
    {
        redirect_to("edit_profile_user.php");
    }else{
        die("Fail to execute".mysqli_error($connection));
    }

}
 
 ?>
 <?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>