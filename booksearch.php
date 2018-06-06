
<?php 
 
header("Access-Control-Allow-Origin: *"); 
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

//session_start(); 
 
//require 'config.php';
   


//if ($_POST['isbn']) {
    
     //$urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",uk&appid=4b6cbadba309b7554491c5dc66401886");
     //$urlContents = file_get_contents("https://www.googleapis.com/books/v1/volumes?key=AIzaSyBZCKfWCUV6dp3p46q1dhMROBVH1UhBl3o"."&q=".urlencode($_POST['isbn']));
    
     //$urlContents = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=9780723273035");

    $path = "https://www.googleapis.com/books/v1/volumes?q=isbn:9780723273035&key=UKDm2U5qJywFjSgqTbCFZBbw";
     $urlContents = file_get_contents($path); 
 
//    echo $urlContents; 
//}
    
  //  $weatherArray = json_decode($urlContents, true);
    
/*    
    $query = 
        "SELECT 
            image 
        FROM titleTable 
        WHERE isbn13 ='9780684856094' 
        DESC LIMIT 1"; 

    $result = mysqli_query($link, $query); 
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
 

        if ($weatherArray['cod'] == 200) {
        
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";

            $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
            
        } else {
            
            $error = "Could not find city - please try again.";
            
        }
        
    }

*/
?>

<html> 

    
    <head> 
    
        <title> thengakkola</title>
    
        <style type="text/css"> 
        
            .bookDisp {
                display: block; 
                position: relative; 
                float: left; 
                width: auto; 
                height: 200px;
                overflow: hidden; 
                white-space: nowrap; 
                text-overflow: ellipsis

            }
        
        </style>
        
    </head>

    <body> 

        <form method="post"> 
            <input type="search" name="isbn" id='isbn'> 
            <input type="submit"> 
        </form>
 
 <!--      
        
        <div class='bookDisp'> 
            <img src="http://books.google.com/books/content?id=nSE02W7AIvEC&printsec=frontcover&img=1&zoom=1&source=gbs_api"> 
        
       
            <img src="http://books.google.com/books/content?id=TVJiPgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api">
        
            <img src="http://books.google.com/books/content?id=ZBJymwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api"> <img 
            
        </div>
 -->    
      
    </body>

</html>