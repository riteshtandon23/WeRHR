<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <!-- link href="css/bootstrap.min.css" rel="stylesheet">

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

</div>
<?php
session_start();
// $number=array(20,1,5,20,7,3,8);
// $number1=$number;
// sort($number);
// $number=array_reverse($number);
// $number=array_slice($number,0,5,true);
// var_dump($number);
// echo "<br>";
// $key=array_search(20, $number1);
// echo $key."<br>";
// echo date("Y-m-d",strtotime(date('Y-01-01')));
// echo "<br>";
// echo date("Y-m-d",strtotime("last day of previous month"));
// echo "<br>";
// echo date("Y-m-t",strtotime("2016-02-04"));
// echo "<br>";
// echo date("F",strtotime("2016-02-04"));
$counter_name = "counter.txt";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $todaydate=date("Y-m-d");
  $que="select date from visitors where date='$todaydate'";
  $result = $connection->query($que);
  $row = mysqli_fetch_assoc($result);
var_dump($row);
  echo $row['date'];
  if($row['date']!==$todaydate)
  {
    echo "string";
    $stmt=$connection->prepare("call addvisitor(?,?)");
    $stmt->bind_param('si',$todaydate,$counterVal);
    $stmt->execute();
  }else{
    echo "stud";
    $stmt=$connection->prepare("call updatevisitor(?,?)");
    $stmt->bind_param('si',$todaydate,$counterVal);
    $stmt->execute();
  }
  
  
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 
}
echo "You are visitor number $counterVal to this site";
session_destroy();
?>
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
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>