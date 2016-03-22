<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
session_start();
		
if(isset($_POST["submit"])){	
    $password = ($_POST['password']);
    $seq = $_SESSION['recover'];
    $query1 = mysqli_query($connection,"SELECT type FROM users WHERE sequence='$seq' UNION ALL SELECT type FROM employers WHERE sequence='$seq'");
    $row = mysqli_fetch_assoc($query1);
    if($row['type']==="user"){
        mysqli_query($connection,"UPDATE users SET password='$password' WHERE sequence='$seq'");
        $msg = 'Password Succesfully Changed! You can now login with your new password';
        redirect_to("login.php?msg=".urlencode($msg));
    }
    else
    {
        mysqli_query($connection,"UPDATE employers SET password='$password' WHERE sequence='$seq'");
        $msg = 'Password Succesfully Changed! You can now login with your new password';
        redirect_to("login.php?msg=".urlencode($msg));
    }
    
}
else
{
    print '<script type="text/javascript">'; 
    print 'alert("POST is empty");'; 
    print '</script>'; 
}

?>