
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<title>WeRHR - User Register</title>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    
    <!-- Favicon --> 
	<link rel="shortcut icon" href="images/favicon.ico">
    
   <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
   	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
	
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
    
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    
    <!-- responsive devices styles -->
	<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
   
    
    <!-- mega menu -->
    <link href="css/mainmenu/stickytwo.css" rel="stylesheet">
    <link href="css/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainmenu/demo.css" rel="stylesheet">
    <link href="css/mainmenu/menu.css" rel="stylesheet">
  
    <!-- accordion -->
    <link rel="stylesheet" href="css/accordion/accordion.css" type="text/css" media="all">
    
    <!-- Lightbox -->
    <link rel="stylesheet" type="text/css" href="css/lightbox/jquery.fancybox.css" media="screen" />
	
    <!-- forms -->
    <link rel="stylesheet" href="css/form/sky-forms.css" type="text/css" media="all">
 
</head>
<body>


<div class="wrapper_boxed">

<div class="site_wrapper">


<header id="header">
	
	<div id="trueHeader">
    
	<div class="wrapper">
    
    
    <div class="logoarea">
    <div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="index.php" id="logo"></a></div>
    
	<div class="right_links">
        
        <ul>
            <li class="social"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="social"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="social"><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li class="social"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li class="social"><a href="#"><i class="fa fa-flickr"></i></a></li>
            <li class="social"><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li class="social"><a href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
        
    </div><!-- end right links -->
    
    
    </div>
    </div>
		
	<!-- Menu -->
	
    </div><!-- end menu -->
        
	</div>
    
	</div>
    
</header>

<div class="clearfix"></div>

<div class="page_title2">
<div class="container">

    <div class="title"><h1>Registration Form</h1></div>
    
    <div class="pagenation">&nbsp;<a href="index.php">Home</a> <i>/</i> <a href="#">Registration</a> <i>/</i> Users Registration Form</div>
    
</div>
</div><!-- end page title --> 

<div class="clearfix"></div>

<div class="container">
<div id="main">

</div>
	<div class="content_fullwidth">
    
		
        <div class="reg_form">
        <form id="sky-form" class="sky-form" method="post" action="user_register_process.php">
				<header>Registration form</header>
					<fieldset>			
					<div class="row">
						<section class="col col-6">
							<label class="input">
							<i class="icon-append fa fa-user"></i>
								<input type="text" name="firstname" id="firstname" placeholder="First Name">
							</label>
						</section>
						<section class="col col-6">
							<label class="input">
							<i class="icon-append fa fa-user"></i>
								<input type="text" name="lastname" id="lastname" placeholder="Last name">
							</label>
						</section>
					</div>
					<section>
						<label class="input">
							<i class="icon-append icon-envelope-alt"></i>
							<input type="email" name="email" id="email" placeholder="Email address">
							<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
						</label>
					</section>
					<section>
						<label class="input">
							<i class="icon-append icon-lock"></i>
							<input type="password" name="password" id="password" placeholder="Password" id="password">
							<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
						</label>
					</section>
					<section>
						<label class="input">
							<i class="icon-append icon-lock"></i>
							<input type="password" name="passwordConfirm" placeholder="Confirm password">
							<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
						</label>
					</section>
				</fieldset>
					

				<footer>
					<button type="submit" class="button" name="submit" id="submit">Submit</button>
				</footer>
			</form>			
		</div>
        
	</div>

</div><!-- end content area -->

<div class="clearfix margin_top7"></div>

<div class="footer1">
<div class="container">
	    
	<div class="one_fourth animate" data-anim-type="fadeInUp" data-anim-delay="200">
        <ul class="faddress">
            <li><img src="images/footer-logo.png" alt="" /></li>
            <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; 2901 Marmora Road, Glassgow,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seattle, WA 98122-1090</li>
            <li><i class="fa fa-phone"></i>&nbsp; 1 -234 -456 -7890</li>
            <li><i class="fa fa-print"></i>&nbsp; 1 -234 -456 -7890</li>
            <li><a href="mailto:info@yourdomain.com"><i class="fa fa-envelope"></i> info@yourdomain.com</a></li>
            <li><img src="images/footer-wmap.png" alt="" /></li>
        </ul>
	</div><!-- end address -->
    
    <div class="one_fourth animate" data-anim-type="fadeInUp" data-anim-delay="300">
    <div class="qlinks">
    
    	<h4 class="lmb">Useful Links</h4>
        
        <ul>
            <li><a href="#"><i class="fa fa-angle-right"></i> Home Page Variations</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Awsome Slidershows</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Features and Typography</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Different &amp; Unique Pages</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Single and Portfolios</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Recent Blogs or News</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Layered PSD Files</a></li>
        </ul>
        
    </div>
	</div><!-- end links -->
        
    <div class="one_fourth animate" data-anim-type="fadeInUp" data-anim-delay="400">
    <div class="siteinfo">
    
    	<h4 class="lmb">About Hoxa</h4>
        
        <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined an chunks as necessary, making this the first true generator on the Internet. Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites.</p>
        <br />
        <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
        
	</div>
    </div><!-- end site info -->
    
    <div class="one_fourth last animate" data-anim-type="fadeInUp" data-anim-delay="500">
        
        <h4>Flickr Photos</h4>
        
        <div id="flickr_badge_wrapper">
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=h&amp;source=user&amp;user=93382411%40N07"></script>     
        </div>
        
    </div><!-- end flickr -->
    
    
</div>
</div><!-- end footer -->

<div class="clearfix"></div>

<div class="copyright_info four">
<div class="container">
    
    <div class="one_half">
    
        Copyright © 2014 wearehr.com. All rights reserved.  <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a>
        
    </div>
    
    <div class="one_half last">
        
        <ul class="footer_social_links three">
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="200"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="250"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="300"><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="350"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="400"><a href="#"><i class="fa fa-skype"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="450"><a href="#"><i class="fa fa-flickr"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="500"><a href="#"><i class="fa fa-html5"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="550"><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li class="animate" data-anim-type="zoomIn" data-anim-delay="600"><a href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
            
    </div>
    
</div>
</div><!-- end copyright info -->


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->






</div>
</div>

    
<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- style switcher -->
<script src="js/style-switcher/jquery-1.js"></script>
<script src="js/style-switcher/styleselector.js"></script>

<!-- mega menu -->
<script src="js/mainmenu/bootstrap.min.js"></script> 
<script src="js/mainmenu/customeUI.js"></script> 

<!-- tabs -->
<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>


<!-- accordion -->
<script type="text/javascript" src="js/accordion/custom.js"></script>

<!-- sticky menu -->
<script type="text/javascript" src="js/mainmenu/sticky.js"></script>
<script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>

<script src="js/form/jquery.form.min.js"></script>
<script src="js/form/jquery.validate.min.js"></script>
<script src="js/form/jquery.modal.js"></script>

<script type="text/javascript">
(function($) {
 "use strict";

	$(function()
	{
		// Validation for login form
		$("#sky-form").validate(
		{					
			// Rules for form validation
			rules:
			{
				email:
				{
					required: true,
					email: true
				},
				password:
				{
					required: true,
					minlength: 3,
					maxlength: 20
				}
			},
								
			// Messages for form validation
			messages:
			{
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				password:
				{
					required: 'Please enter your password'
				}
			},					
			
			// Do not change code below
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
		
		
		// Validation for recovery form
		$("#sky-form2").validate(
		{					
			// Rules for form validation
			rules:
			{
				email:
				{
					required: true,
					email: true
				}
			},
								
			// Messages for form validation
			messages:
			{
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				}
			},
								
			// Ajax form submition					
			submitHandler: function(form)
			{
				$(form).ajaxSubmit(
				{
					success: function()
					{
						$("#sky-form2").addClass('submited');
					}
				});
			},				
			
			// Do not change code below
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	});			

})(jQuery);
</script>

<!-- lightbox -->
<script type="text/javascript" src="js/lightbox/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/lightbox/custom.js"></script>



</body>
</html>
