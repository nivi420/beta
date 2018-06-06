<?php
session_start(); 
include ("config.php"); 


//$obj = json_decode($_POST['myData'],true); 
$obj = $_POST['myData'];

$googleId = '';
$image = '';
$isbn = '';



foreach($obj['items'] as $item)
{
    
    $googleId =  $item['id'];
    $image=  $item['volumeInfo']['imageLinks']['thumbnail'];
    if (strlen($item['volumeInfo']['industryIdentifiers'][0]['identifier']) > 10 ){ 
        $isbn =  $item['volumeInfo']['industryIdentifiers'][0]['identifier'];
    } else if (strlen($item['volumeInfo']['industryIdentifiers'][1]['identifier']) > 10 ){ 
        $isbn =  $item['volumeInfo']['industryIdentifiers'][1]['identifier'];
    }
   
} 

 
echo "Update ISBN".$isbn;
echo 'googleid is '. $googleId; 
echo 'image is '. $image; 

if ($googleId != '' AND $image != '') { 
 
    $query = 
        "
        SELECT * FROM titleMaster 
        WHERE isbn13 =  '$isbn' 
        "; 
    if ($result=mysqli_query($link,$query))
    {
      if (mysqli_num_rows($result)> 0) {
        $query = 
        "
        UPDATE titleMaster 
        SET googleId = '$googleId', 
            image =   '$image' 
        WHERE isbn13 =  '$isbn' 
        LIMIT 1
        "; 
        
    
        }
      
        if (mysqli_query($link, $query)) {
   
            echo 'success'; 
    

        }else {
   
            echo("Error description: " . mysqli_error($link));


        }

    
    }else echo 'this isbn not found'; 

    
     

}  else if ($googleId = ''){
    $query = 
        "
        SELECT * FROM titleMaster 
        WHERE isbn13 =  '$isbn' 
        "; 
    if ($result=mysqli_query($link,$query))
    {
      if (mysqli_num_rows($result)> 0) {
        $query = 
        "
        UPDATE titleMaster 
        SET googleId = 'NA' 
        WHERE isbn13 =  '$isbn' 
        LIMIT 1
        "; 
        
    
        }
      
        if (mysqli_query($link, $query)) {
   
            echo 'success'; 
    

        }else {
   
            echo("Error description: " . mysqli_error($link));


        }

    
    }else echo 'this isbn not found'; 
    
} else if ($image = ''){
    $query = 
        "
        SELECT * FROM titleMaster 
        WHERE isbn13 =  '$isbn' 
        "; 
    if ($result=mysqli_query($link,$query))
    {
      if (mysqli_num_rows($result)> 0) {
        $query = 
        "
        UPDATE titleMaster 
        SET image = 'NA'
        WHERE isbn13 =  '$isbn' 
        LIMIT 1
        "; 
        
    
        }
      
        if (mysqli_query($link, $query)) {
   
            echo 'success'; 
    

        }else {
   
            echo("Error description: " . mysqli_error($link));


        }

    
    }
    
}else echo 'this isbn not found'; 

?> 