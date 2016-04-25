<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
    if(isset($_GET['key']))
    {
        $key=$_GET['key'];
        $data = array();
        global $connection;
        //$stmt = $connection->prepare("select Topic_Name from topic where Topic_Name LIKE '%{$key}%'");
        // $stmt->execute();
        // $result = $stmt->get_result();
    $query="select Topic_Name from topic where Topic_Name LIKE '%{$key}%'";
    $result = mysqli_query($connection,$query);
        while($row=$result->fetch_assoc())
        {
          echo "<li>".$row['Topic_Name']."</li>";
        }
    }
    
?>
<?php
    if(isset($_GET['keysearch']))
    {
        $key=$_GET['keysearch'];
        $data = array();
        $result=getAdminContactWithkey($key);
        while($row=$result->fetch_assoc())
        {
            $data[]=array("Name"=>$row['Admin_Name'],"email"=>$row['Email'],"contact"=>$row['Contact'],"address"=>$row['Address'],"pic"=>$row['Profile_pic']);
        }
        echo json_encode($data);
    }
    
?>
<?php
    if(isset($_GET['keysearch2']))
    {
        $key=$_GET['keysearch2'];
        $data = array();
        $result=getEmployerContactwithkey($key);
        while($row=$result->fetch_assoc())
        {
            $data[]=array("Name"=>$row['firstname'],"email"=>$row['email'],"contact"=>$row['contact'],"address"=>$row['address'],"pic"=>$row['Profile_pic'],"type"=>$row['type']);
        }
        echo json_encode($data);
    }
    
?>
<?php
    if(isset($_GET['keysearchall']))
    {
        $key=$_GET['keysearchall'];
        $data = array();
        $result=getAdminContact();
        while($row=$result->fetch_assoc())
        {
            $data[]=array("Name"=>$row['Admin_Name'],"email"=>$row['Email'],"contact"=>$row['Contact'],"address"=>$row['Address'],"pic"=>$row['Profile_pic']);
        }
        echo json_encode($data);
    }
    
?>
<?php
    if(isset($_GET['keysearchall2']))
    {
        $key=$_GET['keysearchall2'];
        $data = array();
        $result=getEmployerContact();
        while($row=$result->fetch_assoc())
        {
            $data[]=array("Name"=>$row['firstname'],"email"=>$row['email'],"contact"=>$row['contact'],"address"=>$row['address'],"pic"=>$row['Profile_pic'],"type"=>$row['type']);
        }
        echo json_encode($data);
    }
    
?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>

