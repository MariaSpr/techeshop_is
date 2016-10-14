<?php
if (!empty($_POST['SNarray'])) {
  $SNs = json_decode($_POST['SNarray'], true);
  $custID = $_POST['custID'];
  $orderID = $_POST['orderID'];
  $con = mysqli_connect('localhost','root','','is');
  $sql = "SELECT prodID FROM prod2order WHERE orderID='$orderID'";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)) {
    $sql = "SELECT prodInv FROM prod_info WHERE prodID='".$row['prodID']."'";
    $ses_sql=mysqli_query($con, $sql);
    $row2 = mysqli_fetch_assoc($ses_sql);
    $oldInv=$row2['prodInv'];
    $newInv= $oldInv - 1;
    $sql = "UPDATE prod_info SET prodInv='$newInv' WHERE prodID='".$row['prodID']."'";
    if (!mysqli_query($con, $sql)){
    $result= "Error: ".mysqli_error($con);
    }
  }
  $sql= "DELETE FROM prod2order WHERE orderID='$orderID'";
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  if (!mysqli_query($con, $sql)){
  $result= "Error: ".mysqli_error($con);
  }
  $sql = "DELETE FROM order_rec WHERE orderID='$orderID'";
  if (!mysqli_query($con, $sql)){
  $result= "Error: ".mysqli_error($con);
  }

  $sql="INSERT INTO sales_rec (salesID, custID, salesDate) VALUES (NULL, '$custID', '".date("Y-m-d")."')";
  if (!mysqli_query($con, $sql)){
  $result= "Error: ".mysqli_error($con);
  }

  $ses_sql=mysqli_query($con, "SELECT salesID FROM sales_rec WHERE custID='$custID' ORDER BY salesID DESC");
  $row = mysqli_fetch_assoc($ses_sql);
  $salesID=$row['salesID'];


  foreach($SNs as $item) {
    $sql = "INSERT INTO sn_rec (serialNumb, salesID) VALUES ( '$item', '$salesID')";
    if (!mysqli_query($con, $sql)){
    $result= "Error: ".mysqli_error($con);
    }
  }
}
?>


<h4>Η διαδικασία ολοκληρώθηκε επιτυχώς!</h4>
