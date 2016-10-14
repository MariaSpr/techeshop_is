<?php

    if (!empty($_POST['IDarray'])) {
        $IDs = $_POST['IDarray'];
        $custID = $_POST['custID'];
        $con = mysqli_connect('localhost','root','','is');
        $sql = "INSERT INTO `is`.`order_rec` (`orderID`, `custID`, `orderDate`, `orderIsReady`) VALUES (NULL, '$custID', '".date("Y-m-d")."', NULL);";

        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }
        if (!mysqli_query($con, $sql)){
        $result= "Error: ".mysqli_error($con);
        }

        $ses_sql=mysqli_query($con, "SELECT orderID FROM order_rec WHERE custID='$custID' ORDER BY orderID DESC");
        $row = mysqli_fetch_assoc($ses_sql);
        $orderID=$row['orderID'];

        foreach($IDs as $item) {
          $sql = "INSERT INTO prod2order (orderID, prodID) VALUES ( '$orderID', '$item')";
          if (!mysqli_query($con, $sql)){
          $result= "Error: ".mysqli_error($con);
          }
}
          echo "<h4>Η παραγγελία σας καταχωρήθηκε επιτυχώς! Ο κωδικός είναι $orderID.</h4> <script> deleteItems();</script>";

}

?>
