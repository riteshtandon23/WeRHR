<?php
    include 'connection.php';
?>

<?php
if(isset($_POST['submit']))
{
    $country = mysql_real_escape_string($_POST['InputCountry']);
    $state = mysql_real_escape_string($_POST['InputCountry']);
    $city = mysql_real_escape_string($_POST['InputCountry']);
    $query="insert into country(Country_Name) values('{$country}')";
    //$query2="insert into country(Country_Name) values('{$country}')";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        echo "Success";
    }else
    {
        echo "Fail ".$country." Might already Exist";
        //die("Database connection fail".mysqli_error($connection));
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration form Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">


<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Country</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputCountry" id="InputCountry" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="input-group">
                       <label for="error" name="error" id="error"></label> 
                    </div>
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>
<!-- Registration form - END -->

</div>

</body>
</html>
<?php
mysqli_close($connection);
?>