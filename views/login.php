<?php
	require_once '../partials/template.php';
	function get_body_contents(){
?>
<div class="container-fluid" style="background-image: url('../assets/bgimg/camplogin.jpg'); background-attachment: fixed; background-size: cover; background-repeat: no-repeat; background-position: center center; height: 600px;" id="logBgImg">	
	<div class="container pt-5">
		<div class="row mt-4 mx-5 mobileMargin d-flex justify-content-center">
			<div class="col-12 col-sm-12 col-lg-6 pt-5 px-0 mx-0" id="logImgForm">
				<div class="d-flex justify-content-center" id="wholeLogin">
				<img class="img-fluid" src="../assets/bgimg/images1234.png">
				</div>
				<h2 class="text-center loginText">Login Page</h2>
				<form class="p-3 rounded formBg">
					<div class="form-group mb-0">
						<label id="LoginLabel">Username</label>
						<input type="text" name="username" class="form-control" id="username">
						<span class="alert validation text-danger"></span>
					</div>
					<div class="form-group">
						<label id="LoginLabel">Password</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					<button id="login" class="btn btn-warning btn-block">Login</button>
				</form>
				
			</div>	
		</div>
	</div>
</div>
	<script type="text/javascript" src="../assets/js/login.js"></script>
<?php
	}
?>