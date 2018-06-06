<?php 
session_start(); 
require('config.php'); 

$email = mysqli_real_escape_string($link,$_POST['search']); 
 
$query = 
        "
        SELECT 
            custMaster.custId,
            custMaster.firstName,
            custMaster.lastName,
            custMaster.custStatus,
            custMaster.planExpiryDate,
            planMaster.courier, 
            locationMaster.city
            
            
        FROM custMaster 
        INNER JOIN addressMaster 
        ON custMaster.custId = addressMaster.custId
        INNER JOIN paymentTable 
        ON custMaster.custId = paymentTable.custId 
        INNER JOIN planMaster 
        ON paymentTable.planId = planMaster.planId
        INNER JOIN locationMaster 
        ON addressMaster.pin = locationMaster.pin
        WHERE addressMaster.email='$email'
        ORDER BY paymentTable.paymentId 
        DESC LIMIT 1 
        "; 

$result = mysqli_query($link, $query); 
$rowcount=mysqli_num_rows($result);

if ($rowcount ==0 ) { 
    $response[] = array ('found' => 'NO');
    echo json_encode($response);  
} else {
    
    $row = mysqli_fetch_array ($result);
    $_SESSION['custId'] = $row['custId']; 

    $response[] = array (   'found' => 'YES',
                            'deliveryType' => $row['courier'], 
                            'name' => $row['firstName'].' '.$row['lastName'],
                            'status' => $row['custStatus'], 
                            'city' => $row['city'], 
                            'planExpiryDate' => $row['planExpiryDate']              
                        );
    echo json_encode($response);
       
}

?>