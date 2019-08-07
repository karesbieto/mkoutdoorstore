<?php
	session_start();
	require_once '../controllers/connection.php';

	$fname = htmlspecialchars(ucfirst(strtolower($_POST['firstname'])));
	$lname = htmlspecialchars(ucfirst(strtolower($_POST['lastname'])));
	$email = htmlspecialchars($_POST['email']);
	$add = htmlspecialchars($_POST['add']);
	$username = htmlspecialchars($_POST['username']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$role_id = 2;

	$dupcheck = "SELECT * FROM users WHERE username ='".$username."' OR email ='".$email."'";
	$result = mysqli_query($conn, $dupcheck);
	if(mysqli_num_rows($result) > 0) {
		echo "user_exists";
	} else {
		
		$sql_query = "INSERT INTO users (firstname, lastname, username, password, email, address, role_id) VALUES ('$fname', '$lname', '$username', '$password', '$email', '$add', '$role_id')";

		$sqlresult = mysqli_query($conn, $sql_query);

	}

	mysqli_close($conn);

?>