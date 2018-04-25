<?php 

//Tables Updated - loginTable, custMaster, addressMaster, paymentMaster 

session_start(); 
date_default_timezone_set("Asia/Kolkata");
$timeStamp = date('Y-m-d H:i:s');

require '../sendEmail.php';
require '../config.php';

$plan=$_SESSION['plan'];


$query = "SELECT * FROM planMaster WHERE planId='$plan'";

$result =  mysqli_query($link, $query); 

//write code to check if the plan is active else go to error page
    
$row=mysqli_fetch_assoc($result);   


if ($_POST) { 
      
//create Login password - future coding 
    $query = "INSERT INTO loginTable (email,password,userRole) VALUES ('$_POST[email]','password','patron')"; 
    
    mysqli_query($link, $query); 
    $custId = mysqli_insert_id($link);
     
//Update customer master, other fields to be updated form update script.
//$custType - R - Regular, CORP, SCHOOL, DAYCARE etc for future coding.
    
    $custType ="R";
        
    $query = "INSERT INTO custMaster (custId,firstName,lastName,custType,creationDate,custStatus,lastUpdatedTime,updatedBy) VALUES ('$custId','$_POST[firstName]','$_POST[lastName]','$custType','$timeStamp','NEW','$timeStamp','System')"; 
    
    
    //update this code to send error message to webadmin
    if (!mysqli_query($link, $query)){
        echo "INSERT Customer Error  - ".mysqli_error ($link);
        
    }  
      
    
//Update address master
      
   $query = "INSERT INTO addressMaster (email, addressOne,addressTwo,city,state,pin,phone,landmark,custId) VALUES ('$_POST[email]','$_POST[address1]','$_POST[address2]','$_POST[city]','$_POST[state]','$_POST[pin]','$_POST[phone]','$_POST[landmark]','$custId')";
  
     
    
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
    $orderType = "FIRSTORDER";
    $paymentStatus = "PENDING";
    
    $query = "INSERT INTO paymentTable (custId,planId,paymentMode,orderType,planCost,registrationFee,securityDeposit,paymentRequested,paymentRequestDate,paymentStatus,lastUpdatedTime,updatedBy) VALUES ('$custId','$plan','$paymentMode','$orderType','$row[planCost]','$row[registrationFee]','$row[securityDeposit]','$row[totalAmount]','$timeStamp','$paymentStatus','$timeStamp','System')"; 
    
     //update this code to send error message to webadmin
    if (!mysqli_query($link, $query)){
       echo "INSERT paymentMaster Error  - ".mysqli_error ($link);
        
    }
    sendEmail('register',$_POST['firstName'],$_POST['email'],$custId,$row['registrationFee'],$row['securityDeposit'],$row['regularPrice'],$row['discount'],$row['planCost'],$row['totalAmount']);
    
    //Take to Thank you page
    header ("Location:thankyou.html"); 
   
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title> Patron Registration Page</title>

    <script type="text/javascript" src="jquery-3.3.1.min.js"> </script>
     
      
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

   <body>

    <div class="container">
      <div class="py-5 text-center">
<!--
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
--> 

        <h2>Patron Registration Form</h2>
<!--
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>

--> 
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $row['planName'] ?></h6>
<!--
                <small class="text-muted">Change Plan</small>
-->
              </div>
                
              <span class="text-muted"><?php echo "₹ ".$row['regularPrice'] ?></span>
                 
            </li>
              
               <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Discount</h6>
               
              </div>
              <span class="text-muted"><?php echo "₹ ".$row['discount'] ?></span>
            </li>
              
               <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Plan Cost</h6>
               
              </div>
              <span class="text-muted"><?php echo "₹ ".$row['planCost'] ?></span>
            </li>
              
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Registration Fee </h6>
                
              </div>
              <span class="text-muted"><?php echo "₹ ".$row['registrationFee'] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Security Deposit</h6>
               
              </div>
              <span class="text-muted"><?php echo "₹ ".$row['securityDeposit'] ?></span>
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
              <span>Total (INR)</span>
              <strong><?php echo "₹ ".$row['totalAmount'] ?></strong>
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
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Delivery address</h4>
          <form class="needs-validation" novalidate method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

              
<!--            
              
              <div class="mb-3">
              
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="" required>
                <div class="invalid-feedback">
                  Valid Name is required.
               
              </div>
             
            </div>

              
            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>
--> 
            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address1">Address 1</label>
              <input type="text" class="form-control" name="address1" id="address1" placeholder="Your Apartment Name and Number" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 </label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Street Name and Locality" required>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Your City" required>
                <div class="invalid-feedback">
                  Please enter a valid city.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="Your State" required>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="pin">PIN</label>
                <input type="text" class="form-control" id="pin" name="pin" placeholder="" required>
                <div class="invalid-feedback">
                  PIN code required.
                </div>
              </div>
            </div>
              
              <div class="mb-3">
              <label for="phone">Mobile Number </label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Mobile Number" required>
            </div>
              
               <div class="mb-3">
              <label for="landmark">Nearest Landmark </label>
              <input type="text" class="form-control" name="landmark" id="landmark" placeholder="Near ELCOT Sholinganallur" required>
            </div>
<!--              
            <hr class="mb-4">

        <div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mytext[]"></div>
</div>
              
             
      
             
              <div class="row">
              <div class="col-md-5 mb-3">
                <label for="childname">Child Name<span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="childname" name= placeholder="Child Name">
                 
              </div>
              <div class="col-md-4 mb-3">
                <label for="birthyear">Year of Birth</label>
                <input type="text" class="form-control" id="birthyear" placeholder="2015" required>
                <div class="invalid-feedback">
                  Please provide a valid year.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="pin">Gender</label>
                 <select class="custom-select d-block w-100" id="gender" required>
                  <option value="">Choose...</option>
                  <option>Male</option> 
                  <option>Female</option>
                </select>
                <div class="invalid-feedback">
                  Gender required.
                </div>
              </div>
            </div>
 
              
         
<!--              
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">
 
            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
--> 
            <hr class="mb-4">
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Register" id="register">
          </form>
        </div>
      </div>

        
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; My Once Upon A Time</p>
<!--
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
-->
      </footer>


    </div>

     
        
    <script type="text/javascript"> 
  /*  Add Child name dinamically - to be worked       
  
  
           $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
*/    
    </script>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
