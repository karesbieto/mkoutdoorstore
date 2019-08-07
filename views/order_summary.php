<?php
	require_once '../partials/template1.php';
	function get_body_contents(){
		global $conn;
?>

	<div class="container-fluid mt-5 pt-5">
		<div class="row m-0 p-0 d-flex justify-content-center">
			<div class="col-12 col-sm-5 col-lg-5 p-0 pb-4  mr-3 orderSumImg">
				<section>
		          	<img src="../assets/bgimg/camp_order.jpg" class="img-fluid" style="height:390px;">
		        </section>
			</div> <!-- end col-md-6 -->
			
		<div class="col-12 col-sm-5 col-lg-5 m-0 p-0">
		<h3 class="d-flex justify-content-center mb-4">Order Summary</h3>
		
		<div class="row  col-12 m-0 p-0">
		<div class="col-5 col-sm-6 col-lg-4 offset-lg-3">
			<p class="titleName"><b>Product</b></p>
		</div>
		<div class="col-3 col-sm-2 col-lg-2">
			<p class="titleName"><b>Qty</b></p>
		</div>
		<div class="col-4 col-sm-3 col-lg-3">
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


	<div class="row col-12 m-0 p-0">	
		<div class="col-lg-3 hideMobile hideTab">
			<p><img src="<?php echo $indiv_img['image'];?>" style="width:130px; height: 80px;"></p>
		</div>
		<div class="col-5 col-sm-6 col-lg-4">
			<p><?php echo $name;?></p>
		</div>
		<div class="col-3 col-sm-2 col-lg-2">
			<p>x <?php echo $item_quantity; ?></p>
		</div>
		<div class="col-4 col-sm-3 col-lg-3">
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
	<div class="row col-12 m-0 p-0">
		<div class="col-8 col-sm-6 col-lg-3 offset-lg-5">
			<b>Subtotal:</b>
		</div>
		<div class="col-4 col-sm-3 offset-sm-2 col-lg-2 offset-lg-1">
			 <strong>&#8369;</strong><?php echo number_format($total,2);?>
		</div>
	</div>	
	<hr class="offset-lg-6">
	
	<?php $shipfee = 100;?>
	<div class="row col-12 m-0 p-0">
		
		<div class="col-8 col-sm-6 col-lg-3 offset-lg-5">
			<b>Shipping Fee:</b>
		</div>
		<div class="col-4 col-sm-3 offset-sm-2 col-lg-2 offset-lg-1">
			 <strong>&#8369;</strong><?php echo number_format($shipfee,2);?>
		</div>
	</div>	
	<hr class="offset-lg-6" style="height:1px; border: none; color: #000; background-color: #000;">
	
	<?php $totalAmount = $total + $shipfee; ?>
	<div class="row col-12 m-0 p-0">
		<div class="col-8 col-sm-6 col-lg-3 offset-lg-5">
			<b>Total:</b>
		</div>
		<div class="col-4 col-sm-3 offset-sm-2 col-lg-2 pb-3 offset-lg-1">
			 <strong>&#8369;</strong><?php echo number_format($totalAmount,2);?>
		</div>
	</div>	
	
	<h4>Payment Method</h4>
	<hr style="height:1px; border: none; color: #000; background-color: #000;">
	<div class="row col-12 col-md-12 m-0 p-0">
	<form action="../controllers/payment_method.php" method="POST">
		<div class="col-md-12">	
		<input type="hidden" name="total" id="total" value="<?php echo number_format($totalAmount,2);?>">
		<input type="radio" name="paymentMethod" value="COD" id="post-cod" onclick="showSpan()" checked> Cash on Delivery
		<div id="codDiv" class="">
		<span id="cod" class="tagName"></span>
		</div>
		</div>

		<div class="col-md-12">
		<input type="radio" name="paymentMethod" value="Bank" id="post-bank" onclick="showSpan()"> Bank Deposit
		<div id="bankDiv" class=" ">
		<span id="bank" class="tagName"></span>
		</div>
		</div>

		<div class="col-md-12">
		<input type="radio" name="paymentMethod" value="Remit" id="post-remit" onclick="showSpan()"> Remittance
		<div id="remitDiv" class=" ">
		<span id="remit" class="tagName"></span>
		</div>
		</div>

		<div class="col-md-12  mb-3">
		<input type="radio" name="paymentMethod" value="Paypal" id="post-paypal" onclick="showSpan()"> <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png" alt="PayPal Logo"> 
		<div id="paypalDiv" class=" ">
		<span id="paypal" class="tagName"></span>
		</div>
		</div>
	</div>	
		
	    <div id="paypal-button-container"></div>
		<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=PHP"></script>
		<div id="alternate-button-container">
		<button type="submit" name="submit" class="btn btn-dark my-3 btn-block">Place Order</button>
		</div>
	</form>
		
		<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=PHP"></script>
		
<script>
  // Render the PayPal buttons

  paypal.Buttons({
     createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?php echo $total ?>
          }
        }]
      });
    },
            style: {
                size: 'small',
                color:  'black',
                shape:  'rect',
                label:  'pay',
                height: 40
            }
    }).render('#paypal-button-container');

    
  // Listen for changes to the radio buttons
  document.querySelectorAll('input[name=paymentMethod]')
    .forEach(function (el) {
      el.addEventListener('change', function (event) {

        // If PayPal is selected, show the PayPal button
        if (event.target.value === 'Paypal') {
          document.body.querySelector('#alternate-button-container')
            .style.display = 'none';
          document.body.querySelector('#paypal-button-container')
            .style.display = 'block';
        }

        // If alternate funding is selected, show a different button
        if (event.target.value !== 'Paypal') {
          document.body.querySelector('#alternate-button-container')
            .style.display = 'block';
          document.body.querySelector('#paypal-button-container')
            .style.display = 'none';
        }
      });
    });

  // Hide non-PayPal button by default
  document.body.querySelector('#alternate-button-container')
    .style.display = 'block';
   document.body.querySelector('#paypal-button-container')
            .style.display = 'none';
</script>
	
			</div> <!-- end col-md-6 -->
		</div> <!-- end of row -->
	</div>

	<script type="text/javascript" src="../assets/js/radioButton.js"></script>
<?php
	}
}
?>