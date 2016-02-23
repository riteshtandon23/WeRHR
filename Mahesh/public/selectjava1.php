<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
                                        <form class="form-horizontal form-label-left" action="updateOption.php" method="POST" novalidate>
                                                <span class="section">Adding Question and Answer</span>
                                                <?php
                                                    $id = $_GET['id'];
                                                    $result=selectOption($id);
                                                    while($row=$result->fetch_assoc())
                                                    {
                                                        $qn=$row['Question_Name'];
                                                        $qt=$row['Question_Type'];
                                                        $opt=$row['Answer_Option'];
                                                        $ans=$row['Answer'];
                                                        $qd=$row['Question_Desc'];

                                                    }
                                                    $res=explode(",", $opt);
                                                ?>
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QuestionName">Question Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="QuestionName" class="form-control col-md-7 col-xs-12"  name="QuestionName" type="text" value="<?php echo $qn;//$row['Question_Name'];?>">
                                                        <input id="questionId" class="form-control col-md-7 col-xs-12"  name="questionId" type="hidden" value="<?php echo $id;//$row['Question_Name'];?>">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="questionType">type of Question<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select id="questionType" name="questionType" class="form-control" required>
                                                        <option <?php if($qt=="Single Choice"){echo "selected";}?> >Single Choice</option>
                                                        <option <?php if($qt=="Multiple Choice"){echo "selected";}?> >Multiple Choice</option>
                                                        <option <?php if($qt=="Description"){echo "selected";}?> >Description</option>
                                                    </select>
                                                </div>
                                                </div>

                                                    <?php
                                                    $i=1;
                                                    foreach ($res as $key => $value)
                                                    {
                                                        echo "<div class=\"item form-group\">";
                                                        echo "<label class=\"control-label col-md-3 col-sm-3 col-xs-12\" for=\"choice\">Optoin".$i."<span class=\"required\">*</span></label>";
                                                        echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                                                        echo "<input id=\"choice[]\" class=\"form-control col-md-7 col-xs-12\"  name=\"choice[]\" type=\"text\" required=\"required\" value=\"";
                                                        echo $value;
                                                        echo "\">";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        $i++;
                                                    }
                                                ?>
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Questiondetails">Question Details<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="Questiondetails" class="form-control col-md-7 col-xs-12"  name="Questiondetails" type="text" value="<?php echo $qd;//$row['Question_Desc'];?>">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="questionAns">Answer of the Question<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="questionAns" class="form-control col-md-7 col-xs-12"  name="questionAns" required="required" type="text" value="<?php echo $ans;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <button id="submit" name="submit" type="submit" class="btn btn-success">update</button>
                                                     </div>
                                                </div>
                                            </form>

                                        
<?php include("../includes/layouts/footer.php");?>