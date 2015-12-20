<?php
	include '../init.php';
	$link = connectDB();
	if(empty($_POST) == false) {
		mysql_set_charset ( "utf8" );

		echo $_POST['username'] . " -> ";
		$username = ($_POST['username']);
		$password = ($_POST['password']);
		echo $username;

		if (empty($password)) {
			$errors[] = 'password is empty before clean_up';
		}
		$username = clean_up($username);
		$password = clean_up($password);

		echo "-> " . $username . " <br />";

		$test = "QQQQQQ";

		$etest = clean_up($test);

		$eetest = clean_up($etest);

		echo "$test -> $etest -> $eetest <br />";

		if (empty($password)) {
			$errors[] = 'password is empty after clean_up';
		}
		
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
	}


	print_r($errors);
?>