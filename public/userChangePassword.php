<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/userheader.php");?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Password <small>Change Your Password Below!</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        <div class="x_content">
       
             <form id="form" role="form" action="user_register_process.php" method="post" class="login-form" data-toggle="validator">
                                        
                                        <div class="form-group">
                                        <label>Enter Old Password:</label>
                                            <input type="password" data-minlength="6" name="oldpassword" id="oldpassword" placeholder="Old Password..." class="form-password form-control" required>
                                            <div class="help-block">Minimum of 6 characters</div>
                                        </div>
                                        <div class="form-group">
                                        <label>Enter New Password:</label>
                                            <input type="password" name="newpassword" id="newpassword" placeholder="New Password..." class="form-password form-control" data-match="#password" data-match-error="Password did not match" required>
                                            <div class="help-block with-errors"></div>
                                            <div class="help-block">Minimum of 6 characters</div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="submit" name="submit" class="btn">Submit</button>
                                         </div>
                                    </form>

            <!--div class="bs-docs-section">
                <h1 id="glyphicons" class="page-header">Courses Available</h1>

                <h2 id="glyphicons-glyphs" style="margin-bottom: 35px">Please select your courses:</h2>
                <div class="bs-glyphicons">
                    
                </div>     
            </div-->
        </div>
        

</div>
<?php include("../includes/layouts/userfooter.php");?>	