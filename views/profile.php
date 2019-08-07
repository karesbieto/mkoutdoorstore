<?php 
	require_once '../partials/template.php';
	function get_body_contents() {
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="jumbotron text-center">
					<h4>Profile Page</h4>
				</div>
				<form action="../controllers/edit_profile.php" method="POST">
					<div class="form-group">
						<label for="username">Username: </label>
						<input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['user']['username'] ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>

					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
					</div>

					<button type="submit" class="btn btn-block btn-info">Edit Profile</button>
				</form>
			</div>
		</div>
	</div>

<?php 
	}
?>