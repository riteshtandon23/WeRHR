<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
<form class="form-horizontal form-label-left" action="<?php $_SERVER['PHP_SELF']?>" method="POST" novalidate>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                             <th>
                             <input type="checkbox" class="tableflat">
                             </th>
                             <th>Topic Name</th>
                             <th>Question Name</th>
                             <th>Question Type</th>
                             <th>Question Option</th>
                             <th>Question Answer</th>
                             <th>Question Description</th>
                             <th class=" no-link last"><span class="nobr">Action</span>
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                   
                    	$result= selectQuestion();
                        $i=0;
                    	while($row=$result->fetch_assoc())
						{
                            if($i==0){
                                $ep="even pointer";
                            }
                            else
                            {
                                $ep="odd pointer";
                            }
                    	    //echo "";
                            echo "<tr class=\"even pointer\">";
                            echo "<td class=\"a-center \">";
                            echo "<input type=\"checkbox\" class=\"tableflat\">";
                            echo "</td>";
                            echo "<td class=\" \">".$row["Topic_Name"]."</td>";
                            echo "<td class=\" \">".$row["Question_Name"]."</td>";
                            echo "<td class=\" \">".$row["Question_Type"]."</td>";
                            echo "<td class=\" \">".$row["Answer_Option"]."</td>";
                            echo "<td class=\" \">".$row["Answer"]."</td>";
                            echo "<td class=\" \">".$row["Question_Desc"]."</td>";
                            $id=$row["Question_Id"];
                            echo "<td class=\" last\"><div class=\"buttons\"><a href=\"editOption.php?id=$id\"><button type=\"button\" name=\"editquestion\" id=\"editquestion\" class=\"btn btn-info btn-xs\">Edit</button></a>
                                <input type=\"hidden\" name=\"QuestionId\" id=\"QuestionId\" class=\"tableflat\" value=".$row["Question_Id"]."></div>";
                            echo "</td>";
                            echo "</tr>";
                    	   //echo "";
                    	}
                    ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />

</div>
</form>

<?php include("../includes/layouts/footer.php");?>