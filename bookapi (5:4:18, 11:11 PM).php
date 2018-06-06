<?php 

session_start();
include ("config.php"); 


 $query = 
        "
        SELECT 
            isbn13  
        FROM titleMaster
        WHERE image =''
        AND isbn13 > ''
        LIMIT 5
        "; 

$result = mysqli_query($link, $query); 


while($row = mysqli_fetch_assoc($result)){
   
    echo "<br>".$row['isbn13'];   
    echo '<script>';
    echo 'var isbn = ' . json_encode($row['isbn13']) . ';';
    echo '</script>';
    echo '<div id="content"></div>';
    echo '<script type="text/javascript" src="callback.js"> </script>';
    echo '<script src="jquery-3.3.1.min.js"></script>';
    echo '<script type="text/javascript" src="isbn.js"> </script>';
    
}
?>

<html>
  <head>
     
    <title>Books API Example</title>
  </head>
  <body>
<!--
      <div id="content"></div>
      <script type="text/javascript" src="callback.js"> </script>
      <script src="jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="isbn.js"> </script>
<!--      
      <script type="text/javascript"> 
      
          alert (isbn);
          $('head').append('<script type="text/javascript" src="https://www.googleapis.com/books/v1/volumes?q=isbn:' + isbn + '&callback=handleResponse">');
      
       
      </script>
      
 -->   
      
  
      <!--
      <script src="https://www.googleapis.com/books/v1/volumes?q=isbn:9780723273035&callback=handleResponse"></script>
     --> 
  </body>
</html>