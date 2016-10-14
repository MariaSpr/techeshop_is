<h2>Αλλαγή</h2>
<div class="row" style="margin-top:20px">
<div class="col-xs-3">
  <label for="ID">Μον.Αναγνωριστικό/ID</label>
  <input class="form-control" id="ID" type="text">
</div>
</div>
<div class="container">
	<button  type="button" style="margin-left:-15px; margin-top:20px;" class="btn btn-default" onclick="buttonClickHandler()" >Εμφάνιση λεπτομερειών</button>
	<h3 style="margin-left:-15px"><small><i>Δώστε το μοναδικό αναγνωριστικό(ID) και πατήστε εμφάνιση λεπτομερειών για να ξεκινήσετε</i></small></h3>
</div>
<hr>
<div id="wrapper" style="display:none;">

</div>
<script>
function buttonClickHandler(){
$('#wrapper').slideDown('slow');
$('#wrapper').load('productChange.php',
{ prodID:$('#ID').val()});
}

$("#input-dim-1").fileinput({
    //uploadUrl: "img",
    allowedFileExtensions: ["jpg", "png", "gif"],
    minImageWidth: 50,
    minImageHeight: 50
});
</script>
