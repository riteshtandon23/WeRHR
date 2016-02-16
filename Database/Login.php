<?php
	include 'connection.php';
?>
<?php
if(isset($_POST['submit']))
{
   
    $uname = mysql_real_escape_string($_POST['tuname']);
    $passwd = mysql_real_escape_string($_POST['tpass']);
    //$city = mysql_real_escape_string($_POST['InputCountry']);
    $query3="select username,password from admin";
     $query3 .=" where username='{$uname}' and password='{$passwd}' LIMIT 1";

    $result1=mysqli_query($connection,$query3);
    if($result1)
    {   
            $temp="";$temp2="";
            while($row=mysqli_fetch_assoc($result1))
            {
                $temp=$row["username"];
                $temp2=$row["password"];

            }   
    }
    else
    {
        die("Database connection fail in select".mysqli_error($connection));
        echo "Fail to login";
        //header('Location:Login.php');
    }
    if(isset($uname))
    {
       if($temp==$uname && $temp2==$passwd)
        {
            header('Location:home.php');
        }else
        {
            echo "Fail to login";
        } 
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
        <div class="col-lg-12">
            <div class="form_hover " style="background-color: #cccccc;">
                <p style="text-align: center; margin-top: 20px;">
                    <i class="fa fa-gears" style="font-size:187px;"></i>
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-primary" style="height:320px;">
                            <div class="panel-heading">
                                <h3 style="background-color:#428BCA; color:white; padding:10px;">
                                    <i class="fa fa-arrows-v"></i>    Login Form    <i class="fa fa-arrows-v"></i></h3>
                            </div>
                             <form role="form" name="form1" id="form1" method="post" >
                            <div class="panel-body">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="tuname" id="tuname" placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" name="tpass" id="tpass"placeholder="Password" required>
                                </div>                                
                                <div class="form-group">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block" >Sign In</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>
<?php
mysqli_close($connection);
?>