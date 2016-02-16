<?php require_once("./includes/dbconnection.php");?>
<?php require_once("./includes/all_functions.php");?>
<?php
	if(isset($_POST['submit']))
	{
    	$domain_id = $_POST['DomainId'];
    	$input_topic = $_POST['InputTopic'];
    	$inputTotal_ques = $_POST['InputTotalQues'];
    	$input_ref = $_POST['Inputref'];
    	$input_sugestion = $_POST['Inputsugestion'];
    	$domainID= select_Domain_id($domain_id);

    	if(isset($domainID))
    	{
    		 while($row=mysqli_fetch_assoc($domainID))
			{
				$temp=$row["Domain_ID"];
			}
    		$query="insert into syllabus(";
    		$query .="Topic_Name,Number_of_Question,Reference_Link,References_Boook,Domain_ID";
    		$query .=") values('{$input_topic}','{$inputTotal_ques}','{$input_ref}','{$input_sugestion}','{$temp}')";
    		$result=mysqli_query($connection,$query);
    		if($result)
    		{
        		echo "Success";
        		redirect_to("AddDomain.php");
    		}else
    		{
	        	die("Database connection fail".mysqli_error($connection)." ".$temp);
    		}	
    	}
	}
?>

<?php
if(isset($connection))
{
	mysqli_close($connection);
}
?>