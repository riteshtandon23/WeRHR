<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/userheader.php");?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Home <small>Summary</small></h2>
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

        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

            <div class="profile_img">

                <div id="crop-avatar">
                    <!-- Current avatar -->
                    <div class="avatar-view" title="Change Profile Picture">
                        <img src="images/userImage/<?php if($pic!==""){echo $pic;}else{ echo "users.png";}?>" alt="Avatar">
                    </div>
                </div>
                <!-- end of image cropping -->

            </div>

            <h3><?php  echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
            <?php
                $email=$_SESSION["email"];
                $row=mysqli_fetch_assoc($connection->query("call selectAddress('$email')"));
                //$result=selectAddress($email);
                //while($row = $result->fetch_assoc()){
                    $Address=$row['address'];
                    $city=$row['city'];
                    $state=$row['state'];
                    $country=$row['country'];
           //}
                //}
             ?>
            <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $Address.", ".$city.", ".$state;  ?>
                </li>
                <li><i class="fa fa-flag"></i> <?php echo $country; ?>
                </li>
            </ul>

            <!-- end of image cropping -->

        </div>
        <h3><?php  echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
        <?php 
            $resul10=selectAddress($_SESSION["email"]);
// mysqli_fetch_assoc($resul10) or die(mysqli_error($connection));
            $email=$_SESSION["email"];
            //$resul10=$connection->query("call selectAddress('$email')");
            // while ($row1=$resul10->fetch_assoc()) {
           
        while ($row1=$resul10->fetch_assoc()) {
               $Address=$row1['address'];
               $city=$row1['city'];
               $state=$row1['state'];
               $country=$row1['country'];
            }
         ?>
        <ul class="list-unstyled user_data">
            <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $Address.", ".$city.", ".$state.", ".$country; ?>
            </li>
        </ul>


            <a class="btn btn-success" href="edit_profile_user.php"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
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
        <div class="col-md-9 col-sm-9 col-xs-12">

            <div class="profile_title">
                <div class="col-md-6">
                    <h2>My Performances</h2>
                </div>
                <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                </div>
            </div>
            <!-- start of user-activity-graph -->
            <div id="graph_bar" style="width:100%; height:280px;"></div>
            <!-- end of user-activity-graph -->

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- start recent activity -->
                        <ul class="messages">
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1 text-info" aria-hidden="true" data-icon="&#57541;"></span>
                                        <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1" aria-hidden="true" data-icon="&#57778;"></span>
                                        <a href="#" data-original-title="">Download</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1 text-info" aria-hidden="true" data-icon="&#57541;"></span>
                                        <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1" aria-hidden="true" data-icon="&#57778;"></span>
                                        <a href="#" data-original-title="">Download</a>
                                    </p>
                                </div>
                            </li>

                        </ul>
                        <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <!-- start user projects -->
                        <table class="data table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Client Company</th>
                                    <th class="hidden-phone">Hours Spent</th>
                                    <th>Contribution</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">18</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>New Partner Contracts Consultanci</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">13</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Partners and Inverstors report</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">30</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">28</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("../includes/layouts/userfooter.php");?>	