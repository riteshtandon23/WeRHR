<html>
<head>
</head>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
 function count() {
 
    var startTime = document.getElementById('hms').innerHTML;
    var pieces = startTime.split(":");
    var time = new Date();    time.setHours(pieces[0]);
    time.setMinutes(pieces[1]);
    time.setSeconds(pieces[2]);
    var timedif = new Date(time.valueOf() - 1000);
    var newtime = timedif.toTimeString().split(" ")[0];
    document.getElementById('hms').innerHTML=newtime;
    setTimeout(count, 1000);
}
count(6);

  </script>

    
<body>
<div id="hms"></div>
</body>