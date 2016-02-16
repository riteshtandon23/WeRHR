<?php
include 'connection.php';

/*$state= array('India' =>array("Bihar","Gujarat","Goa","UP"));
if(isset($_GET['country']))
{
	$c=$_GET['country'];
	if(isset($state[$c]))
	{
		for($i = count($state[$c])-1; $i>=0; $i--)
		{
			echo "<option value='".$state[$c][$i]."'>".$state[$c][$i]."</option>";
		}
	}
}*/
	$countryname = $_GET['country'];
	if(isset($countryname))
	{

		$query5 = "SELECT State_Name FROM state WHERE Country_ID = (select Country_ID from country where Country_Name='{$countryname}') ORDER BY State_Name ASC";
		$result5 = mysqli_query($connection,$query5);
		if($result5)
		{
			$temp=array();
			
			while($row=mysqli_fetch_assoc($result5))
			{
									
				//echo  "<option value={$row["State_Name"]}>".$row["State_Name"]."</option>";
					$temp[]=$row["State_Name"];
					
			}
		}
		else
		{
			die("Database connection fail in select".mysqli_error($connection));
		}

		$main = array('state'=>$temp);
		echo json_encode($main);

	}
?>