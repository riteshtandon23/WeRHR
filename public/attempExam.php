<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html data-ng-app="TestApp">
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
    body{
        background-color: white;
    }
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
    .panel-footer{

        height: 100px;
         bottom: 0px;
    }
    #answersheet{
        min-height: 100%;
        height: auto;
        background-color: blue;

       
    }
    </style>
    <script src="js/jquery.min.js"></script>
    <script src="js/custom/gettingquestion/gettingQuestion.js"></script>
    <script src="js/custom/angular.js"></script>
    <script src="js/custom/refreshresume.js"></script>
</head>
<body data-ng-controller="TestController">
<form role="form">
    <div class="container">

    <div class="row">
	<div id="answersheet" style="margin-top:50px; background:#FFFFFF" class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12 col-lg-6 col-lg-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container-fluid panel-container">
            <div class="panel-title">
                <div class="col-xs-6">
                     <label>Course Name: {{course}}</label><br>
                    <label>Course Code:  {{courseCode}}</label>
                </div>
                <div class="col-xs-6 text-right">
                    <h5>Time:<label id="timer">{{appTitle}}</label></h5>
                </div>
                <input type="hidden" id="topicId" value="1002"></input>
            </div>
            </div>
        </div>
        <div class="panel-body" style="max-height: 300px;min-height: 300px;">
            <div class="container-fluid panel-container">
                <div class="col-xs-8 question">
                    <div class="row">
                        <h4> <label id="question"></label></h4>
                     </div>
                    <div class="row form-group option">
                        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="panel-footer clearfix">
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                <button id="clear" name="clear" type="button" class="btn btn-primary">Clear Selection</button>
                    <button id="prev" name="previous" type="button" data-ng-click="saveTime()" class="btn btn-primary">Previous</button>
                    <button id="next" type="button" data-ng-click="saveTime()" name="next" class="btn btn-primary">Next</button>
                     <button id="reset" type="button" data-ng-click="reset()" name="reset" class="btn btn-primary">Finish</button>
                </div>
                <div class="clearfix">
                        <p class="pull-right">We are the Human Resource <a>WAH</a>.. |
                            <span class="lead"> <i class="fa fa-paw"></i> Lovely Infotech!</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>

            </div>
        </div>
    </div>
    </div>
        
        <div class="panel panel-default col-md-2 hidden-xs hidden-sm " style="margin-top:50px;background:#FFFFFF;">
        <div class="panel-heading">
            <h3>Instruction</h3>
        </div>
            
        <div class="panel-body" style="min-height: 310px;">
        <div class="notification">
            
        </div>
        <div style="bottom: 0; position: absolute;">
         <label><button id="prev" name="previous" type="button" class="btn btn-round">&nbsp;&nbsp;</button>Not Visit</label>
         <label><button id="next" type="button" name="next" class="btn btn-round" style="background-color: yellow">&nbsp;&nbsp;</button>Answered</label>
         <label><button id="reset" type="button" name="reset" class="btn btn-round" style="background-color: red">&nbsp;&nbsp;</button>Not Answered</label>
        </div>
        </div>
        <div class="panel-footer"></div>
        </div>
    
    </div>
    </div>
    </form>
<script src="js/bootstrap.min.js"></script>
 <!--script>
    $(function(){
        $('#timer').countdowntimer({
            hours : 0,
            minutes :1,
            seconds : 0
        });


    });
    //setTimeout(function(){ alert("Hello"); }, (1000*60));

</script-->
</body>
</html>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>