<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php

session_start();
$email = $_SESSION['email'];
$result = $connection->query("SELECT username FROM user_data_foralgo WHERE username='$email'");
if ($result->num_rows>0)        #Existing user
{
    $result=$connection->query("UPDATE user_data_foralgo SET Academics='$_POST[academics]', Percentage='$_POST[percentage]', Background='$_POST[experience]' WHERE username='$email'");
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    else{
        $success = "Data added 1!";
        header("location:userDataforAlgo.php?msg=".$success);
    }
}
else                            #New user
{
    if(isset($_POST['submit'])){
    $result=$connection->query("INSERT INTO user_data_foralgo(username,Academics,Percentage,Background)VALUES('$email','$_POST[academics]','$_POST[percentage]','$_POST[experience]')");
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    else{
        $success = "Data added!";
        header("location:userDataforAlgo.php?msg=".$success);
    }
}
}
?>