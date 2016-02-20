<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" />
<html>
<head>
<title>Countdown from 100 seconds</title>
<script type = "text/javascript">

function hasLocalStorage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch(e){
        return false;
    }
}

function CountDown(tickNotify, fireAction) {
    var now = function() { return new Date().getTime(); };
    var ticker = null;
    var alarmAt = 0;
    var fire = function() {
        if (ticker) {
            clearInterval(ticker);
            ticker = null;
            alarmAt = now();
        }
        fireAction();
    }
    var tick = function() {
        var diff = Math.round((alarmAt - now()) / 1000);
        var secs = diff<0 ? 0 : diff;
        tickNotify(secs);
        if (secs==0) { fire(); }
    }

    this.fire = fire;
    this.start = function(secs) {
        alarmAt = now() + (1000 * secs);
        if (hasLocalStorage()) {
            if (!localStorage.alarmAt || (now() >= localStorage.alarmAt)) { localStorage.alarmAt = alarmAt; }
            alarmAt = localStorage.alarmAt;
        }
        ticker = setInterval(tick, 1000);
    }
}

var countDown = new CountDown(
        function(secs) { document.getElementById("countdown").innerHTML = secs; },
        function() { 
            if (confirm("Are you sure you wish to go to Google?")) {
                window.location.href = 'category.php';
            } else {
                document.getElementById("link1").innerHTML = "Back.";
            }
        });

countDown.start(100);
</script>
</head>
<body>
<p>
<a id="link1" href="javascript:countDown.fire()">
<p>your Remaining is: <span id="countdown" style="font-weight: bold;"></span> Seconds</p>
</a>
</p>
</body>
</html>
