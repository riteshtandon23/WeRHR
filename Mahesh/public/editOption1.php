<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
                 
                <div id="answersheet" style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
	    	    <div class="panel panel-info">
	    		    <div class="panel-heading">
	    			    <div class="panel-title">Answer To The Question
						<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Your Remaining Time is:<span id="countdown" class="timer"></span></label>
						</div>
						
	    		    </div>
	    		    <div class="panel-body">
                        <form id="selectoption" method="POST" class="form-horizontal" role="form" onsubmit="return validate_submit()">  
							<div class="form">
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
                                                    <label class="control-label col-md-9 col-sm-9 col-xs-12" for="QuestionName">Question Name<span class="required">:</span>
                                                    
                                                        <?php echo $qn;//$row['Question_Name'];?>
                                                    
													</label>
                                                    
                                                </div><br>
                                                
                                                    <?php
                                                    $i='A';
                                                    foreach ($res as $key => $value)
                                                    {
                                                        echo "<div class=\"item form-group\">";
                                                        echo "<label class=\"control-label col-md-2 col-sm-2 col-xs-12\" for=\"choice\">".$i."&nbsp&nbsp&nbsp<input name='radio'type='radio' id='radio'/><span class=\"required\"></span></label>";
                                                        echo "<div class=\"col-md-8 col-sm-8 col-xs-12\">";
														echo "<div class=\"form-control col-md-7 col-xs-12\">"; 
                                                        echo $value;
														echo "</div>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        $i++;
                                                    }
                                                ?>                                  
                                                <div class="form-group">
                                                    <div class="col-md-9 col-md-offset-2">
                                                        <button id="submit" name="submit" type="submit" class="btn btn-success">Previous</button>
                                                   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <button id="submit" name="submit" type="submit" class="btn btn-success">Next</button>
                                                     </div>
                                                </div>
                                            </form>
											</div>
											</div>
											</div>
											</div>

                                        
<?php include("../includes/layouts/footer.php");?>