<h2>Εφαρμογή Απόδειξης</h2>
<div class="row" style="margin-top:20px">
<div class="col-xs-3">
  <label for="ID">Κωδικός παραγγελίας</label>
  <input class="form-control" id="ID" type="text">
</div>
</div>
<div class="container">
	<button  type="button" style="margin-left:-15px; margin-top:20px;" class="btn btn-default" onclick="buttonClickHandler()" >Εμφάνιση Απόδειξης</button>
	<h3 style="margin-left:-15px"><small><i>Δώστε τον κωδικό παραγγελίας και πατήστε Περαίωση παραγγελίας για να ξεκινήσετε</i></small></h3>
</div>
<hr>
<div id="wrapper" style="display:none;">

</div>
<script>
function buttonClickHandler(){
$('#wrapper').slideDown('slow');
$('#wrapper').load('getOrderSaveSale.php',
{ orderID:$('#ID').val()});
}
</script>
