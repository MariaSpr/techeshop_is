<?php
// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
$connection = mysqli_connect("localhost", "root", "", "is");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "SELECT * FROM cust_prof WHERE custID='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session=$row['custID'];
$actualName=$row['custName'];
$loggedin=true;
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
$loggedin=false;
}
?>
