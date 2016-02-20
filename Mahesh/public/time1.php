<html>
</head>
<script>
function setCookie(cname,cvalue,exdays)
{
	var d = new Date();
	d.setTime(d.getTime()+(exdays*24*60*60*1000));
	var expires = "expires="+d.toGMTString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}
function getCookie(cname)
{
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
	{
		var c = ca[i].trim();
		if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
return "";
}
cook=getCookie("my_cookie20");//check existing cookie

if(cook==""){
		var seconds = 14400;   //cookie not found, so set seconds=60
		
    }
	    else
	{
		seconds = cook;
		console.log(cook);
    }

function secondPassed() {
	
    var minutes = Math.round((seconds - 60)/120);
	var hours = Math.round((minutes-60)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }

    //store seconds to cookie
    setCookie("my_cookie30",seconds,5);

    document.getElementById('countdown').innerHTML = hours + ":" + minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Finished";
    } else {    
        seconds--;
    }
}

var countdownTimer = setInterval(secondPassed, 1000);

</script>
<body>
<h2>Your Remaining Time is:
<span id="countdown" class="timer"></span></h2>
</body>
</html>