<?php
$error='';
$con = mysqli_connect('localhost','root','','is');
if (empty($_POST['userID']) || empty($_POST['userPassword']) || empty($_POST['userPasswordConfirm']) || empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['address']) || empty($_POST['paymentInfo']) ) {
  $error = "Ένα ή περισσότερα πεδία ήταν κενά. Παρακαλώ συμπληρώστε ΟΛΑ τα πεδία.";
}
else if($_POST['userPassword'] != $_POST['userPasswordConfirm']){
  $error = "Τα συνθηματικά δεν ταιρίαζουν.";
}
else {

  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $sql="SELECT custID FROM cust_prof";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)) {
    if($row['custID']==$_POST['userID']){
      $error = "Το username που επιλέξατε χρησιμοποιείται ήδη.";
      break;
    }
  }

  $sql="SELECT empID FROM emp_cred";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)) {
    if($row['empID']==$_POST['userID']){
      $error = "Το username που επιλέξατε χρησιμοποιείται ήδη.";
      break;
    }
  }
  if ($error==''){
     $sql="INSERT INTO `is`.`cust_prof` (`custID`, `custPass`, `custName`, `custSurname`, `custAddress`, `custPaymentInfo`) VALUES ('".$_POST['userID']."','".$_POST['userPassword']."','".$_POST['name']."','".$_POST['surname']."','".$_POST['address']."','".$_POST['paymentInfo']."')";
     if (!mysqli_query($con, $sql)){
	   $error= "Error: ".mysqli_error($con);
   }
      echo ("<script>
        $('.modal-body').children().replaceWith('');
        $('.modal-body').append('<div class=&#39;modal-body&#39;><h3>Δημιουργήθηκε επιτυχώς ο λογαριασμός σας! <br> Μπορείτε τώρα να εισέλθετε από το κουμπί Login. </h3></div>');
      </script>");
}
}
	mysqli_close($con); // Closing Connection
?>

<i style='color:red;'><?php echo($error); ?></i>
