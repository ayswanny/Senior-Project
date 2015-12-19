<?php
	require 'connect.php';

	$username = clean_up($_POST["username"]);
	$firstname = clean_up($_POST["firstname"]);
	$lastname = clean_up($_POST["lastname"]);
	$password = clean_up($_POST["password"]);
	$email = clean_up($_POST["email"]);

	if($insert = $db->query("INSERT INTO users (username, password, first_name, last_name, email)
							 VALUES ('$username', '$password', '$firstname', '$lastname', '$email')")) {
		header("Location: ../../registration-successful.php");
		die();
	}
	else {
		echo "insert failed.";
		header("Location: ../../register.php");
	}

	$db->close();

?>