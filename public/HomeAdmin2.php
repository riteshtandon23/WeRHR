<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>          

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Exam Conduct<small>This Year</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <canvas id="canvas000"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Total Users Attemp Exam<small>This Year</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <canvas id="canvas_bar"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
                <h2>Total users for Particular course</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <a href="showallcourse.php">
            <div class="x_content">

                <table class="" style="width:100%">
                    <tr>
                        <th style="width:37%;">
                            <p>Top 5</p>
                        </th>
                        <th>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                <p class="">Course</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <p class="">Total users</p>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                        </td>
                        <td>
                            <table class="tile_info">
                            <?php 
                                $resulttopic=select_Domain();
                                $course=null;
                                $totalInteresr=0;
                                while ($rowtopic=$resulttopic->fetch_assoc()) {
                                   $data[]=$rowtopic['topic_Name'];
                                }
                                foreach ($data as $key => $value) {
                                    $result4=getUserCourseInterest($value);
                                    $row=$result4->fetch_assoc();
                                    $totalCourseCount[]=$row['total'];
                                    $coursename[]=$value;
                                    $totalCourseCountcopy[]=$row['total'];
                                }
                                sort($totalCourseCount);
                                $totalCourseCount=array_reverse($totalCourseCount);
                                $totalCourseCount=array_slice($totalCourseCount,0,5,true);
                                
                             ?>
                             <?php 
                                foreach ($totalCourseCount as $key => $value) {
                                    $color=null;
                                    $pos=array_search($value, $totalCourseCountcopy);
                                    unset($totalCourseCountcopy[$pos]);
                                    switch ($key) {
                                        case 0:
                                           $color="blue";
                                            break;
                                        case 1:
                                            $color="green";
                                            break;
                                        case 2:
                                            $color="purple";
                                            break;
                                        case 3:
                                            $color="aero";
                                            break;
                                        case 4:
                                           $color="red";
                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }
                                  ?>

                                <tr>
                                    <td>
                                        <p><i class="fa fa-square <?php echo $color; ?>"></i><?php echo $coursename[$pos]; ?> </p>
                                    </td>
                                    <td><?php echo $value; ?></td>
                                </tr>
                                 <?php  
                                }
                              ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            </a>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel tile fixed_height_320">
       
            <div class="x_title">
                <h2>Topper</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <a href="topperlist.php">
            <div class="x_content">
            <?php 
                $result12=getTopperreult();
                while ($row12=$result12->fetch_assoc()) {
                    $data6=$row12['Scores'];
                    $data7=$row12['Total'];
                    $totalscore[]=($data6/$data7)*100;
                    $data8[]=$row12['Course_Name'];
                    $data9[]=$row12['users'];
                }
                foreach ($data9 as $key => $value) {
                    $result69=getTopperName($value);
                    while ($row69=$result69->fetch_assoc()) {
                        $ToperName[]=$row69['firstname'];
                    }
                }
                $totalscorecopy=$totalscore;
                sort($totalscore);
                $totalscore=array_reverse($totalscore);
                $totalscore=array_slice($totalscore,0,5,true);
             ?>
             <div class="pull-left"><h4>Toper Name</h4></div>
                <div class="pull-right"><h4>Course</h4></div>
                <?php 
                    foreach ($totalscore as $key => $value) {
                         $pos=array_search($value, $totalscorecopy);
                         unset($totalscorecopy[$pos]);
                         ?>

                <div class="widget_summary">
                    <div class="w_left w_25">
                        <span><?php echo $ToperName[$pos]; ?></span>
                    </div>
                    <div class="w_center w_55">
                        <div class="progress">
                            <div class="progress-bar bg-green" title="<?php echo $value; ?>%" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value; ?>%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_20">
                        <span><?php echo $data8[$pos]; ?></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                 <?php
                    }
                                                   
                                                   
                 ?>
            </div>
            </a>
        </div>
    </div>
</div>
<?php 
    $todaydate=date("Y-m-d");
    $month=explode("-", $todaydate);
    //echo ($month[1]-1);
    //while ($month[1]>=1) {
        for($i=1;$i<=$month[1];$i++){
        $temp=$month[0]."-".$i."-".$month[2];
        // echo date("Y-m-t",strtotime("$temp"));
        // echo "<br>";
        // echo date("Y-m-01",strtotime("$temp"));
        // echo "<br>";
        // echo date("F",strtotime("$temp"));
        // echo "<br>";
        $fday=date("Y-m-01",strtotime("$temp"));
        $lday=date("Y-m-t",strtotime("$temp"));
        //total exam conduct
        $result=getExamconductEmonth($fday,$lday);
        $row=$result->fetch_assoc();
        $total[]=$row['total'];
        $monthName[]=date("F",strtotime("$temp"));
        $data1=implode("$", $monthName);
        $data2=implode("$", $total);
        //$month[1]--;
        //total user attemp the exam
         $result2=getUserAtemmpExam($fday,$lday);
        $row2=$result2->fetch_assoc();
        $total1[]=$row2['total'];
        $data3=implode("$", $total1);
    }
 ?>
</div>
            <!-- /page content -->
            <script>
        var month='<?php echo $data1; ?>';
        var total='<?php  echo $data2; ?>';
        var totalUattemp='<?php  echo $data3; ?>';
        // alert(month);
        // alert(total);
         var d1 = [];
        var totalE=total.split("$");
        var Fmonth=month.split("$");
        var totalUattempExam=totalUattemp.split("$");
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100)
        };



        var barChartData = {
            labels: d1,//["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    fillColor: "#26B99A", //rgba(220,220,220,0.5)
                    strokeColor: "#26B99A", //rgba(220,220,220,0.8)
                    highlightFill: "#36CAAB", //rgba(220,220,220,0.75)
                    highlightStroke: "#36CAAB", //rgba(220,220,220,1)
                    data: totalUattempExam
            }
        ],
        }

        $(document).ready(function () {
            new Chart($("#canvas_bar").get(0).getContext("2d")).Bar(barChartData, {
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                responsive: true,
                barDatasetSpacing: 6,
                barValueSpacing: 5
            });
        });

        
         for (var i = 0; i < Fmonth.length; i++) {
                d1.push([Fmonth[i]]);
            }
        var lineChartData = {
            labels:d1,// ["January", "February", "March", "April","March","April","May","June","July","Agust","September","October","November","December"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(38, 185, 154, 0.31)", //rgba(220,220,220,0.2)
                    strokeColor: "rgba(38, 185, 154, 0.7)", //rgba(220,220,220,1)
                    pointColor: "rgba(38, 185, 154, 0.7)", //rgba(220,220,220,1)
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: totalE
            }
        ]

        }

        $(document).ready(function () {
            new Chart(document.getElementById("canvas000").getContext("2d")).Line(lineChartData, {
                responsive: true,
                tooltipFillColor: "rgba(51, 51, 51, 0.55)"
            });
        });

    </script>
    <?php $totalcount=array(); foreach ($totalCourseCount as $key => $value) {
        $totalcount[]=$value;
       $final=implode("$", $totalcount);

    } ?>
        <script>
        var data5='<?php echo $final; ?>';
        var totalUser=data5.split("$");
        t1=Number(totalUser[0]);
        t2=Number(totalUser[1]);
        t3=Number(totalUser[2]);
        t4=Number(totalUser[3]);
        t5=Number(totalUser[4]);
        var doughnutData = [
            {
                value: t1,
                color: "#3498DB"
            },
            {
                value: t2,
                color: "#26B99A"
            },
            {
                value: t3,
                color: "#9B59B6"
            },
            {
                value: t4,
                color: "#BDC3C7"
            },
            {
                value: t5,
                color: "#FF0000"
            }
    ];
     $(document).ready(function () {
        var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
    });
     
    </script>
    <script>
        $(document).ready(function () {
       $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
<?php include("../includes/layouts/footer.php");?>