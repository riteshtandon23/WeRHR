<?php include_once('include/connect_open.php'); ?>


<?php

if(!$connection)
{die("connection failed:".mysqli_connect_error());}







if(isset($_POST['submit'])){

if(!empty($_FILES['image']) || $_FILES['image']['size']>0){
        $name = mysqli_escape_string($connection,$_FILES['image']['name']);
        $type = $_FILES['image']['type'];
        $error = $_FILES['image']['error'];
        $size = $_FILES['image']['size'];
        $temp = $_FILES['image']['tmp_name'];


        if($error > 0)
        {
         echo "eer";
        }
        else
        {
            if($size > 10000000)
                echo "Format not allowed or file size is too big!";
            elseif (substr($type,0,5)=='image') {
                //$result = mysqli_query($conn,"insert into users (u_name,pswd,f_name,l_name,email,contact,profile_pic) values ('$u_name','$pswd','$f_name','$l_name','$email','$contact','$name')");
                    if($name)
                        move_uploaded_file($temp,"image/".$name);   
						}
		}
		
}
		
		
		$company= $_POST['company'];
		$web = $_POST['website'];
		$email = $_POST['email'];
		$emp = ($_POST['emp']);
		
		$mobile = ($_POST['mobile']);
		$country = ($_POST['Country']);
		$state = ($_POST['State']);
		$city = ($_POST['city']);
		$date= ($_POST['date']);
		$password = ($_POST['password']);
        $pincode = ($_POST['pincode']);
 
 
	
	$query1 = mysqli_query($connection,"select * from company where email='$email'");
	
	if(mysqli_num_rows($query1)>0){
	print '<script type="text/javascript">'; 
print 'alert("The email address  is already registered")'; 
print '</script>'; 
	
	}
else{
	$query1 = mysqli_query($connection,"INSERT INTO company(Name,email,date,employee,web,country,state,city,pincode,contact,logo,password) VALUES('$company','$email','$date','$emp','$web','$country','$state','$city','$pincode','$mobile','$name','$password')");
		print '<script type="text/javascript">'; 
print 'alert("successfully registered")'; 
print '</script>'; 
	}
	
	}	

?>

<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<title>Hoxa - Multipurpose HTML5 Template</title>
	
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
    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    
    <!-- responsive devices styles -->
	<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    
    <!-- animations -->
    <link href="js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<!-- just remove the below comments witch color skin you want to use -->
    <!--<link rel="stylesheet" href="css/colors/red.css" />-->
    <!--<link rel="stylesheet" href="css/colors/blue.css" />-->
    <!--<link rel="stylesheet" href="css/colors/cyan.css" />-->
    <!--<link rel="stylesheet" href="css/colors/orange.css" />-->
    <!--<link rel="stylesheet" href="css/colors/lightblue.css" />-->
    <!--<link rel="stylesheet" href="css/colors/pink.css" />-->
    <!--<link rel="stylesheet" href="css/colors/purple.css" />-->
    <!--<link rel="stylesheet" href="css/colors/bridge.css" />-->
    <!--<link rel="stylesheet" href="css/colors/slate.css" />-->
    <!--<link rel="stylesheet" href="css/colors/yellow.css" />-->
    <!--<link rel="stylesheet" href="css/colors/darkred.css" />-->

<!-- just remove the below comments witch bg patterns you want to use --> 
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-default.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-one.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-two.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-three.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-four.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-five.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-six.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-seven.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-eight.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-nine.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-ten.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-eleven.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-twelve.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-thirteen.css" />-->
    
    <!-- mega menu -->
    <link href="js/mainmenu/stickytwo.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    
    <!-- slide panel -->
    <link rel="stylesheet" type="text/css" href="js/slidepanel/slidepanel.css">
    
	<!-- cubeportfolio -->
	<link rel="stylesheet" type="text/css" href="js/cubeportfolio/cubeportfolio.min.css">
    
	<!-- tabs -->
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs3.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
	<!-- carousel -->
    <link rel="stylesheet" href="js/carousel/flexslider.css" type="text/css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="js/carousel/skin.css" />
    
    <!-- progressbar -->
  	<link rel="stylesheet" href="js/progressbar/ui.progress-bar.css">
    
    <!-- accordion -->
    <link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
    
    <!-- Lightbox -->
    <link rel="stylesheet" type="text/css" href="js/lightbox/jquery.fancybox.css" media="screen" />
	
    <!-- forms -->
    <link rel="stylesheet" href="js/form/sky-forms.css" type="text/css" media="all">
 
</head>
<?php
 ?>
<body>


<div class="wrapper_boxed">

<div class="site_wrapper">


<header id="header">
	
	<div id="trueHeader">
    
	<div class="wrapper">
    
    
    <div class="logoarea">
    <div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="index.html" id="logo"></a></div>
    
	<div class="right_links">
        
        <ul>
            <li class="link"><a class="fancybox fancybox.ajax" href="login-frame.html"><i class="fa fa-envelope"></i> info@yourwebsite.com</a></li>
            <li class="link"><a class="fancybox fancybox.ajax" href="register-frame.html"><i class="fa fa-edit"></i>Register</a></li>
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
	<div class="menu_main">
    
    <div class="container">
        
	<div class="navbar yamm navbar-default">
    
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
          <button type="button" > <i class="fa fa-bars"></i></button>
        </div>
      </div>
      
      <div id="navbar-collapse-1" class="navbar-collapse collapse">
      
        <ul class="nav navbar-nav">
        
        <li><a href="index.html">Home</a></li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Layouts</a>
            <ul class="dropdown-menu" role="menu">
            <li><a href="http://gsrthemes.com/hoxa/layout1/fullwidth/index.html">Business</a> </li>
            <li><a href="http://gsrthemes.com/hoxa/fullwidth/index-1.html">Creative</a> </li>
            <li><a href="http://gsrthemes.com/hoxa/fullwidth/index-2.html">Portfolio</a> </li>
            <li><a href="http://gsrthemes.com/hoxa/layout2/index.html">One Page Theme</a> </li>
            <li><a href="http://gsrthemes.com/hoxa/fullwidth/index-3.html">Landing Page</a> </li>
            <li><a href="http://gsrthemes.com/hoxa/fullwidth/index.html">Corporate</a> </li>
            </ul>
        </li>
       
        <li class="dropdown yamm-fw"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Features</a>
        <ul class="dropdown-menu">
          <li> 
            <div class="yamm-content">
              <div class="row">
              
                <ul class="col-sm-6 col-md-3 list-unstyled ">
                  <li>
                    <p>About Us</p>
                  </li>
                  <li>
                  <img src="http://placehold.it/250x130" alt="" class="img_left4" />
                  Latin words, combined with an handfule model an sentence structures generate Lorem Ipsum which looks a reasonable. The generated Lorem Ipsum therefore always free on internet.</li>
                </ul>
                
                <ul class="col-sm-6 col-md-3 list-unstyled ">
                    <li>
                    <p>Useful Pages</p>
                    </li>
                    <li><a href="elements.html"><i class="fa fa-angle-right"></i> Elements</a></li>
                    <li><a href="typography.html"><i class="fa fa-angle-right"></i> Typography</a></li>
                    <li><a href="pricing-tables.html"><i class="fa fa-angle-right"></i> Pricing Tables</a></li>
                    <li><a href="columns.html"><i class="fa fa-angle-right"></i> Page Columns</a></li>
                    <li><a href="team.html"><i class="fa fa-angle-right"></i> Our Team</a></li>
                    <li><a href="faqs.html"><i class="fa fa-angle-right"></i> FAQs</a></li>
                    <li><a href="tabs.html"><i class="fa fa-angle-right"></i> Tabs</a></li>
                    <li><a href="login.html"><i class="fa fa-angle-right"></i> Login Form</a></li>
                    <li><a href="register.html"><i class="fa fa-angle-right"></i> Register Form</a></li>
                </ul>
                
                <ul class="col-sm-6 col-md-3 list-unstyled ">
                    <li>
                       <p>Diffrent Websites</p>
                    </li>
                    <li> <a href="http://gsrthemes.com/hoxa/layout1/fullwidth/index.html"><i class="fa fa-angle-right"></i> Business</a> </li>
                    <li> <a href="http://gsrthemes.com/hoxa/fullwidth/index-1.html"><i class="fa fa-angle-right"></i> Creative</a> </li>
                    <li> <a href="http://gsrthemes.com/hoxa/layout2/index.html"><i class="fa fa-angle-right"></i> One Page Theme</a> </li>
                    <li> <a href="http://gsrthemes.com/hoxa/fullwidth/index-3.html"><i class="fa fa-angle-right"></i> Landing Page</a> </li>
                    <li> <a href="http://gsrthemes.com/hoxa/fullwidth/index.html"><i class="fa fa-angle-right"></i> Corporate</a> </li>
                    <li> <a href="http://gsrthemes.com/hoxa/fullwidth/index-2.html"><i class="fa fa-angle-right"></i> Portfolio Page</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-right"></i> Parallax Backgrounds</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-right"></i> Background Videos</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-right"></i> Create your Own</a> </li>
                </ul>
                
                <ul class="col-sm-6 col-md-3 list-unstyled ">
                <li>
                   <p>More Features</p>
                </li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Mega Menu</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Diffrent Websites</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Parallax Backgrounds</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Premium Sliders</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Diffrent Slide Shows</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Video BG Effects</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> 100+ Feature Sections</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Use for any Website</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Free Updates</a></li>
                </ul>
                
              </div>
            </div>
          </li>
        </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle active">Pages</a>
          <ul class="dropdown-menu multilevel" role="menu">
            <li><a href="about.html">About Page Style 1</a></li>
            <li><a href="about-2.html">About Page Style 2</a></li>
            <li><a href="about-3.html">About Page Style 3</a></li>
            <li><a href="team.html">Our Team</a></li>
            <li><a href="services.html">Services Style 1</a></li>
            <li><a href="services-2.html">Services Style 2</a></li>
            <li><a href="services-3.html">Services Style 3</a></li>
            <li><a href="full-width.html">Full Width Page</a></li>
            <li><a href="left-sidebar.html">Left Sidebar Page</a></li>
            <li><a href="right-sidebar.html">Right Sidebar Page</a></li>
            <li><a href="left-nav.html">Left Navigation</a></li>
            <li><a href="right-nav.html">Right Navigation</a></li>
            <li><a href="login.html">Login Form</a></li>
            <li><a href="register.html">Registration Form</a></li>
            <li><a href="404.html">404 Error Page</a></li>
          <li class="dropdown-submenu mul"> <a tabindex="-1" href="#">Sub Menu + </a>
            <ul class="dropdown-menu">
                <li><a href="#">Menu Item 1</a></li>
                <li><a href="#">Menu Item 2</a></li>
                <li><a href="#">Menu Item 3</a></li>
            </ul>
          </li>
                    </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Portfolio</a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="portfolio-one.html">Single Item</a> </li>
          <li> <a href="portfolio-two.html">Portfolio Columns 2</a> </li>
          <li> <a href="portfolio-three.html">Portfolio Columns 3</a> </li>
          <li> <a href="portfolio-four.html">Portfolio Columns 4</a> </li>
          <li> <a href="portfolio-five.html">Portfolio + Sidebar</a> </li>
          <li> <a href="portfolio-six.html">Portfolio Full Width</a> </li>
          <li> <a href="portfolio-seven.html">Image Gallery</a> </li>
        </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Blog</a>
        <ul class="dropdown-menu three" role="menu">
          <li> <a href="blog.html">With Large Image</a> </li>
          <li> <a href="blog-2.html">With Small Image</a> </li>
          <li> <a href="blog-post.html">Single Post</a> </li>
        </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Contact</a>
        <ul class="dropdown-menu two" role="menu">
          <li> <a href="contact.html">Contact Variation 1</a> </li>
          <li> <a href="contact2.html">Contact Variation 2</a> </li>
          <li> <a href="contact3.html">Contact Variation 3</a> </li>
        </ul>
        </li>
        
        </ul>
        
        <div id="wrap">
          <form action="index.html" autocomplete="on">
          <input id="search" name="search" type="text" placeholder=""><input id="search_submit" value="search" type="submit">
          </form>
        </div>  
            
      </div>
      </div>
     </div>
     
	</div>
    </div><!-- end menu -->
        
	</div>
    
	</div>
    
</header>

<div class="clearfix"></div>



<div class="clearfix"></div>

<div class="container">
<div id="main">

</div>
	<div class="content_fullwidth">
    
		
        <div class="reg_form">
        <form id="sky-form" class="sky-form" method="post" action="register1.php" enctype="multipart/form-data">
				<header>Company Registration form</header>
								<fieldset>
					
						<section >
							<label class="input">
								<input type="text" name="company" id="company" placeholder="Organisation Name" required>
								
							</label>
						</section>
						<section >
							<label class="input">
								<input type="text" name="website" id="website" placeholder="Enter the Website " required>
							</label>
						</section>
					<section>
						<label class="input">
							<i class="icon-append icon-envelope-alt"></i>
							<input type="email" name="email" id="email" placeholder="Email address" >
							<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
						</label>
					</section>
					<section >
							<label class="input">
								<input type="text" name="emp" id="emp" placeholder="Enter No of Employee " required>
							</label>
						</section>
						
						<section >
							<label class="input"><p><font color="SILVER">Enter Company Logo</font></p>
								<input type="file" name="image" id="image" required>
							</label>
						</section>
					
					     <section >
							<label class="input">
								<input type="tel" maxlength="10" name="mobile" id="mobile"  placeholder="Enter contact number" required>
							</label>
						</section>
						
					
					     <section >
							<label class="input">
								<input type="tel" maxlength="6" name="pincode" id="pincode"  placeholder="Enter pincode number" required>
							</label>
						</section>
						
					
									
					
					<section>
						<label class="input">
								<input type="hidden" name="Country" id="Country" size="0px"  placeholder="Enter the country name" >
							</label>
					</section>
					
					<section>
						<label class="input">
								<input type="hidden" name="State" id="State" size="0px" placeholder="Enter the state name">
							</label>
					</section>
					
					<section>
						<label class="input">
								<input type="text" name="city" id="city" placeholder="Enter the city name" required>
							</label>
					</section>
					
					<section>
		                 <label class="input"><p><font color="SILVER">Enter Date of Establishment</font></p>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Date of Birth" required>      
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
    
        Copyright © 2014 hoxa.com. All rights reserved.  <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a>
        
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
<script type="text/javascript" src="js/universal/jquery.js"></script>

<!-- style switcher -->
<script src="js/style-switcher/jquery-1.js"></script>
<script src="js/style-switcher/styleselector.js"></script>

<!-- animations -->
<script src="js/animations/js/animations.min.js" type="text/javascript"></script>


<!-- slide panel -->
<script type="text/javascript" src="js/slidepanel/slidepanel.js"></script>

<!-- mega menu -->
<script src="js/mainmenu/bootstrap.min.js"></script> 
<script src="js/mainmenu/customeUI.js"></script> 

<!-- jquery jcarousel -->
<script type="text/javascript" src="js/carousel/jquery.jcarousel.min.js"></script>

<!-- scroll up -->
<script src="js/scrolltotop/totop.js" type="text/javascript"></script>

<!-- tabs -->
<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>

<!-- jquery jcarousel -->
<script type="text/javascript">
(function($) {
 "use strict";

	jQuery(document).ready(function() {
			jQuery('#mycarouselthree').jcarousel();
	});
	
})(jQuery);
</script>

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
		// Validation		
		$("#sky-form").validate(
		{					
			// Rules for form validation
			rules:
			{
				username:
				{
					required: true
				},
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
				},
				passwordConfirm:
				{
					required: true,
					minlength: 3,
					maxlength: 20,
					equalTo: '#password'
				},
				firstname:
				{
					required: true
				},
				lastname:
				{
					required: true
				},
				gender:
				{
					required: true
				},
				terms:
				{
					required: true
				}
			},
			
			// Messages for form validation
			messages:
			{
				login:
				{
					required: 'Please enter your login'
				},
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				password:
				{
					required: 'Please enter your password'
				},
				passwordConfirm:
				{
					required: 'Please enter your password one more time',
					equalTo: 'Please enter the same password as above'
				},
				firstname:
				{
					required: 'Please select your first name'
				},
				lastname:
				{
					required: 'Please select your last name'
				},
				gender:
				{
					required: 'Please select your gender'
				},
				terms:
				{
					required: 'You must agree with Terms and Conditions'
				}
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

<!-- cubeportfolio -->
<script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="js/cubeportfolio/main.js"></script>
<script type="text/javascript" src="js/cubeportfolio/main5.js"></script>
<script type="text/javascript" src="js/cubeportfolio/main6.js"></script>

<!-- carousel -->
<script defer src="js/carousel/jquery.flexslider.js"></script>
<script defer src="js/carousel/custom.js"></script>

<!-- lightbox -->
<script type="text/javascript" src="js/lightbox/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/lightbox/custom.js"></script>


<script type="text/javascript">
    function initialize() {
	    var options = {
            types: ['(cities)'],
            //componentRestrictions: {country: "in"}
        };
        var input = document.getElementById('city');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
          	
		//console.log(autocomplete);
	}
	
	//$("#city").val(function(){alert("kuch hua");});
	
  $('input[name=city]').change(function () {
		    setTimeout(function () {
            console.log($("#city").val());
            console.log(($("#city").val().match(/,/g) || []).length); //logs 3
            var val=[];
            if(($("#city").val().match(/,/g) || []).length==2)
            {
                //All City, State, Country Exists
                val=$("#city").val().split(',');
                $("#city").val(val[0]);
                $("#State").val(val[1]);
                $("#Country").val(val[2]);
            }
            else if (($("#city").val().match(/,/g) || []).length == 1)
            {
                //Only City and Country Exists
                val=$("#city").val().split(',');
                $("#city").val(val[0]);
                $("#State").val('NA');
                $("#Country").val(val[1]);
            }

        }, 1000);
    });

    $('input[name=city]').click(function () {
        document.getElementById('city').value = '';
        document.getElementById('State').value = '';
        document.getElementById('Country').value = '';
    });

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
<?php include_once('include/connection_close.php'); ?>
</body>
</html>