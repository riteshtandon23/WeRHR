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
            <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Exam Details</a>
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
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="submit" name="submit" type="submit" class="btn btn-success">ADD</button>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicName">Enter Topic name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="topicName" class="form-control col-md-7 col-xs-12"  name="topicName" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="submit" name="submit" type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
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
                                <input type="text" name="Edate" class="form-control has-feedback-right col-md-7 col-xs-12" id="Edate" placeholder="select Date" aria-describedby="inputSuccess2Status">
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
                    <input type="number" id="TotalQuestion" name="TotalQuestion" required="required" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div> 
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Pmark">Positive Marks<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Pmark" class="form-control col-md-7 col-xs-12"  name="Pmark" placeholder="Marks per question" required="required" type="text">
                </div>
            </div> 
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nmark">Negative Marks <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Nmark" class="form-control col-md-7 col-xs-12"  name="Nmark" placeholder="Minus Mark if wrong attempt" required="required" type="text">
                </div>
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button id="submit" name="submit" type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
 
<?php include("../includes/layouts/footer.php");?>