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
if(isset($_GET['id1']))
{
	$id=$_GET['id1'];
	if($id!==null)
	{
			$data=array();
		$result=selectAgeRange($id);;
		while ($row=$result->fetch_assoc()) {
			$data[]=$row['Age_Range'];
		}
		echo json_encode($data);
	}

}
 ?>
 <?php 
if(isset($_GET['id2']))
{
	$id=$_GET['id2'];
	if($id!==null)
	{
			$data=array();
		$result=selectAcademic($id);
		while ($row=$result->fetch_assoc()) {
			$data[]=$row['Qualification'];
		}
		echo json_encode($data);
	}

}
 ?>
 <?php 
if(isset($_GET['id3']))
{
	$id=$_GET['id3'];
	if($id!==null)
	{
			$data=array();
		$result=selectBackground($id);
		while ($row=$result->fetch_assoc()) {
			$data[]=$row['Experience'];
		}
		echo json_encode($data);
	}

}
 ?>
  <?php 
if(isset($_GET['id4']))
{
	$id=$_GET['id4'];
	if($id!==null)
	{
			$data=array();
		$result=selectTest($id);
		while ($row=$result->fetch_assoc()) {
			$data[]=$row['Test_Name'];
		}
		echo json_encode($data);
	}

}
 ?>
   <?php 
if(isset($_GET['key']))
{
	$id=$_GET['key'];
	if($id!==null)
	{
			$data=array();
		$result=DisplayRole($id);
		while ($row=$result->fetch_assoc()) {
			$data[]=$row['Roles'];
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