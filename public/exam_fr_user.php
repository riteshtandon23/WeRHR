<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<?php
if(isset($_POST['submit'])){

	       	$topic= ($_POST['topicId']);
				$date= ($_POST['Examdate']);
				$name=$topic. '_ '.$date;
	
        $query1 = mysqli_query($connection,"INSERT INTO exam_name(topic,date,name) VALUES('$topic','$date','$name')");  
		print '<script type="text/javascript">'; 
print 'alert("exam is created successfully")'; 
print '</script>'; 
                    
}	
?>
<div class="container">
	<form class="form-horizontal form-label-left" action="exam_fr_user.php" method="POST" novalidate>

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
						
						 <div class="col-sm-4">
                          <button type="submit" class="btn btn-primary" id="submit" name="submit" style="margin-left:400px">Submit</button>
  
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
