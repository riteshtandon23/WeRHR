<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?> 
<div class="x_content">
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
   <?php include("../includes/layouts/footer.php");?> 