<?php
	require_once '../partials/template.php';
	function get_body_contents(){
		global $conn;

		if(isset($_SESSION['user'])) {
?>


<div class="container pb-3 mt-5 pt-3">
	<div class="logName" id="logName" style="background-image: url('../assets/bgimg/log2.png');">
	<h2 class="text-center" id="logNameTitle">My Cart</h2>
	</div>
	<div class="row pt-5 col-12" id="mobileRow">
		<div class="col-5 col-sm-2 col-md-3 offset-md-3">
			<p class="titleName"><b>Product</b></p>
		</div>
		<div class="col-md-2 hideMobile">
			<p class="titleName"><b>Price</b></p>
		</div>
		<div class="col-4 col-sm-2 col-md-2">
			<p class="titleName"><b>Qty</b></p>
		</div>
		<div class="col-3 col-sm-2 col-md-2">
			<p class="titleName"><b>Total</b></p>
		</div>
	</div>
	<hr style="height:2px; border: none; color: #000; background-color: #000;">
	<?php 
		if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
					$total = 0;
					$num = count($_SESSION['cart']);
					
					$i = 0;
		foreach($_SESSION['cart'] as $item_id => $item_quantity) {
			$sql_query = "SELECT * FROM items WHERE id = $item_id";
			$result = mysqli_query($conn, $sql_query);
			$indiv_item = mysqli_fetch_assoc($result);

			$img_query = "SELECT * FROM item_images WHERE item_id = $item_id";

			$img_result = mysqli_query($conn, $img_query);
			$indiv_img = mysqli_fetch_array($img_result);

			extract($indiv_item); 
			$subtotal = $price * $item_quantity;
			$total += $subtotal;
								
		?>
	<div class="row col-12 p-0 m-0">		
		<div class="col-md-3 hideMobile">
			<p><img src="<?php echo $indiv_img['image'];?>" style="width:130px; height: 80px;"></p>
		</div>
		<div class="col-4 col-md-3">
			<p><?php echo $name;?></p>
		</div>
		<div class="col-md-2 hideMobile">
			<strong>&#8369;</strong><?php echo number_format($price,2);?>
		</div>
		<div class="col-4 col-md-2">
			<form action="../controllers/update_cart.php" method="POST">
				<input type="hidden" name="item_id" value="<?php echo $id;?>">
				<input type="hidden" name="fromCartPage" value="true">
				<input type="number" class="form-control quantityInput" name="item_quantity" value="<?php echo $item_quantity; ?>" style="width: 80px;">
			</form>
		</div>
		<div class="col-4 col-md-2">
			<p><strong>&#8369;</strong><?php echo number_format($subtotal, 2);?></p>
		</div>
	</div> <!-- end of row -->
	<?php if ($i < $num-1) {?>
		<hr>
	<?php 
			}
			$i++;
		}
	?>
	<hr style="height:2px; border: none; color: #000; background-color: #000;">
	<div class="row col-12 p-0 m-0">
		<div class="col-8 col-md-2 offset-md-8">
			<b>Subtotal:</b>
		</div>
		<div class="col-4 col-md-2">
			 <strong>&#8369;</strong><?php echo number_format($total,2);?>
		</div>
	</div>	
	<hr class="offset-md-8">
	
	<?php $shipfee = 100;?>
	<div class="row col-12 p-0 m-0">
		<div class="col-12 col-md-6 buttonsCart d-flex">
		<div class="col-12 col-md-6 mt-2">
			<a href="../controllers/empty_cart.php" class="btn btn-outline-info btn-block">Empty Cart</a>
		</div>
		<div class="col-12 col-md-6 mt-2 mb-2">
			<form action="../views/remove_cart.php" method="POST">
			</form>
			<button class="btn btn-outline-danger btn-block deleteBtn">Remove Item</button>
		</div>
		</div>
		<div class="col-8 col-md-2 offset-md-2 shipfee">
			<b>Shipping Fee:</b>
		</div>
		<div class="col-4 col-md-2 shipfee">
			 <strong>&#8369;</strong><?php echo number_format($shipfee,2);?>
		</div>
	</div>	
	<hr class="offset-md-8 shipfee" style="height:1px; border: none; color: #000; background-color: #000;">
	
	<?php $totalAmount = $total + $shipfee; ?>
	<div class="row col-12 p-0 m-0 shipfee">
		<div class="col-8 col-md-2 offset-md-8">
			<b>Total:</b>
		</div>
		<div class="col-4 col-md-2">
			 <strong>&#8369;</strong><?php echo number_format($totalAmount,2);?>
		</div>
	</div>	
	<hr class="offset-md-8 shipfee" style="height:2px; border: none; color: #000; background-color: #000;">
	<div class="row m-0 p-0">
		<div class="col-md-4 offset-md-8">
			<a href="../views/order_summary.php?itemId=<?php echo $item_id?>" class="btn btn-dark btn-block mb-3">Proceed to Checkout</a>
		</div>
	</div>
</div>

<script type="text/javascript" src="../assets/js/cart.js"></script>
<?php } else {
?>
			<div class='jumbotron row d-flex justify-content-center align-items-center'>
				No Item in the Cart.
			</div> 
	<?php
		}
?>



<?php 
	} else {
			header("Location: ./login.php");
	}
	
} ?>