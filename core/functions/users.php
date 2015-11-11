<?php

	function logged_in() {
		return(isset($_SESSION['id'])) ? true : false;
	}

	function isAdmin($user_key) {
		global $db;
		$user_key = clean_up($user_key);
		$results = $db->query("SELECT * FROM `users` WHERE `user_key` ='$user_key'");
		$rows = $results->fetch_assoc();
		if($rows['admin'] == 1)
			return true;
		else
			return false;
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

	function get_student_list() {
		global $db;
		return $results = $db->query("SELECT * FROM `students`");
	}
	function get_teacher_list(){
		global $db;
		return $results = $db->query("SELECT * FROM `teachers`");
	}
	function get_lessons_list(){
		global $db;
		return $results = $db->query("SELECT * FROM `lessons`");
	}
	function get_orchestra_list(){
		global $db;
		return $results = $db->query("SELECT * FROM `orchestra`");
	}
	function get_student_name($key){
		global $db;
		return $results = $db->query("SELECT `last_name`, `first_name` FROM `students` WHERE `student_key` =  '$key'");
	}
	function get_teacher_name($key){
		global $db;
		return $results = $db->query("SELECT `last_name`, `first_name` FROM `teachers` WHERE `teacher_key` =  '$key'");
	}
	function get_student_info($key){
		global $db;
		return $results = $db->query("SELECT `last_name`, `first_name`, `student_email`, `parent_email` 
										FROM `students` WHERE `student_key` =  '$key'");
	}

?>
