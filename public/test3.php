<?php
require_once("../includes/dbconnection.php");
session_start();

$result = mysqli_query($connection,"SELECT * FROM employers where email='" . $_SESSION["email"] . "'");
while($row = mysqli_fetch_row($result)){
    $empty_count = 0;
    $count = count($row);
    for($i = 0; $i < $count; $i++)
        if($row[$i] === '' || $row[$i] === 'NULL')
            $empty_count++;
echo 10-$empty_count;
}
?>