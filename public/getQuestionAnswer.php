<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
    if(isset($_GET['key']))
    {

        $key=$_GET['key'];
       
        $data = array();
        $result=getQuestion($key);
        while($row=$result->fetch_assoc())
        {
            
            $data[]=array("Question"=>$row['Question_Name'],"QuestionOption"=>$row['Answer_Option'],"QuestionType"=>$row['Question_Type'],"PMark"=>$row['Positive_Mark'],"NMark"=>$row['Negative_Mark']);
            
        }
        //var_dump($data);
        echo json_encode($data);
    }
    
?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>

