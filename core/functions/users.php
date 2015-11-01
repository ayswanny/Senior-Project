<?php 

	function logged_in() {
		return(isset($_SESSION['id'])) ? true : false;
	}

	function user_exists($username) {
		global $db;
		$username = clean_up($username);
		$db->query("SELECT * FROM `users` WHERE `username` = '$username'");
		if(empty($db))
			return false;
		else
			return true;
	}

	function get_user_id($username) {
		global $db;
		$username = clean_up($username);
		$result = $db->query("SELECT `user_key` FROM `users` WHERE `username` LIKE '$username'");
		return $result;
	}

	function login($username, $password) {
		global $db;
		$user_key = get_user_id($username);
		$db->query("SELECT `user_key` FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
		if(empty($db))
			return false;
		else
			return $user_key;
	}

	function clean_up($data) {
		return mysql_real_escape_string($data);
	}

?>