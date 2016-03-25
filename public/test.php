<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>

 <?php 
        $result=getUserAnswer("Java");
        while ($row=$result->fetch_assoc()) {
            $ans=$row['Answer'];

        }
        //$ans="1::bb,2::cc";
       //$ans=substr($an, 1,-1);
        $ans=explode(",",$ans);
         var_dump($ans);
        //print_r($ans);
        for($i=0;$i<sizeof($ans);$i++)
        {
            echo $ans[$i]."<br>";
            $temp=array();
            $temp=explode("::",$ans[$i]);
            var_dump($temp);
        }

    

         

        $totalquestion=CountVisibleQuestion("Java");
        while ($row=$totalquestion->fetch_assoc()) {
            $TotalQuestion=$row['Visible'];
        }
     ?>