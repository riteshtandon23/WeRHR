
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <<!-- link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/github.min.css"> -->
    <!-- Custom styling plus plugins -->
<!--     <link href="css/custom.css" rel="stylesheet"> -->
 
<!--     <link href="css/icheck/flat/green.css" rel="stylesheet"> -->
   

    <script src="js/jquery.min.js"></script>
</head>
<body>
 <div class="row">
  <div class="controls">
  <?php 
     $fromtime=strtotime("2016-04-18 09:14:00");
        $totime=strtotime("2016-04-18 09:16:00");
        //echo $fromtime;
        echo round(abs($totime-$fromtime)/60,2)." Minutes ago";
   ?>
</div>
 </div>
  <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/moment.min2.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#bt').on('click',function(){
                $('#jj').html('5');
            });
            
        });
    </script>
</body>
</html>
