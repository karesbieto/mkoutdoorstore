<?php  
	require_once '../partials/template.php';
	function get_body_contents(){
		global $conn;
?>
	
	<div class="container-fluid mx-0 px-0 py-5 mt-5" style="background-image: url('../assets/bgimg/5.jpeg'); background-attachment: fixed; background-size: cover; background-repeat: no-repeat; background-position: center right;">
		<div class="row m-0 p-0">
			<div class="col-12 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
				<div class="row d-flex justify-content-center">
				<h4 id="RegLabel">Please complete your details</h4>
				</div>
				<form id="regForm" class="rounded px-3">
					<span class="alert text-danger" id="insertErr"></span>
					<div class="form-group">
						<label id="RegLabel">First Name</label>
						<input type="text" name="firstName" class="form-control" id="firstName">
						<span class="alert text-danger" id="firstErr"></span>
					</div>

					<div class="form-group">
						<label id="RegLabel">Last Name</label>
						<input type="text" name="lastName" class="form-control" id="lastName">
						<span class="alert text-danger" id="lastErr"></span>
					</div>

					<div class="form-group">
						<label id="RegLabel">Email</label>
						<input type="email" name="email" class="form-control" id="email">
						<span class="alert text-danger" id="emailErr"></span>
					</div>

					<div class="form-group">
						<label id="RegLabel">Address</label>
						<input type="text" name="add" class="form-control" id="add">
						<span class="alert text-danger" id="addErr"></span>
					</div>
					<div class="form-group">
						<label id="RegLabel">Username</label>
						<input type="text" name="username" class="form-control" id="username">
						<span class="alert text-danger" id="usernameErr"></span>
					</div>
					<div class="form-group">
						<label id="RegLabel">Password</label>
						<input type="password" name="password" class="form-control" id="password">
						<span class="alert text-danger" id="passErr"></span>
					</div>

					<div class="form-group">
						<label id="RegLabel">Confirm Password</label>
						<input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
						<span class="alert text-danger" id="pass2Err"></span>
					</div>
				</form>
				<div class="rounded" id="regBtn">
					<div class="p-3">
						<button class="btn btn-warning btn-block RegLabel" id="sub">Submit</button>
						<p class="d-flex justify-content-center pt-2" id="RegLabel">By registering, you confirm that you agree with our</p>
						<p class="d-flex justify-content-center" id="RegLabel"><span class="text-danger" >Terms &#38; Condition</span> &nbsp; and <span class="text-danger">&nbsp; Privacy Policy</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../assets/js/register.js"></script>
<?php  
	}
?>
