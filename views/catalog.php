<?php
	require_once '../partials/template.php';
	function get_body_contents(){
		global $conn;
?>

	<div class="container-fluid mt-5 pt-5">
		<div class="row d-flex justify-content-between mx-2" id="userSortRow">
				<div class="form-group">
					    <!-- <label for="category_id">Category:</label> -->
					    <select class="form-control" name="category_id" id="category_id" onchange="JavaScript:changeCategory()">
					    	
					    	<?php
					    	if($_GET['category_id'] == 0) {
					    	?>
					    	<option value="0" selected>ALL</option>
					    	
					    	<?php	
					    	} else if ($_GET['category_id'] > 0) { ?>
					    		
					    		<option value="0">ALL</option>
					    	
					    	<?php } else { ?>
					    		<option value="0">ALL</option>
					    	<?php
					    	}
					    		$category_query = "SELECT * FROM categories";
					    		$category_result = mysqli_query($conn, $category_query); 
					    		
					    		foreach ($category_result as $category) { 
					    		if($_GET['category_id'] == $category['id']) {
					    	?>
					    			
									<option value="<?php echo $category['id'];?>" selected><?php echo $category['name'];?> 
									</option>

					    	<?php  
					    		} else { ?>

					    		<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?> 
									</option>
							<?php
					    		}
					    	}  ?> 
						</select>
				</div>

				<div class="form-group" id="selectSort">
					    <!-- <label for="category_id">Category:</label> -->
					    <select class="form-control" name="sort_id" id="sort_id" onchange="JavaScript:changeSort()">
					    	<?php
					    		if ($_SESSION['compsort'] == 'asc') {
					    	?>  
					    	<option>Sort By</option>
					    	<option value="asc" selected>Price (Low to High)</option>
					    	<option value="desc">Price (High to Low)</option>
					    	<?php } else if ($_SESSION['compsort'] == 'desc') {?>
					    	<option>Sort By</option>
					    	<option value="asc">Price (Low to High)</option>
					    	<option value="desc" selected>Price (High to Low)</option>
					    	<?php } else {?>
					    	<option selected>Sort By</option>
					    	<option value="asc">Price (Low to High)</option>
					    	<option value="desc">Price (High to Low)</option>
					    	<?php } ?>

						</select>
				</div>
		</div>

		<div class="row">
			<div class="col-md-12 mb-3">
				<!-- display all items as cards -->
				<?php
					$item_query = "SELECT * FROM items";
					//filtering

					if(isset($_GET['category_id']) && isset($_GET['category_id']) > 0) {
						$item_query .= " WHERE category_id ='{$_GET['category_id']}'";
					}

					//sorting
					if(isset($_SESSION['sort'])) {
						$item_query .= $_SESSION['sort'];
					}

					$item_list = mysqli_query($conn, $item_query);

					// var_dump($item_query);
					// var_dump($item_list);
					echo "<div class='row'>";
					foreach ($item_list as $item) {				
				?>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="card mt-3">
							<?php 
								$item_image = "SELECT * FROM item_images WHERE item_id =".$item['id'];
								$item_result = mysqli_query($conn, $item_image);
								$itemImg = mysqli_fetch_assoc($item_result); 
							?>
							<a href="./itemdetails.php?itemId=<?php echo $item['id'] ?>" class="itemDetails">
								<img src="<?php echo $itemImg['image'];?>" alt="" class="card-img-top img-fluid" id="catalogImg">
								<div class="card-body">
									<h4 class="card-title"><?php echo $item['name']; ?></h4>
									<p class="card-text">
										Price: <?php echo number_format($item['price'],2); ?>
									</p>
								</div> <!-- end of card body -->
								<div class="card-footer">
									<p><a href="./itemdetails.php?itemId=<?php echo $item['id'] ?>">View Item Details</a></p>
								</div>
							</a>
							
						</div>
					</div> <!-- end of col-4 -->
				<?php
					}
					echo "</div>";
				?>

			</div> <!-- end of col-12 -->			
		</div> <!-- end of row -->
	</div> <!-- end of container -->

<script type="text/javascript" src="../assets/js/script.js"></script>
<?php 
	}
?>