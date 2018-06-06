<?php

//There are three functions currently 
//1. For sending approval email with Membership id and relevant details once user makes hte payment
//2. To notify the customer that we are not yet serving their area
//3. Send email after completing registration by the user

function sendEmail($action,$name, $memberId, $email, $password,$planName, $startDate, $expiryDate, $address,$landmark,$phone)
            
{  
    $bccList = "sash007@gmail.com,nivedita900@gmail.com";
    

if ($action=="approve") {
    $subject = "Welcome to My Once Upon A Time";
    $message = "
    <html>

    <body>
    <p> <strong>Dear $name, </strong> </p>
    <p> 
    Thank you for choosing My Once Upon A Time Children's Library. We have received your payment and your account has been successfully setup. The membership details are given below :

    </p>  

    <p> 
    Patron Name : $name <br>
    Membership Id : $memberId <br> 
    User Id  : $email <br> 
    password : $password <br> 
    <br> 
    Plan Name : $planName <br> 
    Plan Start Date : $startDate <br> 
    Plan Expiry Date : $expiryDate <br> 
    Delivery Address : $address <br> 
    Landmark : $landmark <br> 
    Phone : $phone

    </p> 

    <p>
    You can change this password by using the 'edit profile' link in the Patron page. <br> <br> 
    To receive your first set of books, please click the Catalog Menu available in the <a href='http://myonceuponatime.in'> Home Page</a>. Use the User Id (registred email id) and password mentioned above to login to the Patron Page and 'Add Hold' on all the books you would like to read.  We will send you the first set of available books from your Current Holds queue at the earliest. 
    </p>

    <p>
    We suggest that you always keep at least 10 books in your Current Holds queue, since the books are sent out based on their availability. Please reach out to us if you face any difficulty, we are here to make your experice a memorable one.
    </p>
    <p> You can find the FAQs <a href='http://myonceuponatime.in/faq.php'> here </a> </p> 

    <p> Happy reading! </p>
    <p> Thank you. </p>
    <p> Regards, </p>
    <p> <strong> <em>My Once Upon A Time </em>Team </strong> </p>
    <p> WhatsApp / Call @ +91 638 249 3117 OR +91 735 807 4341</p>
    </body>
    </html>
    ";
    
} else if($action=="renewal"){
    $subject = "My Once Upon A Time - Membership Renewal";
    $message = "
    <html>

    <body>
    <p> <strong>Dear $name, </strong> </p>
    <p> 
    We have received your payment and your account has been successfully renewed. The  details are given below :

    </p>  

    <p> 
    Patron Name : $name <br>
    Membership Id : $memberId <br> <br> 


    Plan Name : $planName <br> 
    Plan Start Date : $startDate <br> 
    Plan Expiry Date : $expiryDate <br> 
    Delivery Address : $address <br> 
    Landmark : $landmark <br> 
    Phone : $phone

    </p> 


    <p> Happy reading! </p>
    <p> Thank you. </p>
    <p> Regards, </p>
    <p> <strong> <em>My Once Upon A Time </em>Team </strong> </p>
    <p> WhatsApp / Call @ +91 638 249 3117 OR +91 735 807 4341</p>
    </body>
    </html>
    ";
    
} else if($action=="register"){
    
    
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

If (mail($email,$subject,$message,$headers)){ 
    return true;
}else return false;
    

}

?>
  