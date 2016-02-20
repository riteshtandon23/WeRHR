<html>
<head>
<style type="text/css">
#count {
    border: none; 
    text-align: center; 
    font-family: Arial; 
    font-size: 26px; 
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    font-style: italic;     /* options are normal or italic */
    color: #66FFCC;    /* change color using the hexadecimal color codes for HTML */
    background-color: transparent;     /* change the background color using the hex color codes for HTML */
    }
</style>
</head>

<body>
<div style="text-align: center;">
    <div style="margin-left: auto; margin-right: auto; text-align: center; position: relative; ">
        <div id="count"></div>
    </div>
</div>

<script>

/*  Change the items below to create your countdown target date and announcement once the target date and time are reached.  */
var current="Winter is here!";        //—>enter what you want the script to display when the target date and time are reached, limit to 20 characters
var year=2016;        //—>Enter the count down target date YEAR
var month=12;          //—>Enter the count down target date MONTH
var day=21;           //—>Enter the count down target date DAY
var hour=18;          //—>Enter the count down target date HOUR (24 hour clock)
var minute=38;        //—>Enter the count down target date MINUTE
var tz=-5;            //—>Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

//—>    DO NOT CHANGE THE CODE BELOW!    <—
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

function countdown(yr,m,d,hr,min){
theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
var today=new Date();
var todayy=today.getYear();
if (todayy < 1000) {
todayy+=1900; }
var todaym=today.getMonth();
var todayd=today.getDate();
var todayh=today.getHours();
var todaymin=today.getMinutes();
var todaysec=today.getSeconds();
var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
var dd=futurestring-todaystring;
var dday=Math.floor(dd/(60*60*1000*24)*1);
var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){
document.getElementById('count').innerHTML=current;
return;
}
else {
document.getElementById('count').innerHTML=+dday+ " days, "+dhour+" hours, "+dmin+" minutes, and "+dsec+" seconds";
setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
}
}

countdown(year,month,day,hour,minute);

</script>
</body>
</html>
