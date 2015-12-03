<?php
	include 'core/init.php';
	if(!logged_in())
		header("Location: index.php");
    include 'templates/header.php';
    include 'templates/navbar-logged-in.php';
    include 'templates/edit-band-form-content.php';
    include 'templates/footer.php';
?>