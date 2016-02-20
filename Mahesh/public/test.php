<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>

<?php
global $connection;
    //$result=mysqli_query($connection,$query);
    $stmt = $connection->prepare("call getTopic(1002)");
    $result = $stmt->execute();
    confirm_query($result);
    //return $result;
     $stmt->bind_result($name);
    while ($stmt->fetch()) {
     // Because $name and $countryCode are passed by reference, their value
     // changes on every iteration to reflect the current row
     echo "<pre>";
     echo  $name;
     echo "</pre>";
   }
?>