<?php
	session_start();
	require_once './connection.php';

	function validate_form() {

			$errors = 0;
			

			if(!isset($_POST['name']) || $_POST['name'] == "") {
				$errors++;
			}

			if(!isset($_POST['price']) || $_POST['price'] <= 0) {
				$errors++;
			}

			if(!isset($_POST['feature']) || $_POST['feature'] == "") {
				$errors++;
			}

			if(!isset($_POST['description']) || $_POST['description'] == "") {
				$errors++;
			}

			if(!isset($_POST['category_id']) || $_POST['category_id'] == "") {
				$errors++;
			}

			if($errors > 0){
				echo "Please check your inputs";
				return false;
			} else {
				return true;
			}

	} 


	if(validate_form()) {

			$category_id = htmlspecialchars($_POST['category_id']);
			$name = htmlspecialchars($_POST['name']);
			$price = htmlspecialchars($_POST['price']);
			$desc = htmlspecialchars($_POST['description']);
			$feature = htmlspecialchars($_POST['feature']);



			
			$new_item_query = "INSERT INTO items (name, price, features, description, category_id) VALUES ('$name', '$price', '$feature', '$desc', $category_id)";
				
			$new_item_result = mysqli_query($conn, $new_item_query);
	
			header('Location: ../views/home.php');
	}
?>