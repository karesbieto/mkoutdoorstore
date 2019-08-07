<?php 
	require_once '../partials/template.php';
	function get_body_contents() {
		global $conn;

		if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1 ) {
			$order_query = "SELECT orders.id, orders.transaction_code, statuses.name FROM orders JOIN statuses ON (orders.status_id = statuses.id)";

			$order_result = mysqli_query($conn, $order_query);
?>

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<table class="table table-striped">
				<thead>
					<th>Orders</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach($order_result as $order) { ?>
						<tr>
							<td><?php echo $order['transaction_code'] ?></td>
							<td><?php echo $order['name'] ?></td>
							<td>
							<?php if($order['name'] == "Pending") { ?>
								<a href="../controllers/complete_order.php?id=<?php echo $order['id'] ?>" class="btn btn-success btn-block">Complete Order</a>
								<a href="../controllers/cancel_order.php?id=<?=$order['id']?>" class="btn btn-danger btn-block">Cancel Order</a>
						<?php } ?>
						</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>
	
</div>

<?php } else {
	header("Location: ./catalog.php");
} ?>

<?php } ?>