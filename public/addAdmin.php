<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
             <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Add Admin</a>
             </li>
        </ul>
         <div id="myTabContent" class="tab-content">
             <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                 <div class="x_content">
                    <form class="form-horizontal form-label-left" action="addAdmintoDB.php" method="POST" novalidate>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminName">Admin Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="AdminName" class="form-control col-md-7 col-xs-12"  name="AdminName" placeholder="First Name" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminLName">Admin Last Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="AdminLName" class="form-control col-md-7 col-xs-12"  name="AdminLName" placeholder="Last Name" required="required" type="text">
                                </div>
                            </div>
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AEmail">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="AEmail" name="AEmail" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter Admin Email">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminContact">Admin Contact No<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="AdminContact" class="form-control col-md-7 col-xs-12"  name="AdminContact" placeholder="Contact No." required="required" type="number">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AdminAddress">Admin Address<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="AdminAddress" name="AdminAddress" class="form-control col-md-7 col-xs-12" placeholder="Address where he/she stay"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="submit" name="submit" type="submit" class="btn btn-dark">Submit</button>
                             </div>
                        </div>
                    </form>
                 </div>
            </div>
         </div>
    </div>
</div>

                                            
<?php include("../includes/layouts/footer.php");?>