<?php
$result="";
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = true;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  //Pairnoume ap to POST ta dedomena ths formas
  $manufacturer = $_POST["manuf"];
  $title = $_POST["deviceName"];
  $deviceID  = $_POST["deviceID"];
  $devicePrice = $_POST["devicePrice"];
  $stockInfo = $_POST["inStock"];
  $bigDesc = $_POST["bigDesc"];
  $smallDesc = $_POST["smallDesc"];
  $currentDate = date("Y-m-d");
  $filename = basename( $_FILES["fileToUpload"]["name"]);
  $sql="INSERT INTO `is`.`prod_info` (`prodID`, `prodName`, `prodMan`, `prodDesc`, `whenAdded`, `prodPic`, `prodPrice`, `prodInv`, `prodMinDesc`) VALUES ('$deviceID', '$title', '$manufacturer', '$bigDesc', '$currentDate', '$filename', '$devicePrice', '$stockInfo', '$smallDesc'); ";
  $con = mysqli_connect('localhost','root','','is');
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    $uploadOk=false;
  }
  if (!mysqli_query($con, $sql)){
  $uploadOk=false;
  $result= "Error: ".mysqli_error($con);
  }
  else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $result= "Το αρχείο ". basename( $_FILES["fileToUpload"]["name"]). " ανέβηκε με επιτυχία.";
    } else {
        $result="Υπήρξε πρόβλημα κατά τη μεταφόρτωση της εικόνας.";
        $uploadOk=false;
    }
}
}
?>
<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>TechEStore Management Console</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="css/fileinput.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
  <script type="text/javascript" src="js/moment.js"></script>
  <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/fileinput.js" charset="utf-8"></script>
<!--   <script type="text/javascript" src="js/transition.js"></script>
<script type="text/javascript" src="js/collapse.js"></script> -->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="management.php">TechEshop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<!--         <li class="active"><a href="#">Κεντρική</a></li>-->
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Αποθήκη<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="$('#maincontent').load('search.php')">Αναζήτηση</a></li>
            <li><a href="#" onclick="$('#maincontent').load('add.php')">Προσθήκη</a></li>
            <li><a href="#" onclick="$('#maincontent').load('remove.php')">Αφαίρεση</a></li>
			<li><a href="#" onclick="$('#maincontent').load('change.php')">Αλλαγή</a></li>
          </ul>
        </li>
        <li><a href="#" onclick="$('#maincontent').load('reciept.php')">Απόδειξη</a></li>
		<li><a href="#" onclick="$('#maincontent').load('recycle.php')">Ανακύκλωση</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $login_session; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logοut</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" id="maincontent" style="margin-top:50px">
  <h3>Εισαγωγή προϊόντος</h3>
  <p><?php if($uploadOk) { echo "Το προϊόν προστέθηκε επιτυχώς!";} else { echo "Το προϊόν ΔΕΝ προστέθηκε."; }?></p>
  <p <?php if($uploadOk) { echo "style='color:green;'";} else {echo "style='color:red;'";} ?>  ><?php echo "$result" ?></p>
  <button  type="button" onclick="$('#maincontent').load('add.php')" class="btn btn-default">Προσθήκη Περισσότερων</button>
</div>

</body>
</html>
