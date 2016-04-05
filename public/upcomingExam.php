<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/userheader.php");?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Exams <small>Upcoming Exams</small></h2>
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

            <?php
                $username = $_SESSION['email'];
                $row = mysqli_fetch_assoc($connection->query("SELECT username,courses,total_courses,courses_id FROM user_courses WHERE username='$username'"));
                $courses = $row['courses'];     #courses column -> all courses with separator 
                $course_name = explode("#", $courses);
                $course_id = $row['courses_id'];
                $course_id1 = explode("#", $course_id);
                for ($i=0;$i<$row['total_courses'];$i++)
                {
                    $row1 = mysqli_fetch_assoc($connection->query("SELECT Topic_id FROM topic WHERE Topic_Name='$course_name[$i]'"));
                    $topic_ids[$i] = $row1['Topic_id'];    
                    #html code goes here and display with query WHERE $topic_ids[$i]
                    $row2 = mysqli_fetch_assoc($connection->query("SELECT Start_Time,End_Time,Exam_Date,Total_Question FROM exam_details WHERE Topic_id='$course_id1[$i]'"));
                    echo "Course Name: ".$course_name[$i]."<br>";
                    echo "Exam date: ".$row2['Exam_Date']."<br>";
                    echo "Start time:".$row2['Start_Time']." End time: ".$row2['End_Time']."<br>";
                    echo "Total Questions: ".$row2['Total_Question']."<br><br>";
                    //<--div class="col-md-3 col-sm-12 col-xs-12">
                        //<div>
                           // <ul class="list-unstyled top_profiles scroll-view">
                               // <?php
                                // $row1 = mysqli_fetch_assoc($connection->query("SELECT * FROM exam_details WHERE Topic_id='$topic_ids[$i]'"));
                                // echo "<li class=\"media event\">";
                                // echo "<a class=\"pull-left border-aero profile_thumb\">";
                                // echo "<i class=\"fa fa-info-circle\"></i>";
                                // echo "</a>";
                                // echo "<div class=\"media-body\">";
                                // echo "<a class=\"title\" >".$course_name[$i]."</a>";
                                // echo "<p><strong>Exam Date: </strong> ".$row1['Exam_Date']."</p>";                                     
                                // echo "<p><strong>Exam Time: </strong> ".$row1['Start_Time']." - ".$row1['End_Time']."</p>";
                                // echo "<p> <small>Total Question: ".$row1['Total_Question']."</small>";
                                // echo "</p>";
                                // echo "</div>";
                                // echo "</li>";  
                                
                            //<!--/ul>
                        //</div>
                    //</div> -->
                }
                //echo $string;
                //
            ?>
            <!--div class="bs-docs-section">
                <h1 id="glyphicons" class="page-header">Courses Available</h1>

                <h2 id="glyphicons-glyphs" style="margin-bottom: 35px">Please select your courses:</h2>
                <div class="bs-glyphicons">
                    
                </div>     
            </div-->
        </div>

</div>
<?php include("../includes/layouts/userfooter.php");?>	