         </div>
    </div>
</div>       
     <!-- footer content -->
                <footer >
                    <div class="" >
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
    <div class="modal fade" id="replyfeedback" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
          <form class="form-horizontal form-label-left" action="controllers/sendemails.php" method="POST" novalidate>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Reply Email</h4>
            </div>
            <div class="modal-body">
             <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Messagebody">To:<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                     <input id="multiplesendemail" class="form-control col-md-7 col-xs-12"  name="multiplesendemail[]" placeholder="subject" required="required" type="text">
                     <input id="Subject" class="form-control col-md-7 col-xs-12"  name="Subject" placeholder="subject" required="required" type="hidden" value="reply to your feedback">
                </div>
            </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Messagebody">Message<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="Messagebody" name="Messagebody" class="form-control col-md-7 col-xs-12" placeholder="e.g Message body" required="required"></textarea>
                     <input type="hidden" id="fromfeedback" name="fromfeedback"></input>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button id="sendmail" name="sendmail" type="submit" class="btn btn-primary">Send</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          
        </div>
      </div>
    <div class="modal fade" id="readfeedback" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span class="fa fa-check fa-2x" style="color: green"></span>Email read</h4>
                </div>
                <div class="modal-body">
                    <p><h5><b>From:</b> <label id="from"></h5> </label></p>
                    <p><h5><b>Message:</b></h5></p>
                    <p><label id="message"></label></p>
                   
                </div>
                <div class="modal-footer">
                    <button id="reply" type="button" class="btn btn-info" data-dismiss="modal">Reply</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
          </div>
        </div>

        
    <script src="js/bootstrap.min.js"></script>

    <script src="js/custom/gettingquestion/QuestionVisibility.js"></script>
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    
    <!-- bootstrap progress js -->
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
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
     <!-- sparkline -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
     <!--script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script-->
     <script src="js/datatables/tools/js/dataTables.tableTools.js"></script>
    <script src="js/custom/table.js"></script>
      <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="js/flot/date.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
   

    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#inputExamdate').daterangepicker({
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
    <!--search using Ajax and Jquery-->
    <script type="text/javascript">
        $(document).ready(function(e){
            $('#searchtopic').keyup(function(){
                var x=$(this).val();
                $('#display').show();
                if(x!="")
                {
                    $.ajax({
                    type: 'GET',
                    url:'search.php',
                    data:'key='+x,
                    success:function(data)
                    {
                        $('#display').html(data);
                    },

                });
                }else
                {
                    $('#display').css('display','none');
                }
            });
            $('#display').on('click','li',function(){
                //alert($(this).text());
                $('#searchtopic').val($(this).text());
                $('#display').css('display','none');
            });

        });
    </script>
 <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2015',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <!-- /datepicker -->
<script src="js/input_mask/jquery.inputmask.js"></script>
<script src="js/select/select2.full.js"></script>
    <script>
    //load image
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ADP')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
   <script type="text/javascript">
       // $(".child_menu li").click(function(){
       //      //alert($(this)[0].firstChild.textContent);
       //      //alert($(this)[0].parent().textContent);
       // });
       //  $(".side-menu li ul li").click(function(){
            
       //      alert($(this)[0].firstChild.textContent);
       // });
       var i=0;
        $(".side-menu li").click(function(){
            if(i==0)
            {
                //alert("0");
                var child=$(this)[0].firstChild.textContent;
                localStorage.setItem('Children',JSON.stringify(child));
                i=1;
            }else{
                //alert("1");
                var parent=$(this)[0].firstChild.textContent;
                localStorage.setItem('Parent',JSON.stringify(parent));
                i=0;
            }
            //alert($(this)[0].firstChild.textContent);
       });
 $(document).ready(function(){
          var parent=JSON.parse(localStorage.getItem('Parent'));
          var child=JSON.parse(localStorage.getItem('Children'));
         if(parent!==null && child!==null)
         {
             $('#parent123').text(parent);
             $('#child123').text(child);
         }
        });
   </script>
<script type="text/javascript">

    $(document).on('click','#menu121',function(){
        //alert($(this).data('id'));
        var data=$(this).data('id');
        var res=data.split("$$");
        $('#inputemail').val(res[0]);
        $('#multiplesendemail').val(res[0]);
        $('#from').text(res[0]);
        $('#message').text(res[1]);
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/changeAdminPass.php',
            data:'key='+res[0],
            success:function(data){

            }
        });
        $("#readfeedback").modal('show');
    });
    $('#reply').on('click',function(){
        
         
          $("#replyfeedback").modal('show');
    });
</script>
 <script>
        NProgress.done();
    </script>
</body>

</html>
