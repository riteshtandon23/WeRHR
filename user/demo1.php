<?php include_once('include/connect_open.php'); ?>
<?php
   
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysqli_query($connection,"SELECT * FROM user1 WHERE email LIKE '%".$searchTerm."%' ORDER BY email ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['email'];
    }
    
    //return json data
    echo json_encode($data);
?>