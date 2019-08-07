<?php
	require_once '../partials/template2.php';
	function get_body_contents() {
			global $conn;

	if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2){
?>


<section id="storSlider">
		<div id="carouselImg" class="carousel slide m-0 p-0" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <div class="d-block w-100 homeImg" style="background-image: url('../assets/bgimg/banner121.jpg'); background-repeat: no-repeat; background-size: cover; height: 670px; background-position: left bottom; background-attachment: fixed;" alt="First slide"></div>
			      <div class="carousel-caption d-none d-md-block">
				    <h5>Outdoor Experience</h5>
				    <p>Enjoy a nature scenery in a peaceful place</p>
				  </div>
			    </div>
			    <div class="carousel-item">
			      <div class="d-block w-100 homeImg" style="background-image: url('../assets/bgimg/camping1.jpg'); background-repeat: no-repeat; background-size: cover; height: 670px; background-position: center bottom; background-attachment: fixed;" alt="First slide"></div>
			      <!-- <img class="d-block w-100" src="../assets/bgimg/camping.jpg" alt="Second slide"> -->
			      <div class="carousel-caption d-none d-md-block">
				    <h5>Adventure in the Wilderness</h5>
				    <p>Have fun outside the comfort of your home</p>
				  </div>
			    </div>
			    <div class="carousel-item">
			    <div class="d-block w-100 homeImg" style="background-image: url('../assets/bgimg/camping111.jpg'); background-repeat: no-repeat; background-size: cover; height: 670px; background-position: center bottom; background-attachment: fixed;" alt="First slide"></div>
			      <!-- <img class="d-block w-100"  src="../assets/bgimg/camping11.jpg" alt="Third slide"> -->
			      <div class="carousel-caption d-none d-md-block">
				    <h5>Relaxing View</h5>
				    <p>Have fun outside the comfort of your home</p>
				  </div>
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		</div> <!-- end carousel -->
	</section>

<div class="container-fluid m-0 p-0">
	<div class="row d-flex justify-content-center align-items-center bg-secondary mx-0 px-0">
			<h2 class="text-white">CHOOSE YOUR GEAR</h2>
	</div>
	<div class="row col-12 col-sm-12 mx-0 px-0">
		<div class="col-12 col-sm-6 col-lg-3 m-0 p-0 image-container">
		        <a href="../views/catalog.php?category_id=1">
		            <div class="gallery-image">
		              <img class="img-fluid" src="../assets/bgimg/tent1.jpg" alt="">
		            </div>
		            <div class="after">
						<h3>Tents and Shelters</h3>
					</div>
				</a>
	    </div> <!-- End col-sm-3 -->
	    <div class="col-12 col-sm-6 col-lg-3 m-0 p-0 image-container">
		        <a href="../views/catalog.php?category_id=2">
		            <div>
		              <img class="img-fluid" src="../assets/bgimg/sleepingpad1.jpg" alt="">
		            </div>
		            <div class="after">
						<h3>Sleeping Pads / Bags</h3>
					</div>
				</a>
	    </div> <!-- End col-sm-3 -->
	    <div class="col-12 col-sm-6 col-lg-3 m-0 p-0 image-container">
		        <a href="../views/catalog.php?category_id=3">
		            <div>
	 	              <img class="img-fluid" src="../assets/bgimg/cookware1.jpg" alt="">
		            </div>
			        <div class="after">
						<h3>Cookwares</h3>
					</div>
				</a>
	    </div> <!-- End col-sm-3 -->
	    <div class="col-12 col-sm-6 col-lg-3 m-0 p-0 image-container">
		        <a href="../views/catalog.php?category_id=4">
		            <div>
		              <img class="img-fluid" src="../assets/bgimg/campstove1.jpg" alt="">
		            </div>
		            <div class="after">
						<h3>Camping Stoves</h3>
					</div>
		        </a>
	    </div> <!-- End col-sm-3 -->
	</div>
	<div class="row m-0 p-0 mt-5" id="aboutus">
		<div class="col-12 col-sm-12 col-lg-6">
			<p class="text-justify">Camping is a pleasant experience to enjoy the outdoors. It reduces the stress, refreshes your mind and body. Offers complete relaxation in the woods. Pre-planning is very Essential for any outdoor trip.</p>

			<p class="text-justify">An adventure without the right camping accessories can be very hopeless at times.  Use this handy <a href="">Camping Checklist</a> and get ready with all the essential camping gears required for your adventure.</p>


			<p class="text-justify">Our love for outdoor adventure gave way for us to establish a business that offers quality gears for people seeking adventures in the wilderness.</p>

			<p class="text-justify">MK Outdoor Store is an online shop that offers different kinds of first-rate gears used for outdoor camping.</p>
			<img src="../assets/bgimg/about1.jpg" class="img-fluid mb-3 col-12 col-sm-12 col-lg-12" style="height: 150px;">
		</div>
		<div class="col-12 col-sm-12 col-lg-6">
			<div class="row mb-1 pb-1 d-flex justify-content-center">
				<h4>Mode of Payment</h4>
			</div>	
			<div class="row col-12 col-sm-12 m-0 p-0" >
				<div class="row col-12 col-sm-12 paymentItem m-0 p-0">
					<p>Via Bank Deposit:</p>
				</div>
				<div class="row col-12 col-sm-12 mb-2 pb-2 paymentItem" id="bankImg">
					<img src="../assets/bgimg/bpi.png" class="mx-2 paymentMode">	
					<img src="../assets/bgimg/bdo.png" class="mx-2 paymentMode">	
				</div>
				<div class="row col-12 col-sm-12 paymentItem m-0 p-0">
					<p>Via Remittance:</p>
				</div>
				<div class="row col-12 col-sm-12 mb-2 pb-2 paymentItem" id="remitImg">
					<img src="../assets/bgimg/palawan.png" class="p-1 m-1 paymentMode">	
					<img src="../assets/bgimg/cebuana.png" class="p-1 m-1 paymentMode">	
					<img src="../assets/bgimg/mlhuiller.png" class="p-1 m-1 paymentMode">	
				</div>
				<div class="row col-12 col-sm-12 paymentItem m-0 p-0">
					<p>Via Online Payment:</p>
				</div>
				<div class="row col-12 col-sm-12 mb-2 pb-2 paymentItem" id="onlineImg">
					<img src="../assets/bgimg/paypal.png" class="p-1 m-1 paymentMode">	
					<img src="../assets/bgimg/creditcard.png" class="p-1 m-1 paymentMode">	
				</div>
			</div>
		</div>
	</div> <!-- end of about -->
	<div class="row m-0 p-0" id="contactus">
		<div style="background-image: url('../assets/bgimg/campingsite.jpg');" id="contact">
		      <div id="overlateImg">
		        <div class="row col-lg-12 m-0 p-0 mt-5 d-flex justify-content-center" id="overlateImg">
		          <div class="heading text-center" id="contactText">
		              <h2 class="contact-text text-white">Contact Us</h2>
		              <p class="text-white mb-5 inquire">For inquiries, send a message here:</p>
		          </div>
		        </div>

		        <div class="row col-lg-12 m-0 p-0">
		            <div class="col-lg-6 d-flex justify-content-center align-items-center">
		              <form id="main-contact-form" name="contact-form" method="post" action="../controllers/contactus.php">
		                <div class="row">
		                  <div class="col-sm-6">
		                    <div class="form-group">
		                      <input type="text" name="firstname" class="form-control" placeholder="Firstname" required="required">
		                    </div>
		                  </div>
		                  <div class="col-sm-6">
		                    <div class="form-group">
		                      <input type="text" name="lastname" class="form-control" placeholder="Lastname" required="required">
		                    </div>
		                  </div>
		                </div>
		                <div class="form-group">
		                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
		                </div>
		                <div class="form-group">
		                  <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
		                </div>
		                <div class="form-group">
		                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
		                </div>                        
		                <div class="form-group bottom">
		                  <button type="submit" class="btn btn-success btn-block btn-submit">Send Now</button>
		                </div>
		              </form>   
		            </div> <!-- end col -->

		            <div class="col-lg-6" id="detailsContact">
		                <div class="row col-lg-10">

		                  <div class="col-lg-12 col-md-12 col-sm-12">
		                    <p class="text-white">Email: mkoutdoorstore@gmail.com</p>
		                  </div>
		                  <div class="col-lg-12 col-md-12 col-sm-12">
		                    <p class="text-white text-justify">Location: Jaka Plaza, Dr Arcadio Santos Ave, Paranaque, Manila, 1709 Metro Manila, Philippines</p>
		                  </div>
		                </div>    
		            </div> <!-- end col -->
		        </div>
		      </div>
		    </div>
	</div> <!-- end contact us -->
	<div class="row m-0 p-0">
  			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1931.6693895163478!2d121.01813283119567!3d14.46522588446385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ce4429cf007b%3A0x9b25f570df31b4f7!2sJaka+Plaza!5e0!3m2!1sen!2sus!4v1558973174449!5m2!1sen!2sus" width="1350" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div> <!-- end google-map-row -->
</div>
<?php } else if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1) { ?>
	<div class="container-fluid mt-4">
		<div class="row col-lg-12 d-flex justify-content-between mx-2" id="dropdownSort">
				<div class="form-group">
		
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

				<div class="form-group mr-3" id="selectSort">
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

		<div class="row col-lg-12 m-0 p-0">
				
				<?php
					$item_query = "SELECT * FROM items";
					

					if(isset($_GET['category_id']) && isset($_GET['category_id']) > 0) {
						$item_query .= " WHERE category_id ='{$_GET['category_id']}'";
					}

					
					if(isset($_SESSION['sort'])) {
						$item_query .= $_SESSION['sort'];
					}

					$item_list = mysqli_query($conn, $item_query);

					foreach ($item_list as $item) {				
				?>
					<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
						<div class="card mt-3">
							<?php 
								$item_image = "SELECT * FROM item_images WHERE item_id =".$item['id'];
								$item_result = mysqli_query($conn, $item_image);
								$itemImg = mysqli_fetch_assoc($item_result); 
							?>
							
								<img src="<?php echo $itemImg['image'];?>" alt="" class="card-img-top img-fluid" id="catalogImg">
								<div class="card-body">
									<h4 class="card-title"><?php echo $item['name']; ?></h4>
									<p class="card-text">
										Price: <?php echo $item['price']; ?>
									</p>
								</div> 
								<div class="card-footer d-flex justify-content-center">
									<p><a href="./itemdetails.php?itemId=<?php echo $item['id'] ?>" class="btn btn-outline-warning text-warning mx-1">Edit/Delete</a></p>
									<p><a href="./add_images.php?itemId=<?php echo $item['id'] ?>" class="btn btn-outline-success text-success mx-1">Add Images</a></p>
								</div>	
						</div>
					</div> 
				<?php
					}
				?>
		
		</div> <!-- end of row -->
	</div> <!-- end of container -->
<script type="text/javascript" src="../assets/js/nobg.js"></script>
<?php
		} 
}
?>