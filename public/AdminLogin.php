<html>
<head>
	<title>WeRHR</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="css/file3.css">

</head>
<body>
<div class="back"> 
</div>
<div class="container" id="box">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Administrator Login</strong>

                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="addAdmintoDB.php" method="POST">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email/username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputUname" name="inputUname" placeholder="Email/Username" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm" name="Login" id="Login">LogIn</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">Not Registered? <a href="#" class="">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
          
</body>
</html>