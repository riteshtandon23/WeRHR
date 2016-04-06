
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/github.min.css">
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
 
    <link href="css/icheck/flat/green.css" rel="stylesheet">
   

    <script src="js/jquery.min.js"></script>
</head>
<body>
 <div class="row">
  <div class="controls">
    <div class="col-md-6 col-sm-6 col-xs-12 has-feedback">
        <input type="text" name="Edate" class="form-control has-feedback-right col-md-7 col-xs-12" id="Edate" placeholder="select Date" aria-describedby="inputSuccess2Status">
        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="false"></span>
        <label id="jj">mmmmmmmmmmmmmmmmmmmmmmmmmmm</label>
        <input type="button" id="bt"> </input>

    </div>
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
