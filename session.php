<?php
// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
$connection = mysqli_connect("localhost", "root", "", "is");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_emp'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "SELECT * FROM emp_cred WHERE empID='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session=$row['empID'];
$authority=$row['empTrust'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
