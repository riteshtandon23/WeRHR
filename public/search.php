<?php require_once("../includes/dbconnection.php");?>
<<<<<<< HEAD
<!--**********************************************************************-->
<!--**      This page is for search topic call by AJAX                 ***-->
<!--**      Create By Da O Hi Paya Lamare                              ***-->
<!--**********************************************************************-->
=======
>>>>>>> abb971bf645d02bb5bd60dc1459679a099f3f77c
<?php
    if(isset($_GET['key']))
    {
        $key=$_GET['key'];
        $data = array();
        global $connection;
        $stmt = $connection->prepare("select Topic_Name from topic where Topic_Name LIKE '%{$key}%'");
        $stmt->execute();
        $result = $stmt->get_result();
        while($row=$result->fetch_assoc())
        {
          echo "<li>".$row['Topic_Name']."</li>";
        }
    }
    
?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>

