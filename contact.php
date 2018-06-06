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
      
    
      <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118334348-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-118334348-1');
        </script>

      
       <title>Contact Us</title>
    
      <meta name="description" content="My Once Upon A Time is an online children's lending library with PERSONALIZED BOOK RECOMMENDATIONS and FREE HOME DELIVERY"> 
    
      <meta name="keywords" content="Online Children's library, Children's Library India, Best Children's Library Chennai, children's books Chennai,Children's Library Mumbai,Children's Library Bengaluru, Children's Library Kochi,children's lending library, online books rental, Chennai library, once upon a time,leading library in chennai, lending library in India, develop reading habits">
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
    
      
      
      <div class="container"> 
          
          <br><br><br><br>
    
         <h1 style="text-align:center; color:maroon; font-weight: 600;font-size: 30;">Write To Us<br></h1>
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
          
          <br> <br> 
            
          <footer class="my-5 pt-5 text-muted text-center text-small" id="footer">
        
              <p  class="mb-1"> &copy; My Once Upon A Time </p>

        
              <ul class="list-inline">
        
                  <li class="list-inline-item"><a href="privacypolicy.php">Privacy</a></li>
         
                  <li class="list-inline-item"><a href="terms.php"> Terms</a></li>
         
                  <li class="list-inline-item"><a href="contact.php">Support</a></li>
       
              </ul>

      
          
      
          </footer>
      
      </div>

     <script src="jquery-3.3.1.min.js"></script>
    <script> 
         
      $('#register').click(function() {
      window.location = "register.php"
      });
      
      $('#renew').click(function() {
      window.location = "renewal.php"
      });
          
    </script>
     
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