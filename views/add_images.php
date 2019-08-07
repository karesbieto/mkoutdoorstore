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
		$img_array = mysqli_fetch_array($img_result);
		$imgrow = mysqli_num_rows($img_result);
		// $Img = mysqli_fetch_assoc($item_result);
		$item_result = mysqli_query($conn, $item_query);
		$item = mysqli_fetch_assoc($item_result);
		
?>

	<div class="container py-5">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
				<div class="jumbotron text-center">
					<h4>Add Image For <?php echo $item['name'];?></h4>
				</div>

				<form action="../controllers/process_add_image.php" method="POST" enctype="multipart/form-data"> 
					<input type="hidden" name="id" value="<?php echo $item['id']?>">
					<input type="hidden" name="imgnum" value="<?php echo $imgrow ?>">
					<?php
					if($imgrow === 0) { ?>
						<div class="form-group">
							<p class="jumbotron d-flex justify-content-center"> No Image Uploaded</p>
						</div>
						<p class="d-flex justify-content-center">You can updload 4 Images for this item</p>
						<div class="form-group">
							<label for="image1">Image1: </label>
							
							<input type="file" name="image1" id="image1" class="form-control" value="">
						</div>
						<div class="form-group">
							<label for="image2">Image2: </label>
							<input type="file" name="image2" id="image2" class="form-control" value="">
						</div>
						<div class="form-group">
							<label for="image3">Image3: </label>
							<input type="file" name="image3" id="image3" class="form-control" value="">
						</div>
						<div class="form-group">
							<label for="image4">Image4: </label>
							<input type="file" name="image4" id="image4" class="form-control" value="">
						</div>
					 <?php } else if ($imgrow === 1) { ?>
					 	<div class="form-group">
							
								<div class="row col-12 d-flex">
								<?php $i=1;	foreach($img_result as $img) { ?>
								<div class="col-lg">
									 <div class="row">
										<label>Image<?php echo $i; ?></label>
									</div>
									 <div class="row">	
										<img src="<?php echo $img['image']?>" style="width:150px; height: 100px;">
									</div>
								</div>	<!-- end col -->
								<?php $i++; } ?>
								</div> <!-- end row -->
						
						</div> <!-- form group end -->
						<p class="d-flex justify-content-center">You can updload 3 Images for this item</p>
							<div class="form-group">
								<label for="image2">Image2: </label>
								<input type="file" name="image2" id="image2" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="image3">Image3: </label>
								<input type="file" name="image3" id="image3" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="image4">Image4: </label>
								<input type="file" name="image4" id="image4" class="form-control" value="">
							</div>
						<?php } else if ($imgrow === 2) { ?>
							<div class="form-group">
								
								<div class="row col-12 d-flex">
								<?php $i=1;	foreach($img_result as $img) { ?>
								<div class="col-lg">
									 <div class="row">
										<label>Image<?php echo $i; ?></label>
									</div>
									 <div class="row">	
										<img src="<?php echo $img['image']?>" style="width:150px; height: 100px;">
									</div>
								</div>	<!-- end col -->
								<?php $i++; } ?>
								</div> <!-- end row -->
						
						</div> <!-- form group end -->
						<p class="d-flex justify-content-center">You can updload 2 Images for this item</p>
						<div class="form-group">
							<label for="image3">Image3: </label>
							<input type="file" name="image3" id="image3" class="form-control" value="">
						</div>
						<div class="form-group">
							<label for="image4">Image4: </label>
							<input type="file" name="image4" id="image4" class="form-control" value="">
						</div>
					 <?php }else if ($imgrow === 3) { ?>
					 <div class="form-group">
								
								<div class="row col-12 d-flex">
								<?php $i=1;	foreach($img_result as $img) { ?>
								<div class="col-lg">
									 <div class="row">
										<label>Image<?php echo $i; ?></label>
									</div>
									 <div class="row">	
										<img src="<?php echo $img['image']?>" style="width:150px; height: 100px;">
									</div>
								</div>	<!-- end col -->
								<?php $i++; } ?>
								</div> <!-- end row -->
						
						</div> <!-- form group end -->
						<p class="d-flex justify-content-center">You can updload 1 Image for this item</p>
						<div class="form-group">
							<label for="image4">Image4: </label>
							<input type="file" name="image4" id="image4" class="form-control" value="">
						</div>
					<?php } else if ($imgrow === 4){?>
					<p class="d-flex justify-content-center">You can't upload any picture for this item because you have uploaded 4 images already.</p>
				<?php }
				if($imgrow < 4) {  ?>
				<button type="submit" class="btn btn-primary btn-block">Add Image</button>
				<?php } ?>
				</form>

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

