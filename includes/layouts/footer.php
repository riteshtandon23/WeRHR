     
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
</body>

</html>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>