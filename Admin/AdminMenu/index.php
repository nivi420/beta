<?php 

include ("../functions.php");
if ($_SESSION['id'] == 0 ){
    
     header("Location:http://alpha.myonceuponatime.in/Admin/");
}

?> 

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
<!-- 
#tomove -- This has to be moved 

-->
    <style type="text/css"> 
    
        .book-class  {
            position: relative; 
            float: left; 
            width: 180px; 
            height: 250px;
            border : 1px dotted grey; 
            overflow: scroll;
            padding: 7px; 
            margin: 5px; 
            
        }
        .image-class { 
        
            height: 190px; 
            overflow: scroll;
            width: 100%
        }
    
    </style>
    
	<title>Responsive Sidebar Navigation | CodyHouse</title>
</head>
<body>
	<header class="cd-main-header">
		<a href="#0" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input id='livesearch' type="search" placeholder="Search...">
			</form>
		</div> <!-- cd-search -->

		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li><a href="#0">Tour</a></li>
				<li><a href="#0">Support</a></li>
				<li class="has-children account">
					<a href="#0">
						<img src="img/cd-avatar.png" alt="avatar">
						Account
					</a>

					<ul>

						<li><a href="#0">My Account</a></li>
						<li><a href="#0">Edit Account</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Main</li>
				<li class="has-children overview">
					<a href="#0">Customer Management</a>
					
					<ul>
						<li><a href="#0" id="approve">Approve Customer</a></li>
						<li><a href="#0">Category 1</a></li>
						<li><a href="#0">Category 2</a></li>
					</ul>
				</li>
				<li class="has-children notifications active">
					<a href="#0">Notifications<span class="count">3</span></a>
					
					<ul>
						<li><a href="#0">All Notifications</a></li>
						<li><a href="#0">Friends</a></li>
						<li><a href="#0">Other</a></li>
					</ul>
				</li>

				<li class="has-children comments">
					<a href="#0">Comments</a>
					
					<ul>
						<li><a href="#0">All Comments</a></li>
						<li><a href="#0">Edit Comment</a></li>
						<li><a href="#0">Delete Comment</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Secondary</li>
				<li class="has-children bookmarks">
					<a href="#0">Bookmarks</a>
					
					<ul>
						<li><a href="#0">All Bookmarks</a></li>
						<li><a href="#0">Edit Bookmark</a></li>
						<li><a href="#0">Import Bookmark</a></li>
					</ul>
				</li>
				<li class="has-children images">
					<a href="#0">Images</a>
					
					<ul>
						<li><a href="#0">All Images</a></li>
						<li><a href="#0">Edit Image</a></li>
					</ul>
				</li>

				<li class="has-children users">
					<a href="#0">Users</a>
					
					<ul>
						<li><a href="#0">All Users</a></li>
						<li><a href="#0">Edit User</a></li>
						<li><a href="#0">Add User</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Action</li>
				<li class="action-btn"><a href="#0">+ Button</a></li>
			</ul>
		</nav>

		<div class="content-wrapper" id="contents">
			
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script type="text/javascript"> 
    
   
    
    $(document).ready(function(){ 
        
     
            $.ajax({

                method: "GET",
                url: "defaultpage.php",
                cache: false,
                dataType : "json", 
                data: {'searchx': '' },
                success : function(response) {
                   // console.log(response);

                    var leng = response.length; 
                    for (var i=0; i<leng; i++) {
                         
                        var title = response[i].title;
                //      var isbn10 = response[i].isbn10;
                //        var isbn13 = response[i].isbn13;
                        var image = response[i].image;
                        var titleId = response[i].titleId;
             
                        var divx = document.createElement("div");
                        divx.setAttribute("id", titleId);
                        divx.setAttribute("class", "book-class")
                        
                        var p1 = document.createElement("P");
                        var t1 = document.createTextNode(title);
                        p1.appendChild(t1); 
/*                      var p2 = document.createElement("P");
                        var t2 = document.createTextNode(isbn10);
                        p2.appendChild(t2);   
                        var p3 = document.createElement("P");
                        var t3 = document.createTextNode(isbn13);
                        p3.appendChild(t3); 
*/
                        var p4 = document.createElement("img");
                        p4.id = 'img'+ titleId; 
                        p4.className = "image-class"; 
                        p4.src = image; 
                        
                       
                        divx.appendChild(p4);
                        divx.appendChild(p1);
  //                      divx.appendChild(p2);
//                        divx.appendChild(p3);
                       
                        document.getElementById("contents").appendChild(divx);
                        
                        //$("#contents").html(response); 

                    }
                }
            }); 
        
           $('#livesearch').keyup(function() {
            
               var searchval = $("#livesearch").val();
               console.log(searchval); 
               $.ajax({
                    method: "GET",
                    url: 'defaultpage.php',
                    data: {'search': searchval },
                  success : function(response) {
                    
                      console.log(response);
                      var leng = response.length; 
                    for (var i=0; i<leng; i++) {
                         
                        var title = response[i].title;
                //      var isbn10 = response[i].isbn10;
                //        var isbn13 = response[i].isbn13;
                        var image = response[i].image;
                        var titleId = response[i].titleId;
             
                        var divx = document.createElement("div");
                        divx.setAttribute("id", titleId);
                        divx.setAttribute("class", "book-class")
                        
                        var p1 = document.createElement("P");
                        var t1 = document.createTextNode(title);
                        p1.appendChild(t1); 
/*                      var p2 = document.createElement("P");
                        var t2 = document.createTextNode(isbn10);
                        p2.appendChild(t2);   
                        var p3 = document.createElement("P");
                        var t3 = document.createTextNode(isbn13);
                        p3.appendChild(t3); 
*/
                        var p4 = document.createElement("img");
                        p4.id = 'img'+ titleId; 
                        p4.className = "image-class"; 
                        p4.src = image; 
                        
                       
                        divx.appendChild(p4);
                        divx.appendChild(p1);
  //                      divx.appendChild(p2);
//                        divx.appendChild(p3);
                       
                        document.getElementById("contents").appendChild(divx);
                        
                        //$("#contents").html(response); 

                    }
                      
                  }
                });
 
               
           });
          
  
         $("#approve").click(function(){ 
            $("#contents").load('../../Muthalali.php');
 
         }); 

    });
    
    </script>
</body>
</html>