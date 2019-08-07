<?php
	session_start();

$pMethod = $_POST['paymentMethod'];
$_SESSION['total'] = $_POST['total'];
// var_dump($_SESSION['total']);
// die();
if ($pMethod == "COD") {
	header('Location: ./checkout.php');
} else if ($pMethod == "Bank") {
	header('Location: ./checkoutBank.php');
} else if ($pMethod == "Remit") {
	header('Location: ./checkoutRemit.php');
} else if ($pMethod == "Paypal") {
	?>
	
	<?php
}
?>