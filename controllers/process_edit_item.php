<?php
	session_start();
	require_once './connection.php';

			$id = htmlspecialchars($_POST['id']);
			$name = htmlspecialchars($_POST['name']);
			$price = htmlspecialchars($_POST['price']);
			$feature = htmlspecialchars($_POST['feature']);
			$desc = htmlspecialchars($_POST['description']);
			$category_id = htmlspecialchars($_POST['category_id']);
			$error = 0;

			if(isset($_FILES['image1']) && $_FILES['image1']['name'] != "") {
				$image1 = $_FILES['image1'];
				// var_dump($image1);
				$img_id1 = htmlspecialchars($_POST['imgid1']);
				// var_dump($img_id1);
			} else {
				$image1 = 1;
				$error++;
			}

			if(isset($_FILES['image2']) && $_FILES['image2']['name'] != "") {
				$image2 = $_FILES['image2'];
				// var_dump($image2);	
				$img_id2 = htmlspecialchars($_POST['imgid2']);
				// var_dump($img_id2);
			} else {
				$image2 = 1;
				$error++;
			}

			if(isset($_FILES['image3']) && $_FILES['image3']['name'] != "") {
				$image3 = $_FILES['image3'];
				// var_dump($image3);	
				$img_id3 = htmlspecialchars($_POST['imgid3']);
				// var_dump($img_id3);
			} else {
				$image3 = 1;
				$error++;
			}

			if(isset($_FILES['image4']) && $_FILES['image4']['name'] != "") {
				$image4 = $_FILES['image4'];
				// var_dump($image4);
				$img_id4 = htmlspecialchars($_POST['imgid4']);
				// var_dump($img_id4);	
			} else {
				$image4 = 1;
				$error++;
			}
			// var_dump($error);
			$destination = "../assets/images/";
			// die();
			

			if($error === 4) {
				 $update_query = "UPDATE items SET name = '$name', price = '$price', features = '$feature', description = '$desc', category_id = '$category_id' WHERE id = '$id'";

				$update_result = mysqli_query($conn, $update_query);
			} else {
				
				if(isset($_FILES['image1'])) {
				move_uploaded_file($image1['tmp_name'], $destination.$image1['name']);

					$whole_file_name1 = $destination.$image1['name'];

					$updateImg_query = "UPDATE item_images SET image = '$whole_file_name1' WHERE id = '$img_id1'";
					$updateImg_result = mysqli_query($conn, $updateImg_query);
				}

				if(isset($_FILES['image2'])) {
				move_uploaded_file($image2['tmp_name'], $destination.$image2['name']);

					$whole_file_name2 = $destination.$image2['name'];
					$updateImg_query = "UPDATE item_images SET image = '$whole_file_name2' WHERE id = '$img_id2'";
					$updateImg_result = mysqli_query($conn, $updateImg_query);
				}

				if(isset($_FILES['image3'])) {
				move_uploaded_file($image3['tmp_name'], $destination.$image3['name']);
				$whole_file_name3 = $destination.$image3['name'];
				$updateImg_query = "UPDATE item_images SET image = '$whole_file_name3' WHERE id = '$img_id3'";
					$updateImg_result = mysqli_query($conn, $updateImg_query);
				}
				if(isset($_FILES['image4'])) {
				move_uploaded_file($image4['tmp_name'], $destination.$image4['name']);
				$whole_file_name4 = $destination.$image4['name'];
				$updateImg_query = "UPDATE item_images SET image = '$whole_file_name4' WHERE id = '$img_id4'";
					$updateImg_result = mysqli_query($conn, $updateImg_query);
				}

				$update_query = "UPDATE items SET name = '$name', price = '$price', features = '$feature', description = '$desc', category_id = '$category_id' WHERE id = '$id'";

				$update_result = mysqli_query($conn, $update_query);

			}

			header('Location: ../views/home.php');
?>