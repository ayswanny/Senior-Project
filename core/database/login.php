<?php
	include '../init.php';
	$link = connectDB();
	if(empty($_POST) == false) {
		echo $_POST['username'] . " -> ";
		$username = ($_POST['username']);
		$password = ($_POST['password']);
		echo $username;
		
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
				$id_array = mysql_fetch_assoc($login);
				$_SESSION['id'] = $id_array['user_key'];
				header('Location: ../../index.php');
				echo $_SESSION['id'];
			}
		}
		print_r($errors);
	}


?>