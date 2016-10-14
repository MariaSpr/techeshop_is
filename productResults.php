<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Apple products</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/mainStyle.css">
	<script src="js/jquery-1.11.3.min.js"></script>
</head>
<body>

	<header>
		<!-- logo -->
		<div id="logo">
			<p id="tech">TECH</p>
			<p id="eCal">e</p>
			<p id="shop">SHOP</p>
		</div>


		<!-- login/cart -->

		<!-- <button type="button" id="cart"><span class="fa fa-shopping-cart" id="sh"></span><p>CART: 150$</p></button>
		<button type="button" id="account"><span class="fa fa-user" id="acc"></span><p>LOGIN</p></button> -->
		<?php if($loggedin) { echo ("<button type='button' id='cart'><span class='fa fa-shopping-cart' id='sh'></span><p>CART: 0€</p></button>"); } ?>

		<button type="button" data-toggle="popover" data-html='true' title="Είσοδος" data-placement="left"
		data-content='

			<label for="uName">Όνομα χρήστη</label>
			<input class="form-control" id="uName" type="text">
			<label for="pass" style="margin-top:5px;" >Κωδ. Πρόσβασης</label>
			<input class="form-control" id="pass" type="password">
			<button type="button" style="margin-top:10px;" class="btn btn-default" onclick="$(&#39;#loginError&#39;).load(&#39;login.php&#39;, {username:$(&#39;#uName&#39;).val(), password:$(&#39;#pass&#39;).val()})">Login</button>
			<script>$("#pass").keypress(function (e) {
			if (e.which == 13) {
				$("#loginError").load("login.php", {username:$("#uName").val(), password:$("#pass").val()});
				return false;    //<---- Add this line
			}
		});</script>
		<br>
		<small id="loginError" style="margin-top:5px;"></small>
		<small style="margin-top:5px;"><i>Δεν έχετε λογαριασμό&#59; <a href="#" data-toggle="modal" data-target="#register" onclick="$(&#39;#account&#39;).popover(&#39;hide&#39;);">Εγγραφείτε τώρα</a></i></small>'
		id="account"><span class="fa fa-user" id="acc"></span><p><?php if($loggedin) {echo $actualName;} else {echo "LOGIN";}?></p></button>

		<?php if($loggedin) { echo ("<script> $('#account').remove(); </script>
			<button type='button' data-toggle='popover' data-trigger='focus' data-html='true' title='Προφίλ' data-placement='bottom'
			data-content='<b><center>Όνομα: $actualName<br>Επώνυμο: $surname<br>Διεύθυνση: $address<br>Τρόπος πληρωμής: $payment<br>
			<a href=&#39;logout.php&#39;><button type=&#39;button&#39; style=&#39;margin-top:10px;&#39; class=&#39;btn btn-default&#39;> Έξοδος </button></a></center></b>'
			id='account'><span class='fa fa-user' id='acc'></span><p>$actualName</p></button>
			"); } ?>


		<div style="clear: both";></div>

		<div id="menu_bg">

			<!-- search -->
			<input type="text" id="search" placeholder="SEARCH..."></input>


			<!-- navigation/menu  -->

			<nav>
				<ul>
					<li>APPLE</li>
					<li>HTC</li>
					<li>LG</li>
					<li>NOKIA</li>
					<li>SAMSUNG</li>
					<li>SONY</li>
				</ul>
			</nav>
		</div>  <!-- end menu -->
		<br>
	</header>


	<!-- apple products -->
	<!-- <p id="arr">APPLE</p>
	<div id="br"></div>

	<div class="prod_box">
		<div class="frame">
			<img src="img/iphone6.png" alt="iphone6" width="162" height="168">
		</div>

		<p class="title">APPLE IPHONE 6S</p>

		<div class="price">800$</div>
		<button type="button" class="buy"><span class="fa fa-shopping-cart"></span></button>
		<a href="#"><button type="button" class="info"><span class="fa fa-info-circle"></span></button></a>
	</div>


	<div class="prod_box">
		<div class="frame">
			<img src="img/ipad.png" alt="ipad" width="162" height="168">
		</div>

		<p class="title">IPAD AIR 2</p>

		<div class="price">777$</div>
		<button type="button" class="buy"><span class="fa fa-shopping-cart"></span></button>
		<a href="#"><button type="button" class="info"><span class="fa fa-info-circle"></span></button></a>
	</div>

	<div class="prod_box">
		<div class="frame">
			<img src="img/ipadmini3.png" alt="mini3" width="162" height="162">
		</div>

		<p class="title">IPAD MINI 3</p>

		<div class="price">999$</div>
		<button type="button" class="buy"><span class="fa fa-shopping-cart"></span></button>
		<a href="#"><button type="button" class="info"><span class="fa fa-info-circle"></span></button></a>
	</div>

	<div class="prod_box">
		<div class="frame">
			<img src="img/iphone5c.png" alt="5c" width="162" height="168">
		</div>

		<p class="title">APPLE IPHONE 5C</p>

		<div class="price">456$</div>
		<button type="button" class="buy"><span class="fa fa-shopping-cart"></span></button>
		<a href="#"><button type="button" class="info"><span class="fa fa-info-circle"></span></button></a>
	</div>

	<div class="prod_box">
		<div class="frame">
			<img src="img/iphone5s.png" alt="5s" width="162" height="168">
		</div>

		<p class="title">IPHONE 5S</p>

		<div class="price">456$</div>
		<button type="button" class="buy"><span class="fa fa-shopping-cart"></span></button>
		<a href="#"><button type="button" class="info"><span class="fa fa-info-circle"></span></button></a>
	</div>  -->


	<div style="clear: both";></div>

	<footer>
		<p>CALL US ON: 210-1234567</p>
		<p id="contact">CONTACT US:</p>
		<span class="fa fa-facebook-square foot"></span><span class="fa fa-twitter-square foot"></span><span class="fa fa-envelope foot"></span>
	</footer>

</body>
</html>
