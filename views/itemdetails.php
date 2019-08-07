<?php
	require_once '../partials/template1.php';
	function get_body_contents(){
		global $conn;

		if(isset($_SESSION['user'])) {
?>

<?php
	$item_query = "SELECT * FROM items WHERE id = '{$_GET['itemId']}'";

	$item_list = mysqli_query($conn, $item_query);

	foreach ($item_list as $item) {		

			$itemImg_query = "SELECT * FROM item_images WHERE item_id = '{$_GET['itemId']}'";

			$itemImg_list = mysqli_query($conn, $itemImg_query);
			// $rowCount = mysqli_num_rows($itemImg_list);
			// $itemImg = mysqli_fetch_array($itemImg_list);
			// var_dump($itemImg);
			// die();
			
?>

	<div class="container-fluid mt-5 pt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-7 mr-1 p-0">
				<section>
		          <div class="gallery ml-2 mr-1">
		            <div class="images">
		            <?php $i=0; foreach($itemImg_list as $itemImg) { ?>
		              <div class="image <?php if($i == 0) { ?> active<?php } ?>">
		                <div class="content" style="background-image: url(<?php echo $itemImg['image']?>)">
		                	
		                </div>
		              </div>
		              <?php $i++;} ?>
		            </div>
		            <div class="thumbs">
		            <?php $j=0; foreach($itemImg_list as $itemImg2) { ?>
		              <div class="thumb <?php if($j == 0) { ?> active<?php } ?> border" style="background-image: url(<?php echo $itemImg2['image'] ?>)">
		              	
		              </div>
		            <?php $j++;} ?>
		   			</div>
		   			 
		          </div>
		        </section>
			</div> <!-- end col-md-6 -->
			
			<div class="col-md-4 m-0 p-0">
				<div class="card mx-2"  style="min-height: 403px;">
			        <div class="card-body">
						<h4 class="card-title"> <?php echo $item['name']; ?></h4>
						<p class="card-text text-justify">	
							Features:<br><br>
							<?php echo $item['features']; ?>
						</p>
						<p><b>&#8369;</b> <?php echo number_format($item['price'],2); ?></p>

					<?php } ?>
					</div>
					<div class="card-footer d-flex align-items-center">
						<?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1){ ?>
						<a href="../views/edit_item.php?itemId=<?php echo $item['id'] ?>" class="btn btn-primary btn-block mr-2 text-white">Edit Item</a>

						<a href="../controllers/delete_item.php?itemId= <?php echo $item['id']?>" class="btn btn-danger btn-block mt-0 text-white">Delete Item</a>
						<?php 
							} else {
						?>
						<input type="number" class="form-control mr-3" value="1" name="item_quantity" style="width: 150px;">
						<button class="btn btn-info add-to-cart btn-block" data-id="<?php echo $item['id']?>" id="addcart">Add to Cart</button> 
						<?php } ?>
					</div>
				</div>
			</div> <!-- end col-md-6 -->
		</div> <!-- end of row -->
	
		<div class="row">
			<div class="container border rounded mx-2 mb-4 mt-3">
				<div class="col m-1 p-1 text-justify">
				Description: <br><br>
				<?php echo $item['description']; ?>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../assets/js/addtocart.js"></script>
<?php
	} else {
		header('Location: ../views/login.php');
	}
	}

?>