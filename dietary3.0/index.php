<!Doctype html>
<html lang="en">
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script>
                function disable(){
                    var a = document.getElementById("text1").disabled = true;
                    var ar = document.getElementById("id1");
                        ar.action = "household.php"
                }
                function enable(){
                    var a = document.getElementById("text1").disabled = false;
                    var ar = document.getElementById("id1");
                        ar.action = "xfoodrecall.php"   
                        var eacode = document.forms["form1"]["eacode"].value;
                        var hcn = document.forms["form1"]["hcn"].value;
                        var shsn = document.forms["form1"]["shsn"].value;
                        var MEMBER_CODE = document.forms["form1"]["MEMBER_CODE"].value;
                        if (eacode == "" || hcn == ""  || shsn == "" || MEMBER_CODE == "") {
                            alert("All textbox must be filled out before clicking submit");
                            return false;
                        }
                }
                // function validateForm() {
                // var eacode = document.forms["form1"]["eacode"].value;
                //         var hcn = document.forms["form1"]["hcn"].value;
                //         var shsn = document.forms["form1"]["shsn"].value;
                //         var MEMBER_CODE = document.forms["form1"]["MEMBER_CODE"].value;
                //         if (eacode == "" || hcn == ""  || shsn == "" || MEMBER_CODE == "") {
                //             alert("All forms must be filled out");
                //             return false;
                //         }
                // }
                //onsubmit="return validateForm()"


        </script>
    </head>
    <body>
        <div id="center">
            <form id="id1" method="POST" name="form1"> 
                <fieldset>
                    <legend><h2>Dietary Forms</h2></legend>
                <div>
                    <label class="container">View Household‏‏‎ ‎‏‏‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎‎‏‏‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎ 
                    <input type="radio" name="choice" onclick="disable()">
                    <span class="checkmark"></span>
                    </label>
                </div> 

                <div>
                    <label class="container">View Individual Food Recall‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎
                    <input type="radio" name="choice" onclick="enable()">
                    <span class="checkmark"></span>
                    </label>
                </div> 
                
                <div>                    
                    <label>EACODE</label>
                    <div>
                        <input type="number" class="form-control" name="eacode" placeholder="EACODE">
                    </div> 
                </div>

                <div>
                    <label>HCN</label>
                    <div>
                        <input type="number" class="form-control" name="hcn" placeholder="HCN">
                    </div> 
                </div>

                <div>
                    <label>SHSN</label>
                    <div>
                        <input type="number" class="form-control" name="shsn" placeholder="SHSN">
                    </div> 
                </div>

                <div>
                    <label>MEMBER CODE</label>
                    <div>
                        <input type="number" id ="text1" class="form-control" name="MEMBER_CODE" placeholder="MEMBER CODE">
                    </div> 
                </div>

                <div>
                    <label></label>
                    <div>
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
            
    </body>
</html>