     
         </div>
    </div>
</div>       
     <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">We are the Human Resource <a>WAH</a>.. |
                            <span class="lead"> <i class="fa fa-paw"></i> Lovely Infotech!</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
         <!-- /page content -->
    </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
 
    <script src="js/bootstrap.min.js"></script>
   

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->

    <script src="js/icheck/icheck.min.js"></script>
    <!-- form validation -->
    <script src="js/validator/validator.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/custom/formValidation.min.js"></script>
    <script src="js/custom/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/custom/jquery.validate.min.js"></script>
      <!-- Datatables -->
     <script src="js/datatables/js/jquery.dataTables.js"></script>
     <script src="js/datatables/tools/js/dataTables.tableTools.js"></script>
    <script src="js/custom/table.js"></script>

    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
	<!-- Gash Timmer-->
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
cook=getCookie("my_cookie8");//check existing cookie

if(cook==""){
   var seconds = 14400;//cookie not found, so set seconds=60
}else{
     seconds = cook;
     console.log(cook);
}

function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
	var hours = Math.round((minutes-30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    setCookie("my_cookie8",seconds,5); //store seconds to cookie

    document.getElementById('countdown').innerHTML = hours + ":" + minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Finished";
    } else {    
        seconds--;
    }
}

var countdownTimer = setInterval(secondPassed, 1000);
// End of Timmer
</script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#Edate').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            
        });
    </script>
    
    <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            //e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                return false;
            }else
            {
                 return true;  
            }

        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
    <script src="js/custom/adddeltexbox.js"></script> 
    <!--clock-->
    <script type="text/javascript" src="css/dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
    $('.clockpicker').clockpicker()
    .find('input').change(function(){
        console.log(this.value);
    });
    var input = $('#Stime').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
    });
    var input = $('#Etime').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
    });
    </script>
    <script type="text/javascript" src="js/custom/highlight.min.js"></script>
    
    <script type="text/javascript">
    hljs.configure({tabReplace: '    '});
    hljs.initHighlightingOnLoad();
    </script>
	
	
	<style type="text/css">
	
   .numbers {
		padding: 0px;
		width: 40px;
		text-align: center;
		font-family: Arial;             
		font-size: 28px;
		font-weight: bold;    /* options are normal, bold, bolder, lighter */
		font-style: normal;   /* options are normal or italic */
		color: #FFFFFF;       /* change color using the hexadecimal color codes for HTML */
	}
	.title {    /* the styles below will affect the title under the numbers, i.e., “Days”, “Hours”, etc. */
		border-style: none;
		padding: 0px 0px 3px 0px;
		width: 40px;
		text-align: center;
		font-family: Arial;
		font-size: 10px;
		font-weight: bold;    /* options are normal, bold, bolder, lighter */
		color: #FFFFFF;       /* change color using the hexadecimal color codes for HTML */
	}
	#table {
		width: 250px;
		height: 50px;
		border-style: ridge;
		border-width: 3px;
		border-color: #666666;       /* change color using the hexadecimal color codes for HTML */
		background-color: #222222;   /* change color using the hexadecimal color codes for HTML */
		margin: 0px auto;
		position: relative;   /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */
		top: 0px;             /* change to position the timer */
		left: 1px;            /* change to position the timer; delete this property and it's value to keep timer centered on page */
	}
	</style>
	<script type="text/javascript">

	//var current="Winter is here!";    //-->enter what you want the script to display when the target date and time are reached, limit to 20 characters
	var year=2016;    //-->Enter the count down target date YEAR
	var month=2;      //-->Enter the count down target date MONTH
	var day=18;       //-->Enter the count down target date DAY
	var hour=9;      //-->Enter the count down target date HOUR (24 hour clock)
	var minute=3;    //-->Enter the count down target date MINUTE
	var tz=-5;        //-->Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

	var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

	function countdown(yr,m,d,hr,min){
		theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
		var today=new Date();
		var todayy=today.getYear();
		if (todayy < 1000) {todayy+=1900;}
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
			document.getElementById('count2').innerHTML=current;
			document.getElementById('count2').style.display="inline";
			document.getElementById('count2').style.width="390px";
			document.getElementById('dday').style.display="none";
			document.getElementById('dhour').style.display="none";
			document.getElementById('dmin').style.display="none";
			document.getElementById('dsec').style.display="none";
			document.getElementById('days').style.display="none";
			document.getElementById('hours').style.display="none";
			document.getElementById('minutes').style.display="none";
			document.getElementById('seconds').style.display="none";
			document.getElementById('spacer1').style.display="none";
			document.getElementById('spacer2').style.display="none";
			return;
    }
    else {
			document.getElementById('count2').style.display="none";
			document.getElementById('dday').innerHTML=dday;
			document.getElementById('dhour').innerHTML=dhour;
			document.getElementById('dmin').innerHTML=dmin;
			document.getElementById('dsec').innerHTML=dsec;
			setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
		}
	}
</script>

</body>
</html>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>