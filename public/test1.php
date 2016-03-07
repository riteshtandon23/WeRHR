<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <script src="js/jquery.min.js"></script>
    <script>
    $(document).on('change','input[type=checkbox]',function(){
        alert('hhh');
    });
    </script>
</head>
<body>
 <div class="row">
      <div class=".col-md-6">
        <div class="jumbotron">
        
         <?php
         $d=date("Y-m-d");
         echo $d;
         $todayDate=date("Y-m-d::h:m");
         $examDate="";
         echo $todayDate;
         $result4=SelectExamDateTime(1002,$todayDate);
        while ($row2=$result4->fetch_assoc()) {
           $examDate=$row2['Exam_Date'];
        }
       // echo $examDate;
        ?>
      </div>
  </div>
  <div class=".col-md-6">
    <div class="panel panel-default">
    <div class="bs-example">
    <input type="checkbox" class="tableflat">
        <input id="searchupdate" class="typeahead form-control col-md-7 col-xs-12"  name="searchupdate" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
    </div>
  </div>
  </div>
  </div>
</body>
</html>
<?php
if(isset($connection))
{
  mysqli_close($connection);
}
?>