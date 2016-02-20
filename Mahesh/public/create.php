<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>

<?php
if(isset($_POST['submit']))
{
    $topic_name = $_POST['topicName'];

    $query="insert into";
    $query .=" topic(Topic_Name)";
    $query .=" values(?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $topic_name);
    $result = $stmt->execute();
    if($result)
    {
        echo "Success";
        redirect_to("addChallenge.php");
    }else
    {
        die("Database connection fail".mysqli_error($connection));
    }
}
else
{
    echo "fail ";
}
?>


<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>