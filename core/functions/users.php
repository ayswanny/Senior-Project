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

	function store_phone($data) {
		return str_replace("-", "", $data);
	}

	function display_phone($data) {
		return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $data);
		// if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $data,  $matches ) )
		// {
		//     $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
		//     return $result;
		// }
		// // if we couldn't format it, fallback to the actual data.
		// return $data;
	}

	function clean_up($data) {
		return mysql_real_escape_string($data);
	}

?>