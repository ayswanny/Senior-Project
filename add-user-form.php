<?php
	include 'core/init.php';
	if(!logged_in())
		header("Location: index.php");
	if(!isAdmin($_SESSION['id']))
		header("Location: index.php");
    include 'templates/header.php';
    include 'templates/navbar-logged-in.php';
    include 'templates/add-user-form-content.php';
    include 'templates/footer.php';
?>