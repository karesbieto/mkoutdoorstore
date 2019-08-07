<?php
	session_start();
	require_once './connection.php';
	$new_username = $_POST['username'];
	$id = $_SESSION['user']['id'];
	$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	$update_query = "UPDATE users SET username = '$new_username' WHERE id = $id";
	$result = mysqli_query($conn, $update_query);

	if($result) {
		$updated_user_query = "SELECT * FROM users WHERE id = $id";
		$query_result = mysqli_query($conn, $updated_user_query);
		$updated_user_info = mysqli_fetch_assoc($query_result);
		$_SESSION['user'] = $updated_user_info;
		header("Location: ../views/profile.php");
	} else {
		echo "Did not work :( ";
	}

	if($password != "" && $confirmPassword != "") {

		if($password == $confirmPassword) {
			$update_query = "UPDATE users SET password = '$hashedpassword' WHERE id = $id";
			$result = mysqli_query($conn, $update_query);
		}
	}
?>