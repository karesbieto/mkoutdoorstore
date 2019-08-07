<?php 
	require_once '../partials/template.php';
	function get_body_contents() {
		global $conn;
?>

<div class="container">
	<div class="row">
		<div class="col-lg-10 offset-lg-1">
			<div class="jumbotron bg-transparent text-center mt-5" id="newLog" style="background-image: url('../assets/bgimg/log3.jpg');">
				<!-- <img src="../assets/bgimg/log.jpg"> -->
				<h1 class="mt-3" id="newLogTitle">My Transactions</h1>
				
			</div>
			<?php 
				$order_query = "SELECT * FROM orders WHERE user_id = {$_SESSION['user']['id']}";
				$order_result = mysqli_query($conn, $order_query);

				foreach ($order_result as $indiv_order) {
				
				
			?>
			<div class="card mb-4">
				<div class="card-header">
					<a href="#" class="card-link">Transaction Code: <?php echo $indiv_order['transaction_code']?></a>
				</div>
				<div class="row col-12 p-3">
					<div class="col-5 col-sm-3 offset-sm-1 col-lg-3 offset-lg-1">
						<b>Product</b>
					</div>
					<div class="col-sm-3 col-lg-3 hideMobile">
						<b>Price</b>
					</div>
					<div class="col-3 col-sm-2 col-lg-2">
						<b>Qty</b>
					</div>
					<div class="col-4 col-sm-3 col-lg-3">
						<b>Subtotal</b>
					</div>
				</div>
				<hr style="height:1px; border: none; color: #000; background-color: #000;">
				
					<?php 
						//select all colums for the item_order and items table on the condition that
						//the condition that the item_order.id = items
						$order_details_query = "SELECT * FROM item_order io JOIN items i ON(io.item_id = i.id) WHERE io.order_id ={$indiv_order['id']}";
						$order_details_result = mysqli_query($conn, $order_details_query);
						// var_dump($order_details_result);
						
						foreach ($order_details_result as $indiv_item) {
							extract ($indiv_item);
							// var_dump($indiv_item);
							// die();
						
					?>

					<div class="row col-12 px-3">		
						
						<div class="col-5 col-sm-4 col-lg-3 offset-lg-1">
							<p><?php echo $name;?></p>
						</div>
						<div class="col-sm-3 col-lg-3 hideMobile">
							<strong>&#8369;</strong><?php echo number_format($price,2);?>
						</div>
						<div class="col-3 col-sm-2 col-lg-2">
							<?php echo $quantity;?>
						</div>
						<?php 
								$subtotal = $price * $quantity;
							?>
						<div class="col-4 col-sm-3 col-lg-3">
							<p><strong>&#8369;</strong><?php echo number_format($subtotal);?></p>
						</div>
					</div> <!-- end of row -->
					<?php } ?>
				<hr style="height:1px; border: none; color: #000; background-color: #000;">	
					<div class="row col-12 px-3">

						<div class="col-12 col-sm-4 col-lg-3">Shipping Fee: <strong>&#8369;</strong>100</div>	
						<div class="col-12 col-sm-3 offset-sm-5 col-lg-3 offset-lg-6">
							 TOTAL: <strong>&#8369;</strong> <?php echo number_format($indiv_order['total']+100) ?>
						</div>
					</div>
								
			</div>
		<?php } ?>
		</div>
	</div>
	
</div>
<?php } ?>