<?php require_once("../includes/dbconnection.php");?>
<?php
session_start();
$fname = $_SESSION['fname'];
//fetching posted details
if(!empty($_POST['oldpassword']) && !empty($_POST['password'])&& !empty($_POST['password2'])){
    $opass = $_POST['oldpassword'];
    $npass = $_POST['password'];
    $rnpass = $_POST['password2'];
    $id = $_SESSION['id'];

    $query = "SELECT password FROM users WHERE Id='$id'";
    $result = $connection->query($query);
    $passrow = mysqli_fetch_assoc($result);
    if($passrow['password'] == $opass){

        //Updating database
        $query = "UPDATE users SET password='$npass' WHERE Id='$id'";
        $result = $connection->query($query);

        # Emailing the user informing the password updation/change
        # Instantiate the client.
        
    ?>
        <script type="text/javascript">
        alert("Password updated! Please log in");
        window.location="http://localhost/WeRHR/public/logout_process.php"
        </script>
    <?php
        //header('Location: logout_process.php');
    }else
    {   
        //ob_start();?>
        <script type="text/javascript">
        alert("Your old password is wrong! Password not updated.");
        window.location="http://localhost/WeRHR/public/account.php"
        </script><?php 
        //header('Location: ../account.php');
        //ob_end_flush();
    }

}
else{
    echo "POST is empty!\n";
}


?>