<?php  
	require_once './connection.php';

	$to_be_cancel = $_GET['id'];

	$cancel_order_query = "UPDATE orders SET status_id = 3 WHERE id = $to_be_cancel";
	$result = mysqli_query($conn, $cancel_order_query);

	header("Location: ../views/all_transactions.php");

?>