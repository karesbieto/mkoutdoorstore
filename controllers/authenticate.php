<?php
	session_start();
	require_once './connection.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	// var_dump($username);
	// echo "<br>";
	// var_dump($password);

	$sql_query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql_query);
	$user_info = mysqli_fetch_assoc($result);

	//  echo "<br>";
	// var_dump("number of rows" . mysqli_num_rows($result));
	// die();

	if (mysqli_num_rows($result) > 0) {
		//will execute if we match a row in our db
		//syntax password_verify(string password, hashed password);
		if(password_verify($password, $user_info['password']) == true ){
		// if($password == $user_info['password']){
			$_SESSION['user'] = $user_info;
			
			echo "login_successful";
		} else {
			die("login_failed");
		}

	} else {
		die("login_failed");
	}

?>