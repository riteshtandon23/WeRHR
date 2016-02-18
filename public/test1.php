<<<<<<< HEAD
<!doctype html>
<html>
<head>
<title>PHP Countdown Timer</title>
<style>
.green{color:green;}
 
h1{
font-size:3em;
font-weight:bold;
font-family:Arial, Helvetica, sans-serif;
}
 
</style>
</head>
<body>
<?php
$date = strtotime("December 3, 2014 2:00 PM");
$remaining = $date - time();
$days_remaining = floor($remaining / 86400);
$hours_remaining = floor(($remaining % 86400) / 3600);
?>
 
<h1>There are <span class="green"> <?php echo $days_remaining?></span> days and <span class="green"> <?php echo $hours_remaining?></span> hours left</h1>
=======

<!DOCTYPE html>
<html>
<head>
    <title></title>
     <script src="js/jquery.min.js"></script>
     <script src="js/custom/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
</head>
<body>
 <div class="row">
      <div class=".col-md-6">
        <div class="jumbotron">
        <h1>Ajax Search Box using Node and MySQL <small>Codeforgeek Tutorial</small></h1>
         <button type="button" class="btn btn-primary btn-lg">Visit Tutorial</button>
      </div>
  </div>
  <div class=".col-md-6">
    <div class="panel panel-default">
    <div class="bs-example">
        <input id="searchupdate" class="typeahead form-control col-md-7 col-xs-12"  name="searchupdate" placeholder="e.g PHP,JAVA, etc" required="required" type="text">
    </div>
  </div>
  </div>
  </div>
>>>>>>> abb971bf645d02bb5bd60dc1459679a099f3f77c
</body>
</html>