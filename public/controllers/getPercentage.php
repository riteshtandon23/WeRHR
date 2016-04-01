<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php 
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	if($id!==null)
	{
			$data=array();
		$result=selectPercentage($id);
		while ($row=$result->fetch_assoc()) {
			$data[]=$row['PercentageRange'];
		}
		echo json_encode($data);
	}

}
 ?>
<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>