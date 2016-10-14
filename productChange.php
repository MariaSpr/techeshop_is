
<?php
$prodID = $_POST['prodID'];

$connection = mysqli_connect("localhost", "root", "", "is");

$ses_sql=mysqli_query($connection, "SELECT * FROM prod_info WHERE prodID='$prodID'");
$row = mysqli_fetch_assoc($ses_sql);
$prodName=$row['prodName'];
$prodMan=$row['prodMan'];
$prodPrice=$row['prodPrice'];
$inStock=$row['prodInv'];
$bigDesc=$row['prodDesc'];
$smallDesc=$row['prodMinDesc'];

if(!isset($prodName)){
  echo "<h3>Δεν βρέθηκε αντικείμενο με αυτό το ID!</h3>";
}
else {

  echo ('
<form method="POST" action="productChangeCommit.php" >
  <div class="row" style="margin-top:20px">
  <div class="col-xs-3">
  <input type="hidden" name="theID" value="'.$prodID.'">
    <label for="man">Κατασκευαστής</label>
    <input class="form-control" id="man" name="man" type="text" value="'.$prodMan.'">
  </div>
  <div class="col-xs-4">
    <label for="name">Όνομα συσκευής</label>
    <input class="form-control" id="name" name="name" type="text" value="'.$prodName.'">
  </div>
  </div>
  <div class="row" style="margin-top:20px">
  	<div class="col-xs-2">
  		<label for="priceFrom" >Τιμή:</label>
  		<input class="form-control" id="priceFrom" name="price" type="number" value="'.$prodPrice.'" placeholder="Ευρώ">
  	</div>
    <div class="col-xs-2">
      <label for="priceFrom" >Σε στοκ:</label>
      <input class="form-control" id="priceFrom" name="stock" value="'.$inStock.'" type="number">
    </div>
  </div>
  <div class="row" style="margin-top:20px">
  	<div class="col-xs-10">
  		<label for="bigDesc">Μεγάλη περιγραφή:</label>
  		<input type="text" class="form-control" rows="5" name="bigDesc" value="'.$bigDesc.'" id="bigDesc">
  	</div>
  </div>
  <div class="row" style="margin-top:20px">
    <div class="col-xs-10">
      <label for="smallDesc">Μικρή περιγραφή:</label>
      <input type="text" class="form-control" name="smallDesc" value="'.$smallDesc.'" rows="2" id="smallDesc">
    </div>
  </div>
  <div class="container">
  	<button  type="submit" name="submit" style="margin-left:-15px; margin-top:20px;" class="btn btn-default">Αλλαγή</button>
  	<h3 style="margin-left:-15px"><small><i>θα πρέπει να συμπληρώσετε ΟΛΑ τα πεδία</i></small></h3>
  </div>
  </form>');

}

?>
