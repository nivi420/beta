<?php

    include("functions.php");

    if ($_GET['action'] == "loginSignup") {
        
        $error = "";
        
        if (!$_POST['email']) {
            
            $error = "An email address is required.";
            
        } else if (!$_POST['password']) {
            
            $error = "A password is required";
            
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
  
            $error = "Please enter a valid email address.";
            
}
        
        if ($error != "") {
            
            echo $error;
            exit();
            
        }
        
        
        if ($_POST['loginActive'] == "0") {
            
             $error = "This functionality is disabled";

/* 
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) $error = "That email address is already taken.";
            else {
                
                $query = "INSERT INTO users (`email`, `password`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id'] = mysqli_insert_id($link);
                    
                    $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    echo 1;
                    
                    
                    
                } else {
                    
                    $error = "Couldn't create user - please try again later";
                    
                }
                
            }
            
*/
            
        } else {
            
            $query = "SELECT * FROM loginTable WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' AND userRole = 'admin' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
 //               if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                
            if ($row['password'] == md5($_POST['password'])) {
                    
                    echo 1;
                    
                    $_SESSION['id'] = $row['custId'];
               
                } else {
                    
                    $error = "Could not find that username/password combination. Please try again.";
                    
                }

            
        }
        
         if ($error != "") {
            
            echo $error;
            exit();
            
        }
        
        
        
    }

    
        



?>