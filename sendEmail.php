<?php

//There are three functions currently 
//1. For sending approval email with Membership id and relevant details once user makes hte payment
//2. To notify the customer that we are not yet serving their area
//3. Send email after completing registration by the user

//function sendEmail($name,$emailTo,$memberId,$expiryDate,$addressOne,$addressTwo,$city,$pin,$phone,$action)
function sendEmail($action,$name,$emailTo,$Id,$dateOrRegFee,$addressOneOrSecurityDep,$addressTwoOrPlanFee,$cityOrRegularPrice,$pinOrDiscount,$phoneOrTotal)
            
{  
    $bccList = "sash007@gmail.com,nivedita900@gmail.com";
    

if ($action=="approve") {
    $subject = "Welcome to My Once Upon A Time";
    $message = "
    <html>

    <body>
    <p> <strong>Dear $name, </strong> </p>
    <p>
    We have received your payment and thank you for choosing My Once Upon A Time Children's Library. We are delighted to have you as part of our family. Your account has been successfully setup and the membership details are given below

    </p>  


    <table>
    <tr>

    <th align='center'>Membership ID</th>
    <th align='center'>User Id</th>
    <th align='center'>Plan Expiry Date<th>
    <th align='left'>Delivery Address</p>

    </tr>

    <tr>

    <td align='center'>$Id</td>
    <td align='center'> $emailTo</td>
    <td align='center'> $dateOrRegFee</td>
    <td align='center'> $addressOneOrSecurityDep</td>
    <td align='center'> $addressTwoOrPlanFee</td>
    <td align='center'> $cityOrRegularPrice</td>
    <td align='center'> $pinOrDiscount</td>
    <td align='center'> Ph $phoneOrTotal</td>

    </tr>

    </table>


    <p>
    We will send your password in a seperate email. To receive your first set of books, please click the Catalog Menu available in the <a href='http://myonceuponatime.in'> Home Page</a>. Use your registred email id and password to login to the Patron Page and 'Add Hold' on all the books you would like to read.  We will send you the first set of available/in-stock books from your Current Holds queue at the earliest. 
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
    <p> <strong>Dear $name, </strong> </p>
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
    
} else if($action=="register"){
    
    $subject = "My Once Upon A Time - Registration Details ";
    $message = "
    <html>

    <body>
    <p> <strong>Dear $name, </strong> </p>
    <p>
    Thank you for choosing My Once Upon A Time Children's Library. Your registration details are as below. 

    </p>  


    <table>
    <tr>

    <th align='center'>Customer ID</th>
    <th align='center'>Registred Email</th>
    <th align='center'>Registraion Fee(One Time)</th>
    <th align='center'>Security Deposit(Refundable)</th>
    <th align='center'>Regular Price</th>
    <th align='center'>Discount</th>
    <th align='center'>Plan Cost</th>
    <th align='center'>Total Amount Payable</th>

    </tr>

    <tr>

    <td align='center'>$Id</td>
    <td align='center'> $emailTo</td>
    <td align='center'> $dateOrRegFee</td>
    <td align='center'> $addressOneOrSecurityDep</td>
    <td align='center'> $addressTwoOrPlanFee</td>
    <td align='center'> $cityOrRegularPrice</td>
    <td align='center'> $pinOrDiscount</td>
    <td align='center'> $phoneOrTotal</td>
     

    </tr>

    </table>


    <p>
    Please make the payment at the earliest. You can do the payment via PayTM, TEZ and to our bank account directly. For PayTM or TEZ, please use the mobile number : 735 807 4341
    </p>

    <p>
    For Bank Transfers, please use the below details <br> Name : NIVEDITA NAIR <br> Account Number : 915010041850925 <br> Bank Name : AXIS BANK, Branch - CHETTINAD HEALTH CITY, Address: B3Z CHETTINAD HEALTH CITY RAJIV GANDHI SALAI KELAMBAKKAM CHENNAI  <br> IFSC Code : UTIB0002784
    
    </p> 
    <p>
    Once the payment is cleared, we will generate your Login ID and password and you can add books into your queue. We will deliver your first set of books in 1 - 3 business days.
    </p>
    
    <p> You can find the FAQs <a href='http://myonceuponatime.in/#faq'> here </a>. Please reach out to us if you find any difficulty, we are here to make your experice a memorable one.</p> 

    <p> Thank you. </p>
    <p> Regards, </p>
    <p> <strong> <em>My Once Upon A Time </em>Team </strong> </p>
    <p> WhatsApp / Call @ +91 638 249 3117 OR +91 735 807 4341</p>
    </body>
    </html>
    ";
    
    
}

$headers = ''; 
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

If (mail($emailTo,$subject,$message,$headers)){
    return true;
}else return false;
    

}

?>
  