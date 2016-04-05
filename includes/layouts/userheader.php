<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeRHR!| </title>

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

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom_user.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!-- Image Cropper -->
    <link rel="stylesheet" type="text/css" href="css/cropper/main.css">
    <link rel="stylesheet" type="text/css" href="css/cropper/cropper.min.css">

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<?php
session_start();
$email = $_SESSION['email'];
//$result = $connection->query("call profilepic('$email')");
//$result=profilepic($_SESSION["email"]);
//$pic = $result;
//while($row=$result->fetch_assoc())
//{
    //$pic=$row['Profile_pic'];
//} 
?>
<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="userHome.php" class="site_title"><i class="fa fa-paw"></i> <span>WeRHR!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <!--img src="images/userImage/<?php// if($pic!==""){echo $pic;}else{ echo "users.png";}?>" alt="..." class="img-circle profile_img"-->
                            <img src="images/userImage/users.png" " alt="Profile_Picture" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php  echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="userHome.php">Home</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-book"></i>Courses<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="#">My Courses</a>
                                        </li>
                                        <li><a href="userCoursesAvailable.php">Courses Available</a>
                                        </li>
                                        <?php
                                            //$result=select_Domain();
                                            //while($row =$result->fetch_assoc())
                                            //{
                                                //var_dump($row);
                                                //echo "<li><a href=\"#\">".$result."</a></li>";

                                            //}
                                        ?>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-pencil-square"></i>Exams<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="userUpcomingExam.php">Upcoming Exams</a>
                                        </li>
                                        <li><a href="userAttemptedExam.php">Attempted Exams</a>
                                        </li>
                                        <li><a href="#">Results</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-file-text"></i>Live Exams<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="#">Exams</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>ACCOUNT</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-lock"></i> Password <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="userChangePassword.php">Change Password</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="">Edit Profile</a>
                                        </li>
                                        <li><a href="userDataforAlgo.php">Data Required for Algorithm</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-file-o"></i> Others <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="logout_process.php" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/userImage/<?php if($pic!==""){echo $pic;}else{ echo "users.png";}?>" alt=""><?php  echo $_SESSION['fname']; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="edit_profile_user.php">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="logout_process.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 style="font-size: 18px"> Welcome <?php echo ucfirst($_SESSION["fname"]." ".ucfirst($_SESSION["lname"]));?></i></h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>