 
<?php

//ATTENTION : Change TEST TO PROD before deployment

    session_start(); 
    include ('Crypto.php'); 
    require ('config.php'); 
    require ('sendEmail.php'); 

    date_default_timezone_set("Asia/Kolkata");
    $timeStamp = date('Y-m-d H:i:s');
    $today =  date('Y-m-d');


//ATTENTION : Change TEST TO PROD before deployment

//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------
//TEST
   require ('../../ccavenue/alphacc.php');
 
//PROD
   // require ('../ccavenue/prodcc.php'); 
//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------

	error_reporting(0);

	 
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$working_key);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues); 
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
        switch ($i) {
            case 0 : $paymentId=$information[1]; break; //order_id
            case 1 : $transactionId=$information[1]; break; //tracking_id
            case 2 : $bankRefNo=$information[1]; break; //bank_ref_no
            case 3 : $paymentStatus=$information[1]; break; //order_status
            case 4 : $failureMessage=$information[1]; break; //failure_message
            case 5 : $paymentMode=$information[1]; break; //payment_mode
            case 6 : $cardName=$information[1]; break; //card_name
            //case 7 : $tbd=$information[1]; break; //status_code
            case 8 : $statusMessage=$information[1]; break; //status_message
            //case 9 : $tbd=$information[1]; break; //currency
            //case 10 : $tbd=$information[1]; break; //amount
            //case 11 : $tbd=$information[1]; break; //billing_ name	
            //case 12 : $tbd=$information[1]; break; //billing_ address	
            //case 13 : $tbd=$information[1]; break; //billing_ city
            //case 14 : $tbd=$information[1]; break; // billing_ state
            //case 15 : $tbd=$information[1]; break; // billing_ zip
            //case 16 : $tbd=$information[1]; break; // billing_ country
            //case 17 : $tbd=$information[1]; break; // billing_ tel	
            //case 18 : $tbd=$information[1]; break; // billing_ email
            //case 19 : $tbd=$information[1]; break; // delivery_ name	
            //case 20 : $tbd=$information[1]; break; // delivery_ address	
            //case 21 : $tbd=$information[1]; break; // delivery_ city	
            //case 22 : $tbd=$information[1]; break; // delivery_ state	
            //case 23 : $tbd=$information[1]; break; // delivery_ zip	
            //case 24 : $tbd=$information[1]; break; // delivery_ country	
            //case 25 : $tbd=$information[1]; break; // delivery_ tel	
            //case 26 : $tbd=$information[1]; break; // merchant_param1
            //case 27 : $tbd=$information[1]; break; // merchant_param2
            //case 28 : $tbd=$information[1]; break; // merchant_param3
            //case 29 : $tbd=$information[1]; break; // merchant_param4
            //case 30 : $tbd=$information[1]; break; // merchant_param5
            //case 31 : $tbd=$information[1]; break; // vault
            //case 32 : $tbd=$information[1]; break; // offer_type	
            //case 33 : $tbd=$information[1]; break; // offer_code	
            //case 34 : $tbd=$information[1]; break; // discount_value	
            //case 35 : $merchantAmount=$information[1]; break; // mer_amount
            //case 36 : $tbd=$information[1]; break; // eci_value	
            //case 37 : $tbd=$information[1]; break; // retry
            //case 38 : $tbd=$information[1]; break; // response_code
            //case 39 : $tbd=$information[1]; break; // billing_notes
            //case 40 : $tbd=$information[1]; break; // trans_date
            //case 41 : $tbd=$information[1]; break; // bin_country 
                
        }
            
        
		//if($i==3)	$order_status=$information[1];
	}
    
    $query = "

             UPDATE paymentTable SET
                transactionId = '$transactionId',
                bankRefNo = '$bankRefNo',   
                paymentStatus = '$paymentStatus',
                failureMessage = '$failureMessage',
                paymentMode = '$paymentMode',
                cardName = '$cardName',
                statusMessage = '$statusMessage',
                lastUpdatedTime = '$timeStamp',
                updatedBy = 'CCAVENUE' 
            WHERE paymentId = '$paymentId'
            ";

     //        $result = mysqli_query ($link, $query);  
             if (!$result = mysqli_query ($link, $query)){
      
                 echo "UPDATE paymentTable Error  - ".mysqli_error ($link);
             }

    $query = "

             INSERT INTO CCAvenue (orderId,response,timeStamp) 
                    VALUES ('$paymentId','$rcvdString','$timeStamp')
            ";

     //        $result = mysqli_query ($link, $query);  
             if (!$result = mysqli_query ($link, $query)){
      
                 echo "INSERT CCAvenue Error  - ".mysqli_error ($link);
             }


	if($paymentStatus==="Success")
	{
	

        $query = 
                "SELECT 
                    paymentTable.planId,
                    planMaster.planName,
                    planMaster.duration,
                    custMaster.custId
                FROM paymentTable 
                INNER JOIN planMaster ON 
                planMaster.planId = paymentTable.planId
                INNER JOIN custMaster ON
                custMaster.custId = paymentTable.custId
                WHERE paymentId ='$paymentId' 
                ORDER BY paymentId 
                DESC LIMIT 1"; 
            
            $result = mysqli_query($link, $query); 
            $row = mysqli_fetch_assoc($result);
            $planId = $row['planId'];
            $planName = $row['planName'];
            $duration = $row['duration'];
            $custId = $row['custId'];
        
            // subscription       
        
        $startDate = $today; 

        
        if ($_SESSION['transaction'] == 'RENEWAL') { 
            
            $query = "
                        SELECT subscriptionTable.planExpiryDate
                        FROM subscriptionTable
                        INNER JOIN paymentTable 
                        ON paymentTable.paymentId = subscriptionTable.paymentId
                        INNER JOIN custMaster 
                        ON custMaster.custId = paymentTable.custId 
                        WHERE custMaster.custId = '$custId'
                        ORDER BY subscriptionId
                        DESC LIMIT 1
                    "; 
            $result = mysqli_query($link, $query); 
            $row = mysqli_fetch_assoc($result);   
            $startDate = $row['planExpiryDate']; 
            $startDate = date('Y-m-d',strtotime ($startDate. '+1 day'));     
        }
            

            
        switch ($duration) {

            case 30 :
                $expiryDate = date('Y-m-d', strtotime ('-1 day', (strtotime($startDate. ' + 1 Month'))));   
                break;

            case 90 :
                $expiryDate = date('Y-m-d', strtotime ('-1 day', (strtotime($startDate. ' + 3 Months'))));   
                break;
             case 180 :
                $expiryDate = date('Y-m-d', strtotime ('-1 day', (strtotime($startDate. ' + 6 Months'))));   
                break;
            case 365 :
                $expiryDate = date('Y-m-d', strtotime ('-1 day', (strtotime($startDate. ' + 12 Months'))));   
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
             '$startDate',
              '$expiryDate'
              )

             ";

             
        if (!$result = mysqli_query ($link, $query)) {
            echo "INSERT subscriptionTable Error  - ".mysqli_error ($link);
        } 

 // Update custMaster Table with current plan Id, custStartDate, custStatus, planExpiryDate,and audit records

           
        if ($_SESSION['transaction'] == 'RENEWAL') {
          $query = "

             UPDATE custMaster 
             SET 
             custStatus='ACTIVE',
             planExpiryDate='$expiryDate',
             lastUpdatedTime = '$timeStamp',
             updatedBy = 'CCAVENUE'
             WHERE 
             custId = '$custId'

              "; 


            if (!$result = mysqli_query ($link, $query)) {
                  echo "UPDATE custMaster Error  - ".mysqli_error ($link);
                 
             }      
            
        }else { 
        
             $query = "

             UPDATE custMaster 
             SET 
             custStartDate= '$today',
             custStatus='ACTIVE',
             planExpiryDate='$expiryDate',
             lastUpdatedTime = '$timeStamp',
             updatedBy = 'CCAVENUE'
             WHERE 
             custId = '$custId'

              "; 


            if (!$result = mysqli_query ($link, $query)) {
                  echo "UPDATE custMaster Error  - ".mysqli_error ($link);
                 
             } 
            
        }


//create membership id and update memberTable 
        
        if ($_SESSION['transaction'] == 'REGISTER'){
            
            $query = "SELECT custType FROM custMaster WHERE custId = '$custId'";
       
            if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster Error  - ".mysqli_error ($link);
                 
             } 
            $rows = mysqli_fetch_assoc ($result);
            $custType = $rows['custType'];
       

            $query = "SELECT custId FROM custMaster WHERE custStatus ='ACTIVE'"; 
      
            if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster Error  - ".mysqli_error ($link);
                 
             } 
            $numRows = mysqli_num_rows($result); 

            $memberId = $custType.$numRows;

            $query = "

             INSERT INTO memberTable 
             (memberId,custId) VALUES ('$memberId','$custId')
              ";  
            
            // mysqli_query($link, $query);  
            if (!$result = mysqli_query ($link, $query)) {
                  echo "INSERT memberTable Error  - ".mysqli_error ($link);
                 
             } 
            
        } else { 
            $query = "SELECT memberId FROM memberTable WHERE custId = '$custId' "; 
             if (!$result = mysqli_query ($link, $query)) {
                  echo "INSERT memberTable Error  - ".mysqli_error ($link);
                 
             } else {
                 $rows = mysqli_fetch_assoc ($result);
                 $memberId = $rows['memberId'];
             }       
        }
            
            
        $query = "SELECT 
            custMaster.firstName, 
            custMaster.lastName, 
            addressMaster.email,
            addressMaster.addressOne,
            addressMaster.addressTwo,
            addressMaster.city,
            addressMaster.state,
            addressMaster.pin,
            addressMaster.landmark,
            addressMaster.phone
            FROM addressMaster 
            INNER JOIN custMaster 
            ON addressMaster.custId = custMaster.custId
            WHERE custMaster.custId = '$custId'"; 
            
            
        if (!$result = mysqli_query ($link, $query)) {
                  echo "SELECT custMaster, address Master Error  - ".mysqli_error ($link);
        } 
            
        $rows = mysqli_fetch_assoc($result);
        
            
// add patron to libib start
          
        if ($_SESSION['transaction'] == 'REGISTER'){
        
            $curl = curl_init();
            $firstName = $rows ['firstName']; 
            $lastName = $rows ['lastName']; 
            $email = $rows ['email']; 
        
            $password =  substr($firstName, 0, 4).substr($lastName, 0, 1).'#2018';


            $params = array(
              'first_name' => $firstName,
              'last_name' => $lastName,
              'email' =>  $email,
              'password' => $password
            );

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.libib.com/patrons?" . http_build_query($params),
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_CONNECTTIMEOUT => 5,
              CURLOPT_TIMEOUT => 15,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_HTTPHEADER => array(
                "x-api-key: e869cce5f0f3e4e04d705e721d63d2f21b946be7b75cc5c13e8f8a6b85e80c81",
                "x-api-user: 95a908a5a9b5b3ea1836da2f06de9eea59a901ba"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            }   
        } 

//send email to the customer
        $startDate = date ("d-M-Y", strtotime($startDate)); 
        $expiryDate = date ("d-M-Y", strtotime($expiryDate)); 
    
        $name = $rows ['firstName'].' '.$rows ['lastName']; 
        $address = $rows ['addressOne']. ' , '. $rows ['addressTwo']. ' , '. $rows ['city']. ' , '. $rows ['state']. ' , '. $rows ['pin'];   
        
        if ($_SESSION['transaction'] == 'REGISTER'){ 
            sendEmail('approve',$name,$memberId,$rows ['email'], $password, $planName, $startDate, $expiryDate,$address,$rows ['landmark'], $rows ['phone']); 
        } else { 
            sendEmail('renewal',$name,$memberId,$rows ['email'],' ',$planName,$startDate,$expiryDate,$address,$rows ['landmark'],$rows ['phone']); 
        }
            
        $_SESSION['firstName'] = $rows ['firstName']; 
        $_SESSION['paymentId'] = $paymentId; 
        $_SESSION['transactionId']  = $transactionId; 
        $_SESSION['bankRefNo'] = $bankRefNo; 
        $_SESSION['$memberId'] = $memberId; 
        $_SESSION['$planName'] = $planName; 
        $_SESSION['$startDate'] = $startDate; 
        $_SESSION['$expiryDate'] = $expiryDate; 
         
        header ("Location:thankyou.php"); 
         
         
// add patron to libib end       
		
	}
	else if($paymentStatus==="Aborted")
	{
		echo "<br>Thank you for shopping with us. Your payment is Aborted. We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($paymentStatus==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

/*
	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
*/ 
?>
