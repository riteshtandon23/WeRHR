<?php
	include 'connection.php';
?>

<?php
if(isset($_POST['submit']))
{
	$coutry = mysql_real_escape_string($_POST['country']);
	$state = mysql_real_escape_string($_POST['InputState']);
	//$city = mysql_real_escape_string($_POST['InputCountry']);
	$query3="select Country_ID from country where Country_Name='{$coutry}' ORDER BY Country_Name ASC";

	$result1=mysqli_query($connection,$query3);
	if($result1)
	{	
			$temp="";$temp2="";
			while($row=mysqli_fetch_assoc($result1))
			{
				$temp=$row["Country_ID"];
			}
			$query7="select State_Name from state where State_Name='{$state}' AND Country_ID='$temp'";
			$result7=mysqli_query($connection,$query7);
			while($row=mysqli_fetch_assoc($result7))
			{
				$temp2=$row['State_Name'];
			}
			$strin = substr($temp2, 0, strlen($temp2));
			//echo $temp2 ."      hhh     ".$temp;
			if($strin==$state)
			{
				echo $state." Already Exist";
			}else
			{
				$query2="insert into state(State_Name,Country_ID) values('{$state}','{$temp}')";
				$result1=mysqli_query($connection,$query2);
				if($result1)
				{
					echo "Success";
				}else
				{
						die("Database connection fail in insert".mysqli_error($connection));
				}
			}
		
	}
	else
	{
		die("Database connection fail in select".mysqli_error($connection));
	}
}

$query2="select Country_Name from country ORDER BY Country_Name ASC";
$result=mysqli_query($connection,$query2);
if(!$result)
{
	die("Database connection fail".mysqli_error($connection));
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
                    <label for="InputName">Country</label>
                    <div class="input-group">
                         <select  class="form-control" name="country"  required>
							<option>Select Country</option>
							<?php
								while($row=mysqli_fetch_assoc($result))
								{
									//var_dump($row);
									echo  "<option>".$row["Country_Name"]."</option>";
								}
							?>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter State</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputState" name="InputState" placeholder="Enter State" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
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