<?php

$db = mysqli_connect('localhost', 'root', '', 'ss_accounts');

    if(!$db){
        die("Connection Failed." . mysqli_connect_error());
    }
    
?> 