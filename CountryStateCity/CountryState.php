<?php
	include 'connection.php';
?>
<?php

$query2="select Country_Name from country";
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
    <script type="text/javascript" src="js/getStateCity.js"></script>
    <script type="text/javascript" src="js/getCities.js"></script>
</head>
<body>
<div class="container">
<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" name="form1" id="form1" method="post" action="submit.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Country</label>
                    <div class="input-group">
                         <select  class="form-control" name="country" id="country" onchange="window.getstates()">
							<option value="1">Select Country</option>
							<?php
								while($row=mysqli_fetch_assoc($result))
								{
									//var_dump($row);
									echo  "<option value={$row["Country_Name"]}>".$row["Country_Name"]."</option>";
								}
							?>
						</select>
							
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Select State</label>
                    <div class="input-group">
                        <select  class="form-control" name="state" id="state" onchange="window.getCities()">
							<option>Select State</option>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputEmail">Select City</label>
                    <div class="input-group">
                        <select  class="form-control" name="City" id="City">
							
						</select>
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