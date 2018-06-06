<?php 


include ("../../config.php"); 
$return_array = array();

if ($_GET['search']){
 
    $key = $_GET['search'];
    $query = 
        "
        SELECT 
            *  
        FROM titleMaster
        WHERE image >''
        AND title LIKE '%$key%'
        LIMIT 10
        "; 
    
} else {


     $query = 
            "
            SELECT 
                *  
            FROM titleMaster
            WHERE image >''
            LIMIT 10
            "; 

}

$result = mysqli_query($link, $query); 
while($row = mysqli_fetch_assoc($result)){
    
    $title = $row['title'];
 //   $isbn10 = $row['isbn10'];
//    $isbn13 = $row['isbn13'];
    $image = $row['image'];
    $titleId = $row['titleId'];
    
    $return_array[0] = array ("title" => $title ,
                             "image" => $image,
                              "titleId" => $titleId );
                        
}
echo json_encode($return_array);

?> 