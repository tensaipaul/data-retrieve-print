<?php
session_start();
$username = $_SESSION['username'];
$cwd = getcwd();
chdir("/" . "./users/fnri/desktop");
echo getcwd() . "<br/>";

$dir = "Scanned Documents";
if( !is_dir("./$dir")){
    mkdir("./$dir");
    chdir("./Scanned Documents");
}
else{
    chdir("C:\Users\FNRI\Desktop\Scanned Documents");
}

include('C:\wamp64\www\scanning-system\config/db.php');


// starts here
if( !is_dir("./$username")){
    mkdir("./$username");
    chdir("./$username");

    if( !is_dir("./$taon")){
        mkdir("./$taon");
        chdir("./$taon");

        if( !is_dir("./$region")){
            mkdir("./$region");
            chdir("./$region");

            if( !is_dir("./$bookletNo")){
                mkdir("./$bookletNo");
                chdir("./$bookletNo");
            
                
            }
        
            
        }
        
    }


}



?>

<!-- C:\Users\FNRI\Desktop 
C:\wamp64\www\scanning-system\config
-->