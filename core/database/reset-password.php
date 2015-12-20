<?php
	require '../init.php';
	if(!isAdmin($_SESSION['id']))
		header ("../../index.php");

	$username = clean_up($_POST["username"]);
	$email = clean_up($_POST["email"]);
	$password = random_password(10);
	/* Prepared statement, stage 1: prepare */
	$link = connectDB();
	if($result = mysql_db_query("rowanprep", "UPDATE users (password) VALUES ('$password') WHERE username = '$username' AND email = '$email' ")) 
	{
		$msg = "your password has been reset for the site: elvis.rowan.edu/rowanprep.";
		$msg .= "\nPlease sign in using your username.\nAuto-generated password: " . $password;
		$msg .=	 "\n\n\nContact Anna at Rowan Prep if you have troubles signing in. Thanks,\nRowan Prep";
		$subj = "Rowan Prep User Information - DO NOT REPLY";

		mail($email, $subj, $msg, "From: Rowan Prep");
		header("Location: ../../login.php");
		die();
	}
	else if($result = mysql_db_query("rowanprep", "SELECT * in users WHERE username = '$username' OR email = '$email' ")) {
		
	} else {
		// No indication of whether an attacker picked the right username and email if possible. 		
	}
	header("Location: ../../login.php"):	
	
?>

