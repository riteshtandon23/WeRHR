<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php include("../includes/layouts/header.php");?>
 <!-- page content -->
<div class="left_col" role="main">
<script type="text/javascript">
    $(document).ready(function(){
        graph();
    });
</script>
    <br />
    <div class="">

        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                    </div>
                    <div class="count"><label id="hhh"><a href="wearehrusers.php?key=111000111"><?php $result=countTotalusers(); while ($row=$result->fetch_assoc()) {
                        echo $row['total'];
                    } ?></a></label></div>

                    <h3>Totals users</h3>
                    <p>register</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count"><a href="wearehrusers.php?key=111000121"><?php $result=countTotalusersthisWeek(); while ($row=$result->fetch_assoc()) {
                        echo $row['total'];
                    } ?></a></div>

                    <h3>Total users</h3>
                    <p>register this week</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                    </div>
                    <div class="count"><a href="wearehrusers.php?key=111000211"><?php $result=countTotalcompany(); while ($row=$result->fetch_assoc()) {
                        echo $row['total'];
                    } ?></a></div>

                    <h3>Total Employers</h3>
                    <p> registers</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="count"><a href="wearehrusers.php?key=111000311"><?php $result=countTotalcompanythisWeek(); while ($row=$result->fetch_assoc()) {
                        echo $row['total'];
                    } ?></a></div>

                    <h3>Total Employers</h3>
                    <p>register this week.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visitors to our website <small>Monthly progress</small></h2>
                        <div class="filter">

                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="demo-container" style="height:340px">
                                <div id="placeholder33x" class="demo-placeholder"></div>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div>
                                <div class="x_title">
                                    <h2>Exam Notice</h2>
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
                                <ul class="list-unstyled top_profiles scroll-view">
                                    <?php 
                                    $result=getNotification();
                                        while($row=$result->fetch_assoc())
                                        {
                                            $id=$row["Topic_id"];
                                            $topicName="";
                                            $result1=select_Domain_Name($id);
                                            while($row1=$result1->fetch_assoc())
                                            {
                                                $topicName=$row1['Topic_Name'];
                                            }
                                            echo "<li class=\"media event\">";
                                            echo "<a class=\"pull-left border-aero profile_thumb\">";
                                            echo "<i class=\"fa fa-info-circle\"></i>";
                                            echo "</a>";
                                            echo "<div class=\"media-body\">";
                                            echo "<a class=\"title\" href=\"updateExamDate.php?id=".$row['ID']."\">".$topicName."</a>";
                                            echo "<p><strong>Exam Date: </strong> ".$row['Exam_Date']."</p>";
                                            echo "<p><strong>Exam Time: </strong> ".$row['Start_Time']." - ".$row['End_Time']."</p>";
                                            echo "<p> <small>Total Question: ".$row['Total_Question']."</small>";
                                            echo "</p>";
                                            echo "</div>";
                                            echo "</li>";  
                                        }
                                     ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Weekly Summary <small>Activity shares</small></h2>
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

                        <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                            <div class="col-md-7" style="overflow:hidden;">
                                <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                                <h4 style="margin:18px">Weekly sales progress</h4>
                            </div>

                            <div class="col-md-5">
                                <div class="row" style="text-align: center;">
                                    <div class="col-md-4">
                                        <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Bounce Rates</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">New Traffic</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas id="canvas1i3" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Device Share</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
             $data1=array();
            $data2=array();
            $result=DisplayVisitor();
            while ($row=$result->fetch_assoc()) {
                $date[]=$row['Date'];
                $tot[]=$row['totalVisitor'];
                $data1=implode("$", $date);
                $data2=implode("$", $tot);
            }
         ?>
    </div>
</div>
    <script type="text/javascript">
        //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )
        var indate='<?php echo $data1; ?>';
        var total='<?php echo $data2; ?>';
        var totalV=total.split("$");
        var vdate=indate.split("$");
        //alert(vdate[1]);
        var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

        //generate random number for charts
        randNum = function () {
            return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
        }
        function gd(year,month,day)
        {
            return new Date(year,month-1,day).getTime();
        }
        function graph() {
            var d1 = [];
            //var d2 = [];
            //var bb=new Date(Date.today().add(i).days()).getTime();
            //alert(bb);
            //here we generate data for chart
            for (var i = 0; i < totalV.length; i++) {
                //var vdate2=vdate[0].split("-");
                //d1.push([new Date(Date.today().add(i).days()).getTime(), totalV[i]]);
                d1.push([new Date(vdate[i]).getTime(), totalV[i]]);
                //d1.push([totalV[i]]);
                //    d2.push([new Date(Date.today().add(i).days()).getTime(), randNum()]);
            }

            var chartMinDate = d1[0][0]; //first day
            var chartMaxDate = d1[28][0]; //last day

            var tickSize = [1, "day"];
            var tformat = "%Y-%m-%d";

            //graph options
            var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f",
                    labelMargin: 10,
                    axisMargin: 0,
                    borderWidth: 0,
                    borderColor: null,
                    minBorderMargin: 5,
                    clickable: true,
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 100
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        lineWidth: 2,
                        steps: false
                    },
                    points: {
                        show: true,
                        radius: 4.5,
                        symbol: "circle",
                        lineWidth: 3.0
                    }
                },
                legend: {
                    position: "ne",
                    margin: [0, -25],
                    noColumns: 0,
                    labelBoxBorderColor: null,
                    labelFormatter: function (label, series) {
                        // just add some space to labes
                        return label + '&nbsp;&nbsp;';
                    },
                    width: 40,
                    height: 1
                },
                colors: chartColours,
                shadowSize: 0,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s: %y.0",
                    xDateFormat: "%d/%m",
                    shifts: {
                        x: -30,
                        y: -50
                    },
                    defaultTheme: false
                },
                yaxis: {
                    min: 0
                },
                xaxis: {
                    mode: "time",
                    minTickSize: tickSize,
                    timeformat: tformat,
                    min: chartMinDate,
                    max: chartMaxDate
                }
            };
            var plot = $.plot($("#placeholder33x"), [{
                label: "Total Visitor",
                data: d1,
                lines: {
                    fillColor: "rgba(150, 202, 89, 0.12)"
                }, //#96CA59 rgba(150, 202, 89, 0.42)
                points: {
                    fillColor: "#fff"
                }
            }], options);
            graph1();
        }
    </script>
    <!-- /flot -->
    <!--  -->
    <script>
        function graph1(){
            $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                type: 'bar',
                height: '125',
                barWidth: 13,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });

            $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
                type: 'bar',
                height: '40',
                barWidth: 8,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });

            $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
                type: 'line',
                height: '40',
                width: '200',
                lineColor: '#26B99A',
                fillColor: '#ffffff',
                lineWidth: 3,
                spotColor: '#34495E',
                minSpotColor: '#34495E'
            });

            var doughnutData = [
                {
                    value: 30,
                    color: "#455C73"
                },
                {
                    value: 30,
                    color: "#9B59B6"
                },
                {
                    value: 60,
                    color: "#BDC3C7"
                },
                {
                    value: 100,
                    color: "#26B99A"
                },
                {
                    value: 120,
                    color: "#3498DB"
                }
        ];
            var myDoughnut = new Chart(document.getElementById("canvas1i").getContext("2d")).Doughnut(doughnutData);
            var myDoughnut = new Chart(document.getElementById("canvas1i2").getContext("2d")).Doughnut(doughnutData);
            var myDoughnut = new Chart(document.getElementById("canvas1i3").getContext("2d")).Doughnut(doughnutData);
            
        }
    </script>
<?php include("../includes/layouts/footer.php");?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>