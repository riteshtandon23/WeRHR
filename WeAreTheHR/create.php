<?php require_once("./includes/dbconnection.php");?>
<?php require_once("./includes/all_functions.php");?>

<?php
if(isset($_POST['submit']))
{
    $domain_name = $_POST['InputDomain'];

    $query="insert into";
    $query .=" domain(domain_Name)";
    $query .=" values('{$domain_name}')";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        echo "Success";
        redirect_to("AddDomain.php");
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