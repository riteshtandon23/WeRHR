<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<div class="x_content">
            <form class="form-horizontal form-label-left"  novalidate>

                <span class="section">Get Your Salary</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AgeRange">Age Range<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="AgeRange" name="AgeRange" class="form-control" required>
                                <?php 
                                    $result=selectAgeRange();
                                    while ($row=$result->fetch_assoc()) {
                                        echo "<option>".$row['Age_Range']."</option>";
                                    }

                                 ?>
                                   
                                </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Academic">Academic<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="qualification" onchange="getPercentage(this.value);">
                            <option value="null"> select Course Here</option>
                               <?php 
                                    $result=selectAcademic();
                                    while ($row=$result->fetch_assoc()) {
                                        echo "<option>".$row['Qualification']."</option>";
                                    }

                                 ?>
                            </select>
                        </div>
                    </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="SelectPercentage">Select Percentage<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required="required" class="form-control" id="SelectPercentage">
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Background">Background<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select id="Background" name="Background" class="form-control" required>
                                <?php 
                                    $result=selectBackground();
                                    while ($row=$result->fetch_assoc()) {
                                        echo "<option>".$row['Experience']."</option>";
                                    }

                                 ?>
                                </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TestName">Test Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select id="TestName" name="TestName" class="form-control" required>
                                <?php 
                                    $result=selectTest();
                                    while ($row=$result->fetch_assoc()) {
                                        echo "<option>".$row['Test_Name']."</option>";
                                    }

                                 ?>
                                </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="showSalary" name="showSalary" type="button" class="btn btn-primary">Show Salary</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
        

<?php include("../includes/layouts/footer.php");?>