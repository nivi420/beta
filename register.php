<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Register</title>
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
      <div> 
       <br> <br> 
          
          <h1 style="text-align:center; color:maroon; font-weight: 600;font-size: 30;"><br>Subscription Plans <br></h1>
         
          <br>
          
          <p style="text-align:left"> Each plan gives you free home delivery & pickup and allows you to keep the books for as long as you want. There are no hidden charges and all the charges are inclusive of all taxes. <b>Remember, the longer the duration, the less you pay.</b>
         </p>

        
       
          <form class="from-group row ml-0 mb-4" role="search">
            <div class="col-xs-3">
                <input type="text" id='search' class="form-control" placeholder="Enter your PIN code ...">
                
            </div><div class="col-xs-3">
                
                <button type="button" class="btn btn-primary ml-3" id="submit">
                     <span class="glyphicon glyphicon-search"></span> Search
              </button>
            </div>
       
          </form>
    
          </div>
    
        <div id="city" style="color:red; font-weight:600;font-size:18px"> <b> Selected City : <span id="cityname"> </span></b><span id="frequency"><b>. We visit this area once a week.</b></span></div>
        
        <br>  
        
        <div id='ocplan'>
        <p style="color:maroon; font-weight: 400;font-size: 16px;"> <i>Please click on the green buttons of the subscription plans (1 MONTH, 3 MONTHS, 6 MONTHS) to register.</i></p>
      
    <table class="table">
    <thead style="background-color: #00B5D2 !important;">
        
        <tr>
             
            <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">Plan</th>
            <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">1 MONTH</th>
            <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">3 MONTHS</th>
            <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">6 MONTHS</th>
       
   
        </tr>
            
    </thead>    
            
    
        <tbody>
            
            <tr>
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">2 Books Per Month <br> <span class="text-muted" style="font-size:0.9rem"> [One Delivery Per Month]  </span></td>                  
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC1M2BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 299/mo">

                    </form>                
                </td> 
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC3M2BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 229/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 210 </i></b> </span>      
                    </form>          
                </td> 
                 <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden" name="plan" value="OC6M2BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 209/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 540 </i></b> </span>                     
                    </form>                  
                </td> 
            </tr>
        
              <tr>
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">3 Books Per Month <br>  <span class="text-muted" style="font-size:0.9rem"> [One Delivery Per Month]  </span></td>                  
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC1M3BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 399/mo">

                    </form>                
                </td> 
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC3M3BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 329/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 210 </i></b> </span>                     
                    </form>          
                </td> 
                 <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden" name="plan" value="OC6M3BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 309/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 540 </i></b> </span>                     
                    </form>                  
                </td> 
            </tr>
        
            <tr>
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">4 Books Per Month <br>  <span class="text-muted" style="font-size:0.9rem"> [One Delivery Per Month]  </span></td>                  
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC1M4BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 499/mo">

                    </form>                
                </td> 
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC3M4BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 429/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 210 </i></b> </span>                     
                    </form>          
                </td> 
                 <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden" name="plan" value="OC6M4BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 399/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 600 </i></b> </span>                     
                    </form>                  
                </td> 
            </tr>
          
       
             <tr>
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">8 Books Per Month <br>  <span class="text-muted" style="font-size:0.9rem"> [Two Deliveries Per Month, 4 Books each]  </span> </td>                  
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC1M8BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 749/mo">

                    </form>                
                </td> 
                <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                   <form action="signup.php" method="POST">
                        <input type="hidden"  name="plan" value="OC3M8BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 649/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 300 </i></b> </span>                     
                    </form>          
                </td> 
                 <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                    <form action="signup.php" method="POST">
                        <input type="hidden" name="plan" value="OC6M8BNW"> 
                        <input type="submit" class="btn btn-success" value="₹ 629/mo">
                        <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 720 </i></b> </span>                     
                    </form>                  
                </td> 
            </tr>
        
        
        
        </tbody>     
    
        </table>
      
        <br>
        <p style="color:maroon; font-weight: 400;font-size: 16px;" font-weight-bold > One Time Registration Fee - ₹ 300, Refundable Security Deposit -₹ 500. Please <a href="contact.php"> contact </a> us for custom plans</p>
        
   
      </div>
        
     
        <div id='chplan'> 
            <p style="color:maroon; font-weight: 400;font-size: 16px;"> <i>Please click on the green buttons of the subscription plans (1 MONTH, 3 MONTHS, 6 MONTHS) to register.</i></p>
            <table class="table">
            <thead style="background-color: #00B5D2 !important;">

                <tr>

                    <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">Plan</th>
                    <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">1 MONTH</th>
                    <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">3 MONTHS</th>
                    <th class="text-center" style="color: #fff; text-transform: uppercase; vertical-align: middle;">6 MONTHS</th>


                </tr>

            </thead>    

            <tbody>

                <tr>
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">2 Books at a time<br> <span class="text-muted" style="font-size:0.9rem"> [Unlimited Delivery]  </span> </td>                  
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                      <form action="signup.php" method="POST">
                            <input type="hidden"  name="plan" value="CL1M2BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 299">

                        </form>                
                    </td> 
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                        <form action="signup.php" method="POST">
                            <input type="hidden"  name="plan" value="CL3M2BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 749">
                            <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 148 </i></b> </span>                     
                        </form>          
                    </td> 
                     <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                        <form action="signup.php" method="POST">
                            <input type="hidden" name="plan" value="CL6M2BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 1495">
                            <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 299 </i></b> </span>                     
                        </form>                  
                    </td> 
                </tr>
                <tr>
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">3 Books at a time<br> <span class="text-muted" style="font-size:0.9rem"> [Unlimited Delivery]  </span> </td>                  
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                        <form action="signup.php" method="POST">
                            <input type="hidden" name="plan" value="CL1M3BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 399">

                        </form>                
                    </td> 
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                       <form action="signup.php" method="POST">
                            <input type="hidden"  name="plan" value="CL3M3BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 999">
                             <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 198 </i></b> </span>                        
                        </form>          
                    </td> 
                     <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                        <form action="signup.php" method="POST">
                            <input type="hidden" name="plan" value="CL6M3BN1"> 
                            <input type="submit" class="btn btn-success" value="₹ 1995">
                             <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 399 </i></b> </span>                        
                        </form>                  
                    </td> 
                </tr>
                <tr>
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 16px;">4 Books at a time<br> <span class="text-muted" style="font-size:0.9rem"> [Unlimited Delivery]  </span> </td>                  
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                       <form action="signup.php" method="POST">
                            <input type="hidden" name="plan" value="CL1M4BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 499">

                        </form>                
                    </td> 
                    <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                       <form action="signup.php" method="POST">
                            <input type="hidden"  name="plan" value="CL3M4BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 1249">
                            <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 248 </i></b> </span>                       
                        </form>          
                    </td> 
                     <td class="text-center" style="color:#000; font-weight: 500;font-size: 14px;">
                       <form action="signup.php" method="POST">
                            <input type="hidden"  name="plan" value="CL6M4BNW"> 
                            <input type="submit" class="btn btn-success" value="₹ 2495">
                            <br> <span style="color:red ; font-size:16px"> <b> <i> Save ₹ 499 </i></b> </span>                       
                        </form>                  
                    </td> 
                </tr>


                </tbody>     

                </table>

                <br>
                <p style="color:maroon; font-weight: 400;font-size: 16px;"> One Time Registration Fee - ₹ 250, Refundable Security Deposit -₹ 500. </p>
        
            </div>
        
        <div id='noplan'> 
        
            <p class='font-weight-bold ml-0'> Sorry, we do not currently serve this area. Please <a  href="contact.php"> contact us</a> </p>
        </div>
        
               
        <footer class="my-5 pt-5 text-muted text-center text-small" id="footer">
        
              <p  class="mb-1"> &copy; My Once Upon A Time </p>

        
              <ul class="list-inline">
        
                  <li class="list-inline-item"><a href="privacypolicy.php">Privacy</a></li>
         
                  <li class="list-inline-item"><a href="terms.php"> Terms</a></li>
         
                  <li class="list-inline-item"><a href="contact.php">Support</a></li>
       
              </ul>

      
          
        </footer>
        
         
      </div>
      
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
      <script src="jquery-3.3.1.min.js"> </script>
      <script> 
          
         
          function searchpin(){
                    
              $('#chplan').hide(); 
              $('#ocplan').hide(); 
              $('#noplan').hide();
              $('#city').hide();
              $('#frequency').hide();
                
              
              var pincode = ($('#search').val() );

              $.ajax({

                  method: "POST",
                  url: 'searchpin.php',
                  data: {'search': pincode },
                  success : function(response) {
                      var myResponse = JSON.parse(response); 
                      var type = myResponse[0]['type']; 
                      var city = myResponse[0]['city'];
                      $('#cityname').html(city); 

                      if (type == 'SELF') {
                          $('#chplan').show();
                          $('#city').show();
                          $('#frequency').show();

                      } else if (type =='FEDEX') {
                          $('#ocplan').show(); 
                            $('#city').show();

                      } else $('#noplan').show(); 
                  }
              })
              
          }
          
          $(document).ready(function() {
              
            
              $('#chplan').hide(); 
              $('#ocplan').hide(); 
              $('#noplan').hide(); 
              $('#city').hide();
              $('#frequency').hide();
           
              $('#search').keypress(function(event){
                  var keyCode = (event.keyCode ? event.keyCode : event.which);  
                  if (keyCode == 13) {
                      $('#submit').trigger('click');
                      return false; 
    
                  }

              });
        
              $('#submit').click(function(e) {
                  e.preventDefault(); 
                  searchpin(); 
                  
              })
           });
    
      </script> 
      
    <script> 
         
      $('#register').click(function() {
      window.location = "register.php"
      });
      
      $('#renew').click(function() {
      window.location = "renewal.php"
      });
          
    </script>
    
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      
  </body>
    
</html>