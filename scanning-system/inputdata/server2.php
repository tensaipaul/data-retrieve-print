<?php
// initializing variables
$username = $_SESSION['username'];
$bookletNo = "" ;
$pagesNo = "";
$taon = "";
$region = "";
$eacode = "";
$hcn = "";
$shsn = "";
$errors = array(); 

// connect to the database
include('../config/db.php');
// REGISTER USER
if (isset($_POST['datas'])) {
  // receive all input values from the form
  $bookletNo = mysqli_real_escape_string($db, $_POST['bookletNo']);
  $pagesNo = mysqli_real_escape_string($db, $_POST['pagesNo']);
  $taon = mysqli_real_escape_string($db, $_POST['taon']);
  $region = mysqli_real_escape_string($db, $_POST['region']);
  $eacode = mysqli_real_escape_string($db, $_POST['eacode']);
  $hcn = mysqli_real_escape_string($db, $_POST['hcn']);
  $shsn = mysqli_real_escape_string($db, $_POST['shsn']);

  if (empty($bookletNo)) { array_push($errors, "Booklet number is required"); }
  if (empty($pagesNo)) { array_push($errors, "Page/s number name is required"); }
  if (empty($taon)) { array_push($errors, "Year is required"); }
  if (empty($region)) { array_push($errors, "Region is required"); }
  if (empty($eacode)) { array_push($errors, "eacode is required"); }
  if (empty($hcn)) { array_push($errors, "hcn is required"); }
  if (empty($shsn)) { array_push($errors, "shsn is required"); }
 
  
 
    $query = "INSERT INTO input_data (username, bookletNo, pagesNo, taon, region, eacode, hcn, shsn) 
                VALUES('$username','$bookletNo', '$pagesNo', '$taon', '$region', '$eacode', '$hcn', '$shsn')";

if (!mysqli_query($db,$query)) {
  die('Error: ' . mysqli_error($db));
}

mysqli_close($db);
}

// ... 
?>