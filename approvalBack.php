
<?php 



session_start(); 

date_default_timezone_set("Asia/Kolkata");
$today =  date('Y-m-d');
//$today =  date('d/m/Y');
 

function sendEmail($name,$emailTo,$memberId,$expiryDate,$addressOne,$addressTwo,$city,$pin,$phone,$action)
            
{  
    $bccList = "sash007@gmail.com,nivedita900@gmail.com";
    

if ($action=="approve") {
    $subject = "Welcome to My Once Upon A Time";
    $message = "
    <html>

    <body>
    <p> <strong>Dear $name </strong> </p>
    <p>
    Thank you for choosing My Once Upon A Time Children's Library. We are delighted to have you as part of our family. Your account has been successfully setup and the membership details are given below

    </p>  


    <table>
    <tr>

    <th align='center'>Membership ID</th>
    <th align='center'>User Id</th>
    <th align='center'>Plan Expiry Date<th>
    <th align='left'>Delivery Address</p>

    </tr>

    <tr>

    <td align='center'>$memberId</td>
    <td align='center'> $emailTo</td>
    <td align='center'> $expiryDate</td>
    <td align='center'> $addressOne</td>
    <td align='center'> $addressTwo</td>
    <td align='center'> $city</td>
    <td align='center'> $pin</td>
    <td align='center'> Ph $phone</td>

    </tr>

    </table>


    <p>
    We will send your password in a seperate email. To recieve your first set of books, please click the Catalog Menu available in the <a href='http://myonceuponatime.in'> Home Page</a>. Use your registred email id and password to login to the Patron Page and 'Add Hold' on all the books you would like to read.  We will send you the first set of available/in-stock books from your Current Holds queue at the earliest. 
    </p>

    <p>
    We suggest that you always keep at least 10 books in your Current Holds queue, since the books are sent out based on their availability. Please reach out to us if you find any difficulty, we are here to make your experice a memorable one.
    </p>
    <p> You can find the FAQs <a href='http://myonceuponatime.in/#faq'> here </a> </p> 

    <p> Happy reading! </p>
    <p> Thank you. </p>
    <p> Regards, </p>
    <p> <strong> <em>My Once Upon A Time </em>Team </strong> </p>
    <p> WhatsApp / Call @ +91 638 249 3117 OR +91 735 807 4341</p>
    </body>
    </html>
    ";
    
} else if($action=="pending"){
    
    $subject = "We're not there just yet";
    $message ="
    <html>

    <body>
    <p> <strong>Dear $name </strong> </p>
    <p>
    Thank you for choosing My Once Upon A Time Children's Library. We are not serving in your locality right now. But we are continuing to expand and will notify you once we are ready!
    </p>
        
    <p> Thank you. </p>
    <p> Regards, </p>
    <p> <strong> <em>My Once Upon A Time </em>Team </strong> </p>
    <p> WhatsApp / Call @ +91 638 249 3117 </p>
    </body>
    </html>
    ";
    
}

 
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: MyOnceUpOnATime Admin <admin@myonceuponatime.in>\r\n";
$headers .= "cc: admin@myonceuponatime.in\r\n";
$headers .= "Bcc: ".$bccList."\r\n";
$headers .= "Reply-To: MyOnceUpOnATime Admin <admin@myonceuponatime.in>\r\n"; 
$headers .= "Return-Path: MyOnceUpOnATime Admin <admin@myonceuponatime.in>\r\n"; 
$headers .= "Organization: My Once Upon A Time\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

mail($emailTo,$subject,$message,$headers);

}
  
$link = mysqli_connect("localhost", "onceuponatimeqa", "QAb4rams", "onceuponatimeqa");
        
    if (mysqli_connect_error()) {
            
        die ("Database Connection Error". mysqli_connect_error());
            
    } 

 
if($_POST){
     
    if ($_POST['action']=="approve") {


        foreach ($_POST['check'] as $value) {

        //update payment table 

            $query = "

             INSERT INTO paymentTable (
             custId, 
             transactDate,
             paymentMode,
             orderType,
             paymentStatus,

             createdBy) 

             VALUES ( 
             '$value',
             '$today',
             'CASH',
             'ORDER',
             'SUCCESS',

             'NIVEDITA')

             ";

             $result = mysqli_query ($link, $query);  
             $subscriptionId = mysqli_insert_id($link);

    // start subscription 


           $query = "SELECT planMaster.duration 
            FROM planMaster
            INNER JOIN custMaster 
            ON planMaster.planId = custMaster.planId WHERE custMaster.custId = '$value'";

            $result = mysqli_query ($link, $query);

           $rows = mysqli_fetch_assoc ($result);  

            $duration = $rows['duration'];
    

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
             subscriptionId, 
             planStartDate,
             planExpiryDate
             ) 

             VALUES ( 
             '$subscriptionId',
             '$today',
              '$expiryDate'
              )

             ";

             $result = mysqli_query ($link, $query); 



            $query = "SELECT custType FROM custMaster WHERE custId = '$value'";
            $result = mysqli_query ($link, $query);
            $rows = mysqli_fetch_assoc ($result);
            $custType = $rows['custType'];
       

             $query = "

             UPDATE custMaster 
             SET 
             custStartDate= '$today',
             custStatus='ACTIVE',
             planExpiryDate='$expiryDate',
             updatedBy = 'Nivedita'
             WHERE 
             custId = '$value'

              "; 


            mysqli_query($link, $query);  



            //create membership id and update memberTable 

            $query = "SELECT custId FROM custMaster WHERE custStatus ='ACTIVE'"; 
            $result = mysqli_query($link, $query); 

            $numRows = mysqli_num_rows($result); 

            $memberId = $custType.$numRows;

            $query = "

             INSERT INTO memberTable 
             (memberId,custId) VALUES ('$memberId','$value')
              ";  
             mysqli_query($link, $query);  
            
            
            $query = "SELECT 
            custMaster.custName, 
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
            
            $result = mysqli_query($link, $query); 
            $rows = mysqli_fetch_assoc($result);
 
        }


    } else if($_POST['action']=="pending") {
         foreach ($_POST['check'] as $value) {


             $query = "

             UPDATE custMaster 
             SET 

             custStatus='PENDING',
             updatedBy = 'Nivedita'
             WHERE 
             custId = '$value'

              "; 
 
             mysqli_query($link, $query); 
             
             $query = "SELECT 
            custMaster.custName, 
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
            
            $result = mysqli_query($link, $query); 
            $rows = mysqli_fetch_assoc($result);

        }
    }
    
           
 //send email to the customer about registration details         
           
    sendEmail($rows ['custName'],$rows ['email'],$memberId,$expiryDate,$rows ['addressOne'],$rows ['addressTwo'],$rows ['city'],$rows ['pin'],$rows ['phone'],$_POST['action']);
      
}

?> 