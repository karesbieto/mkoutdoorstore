<?php
	session_start();

	if(isset($_GET['sort'])) {
		if($_GET['sort'] == 'asc') {
			$_SESSION['compsort'] = 'asc';
			$_SESSION['sort'] = " ORDER BY price ASC";
		} else {
			$_SESSION['compsort'] = 'desc';
			$_SESSION['sort'] = " ORDER BY price DESC";
		}
	}

	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	// HTTP_REFERER is the page that called this file
	// header('Location: ../views/catalog.php'); the same as above
?>