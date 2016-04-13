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

    <title>WeRHR!|</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
    <?php 
    session_start();
     $arr6=array();
     $arr2=array();

     $arr=array();
     $arr1=array();
     //echo $_GET['cname'];
     $result=selectQuestionanswer($_GET['cname']);
     while($row=$result->fetch_assoc())
        {
          $arr=$row['Answer_Option'];
          $arr6=$row['Answer'];

          $arr1[]=explode(",",$arr);
          $arr2[]=explode(",",$arr6);

           
        }
         // print_r($arr1);
         // print_r($arr2);
        
     ?>
 <?php 
        $arr=array();
        $arr1=array();
        $arr2=array();
        $arr3=array();
        $checkForNegative=array();
        $score=0;
        $TotalAnswer=0;
        $WrongAnswer25=0;
        $Total=0;
        $result2=SelectQuestionAnswer($_GET['cname']);
        while ($row=$result2->fetch_assoc()) {
            $option=$row['Answer_Option'];
            $ans=$row['Answer'];
            $quesType[]=$row['Question_Type'];
            $positiveMarks[]=$row['Positive_Mark'];
            $Total+=(int)$row['Positive_Mark'];
            $negativeMarks[]=$row['Negative_Mark'];
            $arr[]=explode(",",$ans);
            $arr1[]=explode(",",$option); 

            $mulans=null;
        }
        //print_r($quesType);
       //echo sizeof($quesType);
        foreach ($arr1 as $key1=>$array) {
            if($quesType[$key1]!=="Multiple Choice")
            {
                foreach ($array as $key => $value) {
                     $Cans=implode("",$arr[$key1]);
                     //echo $Cans;
                      //echo $value;
                    if($value===$Cans)
                    {
                        $arr2[]=($key1+1)."::"."opt".($key+1);
                    }
                }
            }else{
                $MCans=null;
                $Cans=implode("",$arr[$key1]);
                $arr5=explode("/",$Cans);
                //var_dump($arr5);
                foreach ($arr5 as $key5 => $value5) {
                   // echo $value5." ";
                    foreach ($array as $key => $value) {
                        if($value5===$value)
                        {
                            $MCans=$MCans."opt".($key+1)."/";
                        }
                    }
                }
                $MCans=rtrim($MCans,"/");
                //echo $MCans;
                $arr2[]=($key1+1)."::".$MCans;
            }  
        }
        $result=getUserAnswer($_GET['cname']);
        while ($row=$result->fetch_assoc()) {
            $ans1=$row['Answer'];
        }
        $ans1=explode(",",$ans1);
        // var_dump($arr2);
        // var_dump($ans1);
        $TotalAnswer=sizeof($ans1);
      
         for($i=0;$i<sizeof($arr2);$i++)
        {
            if($quesType[$i]!=="Multiple Choice")
            {
                for($j=0;$j<sizeof($ans1);$j++)
                {
                   if($arr2[$i]===$ans1[$j])
                    {
                        $checkForNegative[]=$arr2[$i];
                        //$score+=1;
                        $score+=(int)$positiveMarks[$i];
                    }
                }
            }else{
                $counter=0;
                $sizeofAns=0;
                //$tempj=0;
                $Oans=explode("::", $arr2[$i]);
                //var_dump($Oans);
                for($j=0;$j<sizeof($ans1);$j++){
                   // $tempj=$j;
                    $Uans=explode("::", $ans1[$j]);
                    $Oans1=explode("/",$Oans[1]);
                    $sizeofAns=sizeof($Oans1);
                    if($Oans[0]===$Uans[0])
                    {
                        $Uans1=explode("/", $Uans[1]);
                        for($k=0;$k<sizeof($Oans1);$k++)
                        {
                            for($l=0;$l<sizeof($Uans1);$l++)
                            {
                                if($Oans1[$k]===$Uans1[$l])
                                {
                                    $counter++;
                                }
                            }
                        }

                    }
                }
                if($counter===$sizeofAns)
                {
                    //echo "equal";
                    //$score+=1;
                    $checkForNegative[]=$arr2[$i];
                    $score+=(int)$positiveMarks[$i];

                }
            }
            

        }

       // var_dump($checkForNegative);
       // var_dump($ans1);
     ?>
     
    <?php 
        $arr7=array();
        $arr8=array();
        $result=getUserAnswer($_GET['cname']);

         while ($row=$result->fetch_assoc()) {
            $ans=$row['Answer'];

        }
        //$ans="1::bb,2::cc";
       //$ans=substr($an, 1,-1);
        $ans=explode(",",$ans);
         //var_dump($ans);
        //print_r($ans);
        for($i=0;$i<sizeof($ans);$i++)
        {
            $ans[$i]."<br>";
            $temp=array();
            $temp=explode("::",$ans[$i]);
           // var_dump($temp);
        }
        $todayDate=date("Y-m-d");
        $totalquestion=CountVisibleQuestion($_GET['cname'],$todayDate);
        while ($row=$totalquestion->fetch_assoc()) {
            $TotalQuestion=$row['Visible'];
        }
        $score=($score/$Total)*$TotalQuestion;
        //Negative marking
         for($i=0;$i<sizeof($ans1);$i++)
        {
            if(!in_array($ans1[$i], $checkForNegative))
            {
                //echo $ans1[$i];
                $QN=explode("::", $ans1[$i]);
                $qn=$QN[0];
                $qn=($qn-1);
                $Nm=$negativeMarks[$qn];
                $Pm=$positiveMarks[$qn];
                //echo $Nm." ".$Pm;
                $totalminus=($Nm/$Pm);
                $score=($score-$totalminus);
                
            }
            else{
                $WrongAnswer25++;
            }
        }
        //echo  $WrongAnswer25;
     ?>
     <?php 
     $email=$_SESSION['email'];
     $CourseName=$_GET['cname'];
     $todayDate=date("Y-m-d");
     $testname=$CourseName.$todayDate;
        $stmt=$connection->prepare("call adduserresult(?,?,?,?,?,?)");
        $stmt->bind_param('siisss',$email,$score,$TotalQuestion,$CourseName,$todayDate,$testname);
        $stmt->execute();
          ?>
<body class="nav-md">
    <div class="container body">
		 <div class="main_container">
			<div class="row">
				<div id="answersheet" style="margin-top:70px" class="mainbox col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-4">
					<div class="panel panel-info">
                    <?php 
                        $result25=getUserforDisplay($_SESSION['email']);
                        while ($row25=$result25->fetch_assoc()) {
                            $Name=$row25['firstname'];
                        }
                     ?>
					    <div class="panel-heading">
					    <h3><?php echo $Name; ?>, Your score is <?php echo $score; ?> out of <?php echo $TotalQuestion; ?></h3>
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
									<a href="controllers/mainmenu.php" class="btn btn-info" role="button">Main Menu</a>
								
									<a href="logout_process.php" class="btn btn-info" role="button">Logout</a>
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
   
   
    <script>    
	    var max=<?php echo $TotalQuestion; ?>;
        var WrongAnswe25=<?php echo $WrongAnswer25; ?>;
		var totalAns=<?php echo sizeof($ans1); ?>;
		var unAns=(max-Number(<?php echo $TotalAnswer; ?>));
        if(unAns<0)
        {
            unAns=0;
        }
        var totalMarks=<?php echo $score; ?>;
        if(totalMarks<0)
        {
            totalMarks=0;
        }
        
        var wrongans=(totalAns-WrongAnswe25);
        
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100)
        };

        var barChartData = {
			
            labels: ["Total Mark","Total Answered","Correct Answered","Wrong Answer","UnAnswered","Your Score"],
			
            datasets: [
                {
					
                    fillColor: "#03586A", //rgba(151,187,205,0.5)
                    strokeColor: "#26B99A", //rgba(151,187,205,0.8)
                    highlightFill: "#36CAAB", //rgba(151,187,205,0.75)
                    highlightStroke: "#36CAAB", //rgba(151,187,205,1)
					data: [max,totalAns,WrongAnswe25,wrongans,unAns,totalMarks]
					
					
					
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