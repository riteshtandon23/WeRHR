<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>

<div class="item form-group" id="myform">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CompanyNameAlgo">Company Name<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="CompanyNameAlgo" class="form-control col-md-7 col-xs-12"  name="CompanyNameAlgo" placeholder="Company Name e.g Microsoft" required="required" type="text" value="<?php if(isset($_SESSION["COMPNAME"])){echo $_SESSION["COMPNAME"];} ?>">
        <label id="messages" style="color:red"></label>

        <span>
            <?php
                 if (isset($_GET['id'])&&$_GET['id']!=="000011") 
                {
             ?>
                    <label style="color:red" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-close fa-2x"></span></strong><?php echo "You Have not set the Exam Date!!!";?></h4></Label> 

            <?php
                }elseif (isset($_GET['id'])&&$_GET['id']==="000011"){

                
            ?>
            <label style="color:green" class="control-label col-md-7 col-sm-4 col-xs-12"><h4><strong><span class="fa fa-check fa-2x"></span></strong><?php echo "Successfully Done!!!.";?></h4></Label>
            <?php } ?>
        </span>
    </div>

</div>
<div class="x_content">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel" >
            
            <div class="x_content" style="height:300px; overflow: scroll;">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addAlgorithmDetails.php" method="post" novalidate>

                <span class="section">Age Range</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="AgeRange">Age<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="AgeRange" class="form-control col-md-7 col-xs-12"  name="AgeRange" placeholder="Set Age range e.g 18-25 etc" data-inputmask="'mask': '99-99'" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="AgePercentage">Percentage or Marks<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="AgePercentage" class="form-control col-md-7 col-xs-12"  name="AgePercentage" placeholder="Percentage for particular Age Range e.g 20%." required="required" type="text">
                            <input id="Company_Name" Name="Company_Name" type="hidden">

                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddAge" name="AddAge" type="submit" class="btn btn-primary">Add</button>

                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
     <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
        
            <div class="x_content" style="height:300px; overflow: scroll;">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addAlgorithmDetails.php" method="post" novalidate>

                    <span class="section">Test</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topicId">Select Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <select id="topicId" name="topicId" class="form-control" required>
                            <?php
                                $result=select_Domain();
                                while($row =$result->fetch_assoc())
                                {
                                    //var_dump($row);
                                    echo  "<option>".$row["topic_Name"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                      <div class="item form-group">
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Edate">Exam Date<span class="required">*</span>
                        </label>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="col-md-9 col-sm-9 col-xs-9 has-feedback">
                                        <input type="text" name="inputExamdate" class="form-control has-feedback-right col-md-7 col-xs-12" id="inputExamdate" placeholder="select Date" aria-describedby="inputSuccess2Status">
                                        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="false"></span>
         
                                    </div>
                                </div>
                            </div>
                    </div> 
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="TestPercentage">Percentage or Marks<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="TestPercentage" class="form-control col-md-7 col-xs-12"  name="TestPercentage" placeholder="Percentage for particular test e.g 20%." required="required" type="text">
                            <input id="Company_Name3" Name="Company_Name3" type="hidden">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddTest" name="AddTest" type="submit" class="btn btn-primary">Add</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="x_content">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            
            <div class="x_content" style="height:300px; overflow: scroll;">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addAlgorithmDetails.php" method="post" novalidate>

                    <span class="section">Background</span>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="Background">Background<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="Background" class="form-control col-md-7 col-xs-12"  name="Background" placeholder="Background e.g Fresh, Experienceetc" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="BackgroundPercentage">Percentage or Mark<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="BackgroundPercentage" class="form-control col-md-7 col-xs-12"  name="BackgroundPercentage" placeholder="Percentage for particular Backgroung e.g 20%." required="required" type="text">
                            <input id="Company_Name2" Name="Company_Name2" type="hidden">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddBack" name="AddBack" type="submit" class="btn btn-primary">Add</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
     <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
        
            <div class="x_content" style="height:300px; overflow: scroll;">
                <br />
                <form class="form-horizontal form-label-left" action="controllers/addAlgorithmDetails.php" method="post" novalidate>

                    <span class="section">Academic Details</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="Academic">Course<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="Academic" class="form-control col-md-7 col-xs-12"  name="Academic" placeholder="course prefer e.g MBA,MCA etc." required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="PercentageRange">Percentage Range<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="PercentageRange" class="form-control col-md-7 col-xs-12"  name="PercentageRange" placeholder="Range of Percentage e.g 90%-100%." data-inputmask="'mask': '99-99'" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="AcademicPercentage">Percentage or Marks<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input id="AcademicPercentage" class="form-control col-md-7 col-xs-12"  name="AcademicPercentage" placeholder="Percentage for particular course e.g 20%." required="required" type="text">
                            <input id="Company_Name1" Name="Company_Name1" type="hidden">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <button id="AddAca" name="AddAca" type="submit" class="btn btn-primary">Add</button>
                            <!--button type="submit" name="delete" class="btn btn-primary">Delete</button-->
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
   
</div>
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>

<?php include("../includes/layouts/footer.php");?>