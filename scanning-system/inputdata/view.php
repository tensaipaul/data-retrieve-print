<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include('../config/db.php');
include('server2.php');
$username = $_SESSION['username'];
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="view.css">
    <link rel="stylesheet" type="text/css" href="../registration/style.css">
    </head>
    <body>
        <div>
        <table>   
                <thead>
                    <tr>
                        <th>BOOKLET NO.</th>
                        <th>PAGE NO.</th>
                        <th>YEAR</th>
                        <th>REGION</th>
                        <th>EACODE</th>
                        <th>HCN</th>
                        <th>SHSN</th>
                      
                    </tr>
                </thead>
    
<?php

chdir("/" . "./users/fnri/desktop");
$dir = "Scanned Documents";
if( !is_dir("./$dir")){
mkdir("./$dir");
chdir("./Scanned Documents");
}
else{
chdir("C:\Users\FNRI\Desktop\Scanned Documents");
}

$fetching=mysqli_query($db, $query = "SELECT*FROM input_data WHERE username = '$username'"); 
if(mysqli_num_rows($fetching) > 0){
    while($head1 = mysqli_fetch_assoc($fetching)){
    $bookletNo = $head1['bookletNo'];
    $pagesNo = $head1['pagesNo'];
    $taon = $head1['taon'];
    $region = $head1['region'];
    $eacode = $head1['eacode'];
    $hcn = $head1['hcn'];
    $shsn = $head1['shsn'];


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
else{
    chdir("./$username");
    if( !is_dir("./$taon")){
        mkdir("./$taon");
        chdir("./$taon");

        if( !is_dir("./Region $region")){
            mkdir("./Region $region");
            chdir("./Region $region");

            if( !is_dir("./Booklet No.$bookletNo")){
                mkdir("./Booklet No.$bookletNo");
                chdir("./Booklet No.$bookletNo");
            
                
            }
        }
        else{
            chdir("./Region $region");
            if( !is_dir("./Booklet No.$bookletNo")){
                mkdir("./Booklet No.$bookletNo");
                chdir("./Booklet No.$bookletNo");
            
                
            }
            else{
                chdir("./Booklet No.$bookletNo");
            }

        }
    }
    else{
        chdir("./$taon");
        if( !is_dir("./Region $region")){
            mkdir("./Region $region");
            chdir("./Region $region");

            if( !is_dir("./Booklet No.$bookletNo")){
                mkdir("./Booklet No.$bookletNo");
                chdir("./Booklet No.$bookletNo");
            
                
            }

    }
        else{
            chdir("./Region $region");  
            
            if( !is_dir("./Booklet No.$bookletNo")){
                mkdir("./Booklet No.$bookletNo");
                chdir("./Booklet No.$bookletNo");
            
            }
            else{
                chdir("./Booklet No.$bookletNo");
            }

        }
    }
}

chdir("C:\Users\FNRI\Desktop\Scanned Documents");

?>
                <tbody>
                    <tr>
                        <td><?php echo $bookletNo;?></td>
                        <td><?php echo $pagesNo;?></td>
                        <td><?php echo $taon;?></td>
                        <td>Region <?php echo $region;?></td>
                        <td><?php echo $eacode;?></td>
                        <td><?php echo $hcn;?></td>
                        <td><?php echo $shsn;?></td>
                        
                        
                    
                    </tr>
<?php
    }
?>
               </tbody>
        </table>
        <br><br>
        <p> <a href="http://localhost/scanning-system/registration/index.php" style="color: red;">back</a> </p>
<?php
}
?>
   </div>

</body>
</html>
