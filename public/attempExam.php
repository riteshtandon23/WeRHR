 <?php require_once("../includes/all_functions.php");?>
 <?php  session_start();  ?>
 <?php 
    if(!isset($_SESSION['TtoGo']))
    {
        redirect_to("logout_process.php");
        // session_start();
        // session_destroy();
    }
  ?>
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
    .btn-circle{
            width: 40px;
            height: 40px;
            text-align: center;
            padding: 0;
            font-size: 15px;
            color: black;
            line-height: 0.1;
            border-radius: 30px;
        }
    </style>
    <script src="js/jquery.min.js"></script>
    <script src="js/custom/gettingquestion/gettingQuestion.js"></script>
    <script src="js/custom/angular.js"></script>
    <script src="js/custom/refreshresume.js"></script>
    <script>
        var timetogo='<?=$_SESSION["TtoGo"]?>';
         //console.log(timetogo);
    </script>
</head>
<body data-ng-controller="TestController" ondragstart="return false" onselectstart="return false">
<form role="form" method="post" ng-submit="submit()">
    <div class="container">

    <div class="row">
	<div id="answersheet" style="margin-top:50px; background:#FFFFFF" class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12 col-lg-6 col-lg-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container-fluid panel-container">
            <div class="panel-title">
                <div class="col-xs-6">
               
                     <label>Course Name:<?php echo $_SESSION["CName"]; ?></label><br>
                    <label>Course Code:<?php echo $_SESSION["CId"]; ?></label>
                </div>
                <div class="col-xs-6 text-right">
                    <h5>Time:<label id="timer1" ng-model="appTitle">{{appTitle}}</label></h5>

                </div>
                <input type="hidden" id="topicId" value="<?php echo $_SESSION["CId"]; ?>"></input>
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
                    <button id="Finish" type="submit" name="next" class="btn btn-primary">Finish</button>
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
        <input type="hidden" id="tmpans" name="tmpans">
        <div class="panel panel-default col-md-2 hidden-xs hidden-sm " style="margin-top:50px;background:#FFFFFF;">
        <div class="panel-heading">
            <h3>Instruction</h3>
        </div>
            
        <div class="panel-body" style="min-height: 310px;">
        <div class="notification">
            
        </div>
        <div style="bottom: 0; position: absolute;">
         <label><button id="prev" name="previous" type="button" class="btn btn-primary btn-circle"></button>Not Visit</label>
         <label><button id="next" type="button" name="next" class="btn btn-circle" style="background-color: yellow"></button>Answered</label>
         <label><button id="reset" type="button" name="reset" class="btn btn-circle" style="background-color: red"></button>Not Answered</label>
        </div>
        </div>
        <div class="panel-footer"></div>
        </div>
    
    </div>
    </div>
    </form>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom/gettingquestion/disableMouserightClick.js"></script>
</body>
</html>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>