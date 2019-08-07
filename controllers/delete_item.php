<?php 
	session_start();
	require_once './connection.php';

	$id = $_GET['itemId'];

	// var_dump($id);
	// die();
	
	$delete_image = "DELETE FROM item_images WHERE item_id = $id";
	$delete_result = mysqli_query($conn, $delete_image);
	
	$delete_query = "DELETE FROM items WHERE id = $id";
	// var_dump($delete_query);
	// die();
	$delete_result = mysqli_query($conn, $delete_query);

	header('Location: ../views/home.php');

?>