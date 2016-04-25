<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">set Exam Date and Time</a>
            </li>
        </ul>
    <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="profile-tab">
        <div class="x_content">

            <form class="form-horizontal form-label-left" action="examDetails.php" method="POST" novalidate>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicId">Select Course Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="topicId" name="topicId" class="form-control" required>
                    <?php
                        $result=select_Domain();
                        while($row =$result->fetch_assoc())
                        {
                            //var_dump($row);
                            echo  "<option>".$row["topic_Name"]."</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Edate">Exam Date<span class="required">*</span>
                </label>
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-6 col-sm-6 col-xs-12 has-feedback">
                                <input type="text" name="inputExamdate" class="form-control has-feedback-right col-md-7 col-xs-12" id="inputExamdate" placeholder="select Date" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="false"></span>
 
                            </div>
                        </div>
                    </div>
            </div> 
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Stime">Start Time<span class="required">*</span>
                </label>
                <div class="control-group">
                    <div class="controls">
                        <div class="col-md-6 col-sm-6 col-xs-12 has-feedback">
                            <input type="text" id="Stime" name="Stime" class="form-control has-feedback-right col-md-7 col-xs-12" id="single_cal" placeholder="E.g 00:00:00" aria-describedby="inputSuccess2Status">
                            <span class="glyphicon glyphicon-time form-control-feedback right" aria-hidden="false"></span>
 
                        </div>
                    </div>
                </div>
            </div> 
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Etime">End Time<span class="required">*</span>
                </label>
                <div class="control-group">
                    <div class="controls">
                        <div class="col-md-6 col-sm-6 col-xs-12 has-feedback">
                            <input type="text" id="Etime" name="Etime" class="form-control has-feedback-right col-md-7 col-xs-12" id="single_cal" placeholder="E.g 00:00:00" aria-describedby="inputSuccess2Status">
                            <span class="glyphicon glyphicon-time form-control-feedback right" aria-hidden="false"></span>
 
                        </div>
                    </div>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TotalQuestion">Total Number of Question<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="TotalQuestion" name="TotalQuestion" required="required" min="1" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div> 
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Academic">Select Email<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_multiple form-control" multiple="multiple" id="multipleemail" name="multipleemail[]">
                   <?php 
                        $result=selectEmail();
                        while ($row=$result->fetch_assoc()) {
                            echo "<option>".$row['email']."</option>";
                        }

                     ?>
                </select>
                 <span>
            <?php
                 if (isset($_GET['key'])&&$_GET['key']==="000000001111111") 
                {
             ?>
                    <label style="color:red" class="control-label col-md-12 col-sm-12 col-xs-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "Cannot add at this moment. please try Later!!!";?></h4></Label> 

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
                <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
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