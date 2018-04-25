
<?php 



session_start(); 

date_default_timezone_set("Asia/Kolkata");
$timeStamp = date('Y-m-d H:i:s');
$today =  date('Y-m-d');
//$today =  date('d/m/Y');
 
require 'sendEmail.php';
 
require 'config.php';
 
if($_POST){
     
    if ($_POST['action']=="approve") {


        foreach ($_POST['check'] as $value) {

//update payment table 
//$paymentStatus to be updated for future coding 
//$transactionId to be updated for Card transactions - future coding.
//$paymentReceived to be updated for Card transactions 
//$updatedBy = SYSTEM or USER - future coding.
            
            $query = 
                "SELECT 
                    paymentTable.planId,
                    paymentTable.paymentId,
                    planMaster.duration,
                    paymentTable.paymentMode,
                    paymentTable.paymentRequested
                FROM paymentTable 
                INNER JOIN planMaster ON 
                planMaster.planId = paymentTable.planId
                WHERE custId ='$value' 
                ORDER BY paymentId 
                DESC LIMIT 1"; 
            
            $result = mysqli_query($link, $query); 
            $row = mysqli_fetch_assoc($result);
            $paymentId = $row['paymentId'];
            $planId = $row['planId'];
            $duration = $row['duration'];
             
            
            if ($row['paymentMode']=='CASH') {
                $paymentReceived  = $row['paymentRequested'];
                
            } else {
//future coding is required for setting up CARD payment    
 //            $transactionId =                
            }
            
            $paymentStatus = 'SUCCESS';
            $paymentReceivedDate = $today;
            
             
            $query = "

             UPDATE paymentTable SET
                paymentStatus = '$paymentStatus',
                paymentReceived = '$paymentReceived',
                paymentReceivedDate = '$paymentReceivedDate',
                lastUpdatedTime = '$timeStamp',
                updatedBy = 'SYSTEM' 
            WHERE paymentId = '$paymentId'
            ";

     //        $result = mysqli_query ($link, $query);  
             if (!$result = mysqli_query ($link, $query)){
      
                 echo "INSERT paymentTable Error  - ".mysqli_error ($link);
             }
            
            
            

    // start subscription 
    // Update planMaster Table


            switch ($duration) {

   
                case 30 :
                    $expiryDate = date('Y-m-d', strtotime($today. ' + 1 Month'));
                    break;

                case 90 :
                    $expiryDate = date('Y-m-d', strtotime($today. ' + 3 Months'));
                    break;
                 case 180 :
                    $expiryDate = date('Y-m-d', strtotime($today. ' + 6 Months'));
                    break;
                case 365 :
                    $expiryDate = date('Y-m-d', strtotime($today. ' + 12 Months'));
                    break;
                    
     }
 
            
            $query = "

             INSERT 
             INTO subscriptionTable (
             paymentId, 
             planStartDate,
             planExpiryDate
             ) 

             VALUES ( 
             '$paymentId',
             '$today',
              '$expiryDate'
              )

             ";

             if (!$result = mysqli_query ($link, $query)) {
                  echo "INSERT subscriptionTable Error  - ".mysqli_error ($link);
                 
             } 

 // Update custMaster Table with current plan Id, custStartDate, custStatus, planExpiryDate,and audit records

           

             $query = "

             UPDATE custMaster 
             SET 
             currentPlanId = '$planId',
             custStartDate= '$today',
             custStatus='ACTIVE',
             planExpiryDate='$expiryDate',
             lastUpdatedTime = '$timeStamp',
             updatedBy = 'System'
             WHERE 
             custId = '$value'

              "; 


            if (!$result = mysqli_query ($link, $query)) {
                  echo "UPDATE custMaster Error  - ".mysqli_error ($link);
                 
             } 


            //create membership id and update memberTable 
            
            $query = "SELECT custType FROM custMaster WHERE custId = '$value'";
       //     $result = mysqli_query ($link, $query);
            if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster Error  - ".mysqli_error ($link);
                 
             } 
            $rows = mysqli_fetch_assoc ($result);
            $custType = $rows['custType'];
       

            $query = "SELECT custId FROM custMaster WHERE custStatus ='ACTIVE'"; 
      //      $result = mysqli_query($link, $query); 
            if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster Error  - ".mysqli_error ($link);
                 
             } 
            $numRows = mysqli_num_rows($result); 

            $memberId = $custType.$numRows;

            $query = "

             INSERT INTO memberTable 
             (memberId,custId) VALUES ('$memberId','$value')
              ";  
            
            // mysqli_query($link, $query);  
            if (!$result = mysqli_query ($link, $query)) {
                  echo "INSERT memberTable Error  - ".mysqli_error ($link);
                 
             } 
            
            $query = "SELECT 
            custMaster.firstName, 
            addressMaster.email,
            addressMaster.addressOne,
            addressMaster.addressTwo,
            addressMaster.city,
            addressMaster.pin,
            addressMaster.phone
            FROM addressMaster 
            INNER JOIN custMaster 
            ON addressMaster.custId = custMaster.custId
            WHERE custMaster.custId = '$value'"; 
            
        //    $result = mysqli_query($link, $query); 
            if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster, address Master Error  - ".mysqli_error ($link);
                 
             } 
            $rows = mysqli_fetch_assoc($result);
            
             
            if (sendEmail($_POST['action'],$rows ['firstName'],$rows ['email'],$memberId,$expiryDate,$rows ['addressOne'],$rows ['addressTwo'],$rows ['city'],$rows ['pin'],$rows ['phone'])) {
        
                echo "<br>.Decision has been informed to ".$rows ['firstName']."<br>";
    
            } else echo "Mail delivery failure";
 
        }


    } else if($_POST['action']=="pending") {
         foreach ($_POST['check'] as $value) {


             $query = "

             UPDATE custMaster 
             SET 

             custStatus='PENDING',
             updatedBy = 'System'
             WHERE 
             custId = '$value'

              "; 
 
             if (!$result = mysqli_query ($link, $query)) {
                  echo "UPDATE custMaster Error  - ".mysqli_error ($link);
                 
             } 
             
             $query = "SELECT 
            custMaster.firstName, 
            addressMaster.email,
            addressMaster.addressOne,
            addressMaster.addressTwo,
            addressMaster.city,
            addressMaster.pin,
            addressMaster.phone
            FROM addressMaster 
            INNER JOIN custMaster 
            ON addressMaster.custId = custMaster.custId
            WHERE custMaster.custId = '$value'"; 
            
            if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster, address Master Error  - ".mysqli_error ($link);
                 
             } 
            $rows = mysqli_fetch_assoc($result);
             //send email to the customer about registration details         
           
   
            // if (sendEmail($_POST['action'],$rows ['custName'],$rows ['email'],$memberId,$expiryDate,$rows ['addressOne'],$rows ['addressTwo'],$rows ['city'],$rows ['pin'],$rows ['phone'])) {
            
             if (sendEmail($_POST['action'],$rows ['firstName'],$rows ['email'],"","","","","","","")){
        
                 echo "<br>.Decision has been informed to ".$rows ['firstName']."<br>";
    
             } else echo "Mail delivery failure";

      
         }
    }
    
           
 
      
}

?> 