<?php
    include('config/db.php');
    $eacode = $_GET['eacode'];
    $shsn = $_GET['shsn'];
    $hcn = $_GET['hcn'];
    $MEMBER_CODE = $_GET['MEMBER_CODE'];
    
    $fetching=mysqli_query($connection, $query = "SELECT localsurveyareas.areaname, d_f61.SURNAME, d_f61.GIVENNAME, d_f61.MEMBER_CODE,d_f61.AGE  FROM localsurveyareas INNER JOIN d_f61 ON localsurveyareas.eacode = d_f61.eacode WHERE d_f61.MEMBER_CODE = $MEMBER_CODE AND d_f61.eacode = $eacode AND d_f61.hcn = $hcn AND d_f61.shsn = $shsn"); 
                        $head1 = mysqli_fetch_assoc($fetching);
                        $areaname = $head1['areaname'];
                        $SURNAME = $head1['SURNAME'];
                        $GIVENNAME = $head1['GIVENNAME'];
                        $AGE = $head1['AGE'];

?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <title>FORM 7.1 FOOD RECALL PROOFLIST<?php echo $eacode;?></title>
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
    <button onclick = "printContent('div-id-name')">Print Content</button>
        <div id = "div-id-name">
            <table>
                <thead>
                    <!-- localsurveyareas areaname, d_f61 SURNAME,GIVENNAME -->
                    <tr>
                    <th><?php echo "AREA NAME: ",$areaname;?></th>
                    <th><?php echo "EACODE: ",$eacode;?></th> 
                    <th><?php echo "HCN: ",$hcn;?></th> 
                    <th><?php echo "SHSN: ",$shsn;?></th>
                    <th><?php echo "MEMBER CODE: ",$MEMBER_CODE;?></th>
                    <th><?php echo "NAME: ",$SURNAME,", ",$GIVENNAME;?></th>
                    <th><?php echo "AGE: ",(int)$AGE;?></th>    

                    </tr>                                                         
                </thead>          
            </table>

            <table>   
                <thead>
                    <tr>
                        <th>DY</th>
                        <th>LN</th>
                        <th>FOOD ITEM</th>
                        <th>DESC</th>
                        <th>FOOD BRND</th>
                        <th>BRAND CODE</th>
                        <th>MAIN ING</th>
                        <th>FOOD CODE</th>
                        <th>MEAL CODE</th>
                        <th>RFCODE</th>
                        <th>FOODWGT</th>
                        <th>RCC</th>
                        <th>CMC</th>
                        <th>SUP</th>
                        <th>SRC</th>
                        <th>CPC</th>
                        <th>UNIT COST</th>
                        <th>UNIT WGT</th>
                        <th>UNIT MS</th>
                    </tr>
                </thead>
                <tbody class="border">
                <?php                                    
                    $data=mysqli_query($connection, $query = "SELECT * FROM d_f71 WHERE eacode='$eacode' AND d_f71.hcn='$hcn' AND d_f71.shsn='$shsn' AND d_f71.MEMBER_CODE='$MEMBER_CODE' ORDER BY d_f71.RECDAY +0 ASC, d_f71.LINENO +0 ASC");                          
                            if(mysqli_num_rows($data) > 0){
                                while($head = mysqli_fetch_assoc($data)){
                                    $RECDAY = $head['RECDAY'];
                                    $LINENO = $head['LINENO'];
                                    $FOOD_ITEM = $head['FOOD_ITEM'];                        
                                    $DESC = $head['FOODDESC'];
                                    $FOODBRND = $head['FOODBRND'];
                                    $BRANDCODE = $head['FOODBRNDCD'];
                                    $FOODMAINING = $head['FOODMAINING'];
                                    $FOODCODE = $head['FOODCODE'];
                                    $MEALCODE = $head['MEALCD'];
                                    $RFCODE = $head['RFCODE'];
                                    $FOODWEIGHT = $head['FOODWEIGHT'];
                                    $RCC = $head['RCC'];
                                    $CMC = $head['CMC'];
                                    $SUP = $head['SUPCODE'];
                                    $SRC = $head['SRCCODE'];
                                    $CPC = $head['CPC'];
                                    $UNITCOST = $head['UNITCOST'];
                                    $UNITWGT = $head['UNITWGT'];
                                    $MEAS = $head['UNITMEAS'];             
                ?>               
                
                    <tr class = "rowborder">
                        <td style="text-align:right"><?php echo $RECDAY;?></td> 
                        <td style="text-align:right"><?php echo $LINENO;?></td> 
                        <td><div><?php echo $FOOD_ITEM;?></div></td>       
                        <td><div><?php echo $DESC;?></div></td>
                        <td><?php echo $FOODBRND;?></td>
                        <td><?php echo $BRANDCODE;?></td>
                        <td><?php echo $FOODMAINING;?></td>
                        <td><div class="fixed"><?php echo $FOODCODE;?><div></td>
                        <td><?php echo $MEALCODE;?></td>
                        <td><?php echo $RFCODE;?></td>
                        <td><?php echo $FOODWEIGHT;?></td>
                        <td><?php echo $RCC;?></td>
                        <td><?php echo $CMC;?></td>
                        <td><?php echo $SUP;?></td>
                        <td><?php echo $SRC;?></td>
                        <td><?php echo $CPC;?></td>
                        <td><?php echo $UNITCOST;?></td>
                        <td><?php echo $UNITWGT;?></td>
                        <td><?php echo $MEAS;?></td>   

                    </tr>                                                                            
                    <?php  
                                }    
                            }                  
                            else{
                                ?>
                                <tr>
                                    <td><?php echo "Records Not Found!"?></td>
                                </tr>
                                <?php
                                }                                             
                                ?>
                </tbody>
            </table>
        </div>
        
    </body>
</html>