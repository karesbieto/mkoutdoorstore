<?php
	session_start();
	require_once './connection.php';

			$id = htmlspecialchars($_POST['id']);
			$imgnum = htmlspecialchars($_POST['imgnum']);
	
			$file_types = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];
			$destination = "../assets/images/";

			if ($imgnum == 0 ) {

			if(isset($_FILES['image1'])&& $_FILES['image1']['name'] != "") {

				$file_ext1 = strtolower(pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext1, $file_types)) {

				$filename1 = str_replace(' ', '_', $_FILES['image1']['name'];);

				move_uploaded_file($_FILES['image1']['tmp_name'], $destination.$filename1);
				
				$whole_file_name1 =  $destination.$filename1;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name1','$id')";
				
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}

			if(isset($_FILES['image2'])&& $_FILES['image2']['name'] != "") {
				$file_ext2 = strtolower(pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext2, $file_types)) {
				$filename2 = str_replace(' ', '_', $_FILES['image2']['name']);
				move_uploaded_file($_FILES['image2']['tmp_name'], $destination.$filename2);
				
				$whole_file_name2 =  $destination.$filename2;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name2','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}

			if(isset($_FILES['image3'])&& $_FILES['image3']['name'] != "") {
				$file_ext3 = strtolower(pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext3, $file_types)) {
				$filename3 = str_replace(' ', '_', $_FILES['image3']['name']);
				move_uploaded_file($_FILES['image3']['tmp_name'], $destination.$filename3);
				
				$whole_file_name3 =  $destination.$filename3;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name3','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}

			if(isset($_FILES['image4'])&& $_FILES['image4']['name'] != "") {
				$file_ext4 = strtolower(pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext4, $file_types)) {
				$filename4 = str_replace(' ', '_', $_FILES['image4']['name']);				move_uploaded_file($_FILES['image4']['tmp_name'], $destination.$filename4);
				
				$whole_file_name4 =  $destination.$filename4;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name4','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}
				
			} else if ($imgnum == 1) {
				if(isset($_FILES['image2'])&& $_FILES['image2']['name'] != "") {
				$file_ext2 = strtolower(pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext2, $file_types)) {
				$filename2 = str_replace(' ', '_', $_FILES['image2']['name']);
				move_uploaded_file($_FILES['image2']['tmp_name'], $destination.$filename2);
				
				$whole_file_name2 =  $destination.$filename2;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name2','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}

			if(isset($_FILES['image3'])&& $_FILES['image3']['name'] != "") {
				$file_ext3 = strtolower(pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext3, $file_types)) {
				$filename3 = str_replace(' ', '_', $_FILES['image3']['name']);
				move_uploaded_file($_FILES['image3']['tmp_name'], $destination.$filename3);
				
				$whole_file_name3 =  $destination.$filename3;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name3','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}

			if(isset($_FILES['image4'])&& $_FILES['image4']['name'] != "") {
				$file_ext4 = strtolower(pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext4, $file_types)) {
				$filename4 = str_replace(' ', '_', $_FILES['image4']['name']);
				move_uploaded_file($_FILES['image4']['tmp_name'], $destination.$filename4);
				
				$whole_file_name4 =  $destination.$filename4;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name4','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}
			} else if ($imgnum == 2) {
				if(isset($_FILES['image3'])&& $_FILES['image3']['name'] != "") {
				$file_ext3 = strtolower(pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext3, $file_types)) {
				$filename3 = str_replace(' ', '_', $_FILES['image3']['name']);
				move_uploaded_file($_FILES['image3']['tmp_name'], $destination.$filename3);
				
				$whole_file_name3 =  $destination.$filename3;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name3','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}

			if(isset($_FILES['image4'])&& $_FILES['image4']['name'] != "") {
				$file_ext4 = strtolower(pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext4, $file_types)) {
				$filename4 = str_replace(' ', '_', $_FILES['image4']['name']);
				move_uploaded_file($_FILES['image4']['tmp_name'], $destination.$filename4);
				
				$whole_file_name4 =  $destination.$filename4;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name4','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}
			}  else if ($imgnum == 3) {
				if(isset($_FILES['image4'])&& $_FILES['image4']['name'] != "") {
				$file_ext4 = strtolower(pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION));
				if(in_array($file_ext4, $file_types)) {
				$filename4 = str_replace(' ', '_', $_FILES['image4']['name']);
				move_uploaded_file($_FILES['image4']['tmp_name'], $destination.$filename4);
				
				$whole_file_name4 =  $destination.$filename4;

				$new_image_query = "INSERT INTO item_images (image, item_id) VALUES ('$whole_file_name4','$id')";
				$new_image_result = mysqli_query($conn, $new_image_query);
				}
			}
			}
			
			header('Location: ../views/home.php');

?>