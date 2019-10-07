<?php
    include('config/db.php');
    $eacode = $_GET['eacode'];
    $shsn = $_GET['shsn'];
    $hcn = $_GET['hcn'];
?>
<!Doctype html>
<html>
    <head>
        <title>F6.1 HOOSEHOLD MEMBERS</title>
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <script>
            function printContent(el){
                var restorPage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorePage;
            }
        </script>
    </head>
    <body>
        <div id = "div-id-name"> 
        <h3>F6.1</h3>
            <table style="width:120%">  
                <thead>
                    <tr>
                        <th>EACODE</th>
                        <th>HCN</th>
                        <th>SHSN</th>
                        <th>MEMBER CODE</th>
                        <th>NAME</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('config/db.php');
                    $eacode = $_GET['eacode'];
                    $shsn = $_GET['shsn'];
                    $hcn = $_GET['hcn'];
                                             
                    $data=mysqli_query($connection, $query = "SELECT * FROM d_f61 WHERE eacode='$eacode' AND d_f61.hcn='$hcn' AND d_f61.shsn='$shsn'");                        
                        if(mysqli_num_rows($data) > 0){
                            while($head = mysqli_fetch_assoc($data)){
                                $eacode = $head['eacode'];
                                $hcn = $head['hcn'];
                                $shsn = $head['shsn'];
                                $SURNAME = $head['SURNAME'];
                                $GIVENNAME = $head['GIVENNAME'];
                                $MEMBER_CODE = $head['MEMBER_CODE'];                                                                         
                    ?>          
                                <tr>
                                    <td><?php echo $eacode;?></td> 
                                    <td><?php echo $hcn;?></td> 
                                    <td><?php echo $shsn;?></td>       
                                    <td><?php echo $MEMBER_CODE;?></td>
                                    <td><?php echo $SURNAME,", ",$GIVENNAME;?></td>
                                    <td class='noborder' style="width:500px"><form> <input id="printbtn" type="button" value="FOOD RECALL" onclick="window.location.href='foodrecall.php?hcn=<?php echo $hcn; ?>&eacode=<?php echo $eacode; ?>&shsn=<?php echo $shsn; ?>&MEMBER_CODE=<?php echo $MEMBER_CODE; ?>'"/></form></td>
                                </tr>                                                                            
                                <?php  
                            }
                            ?>  
                            </tbody>
                            </table>
                            <h3>F6.3</h3>
                            <?php
                        }                  
                        else{
                            ?>
                            <tr>
                                <td><?php echo "Records Not Found!"?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <div class="fixed"> 
                        <table class="break"> 
                             
                        <thead>
                            <tr>
                            <th>LN</th>
                            <th>FOOD ITEM</th>
                            <th>DESC</th>
                            <th>FOODBRND</th>
                            <th>BRAND CODE</th>
                            <th>MAIN INGT</th>
                            <th>FOOD CODE</th>
                            <th>MEAL CODE</th>
                            <th>RFCODE</th>
                            <th>FOODWGT</th>
                            <th>RCC</th>
                            <th>CMC</th>
                            <th>SUP</th>
                            <th>SRC</th>
                            <th>UNIT COST</th>
                            <th>UNIT WGT</th>
                            <th>UNIT MEAS</th>
                            </tr>
                        </thead>
                        <?php
                        $data2=mysqli_query($connection, $query = "SELECT * FROM d_f63 WHERE eacode='$eacode' AND d_f63.hcn='$hcn' AND d_f63.shsn='$shsn' ORDER BY d_f63.LINENO +0 ASC");
                        if(mysqli_num_rows($data2) > 0){
                            while($head = mysqli_fetch_assoc($data2)){
                                $LINENO = $head['LINENO'];
                                $FOODITEM = $head['FOODITEM'];
                                $DESC = $head['FOODDESC'];
                                $FOODBRND = $head['BRANDNAME'];
                                $BRANDCODE = $head['BRANDCODE'];
                                $MAINIGNT = $head['MAINIGNT'];
                                $FOODCODE = $head['FOODCODE'];
                                $MEALCODE = $head['MEALCD'];
                                $RFCODE = $head['RFCODE'];
                                $FOODWEIGHT = $head['FOODWEIGHT'];
                                $RCC = $head['RCC'];
                                $CMC = $head['CMC'];
                                $SUP = $head['SUPCODE'];
                                $SRC = $head['SRCCODE'];
                                $UNITCOST = $head['UNITCOST'];
                                $UNITWEIGHT = $head['UNITWGT'];
                                $MEAS = $head['UNIT'];
                                                                                                      
                    ?>          
                                <tr>
                                    <td style="text-align:right"><?php echo $LINENO;?></td> 
                                    <td><?php echo $FOODITEM;?></td> 
                                    <td>><?php echo $DESC;?></td>       
                                    <td><?php echo $FOODBRND?></td>
                                    <td><?php echo $BRANDCODE;?></td>
                                    <td><?php echo $MAINIGNT;?></td>
                                    <td><?php echo $FOODCODE;?></td>
                                    <td><?php echo $MEALCODE;?></td>
                                    <td><?php echo $RFCODE;?></td>
                                    <td><?php echo $FOODWEIGHT;?></td>
                                    <td><?php echo $RCC;?></td>
                                    <td><?php echo $CMC;?></td>
                                    <td><?php echo $SUP;?></td>
                                    <td><?php echo $SRC;?></td>
                                    <td><?php echo $UNITCOST;?></td>
                                    <td><?php echo $UNITWEIGHT;?></td>  
                                    <td><?php echo $MEAS;?></td>            
                                </tr>                                                                            
                                <?php  
                            }
                        }




                            ?>
                </tbody>
                    </div>
            </table>
        </div>
        <button onclick = "printContent('div-id-name')">Print Content</button>
    </body>
</html>