 jQuery(function () {
			jQuery('#datetimepicker1').datetimepicker({
				 minDate: new Date(),
    			format: "YYYY-MM-DD::HH:mm"
			});
			jQuery('#datetimepicker2').datetimepicker({
				minDate: new Date(),
    			format: "YYYY-MM-DD::HH:mm"
    			
			});
			jQuery('#datetimepicker3').datetimepicker({
				minDate: new Date(),
    			format: "LT"
    			
			});
			jQuery("#datetimepicker1").on("dp.change",function (e) {
       	 	//jQuery('#datetimepicker2').data("DateTimePicker").setMinDate(e.date);
		});
		jQuery("#datetimepicker2").on("dp.change",function (e) {
        //jQuery('#datetimepicker1').data("DateTimePicker").setMaxDate(e.date);
	});
});