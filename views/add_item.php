<?php 
	require_once '../partials/template.php';
	function get_body_contents(){
		global $conn;
?>

	<?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1 ) { ?>

	<div class="container py-5">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-lg-6 offset-lg-3">
				<div class="jumbotron text-center">
					<h4>Add New Item</h4>
				</div>

				<form action="../controllers/process_add_item.php" method="POST" enctype="multipart/form-data"> 
					
					<div class="form-group">
						<label for="name">Name: </label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="price">Price: </label>
						<input type="number" name="price" id="price" class="form-control">
					</div>
					<div class="form-group">
						<label for="feature">Feature: </label>
						<textarea type="text" name="feature" id="feature" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="description">Description: </label>
						<textarea type="text" name="description" id="description" class="form-control"></textarea>
					</div>
					<div class="form-group">
					    <label for="category_id">Category:</label>
					    <select class="form-control" name="category_id" id="category_id">
					    	<?php	
					    		$category_query = "SELECT * FROM categories";
					    		$category_result = mysqli_query($conn, $category_query); 
					    		
					    		foreach ($category_result as $category) { 
					    	?>
									<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?> 
									</option>

					    	<?php  }  ?> 
						</select>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add New Item</button>
				</form>

			</div>
		</div>
	</div>

	<?php } else {
			header("Location: ./login.php");
	}?>

<?php 
	} 
?>
