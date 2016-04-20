<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php session_start();
$type=$_SESSION['Type'];
    if($type!=="employer")
    {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeRhR! | </title>

    <!-- Bootstrap core CSS -->


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	

	
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
	   <script src="js/custom/adddeltexbox.js"></script> 
    <script>
        NProgress.start();
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>WeRHR!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
							<?php
												$result = mysqli_query($connection,"SELECT Profile_pic FROM employers WHERE email='". $_SESSION["email"]."'");
                                                          $row=mysqli_fetch_array($result,MYSQL_ASSOC)
												?>
                            <img src="images/<?php echo $row['Profile_pic'];?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo  $_SESSION["fname"];
									echo  $_SESSION["lname"];
									?></h2>
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
                                        <li><a href="home.php">Home</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Exam Generation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="exam_create.php">Create Exam</a>
                                        </li>
                                        <li><a href="addquestion.php">Add Question</a>
                                        </li>
                                        <li><a href="add_topic.php">Add Topic</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Company Specification <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="cspecification.php">Company Specification</a>
                                        </li>
                                        <li><a href="exam_company.php">Exam details</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                       
                                        </li>
                                    </ul>
                                </li>
                               
                                
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a> <span class="glyphicon glyphicon-user"></span>&nbsp&nbspCompany Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                          <li><a href="cprofile.php"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspUpdate profile</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li><a><span class="glyphicon glyphicon-lock"></span> &nbsp&nbspPassword <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                       <li><a href="change_password.php"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspChange Password</a></li>
                                       

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
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
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
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
									<?php
												$result = mysqli_query($connection,"SELECT Profile_pic FROM employers WHERE email='". $_SESSION["email"]."'");
                                                          $row=mysqli_fetch_array($result,MYSQL_ASSOC)
												?>
                                    <img src="images/<?php echo $row['Profile_pic'];?>" alt=""><?php echo  $_SESSION["fname"];
									echo  $_SESSION["lname"];
									?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="cprofile.php">  Profile</a>
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
                                                <strong><a href="inbox.html">See All Alerts</strong>
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
            <div class="right_col" role="main" style="background-color:white">

<div class="x_content">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addalgorithmDetails1.php" method="post" >

                <span class="section">Age Range</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="AgeRange">Age<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="AgeRange" class="form-control col-md-7 col-xs-12"  name="AgeRange" placeholder="Set Age range e.g 18-25 etc" data-inputmask="'mask': '99-99'" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="AgePercentage">Percentage or Marks<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="AgePercentage" class="form-control col-md-7 col-xs-12"  name="AgePercentage" placeholder="Percentage for particular Age Range e.g 20%." required="required" type="text">
                            <input id="Company_Name" Name="Company_Name" type="hidden">

                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddAge" name="AddAge" type="submit" class="btn btn-primary">Add</button>

                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
     <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
        
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addalgorithmDetails1.php" method="post" >

                    <span class="section">Test</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="TestName">Test Name<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="TestName" class="form-control col-md-7 col-xs-12"  name="TestName" placeholder="Marks for particular test " required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="TestPercentage">Percentage or Marks<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="TestPercentage" class="form-control col-md-7 col-xs-12"  name="TestPercentage" placeholder="Percentage for particular test e.g 20%." required="required" type="text">
                            <input id="Company_Name3" Name="Company_Name3" type="hidden">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddTest" name="AddTest" type="submit" class="btn btn-primary">Add</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="x_content">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addalgorithmDetails1.php" method="post" >

                    <span class="section">Background</span>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="Background">Background<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="Background" class="form-control col-md-7 col-xs-12"  name="Background" placeholder="Background e.g Fresh, Experienceetc" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="BackgroundPercentage">Percentage or Mark<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="BackgroundPercentage" class="form-control col-md-7 col-xs-12"  name="BackgroundPercentage" placeholder="Percentage for particular Backgroung e.g 20%." required="required" type="text">
                            <input id="Company_Name2" Name="Company_Name2" type="hidden">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddBack" name="AddBack" type="submit" class="btn btn-primary">Add</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
     <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
        
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addalgorithmDetails1.php" method="post" >

                    <span class="section">Academic Details</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="Academic">Course<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="Academic" class="form-control col-md-7 col-xs-12"  name="Academic" placeholder="course prefer e.g MBA,MCA etc." required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="PercentageRange">Percentage Range<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="PercentageRange" class="form-control col-md-7 col-xs-12"  name="PercentageRange" placeholder="Range of Percentage e.g 90%-100%." required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="AcademicPercentage">Percentage or Marks<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="AcademicPercentage" class="form-control col-md-7 col-xs-12"  name="AcademicPercentage" placeholder="Percentage for particular course e.g 20%." required="required" type="text">
                            <input id="Company_Name1" Name="Company_Name1" type="hidden">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddAca" name="AddAca" type="submit" class="btn btn-primary">Add</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
   
</div>
                <!-- top tiles -->
               
                <!-- /top tiles -->
				               <!-- footer content -->
   <footer >
                    <div class="">
                        <p class="pull-right">We are the Human Resource WAH.. |
                            <span class="lead"> <i class="fa fa-paw"></i> Lovely Infotech!</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>

               </div>
                <br />

             



 
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

    <script src="js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="js/flot/date.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
    <script>
        $(document).ready(function () {
            // [17, 74, 6, 39, 20, 85, 7]
            //[82, 23, 66, 9, 99, 6, 2]
            var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

            var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
            $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    verticalLines: true,
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#fff'
                },
                colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                xaxis: {
                    tickColor: "rgba(51, 51, 51, 0.06)",
                    mode: "time",
                    tickSize: [1, "day"],
                    //tickLength: 10,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 10
                        //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
                },
                yaxis: {
                    ticks: 8,
                    tickColor: "rgba(51, 51, 51, 0.06)",
                },
                tooltip: false
            });

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }
        });
    </script>

    <!-- worldmap -->
    <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.1.min.js"></script>
    <script type="text/javascript" src="js/maps/gdp-data.js"></script>
    <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script>
        $(function () {
            $('#world-map-gdp').vectorMap({
                map: 'world_mill_en',
                backgroundColor: 'transparent',
                zoomOnScroll: false,
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#E6F2F0', '#149B7E'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function (e, el, code) {
                    el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                }
            });
        });
    </script>
    <!-- skycons -->
	
    <script src="js/skycons/skycons.js"></script>
    <script>
        var icons = new Skycons({
                "color": "#73879C"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>

    <!-- dashbord linegraph -->
    <script>
        var doughnutData = [
            {
                value: 30,
                color: "#455C73"
            },
            {
                value: 30,
                color: "#9B59B6"
            },
            {
                value: 60,
                color: "#BDC3C7"
            },
            {
                value: 100,
                color: "#26B99A"
            },
            {
                value: 120,
                color: "#3498DB"
            }
    ];
        var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
    </script>
    <!-- /dashbord linegraph -->
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
	
    <script>
        NProgress.done();
    </script>
	  
	<script src="js/input_mask/jquery.inputmask.js"></script>
	 <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
	

    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>
