<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
<body class="nav-md">
    <div class="container body">
		 <div class="main_container">
			<div class="row">
				<div id="answersheet" style="margin-top:70px" class="mainbox col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-4">
					<div class="panel panel-info">

					    <div class="panel-heading">
					    <h3>Graphical representation of your score</h3>
						</div>
						<div class="panel-body">
							<form id="infoform1" method="POST" class="form-horizontal" role="form">  
								<div class="form">		
								</div>
					            <div class="col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1" align="center">
									<div class="x_panel">
										<div class="x_title">
											<h2><label ><h4>&nbsp;&nbsp; Course Name:&nbsp;&nbsp;<?php echo $_GET['cname']; ?></h4></label> <small></small></h2>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<canvas id="canvas_bar"></canvas>
										</div>
									</div>
								</div>
							
								<div class="col-md-7 col-md-offset-4 col-sm-10 col-sm-offset-2">
									<a href="#" class="btn btn-info" role="button">Main Menu</a>
								
									<a href="#" class="btn btn-info" role="button">Logout</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>  
		</div>
    </div>
    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <script src="js/custom.js"></script>
    <?php 
    	$result=getUserAnswer($_GET['cname']);
    	while ($row=$result->fetch_assoc()) {
    		$ans=$row['Answer'];
    	}
    	$Edate="2016-03-31";
    	$totalquestion=CountVisibleQuestion($_GET['cname']);
    	while ($row=$totalquestion->fetch_assoc()) {
    		$TotalQuestion=$row['Visible'];
    	}
     ?>
    <script>    
	    var max=<?php echo $TotalQuestion; ?>;
		//var per=100;
		var wrongans=2;
		var unAns=0;
		var totalMarks=(max-(wrongans+unAns));
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100)
        };

        var barChartData = {
			
            labels: ["Total Mark","Your Score","Wrong Answer","UnAnswered"],
			
            datasets: [
                {
					
                    fillColor: "#03586A", //rgba(151,187,205,0.5)
                    strokeColor: "#26B99A", //rgba(151,187,205,0.8)
                    highlightFill: "#36CAAB", //rgba(151,187,205,0.75)
                    highlightStroke: "#36CAAB", //rgba(151,187,205,1)
					data: [max,totalMarks,wrongans,unAns]
					
					
					
                },
               // {
               //      fillColor: "#03586A", //rgba(151,187,205,0.5)
               //     strokeColor: "#03586A", //rgba(151,187,205,0.8)
               //     highlightFill: "#066477", //rgba(151,187,205,0.75)
               //     highlightStroke: "#066477", //rgba(151,187,205,1)
               //     data: [total1]
               // }
        ],
        }

        $(document).ready(function () {
            new Chart($("#canvas_bar").get(0).getContext("2d")).Bar(barChartData, {
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                responsive: true,
                barDatasetSpacing: 20,
                barValueSpacing: 20
            });
        });
    </script>
</body>

</html>