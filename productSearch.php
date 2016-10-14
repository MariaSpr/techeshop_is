<h2>Αποτελέσματα</h2>
<table class="table">
  <thead>
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Κατασκευαστής</th>
      <th>Τιμή</th>
      <th>Στο στοκ</th>
    </tr>
  </thead>
  <tbody>

<?php

$prodID = $_POST['prodID'];
$manufacturer = $_POST['manufacturer'];
$prodName = $_POST['prodName'];
$priceFrom = $_POST['priceFrom'];
$priceTo = $_POST['priceTo'];
$timeFrom = $_POST['timeFrom'];
$timeTo = $_POST['timeTo'];
$addAnd = false;
$error = "";
$sql = '';
if(($prodID=="")&&($manufacturer=="")&&($prodName=="")&&($priceFrom=="")&&($priceTo=="")&&($timeFrom=="")&&($timeTo=="")){
  $sql="SELECT * FROM prod_info";
}
else {
  if($prodID==""){
    $sql="SELECT * FROM prod_info WHERE";
    if($manufacturer!=""){
      $sql = $sql." prodMan LIKE '%$manufacturer%'";
      $addAnd = true;
    }
    if($prodName!=""){
      if ($addAnd) { $sql = $sql." AND "; }
      $addAnd=true;

      $sql = $sql." prodName LIKE '%$prodName%'";
    }
    if(($priceFrom!="") && ($priceTo!="")){
      if ($addAnd) { $sql = $sql." AND "; }
      $addAnd=true;
      $sql = $sql." prodPrice<=$priceTo AND prodPrice>=$priceFrom";
    }
    if(($timeFrom!="") && ($timeTo!="")){
      if ($addAnd) { $sql = $sql." AND "; }
      $addAnd=true;
      $sql = $sql." whenAdded<='$timeTo' AND whenAdded>='$timeFrom'";
    }
  }
  else {
    $sql="SELECT * FROM prod_info WHERE prodID = '$prodID' ";
  }
}

$con = mysqli_connect('localhost','root','','is');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  if ($row['prodInv']==0)
  {
    echo "<tr class='danger'>";
  }
  else {
    echo "<tr>";
  }
  echo "<td>".$row['prodID']."</td>";
  echo "<td>".$row['prodName']."</td>";
  echo "<td>".$row['prodMan']."</td>";
  echo "<td>".$row['prodPrice']."</td>";
  echo "<td>".$row['prodInv']."</td>";
  echo "</tr>";
}
//  echo $result;
  ?>

    </tbody>
  </table>
