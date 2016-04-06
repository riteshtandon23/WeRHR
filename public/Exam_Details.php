<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Choose Student for Exam</a>
            </li>
            <li role="presentation" class="active"><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">set Exam Date and Time</a>
            </li>
        </ul>
    <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">
        
    <form class="form-horizontal form-label-left" action="examDetails.php" method="POST" novalidate>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicId">Select Course Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="topicId" name="topicId" class="form-control" onchange="getUserEmail(this.value);">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Examdate">Select Exam Date <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="Examdate" name="Examdate" class="form-control" onchange="DisplayActiveParticipant(this.value);">
                    
                    </select>
                    <label id="error" style="color: red"></label>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Examdate">Display All Users<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" name="DisplayAll" id="DisplayAll"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <table id="DisplayParticipant" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="headings">
                                         <th>
                                         <input type="checkbox" name="anything" id="anything" class="tableflat"/>
                                         </th>
                                         <th>User Name</th>
                                         <th>User Email</th>
                                         
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                   <?php 
                                         // $result = selectUserNameAndEmail();
                                         // while ($row=$result->fetch_assoc()) {
                                         //     echo "<tr class=\"even pointer\">";
                                         //     echo "<td class=\" \"><input type=\"checkbox\" name=\"selectUserForExam\" id=\"selectUserForExam\" value=\"".$row["email"]."\"></td>";
                                         //     echo "<td class=\" \">".$row["firstname"]."</td>";
                                         //     echo "<td class=\" \">".htmlspecialchars($row["email"])."</td>";
                                         //     echo "<td class=\" \"></td>";
                                         //     echo "</tr>";
                                         // }
                                    ?>

                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>
    </form>

        </div>
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