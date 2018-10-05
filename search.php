<?php
   
    
    //connect with the database
    $db =  mysqli_connect("localhost","root","staf1993","Currency") or die("Unable to connect to MySQL");
    



    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT name FROM last_update WHERE name LIKE '%".$searchTerm."%' ORDER BY name ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['name'];
    }
    
    //return json data
    echo json_encode($data);
?>


