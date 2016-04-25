<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/userheader.php");?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Analysis <small>Salary Predictor</small></h2>
                
                <div class="clearfix"></div>

            </div>
        <div class="x_content">
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="InputCompanyName">Select Company<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="InputCompanyName" name="InputCompanyName" class="form-control" onchange="ShowCompanyExam(this.value);" required>
                <option value="null">Select Company Name</option>
                    <?php 
                        $result=CompanyAcademin();
                        while ($row=$result->fetch_assoc()) {
                            echo "<option>".$row['Company']."</option>";
                        }

                     ?>
                       
                    </select>
            </div>
        </div>
        </div>
        <div class="x_content">
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="InputRole">Select Role<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="InputRole" name="InputRole" class="form-control" required>
                       
                    </select>
            </div>
        </div>
        </div>
         <div class="x_content">
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="InputtestName">Select Test<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="InputtestName" name="InputtestName" class="form-control" onchange="ShowSalaryPredict(this.value);" required>
                       
                    </select>
            </div>
        </div>
        </div>
        <label id="salaryrediction"></label>

</div>
<script type="text/javascript">
	 function ShowSalaryPredict(value2)
	 {
	 	compname=$('#InputCompanyName').val();
	 	role=$('#InputRole').val();
	 	
	 	//alert(role);
	    if(value2!=="null" && role!=="null")
	    {
	    	$.ajax({
	    		type:'GET',
	    		dataType:'json',
	    		url:"controllers/getSalaryforUser.php",
	    		data:'compname='+compname+'&testname='+value2+'&role='+role,
	    		success:function(data){
	    				$('#salaryrediction').html(data);
	    		}
	    	});
	    }
	 }
	 function ShowCompanyExam(value){
	 	$('#InputRole').find('option').remove();
	 	$.ajax({
	        type:'GET',
	        dataType:'json',
	        url:'controllers/getPercentage.php',
	        data:'key='+value,
	        success:function(data){
	        	$('#InputRole').append($("<option></option>").attr("value","null").text("Select Role"));
	            for(i=0;i<data.length;i++ )
	            {
	               $('#InputRole').append($("<option></option>").attr("value",data[i]).text(data[i])); 
	            }
	        }
	    });
	    $('#InputtestName').find('option').remove();
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:'controllers/getPercentage.php',
	        data:'id4='+value,
	        success:function(data){
	        	$('#InputtestName').append($("<option></option>").attr("value","null").text("Select Exam"));
	            for(i=0;i<data.length;i++ )
	            {
	               $('#InputtestName').append($("<option></option>").attr("value",data[i]).text(data[i])); 
	            }
	        }
	    });
	 }
</script>
<?php include("../includes/layouts/userfooter.php");?>  