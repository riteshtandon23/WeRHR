<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>WeRHR!</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
<body>
<?php
	session_start();  
	$_SESSION["CName"]=$_GET['CName'];
	$result=select_Domain_id($_SESSION["CName"]);
    $id="";
    $time="";
    while($row=$result->fetch_assoc())
    {
        $id=$row["Topic_id"];
    }
    $result2=SelectExamTime($id);
    while($row=$result2->fetch_assoc())
    {
        $time=$row["Time"];
    }
    $_SESSION["CId"]=$id;
    $_SESSION["TtoGo"]=$time;
?>
<div class="container">
<div id="answersheet" style="margin-top:50px" class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12 col-lg-7 col-lg-offset-3">
	<div class="panel panel-info">
				
		<div class="panel-heading">
			<div class="panel-title">INSTRUCTION</div>
		</div>
		<div class="panel-body">
			<form id="updateform1" method="POST" class="form-horizontal" role="form" action="addSyllabus.php">  
				<div class="form">
					<div class="form-group">
						<ul>
							<li><label>To Start the Test Click "Start Test" Button Below.<?php echo $_SESSION['CName']; ?></label></li>
							<li><label>Total Number of question 1-30|Time alloted:1-15 minutes.</label></li>
							<li><label>Each Question carries 1 mark each no negative mark.</label></li>
							<li><label>Please chose the write option for all question for the write answer</label></li>
							<li><label>Don't Refresh the Page during the Test.</label></li>

						</ul>
					
						<div class="col-md-offset-1 col-md-20">
							<input type="checkbox" id="required-checkbox" name="checkbox" value="check" onclick="CheckIfChecked()">&nbsp <B><i>I agree with the terms and conditions</i></B><br><br>
						</div>
					

					
						<div class="col-md-offset-0 col-md-20">
							<div id="submit-button-container" style="display:none;">
								<button type="submit" name="Agree" class="btn btn-primary btn-block">Start Test</button>
							</div>
						</div>	
					</div>

				</div>	
			</form>	
		</div>	
    </div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript"><!--
function CheckIfChecked()
{
   var CheckboxID = "required-checkbox";
   var SubmitButtonContainerID = "submit-button-container";
   if( document.getElementById(CheckboxID).checked ) { document.getElementById(SubmitButtonContainerID).style.display = "block"; }
   else { document.getElementById(SubmitButtonContainerID).style.display = "none"; }
}
CheckIfChecked();
//-->
</script>
</body>
</html>