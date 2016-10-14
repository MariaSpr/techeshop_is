<?php
$sql="SELECT custID FROM cust_prof";

$con = mysqli_connect('localhost','root','','is');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$result = mysqli_query($con,$sql);
?>

<h2>Ανακύκλωση</h2>
<form method="post" action="productRecycle.php">
<div class="row" style="margin-top:20px">
<div class="col-xs-3">
  <label for="ID">Μον.Αναγνωριστικό/ID</label>
  <input class="form-control" name="ID" id="ID" type="text">
</div>
<div class="col-xs-3">
  <label for="man">Κατάσταση συσκευής</label>
  <input class="form-control" name="status" id="man" type="text">
</div>
<div class="col-xs-4">
  <label for="name">Όνομα συσκευής</label>
  <input class="form-control" name="name" id="name" type="text">
</div>
</div>
<div class="row" style="margin-top:20px">
  <div class="col-xs-2">
    <div class="form-group">
    <label for="sel1">Κωδικός πελάτη</label>
    <select class="form-control" name="custID" id="sel1">
      <?php while($row = mysqli_fetch_array($result)) {
        echo "<option>".$row['custID']."</option>";
      } ?>
    </select>
   </div>
  </div>
	<div class="col-xs-2">
		<label for="priceFrom" >Έκπτωση:</label>
		<input class="form-control" id="priceFrom" name="priceCut" type="number" placeholder="Ευρώ">
	</div>
  <div class="col-xs-3">
    <div class="form-group">
    <label for="sel1">Τύπος συσκευής</label>
    <select class="form-control" name="type" id="sel1">
      <option>Κινητό τηλέφωνο</option>
      <option>Smartphone</option>
      <option>Tablet</option>
      <option>Laptop</option>
    </select>
   </div>
  </div>
</div>
<div class="container">
	<button  type="submit" name="submit" style="margin-left:-15px; margin-top:20px;" class="btn btn-default">Εκτύπωση κουπονιού έκπτωσης</button>
	<h3 style="margin-left:-15px"><small><i>θα πρέπει να συμπληρώσετε ΟΛΑ τα πεδία</i></small></h3>
</div>
</form>
