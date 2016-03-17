<?php require_once("../includes/dbconnection.php");?>
<?php
   
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysqli_query($connection,"SELECT * FROM users WHERE email LIKE '%".$searchTerm."%' ORDER BY email ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['email'];
    }
    
    //return json data
    echo json_encode($data);
?>