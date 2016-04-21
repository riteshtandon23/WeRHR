<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
             <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Add Admin</a>
             </li>
        </ul>
        <?php 
            $result=slectAdminProfile($_SESSION['AID']);
            $row=$result->fetch_assoc();

         ?>
         <div id="myTabContent" class="tab-content">
             <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
             
                 <div class="x_content">
                    <form class="form-horizontal form-label-left" action="addAdmintoDB.php" method="POST" novalidate enctype="multipart/form-data">
                           
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-right">
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminName">Admin Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="AdminName" class="form-control col-md-7 col-xs-12"  name="AdminName" Value="<?php echo $row['Admin_Name']; ?>" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminLName">Admin Last Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="AdminLName" class="form-control col-md-7 col-xs-12"  name="AdminLName" Value="<?php echo $row['Admin_Lastname']; ?>" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AEmail">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="AEmail" name="AEmail" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['Email']; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminContact">Admin Contact No<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="AdminContact" class="form-control col-md-7 col-xs-12"  name="AdminContact" Value="<?php echo $row['Contact']; ?>" required="required" type="number">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminAddress">Admin Address<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="AdminAddress" name="AdminAddress" class="form-control col-md-7 col-xs-12"><?php echo $row['Address']; ?></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="UpdateAdminProfile" name="UpdateAdminProfile" type="submit" class="btn btn-dark">Update</button>
                             </div>
                        </div>
                        </div>
                    </form>
                 </div>
            </div>
         </div>
    </div>
</div>

                                            
<?php include("../includes/layouts/footer.php");?>