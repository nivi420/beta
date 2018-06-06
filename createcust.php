<?php 
//Tables Updated - loginTable, custMaster, addressMaster, paymentMaster 

session_start(); 
date_default_timezone_set("Asia/Kolkata");
$timeStamp = date('Y-m-d H:i:s');

require 'config.php';
$pincode = $_SESSION['pincode']; 


if ($_POST) { 
    $plan = $_POST['plan']; 
    
    $query = "SELECT * 
            FROM planMaster 
            WHERE planId ='$plan'
            AND planStatus = 'ACTIVE'"; 
    
    $result =  mysqli_query($link, $query); 
    //write code to check if the plan is active else go to error page
    $row=mysqli_fetch_assoc($result);   
    
//Sanitize Input 
    
    $firstName = mysqli_real_escape_string($link,$_POST['firstName']); 
    $lastName = mysqli_real_escape_string($link,$_POST['lastName']); 
    $email = mysqli_real_escape_string($link,$_POST['email']); 
    $address1 = mysqli_real_escape_string($link,$_POST['address1']); 
    $address2 = mysqli_real_escape_string($link,$_POST['address2']); 
    $city = mysqli_real_escape_string($link,$_POST['city']); 
    $state = mysqli_real_escape_string($link,$_POST['state']); 
    $phone = mysqli_real_escape_string($link,$_POST['phone']); 
    $landmark = mysqli_real_escape_string($link,$_POST['landmark']); 
    if ($firstName == '' or $lastName =='' or $email == '' or $address1 == '' or $address2 == '' or $city == '' or $state == '' or $phone == '' or $landmark == '' or $plan =='') { 
        
       $response[] = array (    'transaction' => 'FAILURE',
                                'paymentId' => '' );
        echo json_encode($response);
       
    
    } else 
    { 
    
      
    //create Login password - future coding 
        $query = "INSERT INTO loginTable (email,password,userRole) VALUES ('$email','password','patron')"; 

        mysqli_query($link, $query); 
        $custId = mysqli_insert_id($link);

    //Create customer master, other fields to be updated form update script.
    //$custType - R - Regular, CORP, SCHOOL, DAYCARE etc for future coding.

        $custType ="R";

        $query = "INSERT INTO custMaster (custId,firstName,lastName,custType,creationDate,custStatus,lastUpdatedTime,updatedBy) VALUES ('$custId','$firstName','$lastName','$custType','$timeStamp','PENDING','$timeStamp','System')"; 


        //update this code to send error message to webadmin
        if (!mysqli_query($link, $query)){
            echo "INSERT Customer Error  - ".mysqli_error ($link);

        }  


    //Create address master record

       $query = "INSERT INTO addressMaster (email, addressOne,addressTwo,city,state,pin,phone,landmark,custId) VALUES ('$email','$address1','$address2','$city','$state','$pincode','$phone','$landmark','$custId')";




    //update this code to send error message to webadmin
        if (!mysqli_query($link, $query)){
           echo "INSERT addressmaster Error  - ".mysqli_error ($link);

        }  


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

        }

        $paymentId= mysqli_insert_id($link);
        $response[] = array (   
            'transaction'       => 'SUCCESS',
            'paymentId'         => $paymentId, 
            'billingName'       => $firstName.' '.$lastName, 
            'billingAddress'    => $address1.' '.$address2, 
            'billingCity'       => $city, 
            'billingState'      => $state, 
            'billingZip'        => $pincode, 
            'billingCountry'    => 'India', 
            'billingTel'        => $phone, 
            'billingEmail'      => $email 		 	  
        );
        
        echo json_encode($response);
        
    }
}



/*
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
*/

?> 