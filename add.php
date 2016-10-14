
<h2>Προσθήκη</h2>
<form method="POST" action="productSave.php" enctype="multipart/form-data">
<div class="row" style="margin-top:20px">
<div class="col-xs-3">
  <label for="ID">Μον.Αναγνωριστικό/ID</label>
  <input class="form-control" id="ID" name="deviceID" type="text" required>
</div>
<div class="col-xs-3">
  <label for="man">Κατασκευαστής</label>
  <input class="form-control" id="man" name="manuf" type="text" required>
</div>
<div class="col-xs-4">
  <label for="name">Όνομα συσκευής</label>
  <input class="form-control" id="name" name="deviceName" type="text" required>
</div>
</div>
<div class="row" style="margin-top:20px">
	<div class="col-xs-2">
		<label for="priceFrom" >Τιμή:</label>
		<input class="form-control" id="priceFrom" type="number" name="devicePrice" placeholder="Ευρώ" required>
	</div>
  <div class="col-xs-2">
    <label for="priceFrom" >Σε στοκ:</label>
    <input class="form-control" id="priceFrom" name="inStock" type="number" required>
  </div>
</div>
<div class="row" style="margin-top:20px">
	<div class="col-xs-10">
		<label for="bigDesc">Μεγάλη περιγραφή:</label>
		<textarea class="form-control" rows="5" id="bigDesc" name="bigDesc" required></textarea>
	</div>
</div>
<div class="row" style="margin-top:20px">
  <div class="col-xs-10">
    <label for="smallDesc">Μικρή περιγραφή:</label>
    <input type="text" class="form-control" rows='2' id="smallDesc" name="smallDesc" required>
  </div>
</div>
<div class="row" style="margin-top:20px">
  <div class="col-xs-10">
    <label class="control-label">Εικόνα:</label>
    <input id="input-dim-1" type="file" class="file-loading" name='fileToUpload' accept="image/*" required>
  </div>
</div>
<div class="container">
	<button  type="submit" name="submit" style="margin-left:-15px; margin-top:20px;" class="btn btn-default">Προσθήκη</button>
	<h3 style="margin-left:-15px"><small><i>θα πρέπει να συμπληρώσετε ΟΛΑ τα πεδία</i></small></h3>
</div>
</form>
<script>
$("#input-dim-1").fileinput({
    //uploadUrl: "img",
    allowedFileExtensions: ["jpg", "png", "jpeg"],
    showUpload: false,
    minImageWidth: 50,
    minImageHeight: 50
});
</script>
