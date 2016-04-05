<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/userheader.php");?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Courses <small>Courses Available</small></h2>
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

            <div class="x_content">
                                   
                <div class="col-md-1 col-sm-1 col-xs-9 profile_left">

                    <div class="profile_img">

                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <div class="avatar-view" title="Change the avatar" enctype='form-data/multipart     '>
                            <?php
                            $result = mysqli_query($connection,"SELECT Profile_pic FROM users WHERE email='". $_SESSION["email"]."'");
                                      $row=mysqli_fetch_array($result,MYSQL_ASSOC);
                            ?>
                                <img src="images/userImage/<?php echo $row['Profile_pic'];?>" alt="Avatar"  id="img" style='border-radius:10px;  height:220px ;width:220px;position:absolute; z-index:1;' >
                                <input type='x' name='images' id="images" style='border-radius:20px;width:220px; height:220px; position:relative;  z-index:2; opacity:0;'   /> 
                            </div>

                            <!-- Cropping modal -->
                             
                            <!-- /.modal -->

                            <!-- Loading state -->
                            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->

                    </div>
                    <h3>Samuel Doe</h3>

                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                        </li>

                        <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                        </li>

                        <li class="m-top-xs">
                            <i class="fa fa-external-link user-profile-icon"></i>
                            <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li>
                    </ul>

                    <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br />

                    <!-- start skills -->
                    <h4>Skills</h4>
                    <ul class="list-unstyled user_data">
                        <li>
                            <p>Web Applications</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                        </li>
                        <li>
                            <p>Website Design</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                            </div>
                        </li>
                        <li>
                            <p>Automation & Testing</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                            </div>
                        </li>
                        <li>
                            <p>UI / UX</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                        </li>
                    </ul>
                    <!-- end of skills -->

                </div>
                <div class="container">                    
                    <form class="form-horizontal" role="form" method="post" action="updateProfileDetails.php" enctype="multipart/form-data">


                <div class="form-group" >
                <?php 
                    $result = mysqli_query($connection,"SELECT * FROM users WHERE email='". $_SESSION["email"]."'");
                    $row=mysqli_fetch_array($result,MYSQL_ASSOC)
                ?>
                 
                <label class="control-label col-sm-4">FirstName: </label>


                <div class="col-sm-4">

                  <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo $row['firstname'];?>"></br>
                </div>
                 
                <div class="form-group">
                <label class="control-label col-sm-4" >LastName:</label>

             
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo $row['lastname'];?>"></br>
                </div>
              
                <div class="form-group">
                    <label class="control-label col-sm-4" >Email:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $row['email'];?>"></br>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Date of Birth</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $row['DOB'];?>"></br>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" >Mobile No:</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="<?php echo $row['contact'];?>"></br>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" >Address</label>
                            <div class="col-sm-4">
                                <textarea id="Address" name="Address" class="form-control col-md-7 col-xs-12" placeholder="Address where he/she stay"><?php echo $row['address'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" >City:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter city name" value="<?php echo $row['city'];?>"></br>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" >State:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="State" name="State" placeholder="Enter state name" maxlength="25" value="<?php echo $row['state'];?>"></br>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" >Country:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="Country" name="Country" placeholder="Enter country Name" value="<?php echo $row['country'];?>"></br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" >Profile</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="image" name="image" onchange='readURL(this)'> </br></br>
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                    </center>

                    </form>
           
               
               
               
               
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
                    </div>
                </div>
            </div>
        </div>

</div>
<?php include("../includes/layouts/userfooter.php");?>	