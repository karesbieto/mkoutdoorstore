<?php 
	require_once '../controllers/connection.php';
	$host = "remotemysql.com";
	// $host = "localhost";
	$username = "L4waMUm6nF";
	// $username = "root";
	$password = "bkxctYqZEI";
	// $password = "";
	$db = "L4waMUm6nF";
	// $db = "mk_store";

	$conn = mysqli_connect($host, $username, $password, $db);

	if(!$conn) {
		die ('Connection failed: ' . mysqli_error($conn));
	}
?>