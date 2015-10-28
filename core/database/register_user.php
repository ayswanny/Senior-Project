<?php
	require 'connect.php';

	$username = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$password = $_POST["password"];
	$email = $_POST["email"];

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