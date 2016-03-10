<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="container">
	<form class="form-horizontal form-label-left" action="examDetails.php" method="POST" novalidate>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicId">Select Course Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="topicId" name="topicId" class="form-control" onchange="getQuestionnDate(this.value);">
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
                    <select id="Examdate" name="Examdate" class="form-control">
                    
                    </select>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <table id="course_details" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="headings">
                                         <th>
                                         <input type="checkbox" name="anything" id="anything" class="tableflat"/>
                                         </th>
                                         <th>Course Name</th>
                                         <th>Question Name</th>
                                         
                                         <th class=" no-link last"><span class="nobr">Exam Date</span>
                                         </th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    
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

<?php include("../includes/layouts/footer.php");?>