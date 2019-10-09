<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} else
{
    session_destroy();
    session_start(); 
}

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : 
     include('../inputdata/server2.php') 
    ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p>Please Enter the following: </p>
        
        
            <form method="post" action="index.php">
                <div class="input-group">
                <label>Booklet No.</label>
                <input type="bookletNo" name="bookletNo" value="" placeholder="Booklet Number">
                </div>

                <div class="input-group">
                <label>No. of Pages</label>
                <input type="pagesNo" name="pagesNo" value="" placeholder="Number of Pages">
                </div>

                <div class="input-group">
                <label>Year</label>
                <input type="taon" name="taon" value="" placeholder="YYYY">
                </div>

                <div class="input-group">
                <label>Region</label>
                <input type="region" name="region" value="" placeholder="Region">
                </div>

                <div class="input-group">
                <label>EACODE</label>
                <input type="eacode" name="eacode" value="" placeholder="EACODE">
                </div>

                <div class="input-group">
                <label>HCN</label>
                <input type="hcn" name="hcn" value="" placeholder="HCN">
                </div>

                <div class="input-group">
                <label>SHSN</label>
                <input type="shsn" name="shsn" value="" placeholder="SHSN">
                </div>

                <div class="input-group">
                <button type="submit" class="btn" name="datas">Save</button>
                </div>
            </form>


        <form method="post" action="../inputdata/view.php">
        <div>
        <input class="btn"type="submit" value="View data" />
        </div>
        </form>
        <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
         
    <?php endif ?>
    
		
</body>
</html>