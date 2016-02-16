<?php
if(isset($_POST['search'])){
	$var=$_POST['search'];
	$stmt=$connection->prepare("select Topic_Name from topic where Topic_Name LIKE '$var'");
	$data='';
	$result=$stmt->execute();
	if($result)
	{
		while($row=$result->fetch_assoc())
		{
			$data .=data. "<div>".$row["Topic_Name"]."</div>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add more fields using jQuery</title>
<script src="jquery.js"></script>
<script type="text/javascript">
$(function(){
	$('.input').keyup(function(){
		var a=$('.input').val();
		$.post('index.php',{"search",a},function(data){
			$('#display').html(data);
		});
	});
});

</script>
</head>
<body>
<form name="codexworld_frm" action="index.php" method="post">
<div class="field_wrapper">
	<div>
    	<input type="text" name="search" class="input" value=""/>
        
    </div>
	<div id="display">
	</div>
</div>
<input type="submit" name="submit" value="SUBMIT"/>
</form>
</body>
</html>
