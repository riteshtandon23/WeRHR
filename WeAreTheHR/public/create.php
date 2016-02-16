<?php require_once("./includes/dbconnection.php");?>
<?php require_once("./includes/all_functions.php");?>

<?php
if(isset($_POST['submit']))
{
    $domain_name = $_POST['InputDomain'];
     $domain_name = mysql_real_escape_string($connection,$domain_name);
    $query="insert into domain(Domain_Name) values('{$domain_name}')";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        echo "Success";
    }else
    {
        die("Database connection fail".mysqli_error($connection));
    }
}
?>


<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>