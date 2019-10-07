<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbName = "training";
    $connection = mysqli_connect($server, $user, $password, $dbName);

    if(!$connection){
        die("Connection Failed." . mysqli_connect_error());
    }
    
?> 