<?php require_once("../includes/dbconnection.php"); ?>
<?php require_once("../includes/all_functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>WeRHR!</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Course<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<?php 
				$uid=(int)(11111+41);
				$uid=decbin($uid);
				$result=select_Domain();
				while($row=$result->fetch_assoc())
				{
						echo "<li><a href=\"Instruction.php?CName=".$row['topic_Name']."&id=".$uid."\">".$row['topic_Name']."</a></li>";
				}
				
			?>
		</ul>
	</div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>