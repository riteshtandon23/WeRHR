<?php require_once("../includes/dbconnection.php");?>
<?php

session_start();

if ($_SESSION['usertype'] == 'employer') {   
    #fetching posted details
    if(!empty($_POST['first-name']) && !empty($_POST['last-name'])&& !empty($_POST['company']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['country'])){

        $pid=$_SESSION['fname']."_".$_SESSION['id'];
        if(!empty($_FILES["image"]['name']) || $_FILES["image"]['size']>0){
        
            $profilepic = mysqli_escape_string($connection,$_FILES['image']['name']);
            //taking extension
            $extension=end(explode(".", $profilepic));
            $profilepic =$pid.".".$extension;


        //echo  $name;
            $type = $_FILES['image']['type'];
            $error = $_FILES['image']['error'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];


            if($error > 0)
            {
             echo "error";
            }
            else
            {
                if($size > 10000000)
                    echo "Format not allowed or file size is too big!";
                elseif (substr($type,0,5)=='image') {
                   
                        if($profilepic)
                            move_uploaded_file($temp,"images/userImage/".$profilepic);   
                            }
            }
        
        }


        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $id = $_SESSION['id'];

        //Updating database
        $query = "UPDATE employers SET firstname='$fname',lastname='$lname',companyName='$company',address='$address',city='$city',country='$country',Profile_pic='$profilepic' WHERE id='$id'";
    	$result = $connection->query($query);
    	/*
    	print '<script type="text/javascript">'; 
        print 'alert("Profile updated")'; 
        print '</script>'; */

        ##updating session's fname and lname in case if the user changes them
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;

        header('Location: home.php');
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
        $result = $connection->query($query);
        /*
        print '<script type="text/javascript">'; 
        print 'alert("Profile updated")'; 
        print '</script>'; */

        #updating session's fname and lname in case if the user changes them
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;

        header('Location: home.php');
    }
    else{
        echo "POST is empty!\n";
    }
}
?>