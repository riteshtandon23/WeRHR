<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>WeRHR!</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	   <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
<body>
<?php
	session_start();  
    if(isset($_GET['CName']))
    {
    	$_SESSION["CName"]=$_GET['CName'];
    	if(isset($_GET['id']))
    	{
    		$id=bindec($_GET['id']);
    		$id=(int)($id-11111);
    		$_SESSION['encryptid']=$_GET['id'];
    		//echo $id;
    		$result=selectUserWithId($id);
    		while ($row=$result->fetch_assoc()) {
    			$uid=$row['email'];
    		}
    		$_SESSION['email']=$uid;
    	}
    }
?>
<div class="container">
<div id="answersheet" style="margin-top:50px" class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12 col-lg-7 col-lg-offset-3">
	<div class="panel panel-info">
				<?php $todayDate=date("Y-m-d");?>
		<div class="panel-heading">
			<div class="panel-title">INSTRUCTION</div>
		</div>
		<div class="panel-body">
			<form id="updateform1" method="POST" class="form-horizontal" role="form" action="addSyllabus.php">  
				<div class="form">
					<div class="form-group">
						<ul>
							<li><label>To Start the Test Click "Start Test" Button Below.</label></li>
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
    <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
	    <span>
	        <?php
	             if (isset($_GET['key'])&&$_GET['key']==="111111000") 
	            {
	         ?>
	                <label style="color:red" class="control-label col-md-12 col-sm-12 col-xs-12 col-lg-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "You were not select for the Exam.";?></h4></Label> 

	        <?php
	            }elseif (isset($_GET['key'])&&$_GET['key']==="111000111"){

	            
	        ?>
	        <label style="color:green" class="control-label col-md-12 col-sm-12 col-xs-12 col-lg-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "You were not select for the Exam.";?></h4></Label>
	        <?php }elseif (isset($_GET['key'])&&$_GET['key']==="11100011111"){

	            
	        ?>
	        <label style="color:green" class="control-label col-md-12 col-sm-12 col-xs-12 col-lg-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "You were not allowed to Attemp the Exam twice.";?></h4></Label>
	        <?php } ?>
	    </span>
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