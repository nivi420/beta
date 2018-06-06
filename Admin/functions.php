<?php

    session_start();

    $link = mysqli_connect("localhost", "onceuponatimeqa", "QAb4rams", "onceuponatimeqa");

    if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

?>