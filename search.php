<h2>Αναζήτηση</h2>
<div class="row" style="margin-top:20px">
<div class="col-xs-3">
  <label for="ID">Μον.Αναγνωριστικό/ID</label>
  <input class="form-control" name="productID" id="ID" type="text">
</div>
<div class="col-xs-3">
  <label for="man">Κατασκευαστής</label>
  <input class="form-control" name="manuf" id="man" type="text">
</div>
<div class="col-xs-4">
  <label for="name">Όνομα συσκευής</label>
  <input class="form-control" name="deviceName" id="name" type="text">
</div>
</div>
<div class="row" style="margin-top:20px">
	<div class="col-xs-2">
		<label for="priceFrom" >Τιμή:</label>
		<input class="form-control" id="priceFrom" type="number" placeholder="Από..">
	</div>
	<div class="col-xs-2">
		<label for="priceFrom" style='color:white'> .</label>
		<input class="form-control" id="priceTo" type="number" placeholder="...έως">
	</div>
	<label for="when" style="margin-left:15px">Προστέθηκαν:</label>
	<div id="when" class='colgroup'>
	<div class='col-xs-2'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' id='timeFrom' class="form-control" placeholder="Από.." />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-xs-2'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' id='timeTo' class="form-control" placeholder="..έως" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
	</div>
</div>
<div class="container">
	<button  type="button" style="margin-left:-15px; margin-top:20px;" class="btn btn-default" onclick="handleButtonClick()">Αναζήτηση</button>
	<h3 style="margin-left:-15px"><small><i>αν δώσετε το μοναδικό αναγνωριστικό του προϊόντος δεν χρειάζεται να συμπληρωθεί κανένα άλλο πεδίο</i></small></h3>
</div>
<hr>
<div id="wrapper" class="container" style="display:none;">

</div>
<script type="text/javascript">
function handleButtonClick(){

$('#wrapper').load('productSearch.php',
{ prodID:$('#ID').val(), manufacturer:$('#man').val(),
  prodName:$('#name').val(), priceFrom:$('#priceFrom').val(),
  priceTo:$('#priceTo').val(), timeFrom:$('#timeFrom').val(),
  timeTo:$('#timeTo').val()});
}
$('#wrapper').slideDown('slow');
$(document).ready(function(){
$('[data-toggle="popover"]').popover();
});
    $(function () {
		$('#datetimepicker6').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		$('#datetimepicker7').datetimepicker({
			useCurrent: false, //Important! See issue #1075
			format: 'YYYY-MM-DD'
		});
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
