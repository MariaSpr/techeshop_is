<?php
$orderID = $_POST['orderID'];
$sql = "SELECT custID from order_rec WHERE orderID='$orderID'";
$con = mysqli_connect("localhost", "root", "", "is");
$ses_sql=mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$custID=$row['custID'];
if(!isset($custID)){
  echo "<h4>Δεν βρέθηκε παραγγελία με αυτό το αναγνωριστικό.</h4>";
}
else {
  $sql = "SELECT custName, custSurname FROM cust_prof WHERE custID='$custID'";
  $ses_sql=mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($ses_sql);
  $name = $row['custName'];
  $surname = $row['custSurname'];
  echo "<div class='row' style='margin-top:20px'>
  <div class='col-xs-3'>
    <h4>Όνομα Πελάτη: <br><span id='uName'> $name $surname</span></h4>
  </div> </div>";
  $sql= "SELECT prodID FROM prod2order WHERE orderID='$orderID'";
  $result = mysqli_query($con,$sql);
  echo "<table class='table'>
     <thead>
       <tr>
         <th>Συσκευή</th>
         <th>Τιμή</th>
         <th>Serial Number</th>
       </tr>
     </thead>
     <tbody>";
  $sum = 0;
  while($row = mysqli_fetch_array($result)) {
      $prodID = $row['prodID'];
      $sql = "SELECT prodName, prodPrice FROM prod_info WHERE prodID='$prodID'";
      $ses_sql=mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($ses_sql);
      $prodName = $row['prodName'];
      $prodPrice = $row['prodPrice'];
      echo "<tr>
        <td>$prodName</td>
        <td>$prodPrice</td>
        <td class='vcenter'><input class='form-control sn' type='text'></td>
      </tr>";
      $sum = $sum + $prodPrice;
  }
  echo "</tbody>
   </table>
   <div class='row' style='margin-top:20px'>
   <div class='col-xs-3'>
     <h4>Συνολικό ποσό: <br><span id='uName'> $sum Ευρώ</span></h4>
   </div>
   </div>
   <div class='container'>
   	<button  type='button' style='margin-left:-15px; margin-top:20px;' class='btn btn-default' onclick='handleButtonClick()'>Αποθήκευση & περαίωση παραγγελίας</button>
   </div>";
}
?>

<script type="text/javascript">
  function handleButtonClick(){
    var stringToPost = "[";
    $('.sn').each(function(){stringToPost+="\""+$(this).val()+"\",";});
    stringToPost = stringToPost.slice(0, -1);
    stringToPost+="]";

    $('#wrapper').load('commitSale.php',{ SNarray:stringToPost, orderID:'<?php echo "$orderID"; ?>', custID:'<?php echo "$custID"; ?>'});

  }
</script>
