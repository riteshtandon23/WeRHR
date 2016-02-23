<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
    if(isset($_GET['key']))
    {
        $key=$_GET['key'];
        $data = array();
        $data2 = array();
        $result=selectQuestion();
        while($row=$result->fetch_assoc())
        {
            $data[]=array("Question"=>$row['Question_Name'],"QuestionOption"=>$row['Answer_Option']);
        }
        echo json_encode($data);
    }
    
?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>

