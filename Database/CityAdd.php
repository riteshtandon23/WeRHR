<?php
	include 'connection.php';
?>
<?php
	

if(isset($_POST['submit']))
{
	$state = mysql_real_escape_string($_POST['state']);
	$city = mysql_real_escape_string($_POST['InputCity']);
	$country = mysql_real_escape_string($_POST['country']);
	$temp;$temp2="";
	$query="select State_id from state where State_name='{$state}' AND country_id=(select country_id from country where Country_Name='{$country}')";
	$result1=mysqli_query($connection,$query);
	if($result1)
	{
			while($row=mysqli_fetch_assoc($result1))
			{
									//var_dump($row);
				$temp=$row["State_id"];
			}
	}
	else
	{
		$temp=null;
		echo "Value you select is  inCorrect";
	}
	if(isset($temp))
	{

        $query7="select City_Name from city where City_Name='{$city}' AND '{$temp}'";
		$result7=mysqli_query($connection,$query7);
        while($row=mysqli_fetch_assoc($result7))
        {
            $temp2=$row['City_Name'];
        }
        $strin = substr($temp2, 0, strlen($temp2));
        //echo $temp2 ."      hhh     ".$temp;
        if($strin==$city)
        {
                echo $city." Already Exist";
        }
        else
        {
            $query1="Insert into city(City_Name,State_id) values('{$city}','{$temp}')";
            $result=mysqli_query($connection,$query1);
            if($result)
            {
                echo "Success";
            }else
            {
                //echo "Fail ".$country." Might already Exist";
                die("Database connection fail".mysqli_error($connection));
            }  
        }
        
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
    <script type="text/javascript" src="js/getStateCity.js"></script>
</head>
<body>
<div class="container">
<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" name="form1" id="form1" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Country</label>
                    <div class="input-group">
                         <select  class="form-control" name="country" id="country" onchange="window.getstates()">
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
                    <label for="InputEmail">Select State</label>
                    <div class="input-group">
                        <select  class="form-control" name="state"  required>
							<option>Select State</option>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputEmail">Enter City</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputCity" name="InputCity" placeholder="Enter Email" required>
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