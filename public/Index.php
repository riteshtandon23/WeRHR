<?php require_once("../includes/dbconnection.php");?>
<?php session_start(); ?>
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
		<title>We'R'HR - Hire and Get Hired</title>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom styles for this template -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="css/style1.css" rel="stylesheet">
		<link href="css/form-elements.css" rel="stylesheet">

		<!-- Google fonts -->
		<link rel="stylesheet" type="text/css" href="css/fonts.css">
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="js/ie-emulation-modes-warning.js"></script>
				<script src="js/jquery.min.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body id="page-top">
		<?php if(isset($_GET['key']) && $_GET['key']==="111000111"){
		?>
		<script type="text/javascript">

		    $(document).ready(function(){

		        $("#myModal").modal('show');

		    });

		</script>
		<?php
		} ?>
		 <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"><span class="fa fa-check fa-2x" style="color: green"></span>Sucess!!!</h4>
		        </div>
		        <div class="modal-body">
		          <p>Your feedback has been succesfully sent to the Administrator. We will work towards your problem.</p>
		          <p>Thank You!!</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="#page-top"><img src="images/Logo_Minimal.svg" alt="Lattes theme logo"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="#about">About</a>
						</li>
						<li>
							<a class="page-scroll" href="#team">Team</a>
						</li>
						<li>
							<a class="page-scroll" href="login.php">Login</a>
						</li>
                        <li>
							<a href="register.php">Register</a>
						</li>
						<li>
							<a class="page-scroll" href="#contact">Contact</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<?php

$counter_name = "counter.txt";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $todaydate=date("Y-m-d");
  $que="select date from visitors where date='$todaydate'";
  $result = $connection->query($que);
  $row = mysqli_fetch_assoc($result);
//var_dump($row);
  //echo $row['date'];
  if($row['date']!==$todaydate)
  {
    //echo "string";
     $counterVal=1;
    $stmt=$connection->prepare("call addvisitor(?,?)");
    $stmt->bind_param('si',$todaydate,$counterVal);
    $stmt->execute();
  }else{
    //echo "stud";
    $stmt=$connection->prepare("call updatevisitor(?,?)");
    $stmt->bind_param('si',$todaydate,$counterVal);
    $stmt->execute();
  }
  
  
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 
}
?>
		<!-- Header -->
		<header>
			<div class="container">
				<div class="slider-container">
					<div class="intro-text">
						<div class="intro-lead-in">Welcome To We'R'HR!</div>
						<div class="intro-heading">It's Nice To Meet You</div>
						<a href="#about" class="page-scroll btn btn-xl">Tell Me More</a>
					</div>
				</div>
			</div>
		</header>
		<section id="about" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>ABOUT</h2>
							<p>To <b>hire the best</b>, you've got to make it easy for the best people to apply. With WeRHR you don't need to get them to apply in fact-- we got you all covered!</p>
							<p>Or are you <b>looking for a job?</b> Again with WeRHR you can improve your skills with the various courses and their examples that will make you industrial ready</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module-about">
							<i class="fa fa-briefcase ot-circle"></i>
							<h3>Web Development</h3>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
						</div>
					</div>
					<!-- end about module -->
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module-about">
							<i class="fa fa-photo ot-circle"></i>
							<h3>Visualisation</h3>
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
						</div>
					</div>
					<!-- end about module -->
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module-about">
							<i class="fa fa-camera-retro ot-circle"></i>
							<h3>Photography</h3>
							<p>Accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
						</div>
					</div>
					<!-- end about module -->
					<!-- about module -->
					<div class="col-md-3 text-center">
						<div class="mz-module-about">
							<i class="fa fa-cube ot-circle"></i>
							<h3>UI/UX Design</h3>
							<p> Itaque earum rerum hic tenetur a sapiente, ut aut reiciendis maiores</p>
						</div>
					</div>
					<!-- end about module -->
				</div>
			</div>
			<!-- /.container -->
		</section>
		<section >
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="skills-text">
							<h2>WE`RE CREATIVE</h2>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br><br>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur?</p>
						</div>
					</div>
					<div class="col-md-6">
						<!-- skill bar item -->
						<div class="skillbar-item">
							<div class="skillbar-score">
								<span class="score">90</span><span class="percent">%</span>
							</div>
							<div class="skillbar" data-percent="90%">
								<h3>Web design</h3>
								<div class="skillbar-bar">
									<div class="skillbar-percent" style="width: 90%;">
									</div>
								</div>
							</div>
						</div>
						<!-- skill bar item -->
						<div class="skillbar-item">
							<div class="skillbar-score">
								<span class="score">80</span><span class="percent">%</span>
							</div>
							<div class="skillbar" data-percent="80%">
								<h3>Development</h3>
								<div class="skillbar-bar">
									<div class="skillbar-percent" style="width: 80%;">
									</div>
								</div>
							</div>
						</div>
						<!-- skill bar item -->
						<div class="skillbar-item">
							<div class="skillbar-score">
								<span class="score">85</span><span class="percent">%</span>
							</div>
							<div class="skillbar" data-percent="85%">
								<h3>Photography</h3>
								<div class="skillbar-bar">
									<div class="skillbar-percent" style="width: 85%;">
									</div>
								</div>
							</div>
						</div>
						<!-- skill bar item -->
						<div class="skillbar-item">
							<div class="skillbar-score">
								<span class="score">70</span><span class="percent">%</span>
							</div>
							<div class="skillbar" data-percent="70%">
								<h3>Marketing</h3>
								<div class="skillbar-bar">
									<div class="skillbar-percent" style="width: 70%;">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="overlay-dark bg-img1 dark-bg short-section">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 data-count="59">59</h2>
							<h6>awards</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 data-count="1054">1054</h2>
							<h6>Clients</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 data-count="34">34</h2>
							<h6>Team</h6>
						</div>
					</div>
					<div class="col-md-3 mb-sm-30">
						<div class="counter-item">
							<h2 data-count="154">154</h2>
							<h6>Project</h6>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Our Partners</h2>
							<p>Mida sit una namet, cons uectetur adipiscing adon elit.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="owl-carousel">
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-1.png" alt="partners"></div>
							</div>
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-2.png" alt="partners"></div>
							</div>
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-3.png" alt="partners"></div>
							</div>
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-4.png" alt="partners"></div>
							</div>
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-5.png" alt="partners"></div>
							</div>
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-6.png" alt="partners"></div>
							</div>
							<div class="item">
								<div class="partner-logo"><img src="images/demo/partners-7.png" alt="partners"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="team" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Our Team</h2>
							<p>A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Lattes Agency is one of the best in town see more you will be amazed.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- team member item -->
					<div class="col-md-3">
						<div class="team-item">
							<div class="team-image">
								<img src="images/demo/author-2.jpg" class="img-responsive" alt="author">
							</div>
							<div class="team-text">
								<h3>D Lamare </h3>
								<div class="team-location">Shillng, India</div>
								<div class="team-position">– Developer + –</div>
								<p>Mida sit una namet, cons uectetur adipiscing adon elit. Aliquam vitae barasa droma.</p>
							</div>
						</div>
					</div>
					<!-- end team member item -->
					<!-- team member item -->
					<div class="col-md-3">
						<div class="team-item">
							<div class="team-image">
								<img src="images/demo/author-6.jpg" class="img-responsive" alt="author">
							</div>
							<div class="team-text">
								<h3>M Lamin</h3>
								<div class="team-location">Shillong, India</div>
								<div class="team-position">– Developer + –</div>
								<p>Worsa dona namet, cons uectetur dipiscing adon elit. Aliquam vitae fringilla unda mir.</p>
							</div>
						</div>
					</div>
					<!-- end team member item -->
					<!-- team member item -->
					<div class="col-md-3">
						<div class="team-item">
							<div class="team-image">
								<img src="images/demo/author-3.jpg" class="img-responsive" alt="author">
							</div>
							<div class="team-text">
								<h3>Vishal</h3>
								<div class="team-location">India</div>
								<div class="team-position">– Developer + –</div>
								<p>Aradan bes namet, cons uectetur moiscing adon elit. Aliquam vitae fringilla unda augue.</p>
							</div>
						</div>
					</div>
					<!-- end team member item -->
					<!-- team member item -->
					<div class="col-md-3">
						<div class="team-item">
							<div class="team-image">
								<img src="images/demo/author-4.jpg" class="img-responsive" alt="author">
							</div>
							<div class="team-text">
								<h3>Embok</h3>
								<div class="team-location">Shillong, India</div>
								<div class="team-position">– Developer + –</div>
								<p>Dolor sit don namet, cons uectetur beriscing adon elit. Aliquam vitae fringilla unda.</p>
							</div>
						</div>
					</div>
					<!-- end team member item -->
				</div>
			</div>
		</section>
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Contact Us</h2>
							<p>If you have some Questions or need Help! Please Contact Us!<br>We are very happy to assist you</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<h3>Our Business Office</h3>
						<p>Lovely Infotech, Block 29, Lovely Professional Univesity, GT Road, Punjab</p>
						<p><i class="fa fa-phone"></i> +91 123 456 7890</p>
						<p><i class="fa fa-envelope"></i> mail@werhr.in</p>
					</div>
					<div class="col-md-3">
						<h3>Business Hours</h3>
						<p><i class="fa fa-clock-o"></i> <span class="day">Weekdays:</span><span>9am to 8pm</span></p>
						<p><i class="fa fa-clock-o"></i> <span class="day">Saturday:</span><span>9am to 2pm</span></p>
						<p><i class="fa fa-clock-o"></i> <span class="day">Sunday:</span><span>Closed</span></p>
					</div>
					<div class="col-md-6">
						<form name="sentMessage" id="contactForm" action="controllers/changeAdminPass.php" method="post" novalidate="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Your Name *" name="name" id="name" required="" data-validation-required-message="Please enter your name.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" required="" data-validation-required-message="Please enter your email address.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" placeholder="Your Message *" name="message" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" id="sendfeedback" name="sendfeedback" class="btn">Send Message</button>
								</div>
							</div>
						</form>
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

		<script src="js/owl.carousel.min.js"></script>
		<script src="js/cbpAnimatedHeader.js"></script>
		<script src="js/theme-scripts.js"></script>
		<script src="js/validator/validator.js"></script>
	    <script src="js/custom.js"></script>   
	    <script src="js/custom/formValidation.min.js"></script>
	    <script src="js/custom/bootstrap.min.js"></script>
	     <script type="text/javascript" src="js/custom/jquery.validate.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		<script type="text/javascript">
			$(document).on('click','#sendfeedback',function(){
				$('#contactForm').validate({ // initialize the plugin
			        rules: {
			            email: {
			                required: true,
			                email: true
			            },
			            name: {
			                required: true			            }
			        }
			    });
			});
		</script>
	</body>
</html>
