<?php
include '../init.php';

if(empty($_POST) == false) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) == true || empty($password) == true) {
		$errors[] = 'Enter a username and password';
	}
	else if (user_exists($username) == false) {
		$errors[] = 'Username does not exist!';
	}
	else {
		$login = login($username, $password);
		if($login == false) {
			$errors[] = 'Invalid password.';
		}
		else {
			$id_array = mysqli_fetch_assoc($login);
			$_SESSION['id'] = $id_array['id'];
			header('Location: ../../index.php');
			//
		}
	}
	print_r($errors);
}

$db->close();
?>