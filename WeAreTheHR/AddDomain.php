<?php require_once("./includes/dbconnection.php");?>
<?php require_once("./includes/all_functions.php");?>
<?php include("./includes/layouts/header.php"); ?>
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Add Topic</a></li>
    <li><a data-toggle="tab" href="#menu1">Add Exam Syllabus</a></li>
    <li><a data-toggle="tab" href="#menu2">Exam Details</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content col-xs-6">
    <div id="home" class="tab-pane fade in active">
      <h1>Topic Name</h1>

      <div class="container">
    <div class="row">
        <form role="form" action="create.php" method="post">
            <div class="col-lg-4">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Topic Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputDomain" id="InputDomain" placeholder="E.g PHP,JAVA,C#" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="input-group">
                       <label for="error" name="error" id="error"></label> 
                    </div>
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h1>Syllabus</h1>
      	<div class="row">
        <form role="form" name="form1" id="form1" method="post" action="addSyllabus.php">
            <div class="col-lg-8">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Select Domain Name</label>
                    <div class="input-group">
                         <select  class="form-control" name="DomainId" id="DomainId">
							<?php
								$result=select_Domain();
								while($row=mysqli_fetch_assoc($result))
								{
									//var_dump($row);
									echo  "<option>".$row["Domain_Name"]."</option>";
								}
							?>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                    <div class="form-group">
                    	<label for="InputName">Topic Name</label>
                    	<div class="input-group">
                        	<textarea row="5"  class="form-control" name="InputTopic" id="InputTopic" placeholder="E.g Array from Java" required></textarea>
                        	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    	</div>
                	</div>
                 <div class="form-group">
                    	<label for="InputName">Total question</label>
                    	<div class="input-group">
                        	<input type="text" class="form-control" name="InputTotalQues" id="InputTotalQues" placeholder="E.g. 10 question from for loop" required>
                        	<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    	</div>
                	</div>
                	<div class="form-group">
                    	<label for="InputName">Time To Complete</label>
                    	<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="InputStartDateTime" id="InputStartDateTime"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                	</div>
                	<div class="form-group ">
                    	<label for="InputName">Reference</label>
                    	<div class="input-group">
                        	<textarea row="5" class="form-control" name="Inputref" id="Inputref" placeholder="E.g. www.anysite.com"></textarea>
                    	<span class="input-group-addon"><span class="glyphicon"></span></span>
                    	</div>
                </div>
                <div class="form-group">
                    	<label for="InputName">Any Suggestion</label>
                    	<div class="input-group">
                        	<textarea row="5"  class="form-control" name="Inputsugestion" id="Inputsugestion" placeholder="E.g. Books or pdf"></textarea>
                    	<span class="input-group-addon"><span class="glyphicon"></span></span>
                    	</div>
                </div>
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h1>Exam Details</h1>
		    <div class="row">
        <form role="form" name="form1" id="form1" method="post" action="submit.php">
            <div class="col-lg-8">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Select Domain Name</label>
                    <div class="input-group">
                         <select  class="form-control" name="countryId2" id="countryId2">
							<?php
								$result=select_Domain();
								while($row=mysqli_fetch_assoc($result))
								{
									//var_dump($row);
									echo  "<option>".$row["Domain_Name"]."</option>";
								}
							?>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                    <div class="form-group">
                    	<label for="InputName">Exam Date and Time: From</label>
                    	<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="InputStartDateTime" id="InputStartDateTime"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                	</div>
                 <div class="form-group">
                    	<label for="InputName">Exam Date and Time:To</label>
                    	<div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="InputStartDateTime" id="InputStartDateTime"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                	</div>
                	<div class="form-group ">
                    	<label for="InputName">Expected results</label>
                    	<div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" name="InputExpectedresult" id="InputExpectedresult"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
           
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-info pull-right">
            </div>
        </form>
    </div>  
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
<?php include("./includes/layouts/footer.php"); ?>