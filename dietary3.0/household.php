<?php
include('config/db.php');
?>
<!Doctype html>
<html lang="en">
    <head>
        <title>HOUSEHOLD 6.0 - 6.3 </title>
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
            <button id="printbtn" onclick = "printContent('div-id-name')">Print Content</button>
            
            <?php
            if(isset($_POST['submit'])){
                $eacode=$_POST['eacode'];
                $hcn=$_POST['hcn'];
                $shsn=$_POST['shsn'];
                if($eacode != "" || $hcn != "" || $shsn != ""){                  
                    $data1=mysqli_query($connection, $query = "SELECT localsurveyareas.areaname, d_f60.eacode, d_f60.hcn, d_f60.shsn, d_f60.REFDATE, d_f60.INTERVIEW_STATUS FROM localsurveyareas INNER JOIN d_f60 ON localsurveyareas.eacode = d_f60.eacode WHERE d_f60.eacode LIKE '".$eacode."%' OR d_f60.hcn='$hcn' OR d_f60.shsn='$shsn' ORDER BY d_f60.eacode +0 ASC, d_f60.hcn +0 ASC, d_f60.shsn +0");
                    ?>
                        <?php
                    if(mysqli_num_rows($data1) > 0){
                        while($row = mysqli_fetch_assoc($data1)){
                            $eacode = $row['eacode'];
                            $hcn = $row['hcn'];
                            $shsn = $row['shsn'];
                            $reffDate = $row['REFDATE'];
                            $interviewStatus = $row['INTERVIEW_STATUS'];
                            $areaname = $row['areaname'];
                            
                            ?>
                            <div><!-- break -->

                            <table>  
                                    <thead>
                                        <tr>
                                            <th class="noborder"><?php echo "AREA NAME: ",$areaname; ?></th>
                                            <th class="noborder"><?php echo "EACODE: ",$eacode; ?></th>
                                            <th class="noborder"><?php echo "HCN: ",$hcn; ?></th>
                                            <th class="noborder"><?php echo "SHSN: ",$shsn; ?></th>
                                            <th class="noborder"><?php echo "REFERENCE DATE: ", $reffDate; ?></th>
                                            <th class="noborder"><?php echo "INTERVIEW STATUS: ",$interviewStatus; ?></th>
                                            <!-- <th  class="noborder"><form> <input id="printbtn" type="button" value="MEMBERS" onclick="window.location.href='members.php?hcn=<?php echo $hcn; ?>&eacode=<?php echo $eacode; ?>&shsn=<?php echo $shsn; ?>'"/></form></th> -->
                                        </tr>
                                    </thead>          
                                </table>
                                
                                <table>   
                                    <thead>
                                        <tr>
                                            <th>MEMNO</th>
                                            <th>NAME</th>
                                            <th>AGE</th>
                                            <th>SEX</th>
                                            <th>PSC</th>
                                            <th>MP</th>
                                            <th>BF</th>
                                            <th>AMSNCK</th>
                                            <th>LUNCH</th>
                                            <th>PMSNCK</th>
                                            <th>SUPPER</th>
                                            <th>LATESNCK</th>
                                        </tr>
                                    </thead> 
                                    <tbody class="border">          
                                    
                        <?php       
                        $data2=mysqli_query($connection, $query = "SELECT * FROM d_f61 WHERE eacode='$eacode' AND d_f61.hcn='$hcn' AND d_f61.shsn='$shsn'");                        
                        if(mysqli_num_rows($data2) > 0){
                            while($head = mysqli_fetch_assoc($data2)){
                                $eacode = $head['eacode'];
                                $hcn = $head['hcn'];
                                $shsn = $head['shsn'];
                                $SURNAME = $head['SURNAME'];
                                $GIVENNAME = $head['GIVENNAME'];
                                $MEMBER_CODE = $head['MEMBER_CODE'];
                                $AGE = $head['AGE'];
                                $SEX = $head['SEX'];
                                $PSC = $head['PSC'];
                                $MP = $head['MP'];
                                $BF = $head['BF'];
                                $AMSNCK = $head['AMSNCK'];
                                $LUNCH = $head['LUNCH'];
                                $PMSNCK = $head['PMSNCK'];
                                $SUPPER = $head['SUPPER'];
                                $LATESNCK = $head['LATESNCK'];

                        ?>       
                                <tr class="rowborder">
                                    <td style="text-align:right"><?php echo $MEMBER_CODE;?></td>
                                    <td><?php echo $SURNAME,", ",$GIVENNAME;?></td>                                          
                                    <td><?php echo (int)$AGE;?></td>
                                    <td><?php echo $SEX;?></td>
                                    <td><?php echo $PSC;?></td>
                                    <td><?php echo $MP;?></td>
                                    <td><?php echo $BF;?></td>
                                    <td><?php echo $AMSNCK;?></td>
                                    <td><?php echo $LUNCH;?></td>
                                    <td><?php echo $PMSNCK;?></td>
                                    <td><?php echo $SUPPER;?></td>
                                    <td><?php echo $LATESNCK;?></td>
                                    <td id="printbtn" class='noborder' style="width:10px"><form> <input id="printbtn" type="button" value="FOOD RECALL" onclick="window.location.href='foodrecall.php?hcn=<?php echo $hcn; ?>&eacode=<?php echo $eacode; ?>&shsn=<?php echo $shsn; ?>&MEMBER_CODE=<?php echo $MEMBER_CODE; ?>'"/></form></td>
                                </tr>       

                                <?php  
                            }
                                ?>

                                   
                                </table>
                                <br>  
                                <?php
                        }
                                ?>

                            <table>   
                                <thead>
                                <!-- <h6>F6.3</h6> -->
                                    <tr>
                                    <th>LNO</th>
                                    <th>FOOD ITEM</th>
                                    <th>DESC</th>
                                    <th>BRAND</th>
                                    <th>M.ING</th>
                                    <th>BRCODE</th>
                                    <th>MEAL</th>
                                    <th>WR</th>
                                    <th>FOOD DESC</th>
                                    <th>FWGT</th>
                                    
                                    
                                    </tr>
                                </thead>
                                <tbody class='border'>
                            
                        <?php

                        $data3=mysqli_query($connection, $query = "SELECT * FROM d_f63 WHERE eacode='$eacode' AND d_f63.hcn='$hcn' AND d_f63.shsn='$shsn' ORDER BY d_f63.LINENO +0 ASC");
                        if(mysqli_num_rows($data3) > 0){
                            while($head = mysqli_fetch_assoc($data3)){
                                $LINENO = $head['LINENO'];
                                $FOODITEM = $head['FOODITEM'];
                                $DESC = $head['DESCRIPTION'];
                                $BRAND = $head['BRANDNAME'];
                                $MAINIGNT = $head['MAINIGNT'];
                                $BRANDCODE = $head['BRANDCODE'];
                                $MEAL = $head['MEALCD'];
                                $WR = $head['WRCODE'];
                                $FOODDESC = $head['FOODDESC'];
                                $WEIGHT = $head['FOODWEIGHT']; 
 
                        ?>     
                               
                                <tr class="rowborder">
                                    <td style="text-align:right"><?php echo $LINENO;?></td> 
                                    <td><?php echo $FOODITEM;?></td> 
                                    <td><?php echo $DESC;?></td>
                                    <td><?php echo $BRAND;?></td>
                                    <td><?php echo $MAINIGNT;?></td>
                                    <td><?php echo $BRANDCODE;?></td>
                                    <td><?php echo $MEAL;?></td>
                                    <td><?php echo $WR;?></td>
                                    <td><?php echo $FOODDESC;?></td>
                                    <td><?php echo $WEIGHT;?></td>
                                    
                                    
                                </tr>
                                                                                
                                <?php   
                                }
                                ?>
                                </tbody>
                                </table>
                                <br>  
                                <?php
                                }
                                ?>
                       
                        <?php
                        $data3=mysqli_query($connection, $query = "SELECT * FROM d_f63 WHERE eacode='$eacode' AND d_f63.hcn='$hcn' AND d_f63.shsn='$shsn' ORDER BY d_f63.LINENO +0 ASC");
                        if(mysqli_num_rows($data3) > 0){
                        ?>
                        
                            <table class="break">
                            <thead>
                                <th>LNO</th>
                                <th>RCC</th>
                                <th>CMC</th>
                                <th>SUP</th>
                                <th>SRC</th>
                                <th>PWWGT</th>
                                <th>PWRCC</th>
                                <th>PWCMC</th>
                                <th>GOWGT</th>
                                <th>GORCC</th>
                                <th>GOCMC</th>
                                <th>LOWGT</th>
                                <th>LORCC</th>
                                <th>LOCMC</th>
                                <th>UNIT COST</th>
                                <th>UNIT WGT</th>
                                <th>UNIT MEAS</th>
                            </thead>
                            <tbody class="border">
                        <?php   
                            while($head = mysqli_fetch_assoc($data3)){
                                $LINENO = $head['LINENO'];
                                $CMC = $head['CMC'];
                                $PWWGT = $head['PW_WGT'];
                                $PWRCC = $head['PW_RCC'];
                                $PWCMC = $head['PW_CMC'];
                                $GOWGT = $head['GO_WGT'];
                                $GORCC = $head['GO_RCC'];
                                $GOCMC = $head['GO_CMC'];
                                $LOWGT = $head['LO_WGT'];
                                $LORCC = $head['LO_RCC'];
                                $LOCMC = $head['LO_CMC'];
                                $UNITCOST = $head['UNITCOST'];
                                $UNITWGT = $head['UNITWGT'];
                                $UNIT = $head['UNIT'];
                                $SUP = $head['SUPCODE'];
                                $SRC = $head['SRCCODE']; 
                                $RCC = $head['RCC'];
                        ?>
                                
                                   
                                        <tr  class='rowborder'>
                                            <td style="text-align:right"><?php echo $LINENO;?></td> 
                                            <td><?php echo $RCC;?></td>
                                            <td><?php echo $CMC;?></td>
                                            <td><?php echo $SUP;?></td>
                                            <td><?php echo $SRC;?></td>
                                            <td><?php echo $PWWGT;?></td>
                                            <td><?php echo $PWRCC;?></td>
                                            <td><?php echo $PWCMC;?></td>
                                            <td><?php echo $GOWGT;?></td>
                                            <td><?php echo $GORCC;?></td>
                                            <td><?php echo $GOCMC;?></td>
                                            <td><?php echo $LOWGT;?></td>
                                            <td><?php echo $LORCC;?></td>       
                                            <td><?php echo $LOCMC;?></td>
                                            <td><?php echo $UNITCOST;?></td>
                                            <td><?php echo $UNITWGT;?></td>
                                            <td><?php echo $UNIT;?></td>            
                                        </tr>
                            <?php
                            }       
                            ?>
                                    </tbody>
                                </table>
                        

                            </div>
                                <?php
                        
                        }
                                
                        }
                    }   
                }
            }
            ?>
            
        </div>
    </body>
    <footer>
    <title>HOUSEHOLD 6.0 - 6.3 </title>
        </footer>
</html>