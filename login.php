<?php
session_start(); // Starting Session
$error=''; // Error Message

	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is empty";
	}
	else
	{
		// Define $username and $password
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
		$connection = mysqli_connect("localhost", "root", "", "is");
		// To protect MySQL injection for Security purposes
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query($connection , "SELECT custID, custPass FROM cust_prof WHERE custPass='$password' AND custID='$username'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			echo ("<script>
				location.reload();
			</script>");
		}
		else {
			$query = mysqli_query($connection , "SELECT empID, empPass FROM emp_cred WHERE empPass='$password' AND empID='$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_emp']=$username; // Initializing Session
				echo ("<script>
				window.location.replace('management.php');
				</script>");
			}
			else {
			$error = "Username or Password is invalid";
		}
		}
		mysqli_close($connection); // Closing Connection
	}

?>

<i style='color:red;'><?php echo($error); ?></i><br>
<!-- <script type="text/javascript">
	location.reload();
</script> -->
