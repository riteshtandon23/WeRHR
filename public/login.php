<?php
	#Pop up message when redirected from registration page
	if(isset($_GET['msg'])){ 
		print '<script type="text/javascript">';
		print 'alert("'.$_GET['msg'].'");';
        print '</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Favicon --> 
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/favicon/apple-touch-icon-57x57.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/favicon/apple-touch-icon-114x114.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/favicon/apple-touch-icon-72x72.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/favicon/apple-touch-icon-144x144.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="images/favicon/apple-touch-icon-60x60.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/favicon/apple-touch-icon-120x120.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/favicon/apple-touch-icon-76x76.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/favicon/apple-touch-icon-152x152.png" />
	    <link rel="icon" type="image/png" href="images/favicon/favicon-196x196.png" sizes="196x196" />
	    <link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96" />
	    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32" />
	    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16" />
	    <link rel="icon" type="image/png" href="images/favicon/favicon-128.png" sizes="128x128" />
	    <meta name="application-name" content="&nbsp;"/>
	    <meta name="msapplication-TileColor" content="#FFFFFF" />
	    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png" />
	    <meta name="msapplication-square70x70logo" content="images/favicon/mstile-70x70.png" />
	    <meta name="msapplication-square150x150logo" content="images/favicon/mstile-150x150.png" />
	    <meta name="msapplication-wide310x150logo" content="images/favicon/mstile-310x150.png" />
	    <meta name="msapplication-square310x310logo" content="images/favicon/mstile-310x310.png" />
		<title>We'R'HR - Login</title>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom styles for this template -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="css/style1.css" rel="stylesheet">
		<link href="css/form-elements.css" rel="stylesheet">
		<link href="css/bootstrap-dialog.min.css" rel="stylesheet">

		<!-- Google fonts -->
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="js/ie-emulation-modes-warning.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body id="page-top">
		<!-- Login -->
		<section class="dark-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title"><img align="text-center" src="images/Logo_Minimal.svg"></div>
						<div class="col-md-6 col-md-offset-3">
							<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter email and password to log in:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<a href="index.php"><i class="fa fa-home"></i></a>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form id="form" role="form" action="login_process.php" method="post" class="login-form" data-toggle="validator">
				                    	<div class="form-group">
				                        	<input type="email" name="email" placeholder="Email..." class="form-username form-control" id="email" data-error="Email not valid!">
				                        	<div class="help-block with-errors"></div>
				                        </div>
				                        <div class="form-group">
				                        	<input type="password" data-minlength="6" name="password" placeholder="Password..." class="form-password form-control" id="password" data-error="Password too short" required>
				                        	<div class="help-block with-errors"></div>
				                        </div>
				                        <div class="form-group">
										    <div class="checkbox">
										      <label style="color: #323232">
										        <input type="checkbox" id="check" name="check">
										        Keep me logged in
										      </label>
										      <div class="help-block">Uncheck on a public computer</div>
										    </div>
										</div>
				                        <div class="form-group">
					                        <button type="submit" class="btn">Sign in!</button>
					                        <div class="btn-divider"></div>
					                        <div style="text-align:center"><a href="user_register.php"><strong>Register as User</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="employer_register.php"><strong>Register as Employer</strong></a></div>
					                     </div>
					                     
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                    </div>
					</div>
				</div>
			</div>
		</section>
		
		<p id="back-top">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>
		<footer>
			<div class="container text-center">
				<p>©2016 <a href="#"><span>WERHR</span>.in</a></p>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/cbpAnimatedHeader.js"></script>
		<script src="js/theme-scripts.js"></script>
		<script src="js/validator.min.js"></script>
		<script src="js/bootstrap-dialog.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>