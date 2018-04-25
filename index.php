<?php 
session_start(); 

/*
if (isset($_POST("CL6M3BNW"))){ 
         $_SESSION['plan'] = "CL6M3BNW"; 
}
*/    
if ($_POST) {
    if (isset($_POST["CL6M3BNW"])){ 
        $_SESSION["plan"] = "CL6M3BNW"; 
    } else if (isset($_POST["CL3M3BNW"])){ 
        $_SESSION["plan"] = "CL3M3BNW"; 
    } else if (isset($_POST["CL1M3BNW"])){ 
        $_SESSION["plan"] = "CL1M3BNW"; 
    } else if (isset($_POST["CL6M4BNW"])){ 
        $_SESSION["plan"] = "CL6M4BNW"; 
    } else if (isset($_POST["CL3M4BNW"])){ 
        $_SESSION["plan"] = "CL3M4BNW"; 
    } else if (isset($_POST["CL1M4BNW"])){ 
        $_SESSION["plan"] = "CL1M4BNW"; 
    } 
        
    header("Location: /signup"); 

}


?> 

<!doctype html>
<html lang="en">
  <head>
       <title>Online Children's library in Chennai</title>
    
      <meta name="description" content="My Once Upon A Time is an online children's lending library that helps parents to choose right books for their children and delivers it to their doorsteps. My Once Upon A Time has developed various reading programs for infants, toddlers, preschoolers, early readers and tweens"> 
    
      <meta name="keywords" content="Online Children's library, Children's Library Chennai, Best Children's Library Chennai, children's books Chennai,Children's Library India, children's library, children's lending library, online Library, online books rental, Chennai library, once upon a time, online library books,  rent books, books Chennai, order books online, online library in chennai, leading library in chennai, lending library, develop reading habits, advise books">
      
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

       <script type="text/javascript" src="jquery-3.3.1.min.js"> </script>
    <script src="jquery-ui/jquery-ui.js"></script>
        
        
        <link href="jquery-ui/jquery-ui.css" rel="stylesheet"> 
        
  
      <style> 
    
          
       
          .myonceuponatime{ 
          
            background-image: url(OnceUponATime.jpg);
            color: white; 
            text-align: right; 
            min-height: 560px;
            padding-top: 173px;
               
          }
       
          body { 
          
            position: relative;
          }
          
          * {
              box-sizing: border-box;
          }

        .columns {
            float: left;
            width: 33.3%;
            padding: 8px;
        }

        .price {
            list-style-type: none;
            border: 1px solid #eee;
            margin: 0;
            padding: 0;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .price:hover {
            box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
        }

        .price .header {
            color: white;
            font-size: 25px;
        }

        .price .xpad {
            padding : 39px;
        }

        .price .subheader {
            color: white;
            font-size: 20px;
        }
        .price .noreg { 
        background-color : yellow;
        }

        .price li {
            border-bottom: 1px solid #eee;
            padding: 20px;
            text-align: center;
        }

        .price .grey {
            background-color: #eee;
            font-size: 20px;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
        }
          
          .pagepad { 
          
          padding 50px; 
          }

        @media only screen and (max-width: 600px) {
            .columns {
                width: 100%;
            }
        }

       </style>
      
  </head>
    
  <body >
      

      <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="navbar">
  
          
          <a class="navbar-brand" href="#myonceuponatime">Once Upon A Time</a>
         
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
              <ul class="navbar-nav mr-auto">
    
 <!-- Disable home button 
                  
                  <li class="nav-item active">
                
                      <a class="nav-link" href="#myonceuponatime">Home <span class="sr-only">(current)</span></a>
        

                  </li>
    
-->
                  <li class="nav-item">
                
                      <a class="nav-link" href="#faq">FAQ</a>
              
                  </li>
                
                  <li class="nav-item">
                
                      <a class="nav-link" href="#pricingSummary">Subscription Plan</a>
              
                  </li>
              
                  
                  <li class="nav-item">
                
                      <a class="nav-link" href="https://myonceuponatime.libib.com" target="_blank">Catalog</a>
              
                  </li>
    
                  <li class="nav-item">
                
                      <a class="nav-link" href="contact.php" target="_blank">Contact Us!</a>
              
                  </li>
                  <li class="nav-item">
                
                      <a class="nav-link" href="http://myonceuponatime.in/Blog/" target="_blank">Blog</a>
              
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
          </div>

      </nav>
      


         
      <div class="myonceuponatime" id="myonceuponatime">
          <h1 class="display-4">MY ONCE UPON A TIME!</h1>
          <p class="lead"></p>

          <p class="lead">It is YOUR Story of Friendship, with Books!</p>
<!--          
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
--> 
        </div>

      <div> <br> </div>
      
        <div> 
        <h1 style="text-align:center">About Us!</h1>
         
        <p style="text-align:center"> “A book is a gift you can open again and again.” – Garrison Keillor </p>

        <p style="text-align:left"> As a parent and a book lover, this is the gift I wanted for my child. Ever since my child was born ( and even while she was in my tummy), I have been reading to her. We read 3 books every night at bedtime. Our house is filled with books in every nook and corner, wherever you turn you will find a book.

            Friends who would visit us at home would always be surprised at the number of books we had at home. It was during one such visit, that my friend suggested, "Why not start a library?". I had been thinking about this for long, sharing our love for books with other families and when my friends and colleagues at work also started asking about it, my husband and I decided it was time to start.
         </p>
 <p style="text-align:left"> We noticed that a lot of parents had a desire to get their children to read books, but they didn't know where to start, how to pick the right books and how to nurture the habit of reading. We are here to help!
         
My Once Upon a Time, is a magical story of every child who grows to love books. Gift your child the best gift in the world, a gift that can never grow old, the eternal world of books.
         </p>
<p style="text-align:left"> 
Happy Reading Everybody!
         </p>

            </div>
      
      
      
      <div id="faq"> <br> </div>
      <div> <br> </div>
      <h1 style="text-align:center">Frequently Asked Questions</h1>
       
       <div id="accordion"> 
           
           <h3> What are My Once Upon A Time reading programs? </h3>
            <div> 
                <p> 
                The very idea of <a href="http://myonceuponatime.in"> myonceuponatime.in </a> Children's library is to help parents to choose right books for their children and delivers them to their doorsteps. We have developed various reading programs for infants, toddlers, preschoolers, early readers and tweens. After you register, you can sign up for these programs based on your child's interest and reading level. 
                     
                </p>
            </div> 
             
            <h3> What are the different membership plans available? </h3>
            <div> 
                <p> 
                    The plans are categorized based on 2 factors:
                    <br> <br> 1. Number of books needed per delivery <br> 
                    2. Duration for which the customer would like to subscribe. Longer the subscription duration of the plan, higher the cost savings.
                </p>
            </div> 
            
              <h3> What is Current Holds List in the patron page?</h3>
            <div> 
                <p> 
                    Current Holds is the list of books you want to read. Browse through the online catalogue and "Add Hold" on all the books you would like to read. When you are ready for your next set of books to be sent out, we will send the first set of available/in-stock books (depending on the number of books in your subscription plan) from your Current Holds queue. 
                    We suggest that you always keep at least 10 books in your Current Holds queue, since books are sent out based on their availability.
                
                
                </p>
             </div>
        
              <h3> How to add books into Current Holds?</h3>
            <div> 
                <p>
                <br>
                    Browse through the lending library catalogue by using the search option or simply scrolling through the entire catalogue which is sorted alphabetically. Click on the books listed to read a description of each book.
                <br>   <br>
                When you see a book you would like to read, click on the 3 dots below the image of the book and select Add Hold. You may also click on the book cover image to read a description of the book and then click on the Add Hold button available there. A pop-up tray opens at the bottom of the screen which is a temporary placeholder for all the books you would like to place on Hold. To remove any books from this list, simply click on the red circle on the top right corner of the book. To clear all the books in the tray, click on Clear Queue. Once you are ready, you can click on Complete to add all the selected books into your Current Holds list.
                
                </p>
             </div>
        
           
              <h3> What is Patron Page?</h3>
            <div> 
                <p> 
                    Clicking on the Patron Page will take you to your account overview. Here you can see 3 lists <br> 
                    <br> 1. Current Holds (Books you want to read next)
                    <br> 2. Your Active Items (Books you currently have in hand)
                    <br> 3. Recent Lending History (Books you have checked-out in the past)

                    <br> <br>  There is an option to edit your profile. You can change your personal information and password here.

                
                </p>
             </div>
           
              <h3> What is the minimum number of books I need to maintain in Current Holds?</h3>
            <div> 
                <p> 
                    We suggest that you always keep at least 10 books in your “Current Holds” list, since books are sent out based on their availability/in-stock status. 

                    <br><br> For example, if you have subscribed to a 3 book plan and you keep only 3 books in your Current Holds list and all 3 books have been checked out by other members, there will be a delay in your delivery. To avoid this, it is best to keep at least 10 books in the list at all times, so that we may send out the first 3 available books from the list without any delay.
                
                </p>
             </div>
           
              <h3> How do I get books delivered after opening my account?</h3>
            <div> 
                <p> 
                    Once the payment is received and your account has been activated, please 10 books or more into your Current Holds list. Delivery of your first set of books will happen within 1-3 days. All subsequent return requests and deliveries will be processed once a week. 

                
                </p>
             </div>
           
           
              <h3> What if the books are not delivered within 1-3 days?</h3>
            <div> 
                <p> 
                   Please contact us at 638 249 3117 and we will ensure you get your books at the earliest.

                
                </p>
             </div>
           
              <h3> After I finish reading, how do I get my next set of books?</h3>
            <div> 
                <p> 
                   Send us a WhatsApp message or SMS at 638 249 3117 from your registered mobile number to let us know that you are ready for pick up. We will have your next set of books ready from your Current Holds list based on their availability. Delivery and pickup is scheduled once a week.

                
                </p>
                
              <h3> Will you deliver all over India</h3>
            <div> 
                <p> 
                  myonceuponatime.in is an Online Children's library that helps parents every way possible. Currently we we deliver only in Chennai Metro limits. However, we will make every effort to send books to you through courier. 

                
                </p>
             </div>    
                
             </div>
           
              <h3> Can I upgrade/downgrade my membership?</h3>
            <div> 
                <p> 
                    Currently, upgrade or downgrade of the membership plan can only be done at the end of the current subscription plan as part of the next billing cycle. If you would like to modify your membership plan for the next billing cycle, please call us or message us at 638249 3117.
                
                </p>
             </div>
           
              <h3> How long can I keep the books with me?</h3>
            <div> 
                <p> 
                    We do not have any due dates or late fees and you can keep the books for the entire duration of your subscription plan. 
                    To receive new books to read and enjoy, you will need to return all the books in hand.

                
                </p>
             </div>
           
              <h3> Can keep some books and return the rest?</h3>
            <div> 
                <p> 
                   Sorry, we do not accept partial returns. All the books in-hand have to be returned together. The delivery executive will verify the list of books being returned before handing over the next set of books.

                
                </p>
             </div>
           
              <h3> What if I damage/lose the book?</h3>
            <div> 
                <p> 
                   In the case of lost or damaged books, you will be requested to pay the actual cost of the book to continue the service.
                
                </p>
             </div>
           
              <h3> Can I cancel my membership during my membership period?</h3>
            <div> 
                <p> 
                    Yes, you can cancel your membership at anytime. Please send us an email at admin@myonceuponatime.in and we will process your request and schedule a pickup.  Refund will be processed after deducting the actual cost of damaged/lost books (if any) from the security deposit. You are liable to return the books within 7 business days. 

                    <br> <br> There will be no refund of Membership and Registration Fees.
                </p>
             </div>
           
              <h3> When do I get back my security deposit?</h3>
            <div> 
                <p> 
                   Security deposit will be refunded to your bank account within 14 business days after you cancel your membership. In the case of lost or damaged books, we will deduct the actual cost of the books from the security deposit and only the remaining amount will be refunded to you (if any). The cost of the damaged/lost books exceeds the amount of the security deposit, you will be billed for the remaining amount.

                
                </p>
             </div>
           
              <h3> How do I renew my Account?</h3>
            <div> 
                <p> 
                    Unless you cancel your membership, your account will automatically be renewed and you will be billed for the next billing cycle. If you would like to modify your membership plan for the next billing cycle, please call us or message us at 638 249 3117.

                
                </p>
             </div>
           
              <h3> How do I change my membership?</h3>
            <div> 
                <p> 
                    Currently, upgrade or downgrade of the membership plan can only be done at the end of the current subscription plan as part of the next billing cycle.
                    <br> <br>If you would like to modify your membership plan for the next billing cycle, please call us or message us at 638 249 3117.

                
                </p>
             </div>
           
              <h3> Can I restart my membership after cancellation?</h3>
            <div> 
                <p> 
                   We would love to have you back! Please call or message us at 638 249 3117 and let us know the plan you are interested in. You will NOT be charged registration fee again. Only the security deposit and subscription fee needs to be paid to restart your membership.
                
                </p>
             </div>
           
              <h3> Do I need to pay for delivery and pickup of books?</h3>
            <div> 
                <p> No. Delivery and pickup is absolutely FREE.

                
                </p>
             </div>
           
              <h3> When would the books be delivered?</h3>
            <div> 
                <p> 
                   Our very first delivery upon signing up with us will be done within 1-3 business days and once a week there after.  
                    There may be delay in delivery in case of natural calamities or other unforeseen circumstances beyond our control.

                
                </p>
             </div>
           
              <h3> What if I am not available when the delivery happens?</h3>
            <div> 
                <p> 
                    If you are not available and miss a delivery, then kindly call us at 638 249 3117 or email us at admin@myonceuponatime.in to find out when your books can be delivered next.
                
                </p>
             </div>
           
              <h3> How many books would be delivered in a single delivery?</h3>
            <div> 
                <p> 
                    Number of books will depend on the subscription plan you have opted-for. For example if you have opted for the 3 book plan, then you will be sent 3 books each time.

                
                </p>
             </div>
           
              <h3> What if the books sent to me are not in good condition?</h3>
            <div> 
                <p> 
                    Please verify the books at the time of delivery and we request you to not accept the delivery if you find them to not be in good condition. Please call or message us at 638 249 3117 or email us at admin@myonceuponatime.in to let us know of the issue. We will address the issue as soon as possible and will send out the next set of available books from your Current Holds list.

                
                </p>
             </div>
           
              <h3> How can I suggest a new Book Title?</h3>
            <div> 
                <p> 
                    Please message us at 638 249 3117 or email us at admin@myonceuponatime.in with the book name and author information. We will do our best to get the book added to our catalogue at the earliest and will inform you once it has been added.
                
                </p>
             </div>
           
              <h3> Can I Donate Books?</h3>
            <div> 
                <p> 
                    Yes, we will be happy to help you free up space in your house by accepting children’s books which are in good condition. Please call or message us at 638 249 3117 or email us at admin@myonceuponatime.in to schedule a pick up.

                
                </p>
             </div>
           
           
        </div>
       
       <div> <br> </div>
      
        <div> 
        <h1 style="text-align:center" id="pricingSummary">Subscription Plans</h1>
        <p style="text-align:center">To choose your plan, first decide the number of books you would like to read per WEEK, and then decide on the duration of the plan. Remember, the longer the duration, the less you pay. </p>

        <p style="text-align:center"> Each plan gives you free home delivery & pickup EVERY WEEK and allows you to keep the books for as long as you want.The registration fees and security deposit are a one-time expense. The security deposit is fully refundable at the time of cancellation of membership. There are no hidden charges and all the charges are inclusive of all taxes.
         </p>

            </div>
      
      <div> 
        <h4 style="text-align:center"> 3 Books Plans</h4>
      </div> 
          
        <div class="columns">
          <ul class="price">
            <li class="header xpad" style="background-color:royalblue">1 Month</li>
            <li class="grey">₹ 399 
         </li>
         <li>Read up to 12 books in a month </li>
            <li>₹ 250 One Time Registration Fee </li>
            <li>₹ 500 Refundable Security Deposit</li>
             <li class="grey"> 
             <form method="post"> 
                <input type="submit" class="button" id="CL1M3BNW" name="CL1M3BNW" value="Sign Up">
             </form> 
              </li>
          </ul>
        </div>
      
       <div class="columns">
          <ul class="price">
            <li class="header" style="background-color:coral">3 Months <br> <span class="subheader">(Save ₹ 198)</span></li>
            <li class="grey">₹ 999 
         </li>
         <li>Read up to 39 books in 3 months</li>
           <li>₹ 250 One Time Registration Fee </li>
            <li>₹ 500 Refundable Security Deposit</li>
             <li class="grey"> 
             <form method="post"> 
                <input type="submit" class="button" id="CL3M3BNW" name="CL3M3BNW" value="Sign Up">
             </form> 
              </li>
          </ul>
        </div>
      
        <div class="columns">
          <ul class="price">
            <li class="header" style="background-color:#4CAF50">6 Months <br> <span class="subheader">(Save ₹ 695 )</span></li>
              <li class="grey">₹ 1699 <br> 
         </li>
          <li>Read up to 78 books in six months </li>
           
              <li>₹ 250 One Time Registration Fee </li>
           
              <li>₹ 500 Refundable Security Deposit</li>
       
              <li class="grey"> 
             <form method="post"> 
                <input type="submit" class="button" id="CL6M3BNW" name="CL6M3BNW" value="Sign Up">
             </form> 
                
              </li>
          </ul>
        </div>

      <div> <br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>  </div>
      <div> 
        <h4 style="text-align:center"> 4 Books Plans</h4>
      </div> 
          
        <div class="columns">
          <ul class="price">
            <li class="header xpad" style="background-color:royalblue">1 Month</li>
            <li class="grey">₹ 499 
         </li>
         <li>Read up to 16 books in a month </li>
            <li>₹ 250 One Time Registration Fee </li>
            <li>₹ 500 Refundable Security Deposit</li>
             <li class="grey"> 
             <form method="post"> 
                <input type="submit" class="button" id="CL1M4BNW" name="CL1M4BNW" value="Sign Up">
             </form> 
              </li>
          </ul>
        </div>
      
       <div class="columns">
          <ul class="price">
            <li class="header" style="background-color:coral">3 Months <br> <span class="subheader">(Save ₹ 248)</span></li>
            <li class="grey">₹ 1249 
         </li>
         <li>Read up to 52 books in 3 months</li>
           <li>₹ 250 One Time Registration Fee </li>
            <li>₹ 500 Refundable Security Deposit</li>
             <li class="grey"> 
             <form method="post"> 
                <input type="submit" class="button" id="CL3M4BNW" name="CL3M4BNW" value="Sign Up">
             </form> 
              </li>
          </ul>
        </div>
      
        <div class="columns">
          <ul class="price">
            <li class="header" style="background-color:#4CAF50">6 Months <br> <span class="subheader">(Save ₹ 795 )</span></li>
              <li class="grey">₹ 2199 <br> 
         </li>
          <li>Read up to 104 books in six months </li>
           
              <li>₹ 250 One Time Registration Fee </li>
           
              <li>₹ 500 Refundable Security Deposit</li>
       
              <li class="grey"> 
             <form method="post"> 
                <input type="submit" class="button" id="CL6M4BNW" name="CL6M4BNW" value="Sign Up">
             </form> 
                
              </li>
          </ul>
        </div>

     
<!-- comment out yearly plan from the main page

        <div class="columns">
          <ul class="price">
            <li class="header">12 Months<br> <span class="subheader">(Pay 10 Months + 2 FREE Months)</span></li>
               <li class="grey">₹ 3330
         </li>
          <li>Read upto 156 books </li>
            <li class="noreg"> NO Registration Fee </li>
            <li>₹ 500 Security Deposit</li>
             <li >₹ 3830 at SignUp 
         </li>
            <li class="grey"><a href="#" class="button">Sign Up</a></li>
          </ul>
        </div>

--> 
     


        
        <script type="text/javascript"> 
         
            $("#accordion").accordion({ heightStyle: "content"});
        
        </script>
    
 
  
     
        
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
          
      
      </script>
   
        
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
      
      </script>
  </body>
</html>