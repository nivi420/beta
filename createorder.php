<?php 
//Tables Updated - loginTable, custMaster, addressMaster, paymentMaster 

session_start(); 
date_default_timezone_set("Asia/Kolkata");
$timeStamp = date('Y-m-d H:i:s');

require 'config.php';

$plan = $_SESSION['planId']; 
$custId = $_SESSION['custId']; 

    
$query = "SELECT * 
            FROM planMaster 
            WHERE planId ='$plan'
            AND planStatus = 'ACTIVE'"; 
    
$result =  mysqli_query($link, $query); 
$row=mysqli_fetch_assoc($result);   
    

//Update payment table - Coupon code logic to be included here in the future 
//payment mode from signup page - future coding
//$paymentMode - CASH/CARD/UPI etc - future coding
//$orderType - ORDER/RENEWAL/CANCEL/REFERRAL - future coding
//$paymentStatus - pending, approved, denied etc - future coding. If denied, should we store? Need to check with payment gateway company )


$paymentMode = "CASH";
$paymentStatus = "PENDING";

$query = "INSERT INTO paymentTable (custId,planId,paymentMode,planCost,registrationFee,securityDeposit,paymentRequested,paymentRequestDate,paymentStatus,lastUpdatedTime,updatedBy) VALUES ('$custId','$plan','$paymentMode','$row[planCost]','$row[registrationFee]','$row[securityDeposit]','$row[totalAmount]','$timeStamp','$paymentStatus','$timeStamp','System')"; 

 //update this code to send error message to webadmin
if (!mysqli_query($link, $query)){
  
    echo "INSERT paymentMaster Error  - ".mysqli_error ($link);
    $response[] = array (   
    'transaction'       => 'FAILURE',
    'paymentId'         => ''  	  
    );  
} else {

    $paymentId= mysqli_insert_id($link);
    $response[] = array (   
        'transaction'       => 'SUCCESS',
        'paymentId'         => $paymentId  	  
    );
}

echo json_encode($response);

?> 