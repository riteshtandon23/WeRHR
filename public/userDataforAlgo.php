<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/userheader.php");?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Required for Algorithm <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        <div class="x_content">

            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="user_Data_Algo.php" method="post">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="academics">Academic<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" id="academics" name="academics" required="required">
                           <?php 
                                    $result=selectAcademic();
                                    while ($row=$result->fetch_assoc()) {
                                        echo "<option>".$row['Qualification']."</option>";
                                    }

                                 ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="percentage">Percentage <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="percentage" name="percentage" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience">Background<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="experience" name="experience" required="required">
                            <option value="" selected>Select</option>
                            <option value="Experienced">Experienced</option>
                            <option value="Fresh">Fresh</option>
                        </select>
                    </div>
                    <br />
                    <?php
                        if (isset($_GET['msg'])) 
                        {
                    ?>
                    <label style="color:red"><?php echo $_GET['msg'];?></Label>
                    <?php
                        }
                    ?>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
</div>
<?php include("../includes/layouts/userfooter.php");?>	