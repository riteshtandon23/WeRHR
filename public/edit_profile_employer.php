<?php require_once("../includes/dbconnection.php");?>
<?php
    session_start();
    if(isset($_SESSION["fname"])==FALSE && isset($_SESSION["lname"])==FALSE){
        header('Location: login.php');
        }
        else{
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $id = $_SESSION['id'];

        $row = mysqli_fetch_assoc($connection->query("SELECT address,city,country,companyName,email FROM employers WHERE id='$id'"));
        $address = $row['address'];
        $city = $row['city'];
        $country = $row['country'];
        $company = $row['companyName'];
        $email = $row['email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $_SESSION['fname']." ".$_SESSION['lname']."'s Profile"; ?></title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

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

            <!-- header and side menu -->
             <?php
                if($_SESSION['usertype']=='employer'){
                    include("../includes/layouts/header_and_sidemenu.php");
                }else{
                    include("../includes/layouts/header_and_sidemenu_user.php");
                }
            ?>
            <!-- /header and side menu -->

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit Profile</h3>
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
                    <div class="x_content">
                                    <br />
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="edit_profile_process.php" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-2 col-md-2 col-sm-2 pull-left">
                                        <div class="item form-group">
                                        <div class="avatar-view col-lg-4" title="Change the avatar">
                                        <img src="images/userImage/Untitled-1.jpg" id="ADP" name="ADP" alt="Avatar">
                                        </div>
                                        <input type="file" class="form-control" id="image" name="image" onchange='readURL(this)'>
                                        </div> 
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-right">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="first-name" value="<?php echo $fname ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="last-name" value="<?php echo $lname ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class="control-label col-md-3 col-sm-3 col-xs-12">Company / Institution <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="company" value="<?php echo $company ?>" required="required" class="form-control col-md-7 col-xs-12" type="text" name="company">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="address" value="<?php echo $address ?>" required="required" class="form-control col-md-7 col-xs-12" type="text" name="address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="city" value="<?php echo $city ?>" required="required" class="form-control col-md-7 col-xs-12" type="text" name="city">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Country <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="country" value="<?php echo $country ?>" required="required" class="form-control col-md-7 col-xs-12" type="text" name="country">
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="profile.php">
                                                <button type="button" class="btn btn-primary">Cancel</button>
                                                </a>
                                                <button type="submit" class="btn">Submit</button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                </div>
                <!-- End of Page content -->

                <!-- footer content -->
               <footer>
                    <?php include("../includes/layouts/footer1.php"); ?>
                </footer>
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

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <script src="js/custom.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ADP')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
   
</body>

</html>
<?php
    }
?>