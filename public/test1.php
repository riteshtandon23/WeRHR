
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
</body>
</html>