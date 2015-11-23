<?php
	include "core/init.php";
	if(!logged_in())
		header("Location: index.php");

	if (!isset($_GET['tab'])) {
	    header('Location: reports.php?tab=student');
	  } else {
	    $tab = clean_up($_GET['tab']);
	  }
	  $mytabs = array('#student' => 'Students' ,'#teacher' => 'Teacher','#lessons' => 'Lessons' , '#orchestra' => 'Orchestra' );

	include "templates/header.php";
	include "templates/navbar-logged-in.php";
	include "templates/reports-content.php";
	include "templates/footer.php";

?>
