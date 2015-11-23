<?php
	include 'core/init.php';
	include 'templates/header.php';
	if(!logged_in()) {
		include 'templates/navbar-logged-out.php';
		include 'templates/index-content-logged-out.php';
	}
	else {
		include 'templates/navbar-logged-in.php';
		include 'templates/index-content-logged-in.php';
		echo $_SESSION['id'];
		echo "poop";
	}
	include 'templates/footer.php';
?>
