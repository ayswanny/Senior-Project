<?php
	require '../init.php';
	if(!isAdmin($_SESSION['id']))
		header ("../../index.php");

	$username = $_POST["username"];
	$password = generateRandomString();
	$email = $_POST["email"];
	$admin = $_POST["admin"];
	

	$msg = "An account has been registered with this email address at elvis.rowan.edu/rowanprep.
		  \nPlease sign in using your username.
		  \nAuto-generated password: ". $password .
		 "\n
		  \n
		  \n
		  Contact Anna at Rowan Prep if you have troubles signing in.";

	mail($email,"Rowan Prep User Information", $msg, "From: Rowan Prep");

	/* Prepared statement, stage 1: prepare */
	
	if($insert = $db->query("INSERT INTO `users` (`username`, `password`, `email`, `admin`) " 
										."VALUES ('$username', '$password', '$email', '$admin')")) {
		header("Location: ../../admin.php");
		die();
	}
	else {
		echo "insert failed.". $db->error;
	}
	
	$db->close();

?>