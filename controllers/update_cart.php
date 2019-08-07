<?php
	session_start();

	function getCartCount() {
		return array_sum($_SESSION['cart']);
	}

	$item_id = $_POST['item_id'];
	$item_quantity = $_POST['item_quantity'];

		
		if(isset($_POST['fromCartPage'])) {
			$_SESSION['cart'][$item_id] = $item_quantity;
			header('Location: ../views/cart.php');
		} else {
			if(isset($_SESSION['cart'][$item_id])) {
				$_SESSION['cart'][$item_id] += $item_quantity;
			} else {
				$_SESSION['cart'][$item_id] = $item_quantity;
			}

			echo getCartCount();
		}	


?>