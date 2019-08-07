<?php 
	require_once '../partials/template.php';
	function get_body_contents(){
		global $conn;

	if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1 ) { 
		
		$to_be_edited = $_GET['itemId'];
		// var_dump($id);
		$item_query = "SELECT * FROM items WHERE id = $to_be_edited";
		// var_dump($edit_query);
		$img_query = "SELECT * FROM item_images WHERE item_id = $to_be_edited";
		$img_result = mysqli_query($conn, $img_query);
		// $Img = mysqli_fetch_assoc($item_result);
		$item_result = mysqli_query($conn, $item_query);
		$item = mysqli_fetch_assoc($item_result);
		// var_dump($item);

		
?>

	<div class="container py-5">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-lg-6 offset-lg-3">
				<div class="jumbotron text-center">
					<h4>Edit <?php echo $item['name'];?> Gear</h4>
				</div>

				<form action="../controllers/process_edit_item.php" method="POST" enctype="multipart/form-data"> 
					<input type="hidden" name="id" value="<?php echo $item['id']?>">
					<div class="form-group">
						<label for="name">Name: </label>
						<input type="text" name="name" id="name" class="form-control" value="<?php echo $item['name']?>">
					</div>
					<div class="form-group">
						<label for="price">Price: </label>
						<input type="number" name="price" id="price" class="form-control" value="<?php echo $item['price']?>">
					</div>
					<div class="form-group">
						<label for="feature">Features: </label>
						<textarea type="text" name="feature" id="feature" class="form-control" value="<?php echo $item['features']?>"><?php echo $item['features']?></textarea>
					</div>
					<div class="form-group">
						<label for="description">Description: </label>
						<textarea type="text" name="description" id="description" class="form-control" value="<?php echo $item['description']?>"><?php echo $item['description']?></textarea>
					</div>
					<div class="form-group">

					<?php
					$i = 1;
					 foreach ($img_result as $img) { ?>
						<label for="image">Image <?php echo $i?>: <br><img src="<?php echo $img['image']?>" width="200" id="imagepic<?php echo $i?>"></label>
						<input type="hidden" name="imgid<?php echo $i?>" id="imgid<?php echo $i?>" value="<?php echo $img['id']?>">
						<input type="file" name="image<?php echo $i;?>" id="image<?php echo $i;?>" class="form-control" value="<?php echo $img['image']?>">
						<?php $i++; } ?>
					</div>
					<div class="form-group">
					    <label for="category_id">Category:</label>
					    <select class="form-control" name="category_id" id="category_id">
					    	<?php	
					    		
					    		$category_query = "SELECT * FROM categories";
					    		$category_result = mysqli_query($conn, $category_query); 
					    		
					    		foreach ($category_result as $category) { 
					    		
					    	?>

									<option value="<?php echo $category['id']?>"
										<?php 
										if ($category['id'] == $item['category_id']) {
											echo "selected";
										} else {
											echo "";
										}
										?> 
									>
									<?php echo $category['name'] ?>
								</option>
								
					    	<?php  } ?> 
						</select>

					</div>
					<button type="submit" class="btn btn-primary btn-block">Edit Item</button>
				</form>

			</div>
		</div>
	</div>

		<script>
			document.getElementById('image1').addEventListener('change', function(){
		        readURL(this);
		    });
			document.getElementById('image2').addEventListener('change', function(){
		        readURL2(this);
		    });
		    document.getElementById('image3').addEventListener('change', function(){
		        readURL3(this);
		    });
		    document.getElementById('image4').addEventListener('change', function(){
		        readURL4(this);
		    });
		function readURL(input) {
		   if (input.files && input.files[0]) {
		       var reader = new FileReader();

		       reader.onload = function (e) {
		           $('#imagepic1')
		               .attr('src', e.target.result);                
		       };

		       reader.readAsDataURL(input.files[0]);
		   }
		} //end function
		function readURL2(input) {
		   if (input.files && input.files[0]) {
		       var reader = new FileReader();

		       reader.onload = function (e) {
		           $('#imagepic2')
		               .attr('src', e.target.result);               
		       };

		       reader.readAsDataURL(input.files[0]);
		   }
		}//end function
		function readURL3(input) {
		   if (input.files && input.files[0]) {
		       var reader = new FileReader();

		       reader.onload = function (e) {
		           $('#imagepic3')
		               .attr('src', e.target.result);               
		       };

		       reader.readAsDataURL(input.files[0]);
		   }
		}//end function
		function readURL4(input) {
		   if (input.files && input.files[0]) {
		       var reader = new FileReader();

		       reader.onload = function (e) {
		           $('#imagepic4')
		               .attr('src', e.target.result);               
		       };

		       reader.readAsDataURL(input.files[0]);
		   }
		}//end function
		</script>
	<?php } else {
			header("Location: ./login.php");
	}?>

<?php 	
	
} ?>

