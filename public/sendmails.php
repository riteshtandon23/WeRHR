<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">send emails</a>
            </li>
        </ul>
    <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="profile-tab">
        <div class="x_content">

            <form class="form-horizontal form-label-left" action="controllers/sendemails.php" method="POST" novalidate>
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Academic">Select Email<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_multiple form-control" multiple="multiple" id="multiplesendemail" name="multiplesendemail[]" >
                   <?php 
                        $result=selectAllEmail();
                        while ($row=$result->fetch_assoc()) {
                            echo "<option>".$row['email']."</option>";
                        }

                     ?>
                </select>
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Subject">Subject<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="Subject" class="form-control col-md-7 col-xs-12"  name="Subject" placeholder="subject" required="required" type="text">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Messagebody">Message<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="Messagebody" name="Messagebody" class="form-control col-md-7 col-xs-12" placeholder="e.g Message body" required="required"></textarea>
            </div>
        </div>
         <div class="form-group">
        <span>
            <?php
                 if (isset($_GET['mesg'])&&$_GET['mesg']!=="000011") 
                {
             ?>
                    <label style="color:red" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "Fail to send";?></h4></Label> 

            <?php
                }elseif(isset($_GET['mesg'])&&$_GET['mesg']==="000011"){ 
            ?>
            <label style="color:green" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-check fa-2x"></span></strong><?php echo "Successfully send";?></h4></Label>
            <?php } ?>
        </span>
    </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button id="sendmail" name="sendmail" type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>
</div>
</div>
<script>
    $(document).ready(function () {
        
        $(".select2_multiple").select2({
            // maximumSelectionLength: 10,
            placeholder: "Mutiple Selection Email here",
            allowClear: true
        });
    });
</script>

<?php include("../includes/layouts/footer.php");?>