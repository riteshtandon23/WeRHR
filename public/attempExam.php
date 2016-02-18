<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>WeRHR</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/github.min.css">
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <style>
    label.checkbox-label input[type=checkbox]{
        position: relative;
        vertical-align: middle;
        bottom: 1px;
        margin-right: 10px;
    }
    label.radio-label input[type=radio]{
        position: relative;
        vertical-align: middle;
        bottom: 1px;
        margin-right: 10px;
    }
    </style>
    <script src="js/jquery.min.js"></script>
    <script src="js/custom/jquery.countdownTimer.min.js"></script>
    <script src="js/custom/gettingQuestion.js"></script>
</head>
<body>
<form role="form">
    <div class="container">
	<div id="answersheet" style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-xm-8 col-sm-offset-2">
        <div class="panel panel-info">
        <div class="panel-heading">
            <div class="container-fluid panel-container">
            <div class="panel-title">
                <div class="col-xs-6">
                    <h6>Course Name:</h6>
                    <h6>Course Code:</h6>
                </div>
                <div class="col-xs-6 text-right">
                    <h5>Time:<label id="timer"></label></h5>
                </div>
                <input type="hidden" id="topicId" value="1002"></input>
            </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="container-fluid panel-container">
                <div class="col-xs-8">
                    <div class="row">
                        <h4> <label id="question"></label></h4>
                     </div>
                    <div class="row form-group option">
                        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="panel-footer">
        <div class="container">
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button id="prev" name="previous" type="button" class="btn btn-primary">Previous</button>
                    <button id="next" type="button" name="next" class="btn btn-primary">Next</button>
                </div>
                <div class="">
                        <p class="pull-right">We are the Human Resource <a>WAH</a>.. |
                            <span class="lead"> <i class="fa fa-paw"></i> Lovely Infotech!</span>
                        </p>
                    </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </form>
<script src="js/bootstrap.min.js"></script>
 <script>
    $(function(){
        $('#timer').countdowntimer({
            hours : 0,
            minutes :1,
            seconds : 0
        });
    });
    //setTimeout(function(){ alert("Hello"); }, (1000*60));

</script>
</body>
</html>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>