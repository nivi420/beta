<?php

        
$error = ""; 
         
$successMessage="";

    
if($_POST) { 
        
    /*    if (!$_POST["nameContact"]){ 
        
            $error .= "A name is required.<br>";
        
       }
           
 */
        if (!$_POST["emailContact"]){ 
        
            $error .= "An email address is required.<br>";
        
        }
    
        if (!$_POST["subject"]){ 
        
            $error .= "A subject is required.<br>";
        
        }
        
         if (!$_POST["message"]){ 
        
            $error .= "A message is required.<br>";
        
        }
        
        if ($_POST["emailContact"] && filter_var($_POST["emailContact"], FILTER_VALIDATE_EMAIL)== false) {
   
            $error .= "Email address is invalid.<br>";
         
        }
         if ($error != "") { 
              
             
                  $error = '<div class="alert alert-danger" role="alert"> <p> <strong>There have been error(s) in your form</strong></p>' . $error . '</div>'; 
     
         } else { 
         
            $emailTo = "admin@myonceuponatime.in"; 
             $subject = $_POST["subject"]; 
             $content = $_POST["message"]; 
             $headers = "From:".$_POST["emailContact"]; 
             
            if (mail($emailTo, $subject, $content, $headers)) { 
            $successMessage = '<div class="alert alert-success" role="alert"> <p> <strong>Your message has been sent. We will get back to you ASAP </strong></p></div>'; 
            } else { 
                $error = '<div class="alert alert-danger" role="alert"> <p> <strong>Your message could not be sent. Please try again later</p></div>'; 
     
            
            }
             
           
         }
    }

 

?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
    

    <title>Hello, world!</title>
  </head>
  <body>
      
      
      
      <div class="container"> 
    
          <h1>Send us a note!</h1>
          <div id="error"><? echo $error.$successMessage; ?> </div>
          
          
      </div>
    
      <div class="container"> 
              <form method="post">
 <!--         
            <div class="form-group">
            <label for="nameContact"> Name </label>
            <input type="text" class="form-control" id="nameContact" name="nameContact" placeholder="First & Last Name">
                
          </div>
 -->                 
            <div class="form-group">
            <label for="emailContact">Email address</label>
            <input type="email" class="form-control" id="emailContact" name="emailContact" placeholder="name@example.com">
          </div>
          
        
            <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject">
          </div>
                  
          
          <div class="form-group">
            <label for="message">What would you like to ask us? </label>
            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
          </div>

        <div class="form-group row">
            <div class="col-sm-10">
            <button class="btn btn-primary" type="submit"> Submit!</button>  
          </div>
            </div>
        
                  
        </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
      <script type="text/javascript"> 
      
          $("form").submit(function(e){
       
               
              var error = ""; 
              
              if ($("#nameContact").val() == ""){ 
                error += "Name is required.<br>"; 
              
              }
              
              if ($("#emailContact").val() == ""){ 
                error += "Email is required.<br>"; 
              
              }
              
               if ($("#subject").val() == ""){ 
                error += "Subject is required.<br>"; 
              
              }
              
              if ($("#message").val() == ""){ 
                error += "Message is required"; 
              
              }
              
              
              
              if (error != "") { 
              
             
                  $("#error").html('<div class="alert alert-danger" role="alert"> <p> <strong>There have been error(s) in your form</strong></p>' + error + '</div>'); 
                  
                  return false; 
                  
              } else { 
               
                   return true; 
                  
                  
              }
                     
    });
          
     
      
      </script>
      
      
      
  </body>
</html>