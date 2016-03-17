<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="container">
<?php 
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$result=getNotificationWithId($id);
    while($row=$result->fetch_assoc())
    {
        $tid=$row["Topic_id"];
        $topicName="";
        $result1=select_Domain_Name($tid);
        while($row1=$result1->fetch_assoc())
        {
            $topicName=$row1['Topic_Name'];
        }
        $Edate=$row['Exam_Date'];
        $Stime=$row['Start_Time'];
        $Etime=$row['End_Time'];
        $Tques=$row['Total_Question'];
        $exam_date=date_create($Edate);
        $exam_date=date_format($exam_date,"d-m-Y");
    }
}

 ?>
	<form class="form-horizontal form-label-left" action="examDetails.php" method="POST" novalidate>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicId">Select Course Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="topicId" name="topicId" class="form-control" disabled="disabled">
                    <?php
                        $result=select_Domain();
                        while($row =$result->fetch_assoc())
                        {
                            //var_dump($row);
                            echo  "<option ";if($topicName===$row["topic_Name"]){echo "selected";}
                            echo ">".$row["topic_Name"]."</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Edate">Exam Date<span class="required">*</span>
                </label>
                    <div class="control-group">
                    <input type="hidden" value="<?php echo $id; ?>" id="id" name="id"></input>
                        <div class="controls">
                            <div class="col-md-6 col-sm-6 col-xs-12 has-feedback">
                                <input type="text" name="Edate" class="form-control has-feedback-right col-md-7 col-xs-12" id="Edate" value="<?php echo $exam_date; ?>" aria-describedby="inputSuccess2Status">
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
                            <input type="text" id="Stime" name="Stime" class="form-control has-feedback-right col-md-7 col-xs-12" id="single_cal" value="<?php echo $Stime; ?>" aria-describedby="inputSuccess2Status">
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
                            <input type="text" id="Etime" name="Etime" class="form-control has-feedback-right col-md-7 col-xs-12" id="single_cal" value="<?php echo $Etime; ?>" aria-describedby="inputSuccess2Status">
                            <span class="glyphicon glyphicon-time form-control-feedback right" aria-hidden="false"></span>
 
                        </div>
                    </div>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TotalQuestion">Total Number of Question<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="TotalQuestion" name="TotalQuestion" value="<?php echo $Tques; ?>" required="required" min="1" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div> 
           
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button id="FinalUpdate" name="FinalUpdate" type="submit" class="btn btn-primary">update</button>
            </div>
        </div>
    </form>
</div>

<?php include("../includes/layouts/footer.php");?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>