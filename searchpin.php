<?php 
session_start(); 
require('config.php'); 

$pincode = mysqli_real_escape_string($link,$_POST['search']); 
$_SESSION['pincode'] = $pincode; 
 
$query = 
        "
        SELECT 
            city,
            type
        FROM locationMaster
        WHERE PIN='$pincode'
        "; 

$result = mysqli_query($link, $query); 
$row = mysqli_fetch_array ($result); 
$response[] = array ( 'type' => $row['type'],
                    'city' => $row['city'] );
echo json_encode($response);

?>