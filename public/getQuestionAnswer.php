<?php require_once("../includes/dbconnection.php");?>
<?php
    if(isset($_GET['key']))
    {
        $key=$_GET['key'];
        $data = array();
        $data2 = array();
        global $connection;
        $stmt = $connection->prepare("select Question_Name,Answer_Option from question where Topic_Id='{$key}'");
        $stmt->execute();
        $result = $stmt->get_result();
        while($row=$result->fetch_assoc())
        {
          //$data=$row['Question_Name'];
          //$data2=$row['Answer_Option'];
            $data[]=array("Question"=>$row['Question_Name'],"QuestionOption"=>$row['Answer_Option']);
          //echo '{"Question":"'.$data.'","QuestionOption":"'.$data2.'"}';
          //echo "string";
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

