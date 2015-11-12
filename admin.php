<?php
	require 'core/init.php';
	if(!logged_in())
		header("Location: index.php");
	if(!isAdmin($_SESSION[id]))
		header("Location: index.php");
    include 'templates/header.php';
    include 'templates/navbar-logged-in.php';
    include 'templates/admin-content.php';
    include 'templates/footer.php';
?>
