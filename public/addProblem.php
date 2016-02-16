<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
             <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Add Problem</a>
             </li>
        </ul>
         <div id="myTabContent" class="tab-content">
             <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                 <div class="x_content">
                    <form id="surveyForm" class="form-horizontal form-label-left" action="addSyllabus.php" method="POST" novalidate>
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
                                            if(($_POST['topicId'])==$row["topic_Name"])
                                            {
                                                 echo  "<option selected>".$row["topic_Name"]."</option>";     
                                            }
                                            else
                                            {
                                               echo  "<option>".$row["topic_Name"]."</option>"; 
                                            }
                                            
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="questionName">Question Title<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="questionName" class="form-control col-md-7 col-xs-12"  name="questionName" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="questionType">Type of Question<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="questionType" name="questionType" class="form-control" required>
                                    <option>Single Choice</option>
                                    <option>Multiple Choice</option>
                                </select>
                            </div>
                            </div>
                            <div class="item form-group">
                                <div class="item form-group">
                                    <div class="col-xs-offset-3 col-xs-5">
                                        <label><i><b>Hint: </b>Tick the checkbox for the correct option</i></label>
                                    </div>
                                 </div>   
                            </div>
                            <div class="item form-group wrapper">
                                <div class="item form-group">
                                    <div class="col-xs-offset-3 col-xs-5">
                                        <input class="form-control" type="text" id="option1" name="option[]" placeholder="Option 1" />
                                    </div>
                                    <button type="button" class="btn btn-primary addButton"><i class="fa fa-plus"></i></button><label><input type="checkbox" id="ans" class="checkbo"/></label>   
                                 </div>   
                            </div>
                            <!--div class="form-group hide" id="optionTemplate">
                                <div class="col-xs-offset-3 col-xs-5">
                                    <input class="form-control" type="text" name="option[]" placeholder="Option 2" />
                                </div>
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-primary removeButton"><i class="fa fa-minus"></i></button>
                                    <label><input type="checkbox" class="js-switch"/> Correct Ans</label>
                                </div>

                        </div-->
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="questionDesc">Question Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input id="questionAns" class="form-control col-md-7 col-xs-12"  name="questionAns" type="hidden">
                                <textarea id="questionDesc" name="questionDesc" class="form-control col-md-7 col-xs-12" placeholder="e.g www.w3school.com"></textarea>
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
         </div>
    </div>
</div>

                                            
<?php include("../includes/layouts/footer.php");?>