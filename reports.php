<?php
	include "core/init.php";
	if(!logged_in())
		header("Location: index.php");

	if (!isset($_GET['tab'])) {
	    header('Location: reports.php?tab=students');
	  } else {
	    $tab = clean_up($_GET['tab']);
	  }
	if (isset($_GET['class-key']))
		$class_key = clean_up($_GET['class-key']);
	 

	include "templates/header.php";
	include "templates/navbar-logged-in.php";
	include "templates/reports-content.php";
	include "templates/footer.php";

?>
