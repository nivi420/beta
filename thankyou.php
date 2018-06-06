<?php 
session_start(); 
$firstName = $_SESSION['firstName']; 
$paymentId = $_SESSION['paymentId']; 
$transactionId = $_SESSION['transactionId']; 
$bankRefNo = $_SESSION['bankRefNo']; 
$transaction=$_SESSION['transaction'];
$memberId = $_SESSION['$memberId']; 
$planName = $_SESSION['$planName']; 
$startDate = $_SESSION['$startDate']; 
$expiryDate = $_SESSION['$expiryDate']; 

if ($transaction == 'REGISTER') { 
    $msg1 = 'Thank you for signing up with My Once Upon A Time!';   
    $msg2 = 'Your account has been setup and we have emailed you your username and password.';
}else { 
    $msg1 = 'Thank you for renewing your membership!';  
    $msg2 = 'We have emailed you the renewal details.'; 
}

?> 
<!doctype html>
<html lang="en">
  <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118334348-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-118334348-1');
        </script>

      
       <title> Thank you!</title>
    
      <meta name="description" content="My Once Upon A Time is an online children's lending library with PERSONALIZED BOOK RECOMMENDATIONS and FREE HOME DELIVERY"> 
    
      <meta name="keywords" content="Online Children's library, Children's Library India, Best Children's Library Chennai, children's books Chennai,Children's Library Mumbai,Children's Library Bengaluru, Children's Library Kochi,children's lending library, online books rental, Chennai library, once upon a time,leading library in chennai, lending library in India, develop reading habits">
      
    <!-- Required meta tags -->
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <script type="text/javascript" src="jquery-3.3.1.min.js"> </script>
    
    
      <style type="text/css"> 
      
          .background {
              background-color:transparent !important; 
           }
        
      </style>
      
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     
  </head>

<body>


      <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="navbar">

          <a class="navbar-brand" href="index.php">My Once Upon A Time</a>

           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

        
              <ul class="navbar-nav mr-auto">

                  <li class="nav-item">
                
                      <a class="nav-link" href="https://myonceuponatime.libib.com" target="_blank">Catalog</a>


                  </li>
        

                  <li class="nav-item">
                      <a class="nav-link" href="faq.php">FAQ</a>

                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="http://myonceuponatime.in/Blog/" target="_blank">Blog</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="ourstory.php">Our Story</a>
            
                  </li>

                   <li class="nav-item">
                      <a class="nav-link" href="contact.php" >Contact Us</a>
                  </li>

<!--                  

                  <li class="nav-item dropdown">

                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                          Blogs

                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </li>
-->
              </ul>
<!--

              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="email" placeholder="Email">  
                  <input class="form-control mr-sm-2" type="password" placeholder="Password">  
                  <button class="btn btn-danger my-2 my-sm-0" type="submit">Login</button>
              </form>
-->
              <ul class="navbar-nav mr-2">
                  <li> 
                      <button type="button" style="width:90px" class="btn btn-warning mr-sm-2 mb-2" id='register' > <b> Register</b></button>     
                  </li>
                   <li> 
                       <button type="button" style="width:90px" class="btn btn-warning mr-sm-2 mb-2" id='renew' ><b> Renew</b></button>
                  </li>
              </ul>
          </div>
      </nav>
        
    
<br> <br>     
<div class="jumbotron text-xs-center background">  
  <h1 class="display-3 text-center">Thank You!</h1>
  <p class="lead"><strong>Dear <?php echo $firstName ?>, </strong> 
      <br> <?php echo $msg1 ?> 
      <br> We have recieved your payment. The Membership and payment details are given below: 
      <br> 
      <br> Payment Id : <?php echo $paymentId ?> 
      <br> Transaction Id : <?php echo $transactionId ?>  
      <br> Bank reference number : <?php echo $bankRefNo ?> 
      <br> 
      <br> Membership Id : <?php echo $memberId ?>
      <br> Plan Name     : <?php echo $planName  ?> 
      <br> Plan Start Date : <?php echo $startDate  ?> 
      <br> Plan Expiry Date : <?php echo $expiryDate  ?> 
      <br> 
      <br> <?php echo $msg2 ?> If you do not recieve the email in your Inbox, please do check the Spam folder. We also request you to add <a href="contact.php"> admin@myonceuponatime.in </a> to your email address book to avoid any emails going to the Spam folder in the future. </p>
  <hr>
  <p>
    Having trouble? <a href="contact.php">Contact us!</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>

        
          <footer class="my-5 pt-5 text-muted text-center text-small" id="footer">
        
              <p  class="mb-1"> &copy; My Once Upon A Time </p>

        
              <ul class="list-inline">
        
                  <li class="list-inline-item"><a href="privacypolicy.php">Privacy</a></li>
         
                  <li class="list-inline-item"><a href="terms.php"> Terms</a></li>
         
                  <li class="list-inline-item"><a href="contact.php">Support</a></li>
       
              </ul>

      
          
      
          </footer>

    <script> 
         
      $('#register').click(function() {
      window.location = "register.php"
      });
      
      $('#renew').click(function() {
      window.location = "renewal.php"
      });
          
    </script>
      

</body>
</html>