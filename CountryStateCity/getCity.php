<?php
include 'connection.php';
	$statename = $_GET['state'];
	if(isset($statename ))
	{

		$query5 = "SELECT City_Name FROM city WHERE State_ID = (select State_ID from state where state_Name='{$statename}') ORDER BY City_Name ASC";
		$result5 = mysqli_query($connection,$query5);
		if($result5)
		{
			$temp=array();
			
			while($row=mysqli_fetch_assoc($result5))
			{
									
				//echo  "<option value={$row["State_Name"]}>".$row["State_Name"]."</option>";
					$temp[]=$row["City_Name"];
					
			}
		}
		else
		{
			die("Database connection fail in select".mysqli_error($connection));
		}

		$main = array('City'=>$temp);
		echo json_encode($main);
	}
?>