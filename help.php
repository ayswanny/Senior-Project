<?php
	include 'core/init.php';
	if(!logged_in()){
		header("Location: elvis.rowan.edu/rowanprep");
	}
	include 'templates/header.php';
	include 'templates/navbar-logged-in.php';
	include 'templates/help-content.php';
	include 'templates/footer.php';
?>