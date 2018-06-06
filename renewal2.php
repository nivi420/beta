<?php 

//ATTENTION : Change TEST TO PROD before deployment

session_start(); 
date_default_timezone_set("Asia/Kolkata");
$timeStamp = date('Y-m-d H:i:s');   
$_SESSION['transaction'] = 'RENEWAL'; 


//Change ALPHA OR BETA url to PROD 

//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------
//TEST
$url = 'http://alpha.myonceuponatime.in/ccavResponseHandler.php';
require '../../ccavenue/merchantcc.php'; 

//PROD
//$url = 'http://myonceuponatime.in/ccavResponseHandler.php'; 
//require '../ccavenue/merchantcc.php'; 
 
//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------


require 'config.php';

$custId = $_SESSION['custId'];

$plan=$_POST['plan'];
if ($plan=='' or $custId == '') { 
    header ('Location:renewal.php'); 
}

$_SESSION['planId'] = $plan; 

$query = "SELECT * 
            FROM planMaster 
            WHERE planId ='$plan'
            AND planStatus = 'ACTIVE'
            AND planType = 'RENEWAL'
            "; 

$result =  mysqli_query($link, $query);     
$row=mysqli_fetch_assoc($result); 


$planName = $row['planName']; 
$regularPrice = $row['regularPrice']; 
$discount = $row['discount']; 
$totalAmount = $row['totalAmount'];

$query = "
        SELECT 
            custMaster.custId,
            custMaster.firstName,
            custMaster.lastName,
            addressMaster.addressOne,
            addressMaster.addressTwo,
            addressMaster.city,
            addressMaster.state,
            addressMaster.pin,
            addressMaster.email,
            addressMaster.phone
            
        FROM custMaster 
        INNER JOIN addressMaster 
        ON custMaster.custId = addressMaster.custId
        WHERE custMaster.custId='$custId'; 
        "; 

$result = mysqli_query($link, $query); 
$row=mysqli_fetch_assoc($result); 

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

       <title> Renewal Form</title>
    
      <meta name="description" content="My Once Upon A Time is an online children's lending library with PERSONALIZED BOOK RECOMMENDATIONS and FREE HOME DELIVERY"> 
    
      <meta name="keywords" content="Online Children's library, Children's Library India, Best Children's Library Chennai, children's books Chennai,Children's Library Mumbai,Children's Library Bengaluru, Children's Library Kochi,children's lending library, online books rental, Chennai library, once upon a time,leading library in chennai, lending library in India, develop reading habits">
      
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        

        <script type="text/javascript" src="jquery-3.3.1.min.js"> </script>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="form-validation.css" rel="stylesheet">
  
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
    
    
        
    <div class="container">
      
        <div class="py-5 text-center">
            <br> <br> 
            <h1 style="text-align:center; color:maroon; font-weight: 600;font-size: 30;">Membership Renewal</h1>
        </div>

      
        <div class="row">
        
            <div class="col-md-4 order-md-2 mb-4">
         
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted"><?php echo $planName ?></span>
                </h4>    
          
                <ul class="list-group mb-4">
                    
                    
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div><h6 class="my-0">Original Plan Cost</h6></div>
                        <span class="text-muted"><?php echo "₹ ".$regularPrice ?></span>
                    </li>
              
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div> <h6 class="my-0">Discount</h6></div>
                        <span class="text-muted"><?php echo "(-)"."₹ ".$discount ?></span>
                    </li>
             
<!--
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-₹5</span>
            </li>
-->
          
                    <li class="list-group-item d-flex justify-content-between">
                        <span><b> You Pay</b></span>
                        <strong><?php echo "₹ ".$totalAmount ?></strong>
                    </li>
                </ul>

 <!--
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Referral code">

              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>

            </div>
          </form>
-->
            
                <input id="renewal" class="btn btn-primary  btn-block" type="submit" value="Renew Membership">
        
            </div>
        
            <div class="col-md-8 order-md-1">
         
                <h4 class="mb-3 text-info">Shipping Address</h4>
                <h5 class="mb-2 text-muted"> <?php echo $row['firstName'].' '. $row['lastName'] ?></h5>
                <h5 class="mb-2 text-muted"> <?php echo $row['addressOne'] ?> </h5>
                <h5 class="mb-2 text-muted"><?php echo $row['addressTwo'] ?> </h5>
                <h5 class="mb-2 text-muted"> <?php echo $row['city'].' , '.$row['state'].' , '.'PIN: '.$row['pin'] ?>  </h5>
                <h5 class="mb-2 text-muted"> Email: <?php echo $row['email'] ?> , Ph:  <?php echo $row['phone'] ?> </h5>
                <h6> <br>For any changes in the adress, please <a href="contact.php"> contact us </a> </h6>
            
        
          </div>
      
        </div>
        
    
    
        <form method="post" class="needs-validation" name="customerData" action="ccavRequestHandler.php" id="customerData">
		 
            <input type="hidden" name="tid" id="tid"> 
            <input type="hidden" name="merchant_id" value="<?php echo $merchantId ?>">
            <input type="hidden" id="orderId" name="order_id" value="">
            <input type="hidden" name="amount" value="<?php echo $totalAmount ?>"> 
            <input type="hidden" name="currency" value="INR">
            <input type="hidden" name="redirect_url" value="<?php echo $url ?>">
            <input type="hidden" name="cancel_url" value="http://myonceuponatime.in"> 
            <input type="hidden" name="language" value="EN">
            <input type="hidden" id="billingName" name="billing_name" value="<?php echo $row['firstName'].' '. $row['lastName'] ?>">
            <input type="hidden" id="billingAddress" name="billing_address" value="<?php echo $row['addressOne'].' '. $row['addressTwo'] ?>">
            <input type="hidden" id="billingCity" name="billing_city" value="<?php echo $row['city']?>">
            <input type="hidden" id="billingState" name="billing_state" value="<?php echo $row['state']?>">
            <input type="hidden" id="billingZip" name="billing_zip" value="<?php echo $row['pin']?>">
            <input type="hidden" id="billingCountry" name="billing_country" value="India">
            <input type="hidden" id="billingTel" name="billing_tel" value="<?php echo $row['phone']?>">
            <input type="hidden" id="billingEmail" name="billing_email" value="<?php echo $row['email']?>">
            
            
         </form>

        
      <footer class="my-5 pt-5 text-muted text-center text-small" id="footer">
          <p class="mb-1">&copy; My Once Upon A Time</p>
          
          <ul class="list-inline">
              <li class="list-inline-item"><a href="privacypolicy.php">Privacy</a></li>
              <li class="list-inline-item"><a href="terms.php"> Terms</a></li>
              <li class="list-inline-item"><a href="contact.php">Support</a></li>
          </ul>

          </footer>


    </div>

    
    <script type="text/javascript"> 
        
        window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
        } 
	
   
        $( "#renewal" ).click(function( event ) {
 
  // Stop form from submitting normally
            event.preventDefault();
            
            $.ajax({
                method: "POST",
                url: 'createorder.php',
                success: function(response){
                    var myResponse = JSON.parse(response);
                    var transaction = myResponse[0]['transaction']; 
                    
                    if (transaction == 'SUCCESS') { 
                        var orderId = myResponse[0]['paymentId']; 
                        $('#orderId').val(orderId);
                        setTimeout(function() {$('#customerData').submit();},1000);
                    } 
                 }
                
            }) 
        })  
    
        
    </script>
        
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
