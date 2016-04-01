<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
if(isset($_POST['submit'])){
      $course = $_POST['topicId'];
    $date= $_POST['Edate'];
    $stime = $_POST['Stime'];
    $etime = $_POST['Etime'];
    $email = $_POST['email'];
    $que = $_POST['que'];
    $pmark = $_POST['Pmark'];
    $nmark = $_POST['Nmark'];
    
    $query1 = mysqli_query($connection,"INSERT INTO exam_generation(course_name,exam_date,start_time,end_time,email,total_que,positive_marks,negative_marks) VALUES('$course','$date','$stime','$etime','$email','$que','$pmark','$nmark')");
    echo "INSERT INTO exam_generation(course_name,exam_date,start_time,end_time,email,total_que,positive_marks,negative_marks) VALUES('$course','$date','$stime','$etime','$email','$que','$pmark','$nmark')";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 

      <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/github.min.css">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
 
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/floatexamples.css" rel="stylesheet" />
     <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
     <link href="css/custom/search.css" rel="stylesheet">
  
  
   
</head>
  <body class="nav-md">

    <div class="container body">

        <div class="main_container">
  
        <?php   include("../includes/layouts/header_and_sidemenu.php");?>
  <div class="right_col" role="main" style="background-color:white">
            <form class="form-horizontal form-label-left" action="emailagain.php" method="post">

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
                                <input type="text" name="Edate" class="form-control has-feedback-right col-md-7 col-xs-12" id="Edate" placeholder="select Date" aria-describedby="inputSuccess2Status">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TotalQuestion">Email<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="email" name="email" required="required" min="1" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12" placeholder="Enter the Email" >
                </div>
            </div>
      
      
      
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TotalQuestion">Total Number of Question<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="que" name="que" required="required" min="1" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div> 
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Pmark">Positive Marks<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Pmark" class="form-control col-md-7 col-xs-12"  name="Pmark" placeholder="Marks per question" required="required" type="text">
                </div>
            </div> 
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nmark">Negative Marks <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Nmark" class="form-control col-md-7 col-xs-12"  name="Nmark" placeholder="Minus Mark if wrong attempt" required="required" type="text">
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

</div>

</body>
<script type="text/javascript">
       
$(function() {
    $( "#email" ).autocomplete({
        source: 'demo1.php'
    });
});

    </script>
  <script>
$(function() {
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
    
    $( "#email" ).bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        minLength: 1,
        source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            $.getJSON("demo1.php", { term : extractLast( request.term )},response);
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( ", " );
            return false;
        }
    });
});
</script>



    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  
</html>
 <?php include("../includes/layouts/footer.php"); ?>