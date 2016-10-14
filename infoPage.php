<?php
// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
$connection = mysqli_connect("localhost", "root", "", "is");
session_start();// Starting Session
// Storing Session
if (isset($_SESSION['login_user'])){
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysqli_query($connection, "SELECT * FROM cust_prof WHERE custID='$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session=$row['custID'];
	$actualName=$row['custName'];
	$surname=$row['custSurname'];
	$address=$row['custAddress'];
	$payment=$row['custPaymentInfo'];
	$loggedin=true;
}
if(!isset($login_session)){
	mysqli_close($connection); // Closing Connection
	$loggedin=false;
}
?>

<?php
$prodID = $_GET['prodID'];
$con = mysqli_connect("localhost", "root", "", "is");
$sql = "SELECT * FROM prod_info WHERE prodID='$prodID' ";
$ses_sql=mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($ses_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Info page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/mainStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
</head>
<body>

	<header>
		<!-- logo -->
		<a href="index.php">
			<div id="logo">
				<p id="tech">TECH</p>
				<p id="eCal">e</p>
				<p id="shop">SHOP</p>
			</div>
		</a>


		<!-- login/cart -->

		<!-- <button type="button" id="cart"><span class="fa fa-shopping-cart" id="sh"></span><p>CART: 150$</p></button>
		<button type="button" id="account"><span class="fa fa-user" id="acc"></span><p>LOGIN</p></button> -->
		<?php if($loggedin) { echo ("<button data-toggle='modal' data-target='#cartModalWin' type='button' id='cart'><span class='fa fa-shopping-cart' id='sh'></span><p id='total'>CART: 0€</p></button>"); } ?>


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
					<form method='get' action='searchResults.php'>
						<input type="text" name="q" id="search" placeholder="SEARCH..."></input>
					</form>


					<!-- navigation/menu  -->

					<nav>
						<ul>
							<a href="productpage.php?man=apple"><li>APPLE</li></a>
							<a href="productpage.php?man=htc"><li>HTC</li></a>
							<a href="productpage.php?man=lg"><li>LG</li></a>
							<a href="productpage.php?man=nokia"><li>NOKIA</li></a>
							<a href="productpage.php?man=samsung"><li>SAMSUNG</li></a>
							<a href="productpage.php?man=sony"><li>SONY</li></a>
						</ul>
					</nav>
				</div>  <!-- end menu -->
				<br>
			</header>

			<!-- frame/img -->

			<div id="img_frame">
				<img src="img/<?php echo $row['prodPic']; ?>" alt="img" width="221" height="208">
			</div>

			<!-- title/details -->
			<p id="tit"><?php echo $row['prodName']; ?></p>
			<div id="br2"></div>

			<div id="dt"><p> <?php echo $row['prodMinDesc']; ?> </p>


				<!-- RELEASES 2014, SEPTEMBER <br>
				129G, 6.9MM THICKNESS <br>
				iOS 8, UP TO iOS 8.4 <br>
				16/64/128GB STORAGE, NO CARD SLOT</p> -->
			</div>

			<div id="buttons">
				<div class="price"><?php echo $row['prodPrice']; ?>€ </div>
				<button type="button" <?php echo "onclick='saveToCart(&#39;".$row['prodID']."&#39;,&#39;".$row['prodName']."&#39;,&#39;".$row['prodPrice']."&#39;)'"; ?>class="buy"><span class="fa fa-shopping-cart"></span></button>
			</div>

			<div style="clear: both";></div>

			<!-- tech details -->
			<p id="arr">TECHNICAL CHARACTERISTICS</p>
			<div id="br"></div>

			<div id="details_box">
				<p><?php echo $row['prodDesc']; ?></p>
			</div>

			<!-- footer -->
			<footer>
				<p>CALL US ON: 210-1234567</p>
				<p id="contact">CONTACT US:</p>
				<span class="fa fa-facebook-square foot"></span><span class="fa fa-twitter-square foot"></span><span class="fa fa-envelope foot"></span>
			</footer>

			<!-- Modal Registration -->
			<div id="register" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Εγγραφή Χρήστη</h4>
						</div>
						<div class="modal-body" >
							<label class='modal-label' for="newUName">Username</label>
							<input class="form-control" id="newUName" type="text">
							<label class='modal-label' for="newPass">Password</label>
							<input class="form-control" id="newPass" type="password">
							<label class='modal-label' for="newPassConf">Επιβεβαίωση Password</label>
							<input class="form-control" id="newPassConf" type="password">
							<label class='modal-label' for="name">Όνομα</label>
							<input class="form-control" id="name" type="text">
							<label class='modal-label' for="surname">Επώνυμο</label>
							<input class="form-control" id="surname" type="text">
							<label class='modal-label' for="ID">Διεύθυνση</label>
							<input class="form-control" id="addr" type="text">
							<label class='modal-label'  for="payment">Πληροφορίες Πληρωμής</label>
							<input class="form-control" id="payment" type="text">
							<button type="button" style="margin-top:10px;" class="btn btn-default pull-right" onclick="$('#registerError').load('register.php',
							{ userID:$('#newUName').val(), userPassword:$('#newPass').val(),
							userPasswordConfirm:$('#newPassConf').val(), name:$('#name').val(),
							surname:$('#surname').val(), address:$('#addr').val(),
							paymentInfo:$('#payment').val()})" >
							Εγγραφή
						</button>
						<br><span id='registerError'></span><br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
		<div id="cartModalWin" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Καλάθι Αγορών</h4>
					</div>
					<div class="modal-body">
					<div  id="cartModal"></div>
					</div>
					<div class="modal-footer" >
					<div id="cartModalFooter"></div>
					</div>
				</div>
			</div>
		</div>

		<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover();
		});
		function getCart (){
			if(localStorage) {
								if(localStorage['cartData'] != null) {
										// Get the cart

									var htmlTableData = "<div id=\"cartModal\"><table class=\"table\"><thead><tr><th>Product ID</th><th>Προϊόν</th><th>Τιμή</th></tr></thead><tbody>";
									cartItems = JSON.parse(localStorage['cartData']);
									totalPrice = cartItems.total;
									itemsInCart = cartItems.items;
									var stringToPost = "[";
									for (var i in itemsInCart)
									{
									stringToPost+="\""+itemsInCart[i].ID+"\" ,";
									htmlTableData+="<tr><td>";
									htmlTableData+=itemsInCart[i].ID;
									htmlTableData+="</td><td>";
									htmlTableData+=itemsInCart[i].item;
									htmlTableData+="</td><td>";
									htmlTableData+=itemsInCart[i].price;
									htmlTableData+="€</td></tr>";
								}
								stringToPost = stringToPost.slice(0, -1);
								stringToPost+="]";
									htmlTableData+="</tbody></table>";
									htmlTableData+="<br><h4>Σύνολο: "+totalPrice+' Ευρώ</h4></div>';

									$('#total').html("CART: "+totalPrice+"€");

									var htmlFooterButton="<div id=\"cartModalFooter\"><button type=\"button\" style=\"margin-top:10px;\" class=\"btn btn-default pull-right\" onclick='$(\".modal-body\").load(\"saveOrder.php\",";
									htmlFooterButton+="{ IDarray:"+stringToPost+", custID:\"<?php if ($loggedin) {echo $login_session;} ?>\" })'>" ;
									htmlFooterButton+="Παραγγελία</button>";
									htmlFooterButton+="<button type=\"button\" style=\"margin-top:10px;\" class=\"btn btn-default\" onclick=\" deleteItems();\">";
									htmlFooterButton+="Διαγραφή καλαθιού</button></div>";

									$('#cartModal').replaceWith(htmlTableData);
									$('#cartModal').css('font-family', 'Arial');
									$('#cartModal').css('font-weight', 'bold');
									$('#cartModalFooter').replaceWith(htmlFooterButton);

							}
							else {
								htmlTableData="<div id=\"cartModal\"><h4>Δεν υπάρχουν προϊόντα στο καλάθι.</h4></div>";
								$('#cartModal').replaceWith(htmlTableData);
								$('#cartModal').css('font-family', 'Arial');
								$('#cartModal').css('font-weight', 'bold');
								$('#cartModalFooter').replaceWith('<div id=\"cartModalFooter\"></div>');
								$('#total').html("CART: 0€");
							}
					} else {
							console.log('localStorage not detected, cannot get cart.');
					}
				}
		function saveToCart(theID, item, price ) {
		 if(localStorage) {
					 console.log('localStorage detected. Processing cart item: '+item);
					 // Create a new cart array object if there isn't one
					 if(localStorage['cartData'] != null) {
					 cartItems = JSON.parse(localStorage['cartData']);
				 }
				 else {cartItems = null;}
					 if(cartItems == null) {
							 console.log('Cart is empty, preparing new cart array');
							 cartItems = {
									 'total': price,
									 'items':[{'item':item,'price':price, 'ID':theID}]
							 };
							 console.log('Cart array created');
						 } else {
							 console.log('Existing cart detected, searching for existing prod.');
							 var newItem = true;
							 // Loop our array to see if we need to update an existing item
							 for(var i = 0; i < cartItems.items.length; i++) {
									 if(cartItems.items[i].ID === theID) {
											 console.log('Existing prod detected: '+item);
											 newItem = false;
											 // var itemQuantity = parseInt(cartItems.items[i].quantity);
											 // console.log('Updating current role quantity: '+itemQuantity);
											 // itemQuantity++;
											 // console.log('New role quantity: '+itemQuantity);
											 // cartItems.items[i].quantity = itemQuantity.toString();
									 }
							 }
							 // We must not have found an existing item, so add one
							 if(newItem) {
									 console.log('Prod not found. Adding prod to cart with quantity 1: '+item);
									 cartItems.items.push({'item':item,'price':price, "ID":theID});
									 cartItems.total= parseInt(cartItems.total)+parseInt(price);
							 }
							 // Update the item count
							 // var cartCount = cartItems.count;
							 // console.log('Current cart count: '+cartCount);
							 // cartCount++;
							 // console.log('New cart count: '+cartCount);
							 // cartItems.count = cartCount.toString();
					 }
					 // Push the prepared data into localStorage
					 console.log('Saving cart data...');
					 localStorage['cartData'] = JSON.stringify(cartItems);
					 console.log('Cart data saved.');
			 } else {
					 console.log('localStorage not supported, item not saved for later');
			 }
			 getCart();
		}

		function deleteItems() {
			if(localStorage) {
					console.log('localStorage detected. Removing cart items');
					// Blow away the whole cart object from localStorage if it only held this one item, it's assuming the one item must match what triggered the remove action
				 //  if(parseInt(cartItems.items.length) == 1) {
						 //  console.log('Only 1 item in cart. Removing cart object entirely.');
							localStorage.removeItem('cartData');
		 // 		 } else {
		 // 				 // Update the item count
		 // 				 var cartCount = cartItems.items.length;
		 // 				 console.log('Current cart count: '+cartCount);
		 // 				 cartCount--;
		 // 				 console.log('New cart count: '+cartCount);
		 // 				 cartItems.count = cartCount.toString();
		 // 				 console.log('Multiple items in cart, searching for prod: '+ id);
		 // 				 // Find the item to update it
		 // 				 for(var i = 0; i < cartItems.items.length; i++) {
		 // 						 if(cartItems.items[i].theID === id) {
		 // 								 console.log('prod '+prod+' found with name: '+cartItems.items[i].item);
		 // 									 console.log('Removing role from cart.');
		 // 										 cartItems.items.splice(i,1);
		 // 						 }
		 // 				 }
		 // 				 // Push the prepared data into localStorage
		 // 				 console.log('Saving cart data...');
		 // 				 localStorage['cartData'] = JSON.stringify(cartItems);
		 // 				 console.log('Cart data saved.');
		 // 		 }
			} else {
					console.log('Local Storage not supported, item not saved for later');
			}
			getCart();
		}
		</script>

	</body>
	</html>
