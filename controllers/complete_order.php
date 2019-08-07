<?php  
	require_once './connection.php';

	$to_be_completed = $_GET['id'];

	$completed_order_query = "UPDATE orders SET status_id = 2 WHERE id = $to_be_completed";
	$result = mysqli_query($conn, $completed_order_query);

	header("Location: ../views/all_transactions.php");
?>