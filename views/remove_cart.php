<?php
	require_once '../partials/template.php';
	function get_body_contents(){
		global $conn;

		if(isset($_SESSION['user'])) {
?>


<div class="container py-3">
	<div class="jumbotron bg-transparent text-center mt-0" id="boardOrder" style="background-image: url('../assets/bgimg/nailedwood.png');">
	<h2 class="text-center" id="boardOrderTitle">Items In My Cart</h2>
	</div>
	<div class="row pt-5">
		<div class="col-md-2"></div>
		<div class="col-md-2">
			<h4><b>Product</b></h4>
		</div>
		<div class="col-md-2">
			<h4><b>Price</b></h4>
		</div>
		<div class="col-md-2">
			<h5><b>Quantity</b></h5>
		</div>
		<div class="col-md-2">
			<h5><b>Total</b></h5>
		</div>
		<div class="col-md-2"></div>
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
	<div class="row">	
		<div class="col-md-2">
			<p><img src="<?php echo $indiv_img['image'];?>" style="width:130px; height: 80px;"></p>
		</div>
		<div class="col-md-2">
			<p><?php echo $name;?></p>
		</div>
		<div class="col-md-2">
			<?php echo $price;?>
		</div>
		<div class="col-md-2">
			<form action="../controllers/update_cart.php" method="POST">
				<input type="hidden" name="item_id" value="<?php echo $id;?>">
				<input type="hidden" name="fromCartPage" value="true">
				<input type="number" class="form-control quantityInput" name="item_quantity" value="<?php echo $item_quantity; ?>" style="width: 80px;">
			</form>
		</div>
		<div class="col-md-2">
			<p><?php echo number_format($subtotal, 2);?></p>
		</div>
		<div class="col-md-2">
			<form action="../controllers/remove_from_cart.php" method="POST">		
			<input type="hidden" name="id" value="<?php echo $id;?>">
			</form>
			<button class="btn btn-outline-danger border-none deleteBtn" ><i class="fas fa-trash-alt fa-3x"></i></button>
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
	
</div>

<script type="text/javascript" src="../assets/js/cart.js"></script>

<?php } else {
	echo "
			<div class='row d-flex justify-align-center align-items-center'>
				No Item in the Cart.
			</div> 
		";
		}
?>



<?php 
	} else {
			header("Location: ./login.php");
	}
	
} ?>