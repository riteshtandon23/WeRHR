<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Add Topic</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Edit Topic</a>
            </li>
        </ul>
    <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        <div class="x_content">
            <form class="form-horizontal form-label-left" action="create.php" method="post" novalidate>

                <span class="section">Adding Topic</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicName">Enter Topic name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="topicName" class="form-control col-md-7 col-xs-12"  name="topicName" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
                            <span>
                            <?php
                                 if (isset($_GET['key'])&&$_GET['key']==="000000001111111") 
                                {
                             ?>
                                    <label style="color:red" class="control-label col-md-12 col-sm-12 col-xs-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "Course You enter is already exist. Please check!!!";?></h4></Label> 

                            <?php
                                } elseif(isset($_GET['key'])&&$_GET['key']==="000000001111100"){
                                    ?>
                                    <label style="color:green" class="control-label col-md-12 col-sm-12 col-xs-12"><h4><strong><span class="fa fa-check fa-2x"></span></strong><?php echo "Sucessfully added.";?></h4></Label> 
                                    <?php
                                }
                            ?>
                        </span>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="submit" name="submit" type="submit" class="btn btn-primary">ADD</button>
                        </div>
                        
                    </div>
            </form>
        </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab2">
        <div class="x_content">
            <form class="form-horizontal form-label-left" action="updateTopic.php" method="post" novalidate>

                <span class="section">Update Topic</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="searchtopic">Enter Old Topic name <span class="required">*</span>
                        </label>
                        <div class="dropdown">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="searchtopic" class="form-control col-md-7 col-xs-12" autocomplete="off" name="searchtopic" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
                            
                            <ul id="display" class="dropdown-menu" role="menu">
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newtopic">Enter New Topic name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="newtopic" class="form-control col-md-7 col-xs-12"  name="newtopic" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="submit" name="submit" type="submit" class="btn btn-primary">Update</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
        </div>
        </div>

<?php include("../includes/layouts/footer.php");?>