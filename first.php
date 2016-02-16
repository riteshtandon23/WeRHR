<html>
<head>
<title>My first program</title>
</head>
<body>
<input type="text" name="date" id="date"/>
<br>
<input type="submit" id="submit">
<br>
<?php
$a=6;
$b=5;
 echo $a+$b;
 for($i=0;$i<20;$i++)
 {
	 echo $i;
	 echo "<br/>";
 }
 
 $arr=array(1,2,3);
 $arr[0]=1;
 $arr[1]=2;
 $arr[2]=3;
 foreach( $arr as $val )
 {
	 echo "value are".$val."<br/>";
 }
 $car=array("Mercedes","Audi","BMW");
 echo "car that i like<br/>";
 for($i=0;$i<count($car);$i++)
 {
	 echo "<b>".$car[$i]."</b><br/>";
 }
 echo "<br/>";
 $data=array("apples" => array("A","B","C","D"),"Banana" => array("A","B","C","D"),"Grapes" => array("A","B","C","D"));
 $row=count($data,0);
 $col=(count($data,1)/count($data,0))-1;
 echo "$row $col";
 foreach($data as $var)
 {
	 echo "<br/>";
	 for($i=0;$i<$col;$i++)
	 {
		 echo $var[$i]." ";
	 }
	  echo "<br/>";
 }
 echo "<h1> two dimensional array</h1>";
 $to_d=array(array("Audi","22","8"),array("BMW","20","8"),array("Mercedes","19","16"));
 $ro=count($to_d,0);
 $co=(count($to_d,1)/count($to_d,0))-1;
  echo "$ro$co";
 
 
?>
</body>
</html>

