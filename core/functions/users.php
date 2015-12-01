<?php
	function connectDB(){
		 return mysql_connect("localhost", "root", "utagydbo");
	}
	function logged_in() {
		return(isset($_SESSION['id'])) ? true : false;
	}

	function isAdmin() {
		$user_key = $_SESSION['id'];
		$results = mysql_db_query("rowanprep", "SELECT * FROM users WHERE user_key LIKE '$user_key' AND admin LIKE '1'");
		if(mysql_num_rows($results) === 0)
			return false;
		else
			return true;
	}

	function random_password($length) {
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		    $password = substr( str_shuffle( $chars ), 0, $length );
		    return $password;
		}

	function get_name($user_key) {
		$user_key = clean_up($user_key);
		$results = mysql_db_query("rowanprep", "SELECT username FROM users WHERE user_key ='$user_key'");
		$rows = mysql_fetch_assoc($results);
		return $rows['username'];
	}

	function user_exists($username) {
		$username = clean_up($username);
		$result = mysql_db_query("rowanprep", "SELECT * FROM users WHERE username = '$username'");
		if(empty($result))
			return false;
		else
			return true;
	}

	function get_user_id($username) {
		$username = clean_up($username);
		$result = mysql_db_query("rowanprep", "SELECT user_key FROM users WHERE username = '$username'");
		return $result;
	}

	function login($username, $password) {
		$user_key = get_user_id($username);
		$results = mysql_db_query("rowanprep", "SELECT user_key FROM users WHERE username = '$username' AND password = '$password'");
		if(empty($results))
			return false;
		else
			return $user_key;
	}

	function store_phone($data) {
		return str_replace("-", "", $data);
	}
	function display_phone($data) {
		return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $data);
	}
	function clean_up($data) {
		return mysql_real_escape_string($data);
	}
	function get_student_list($sort) {
		switch($sort) {
			case '1';
				return $results = mysql_db_query("rowanprep","SELECT * FROM students ORDER BY last_name");
			break;
			case '2':
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students ORDER BY first_name");
			break;
			case '3';
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students ORDER BY teacher");
			break;
			case '4':
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students ORDER BY instrument");
			break;

			default:
				return $results = mysql_db_query("rowanprep","SELECT * FROM students");
			break;
		}
	}
	function get_teacher_list($sort){
		switch($sort) {
			case 1: 
				return $results = mysql_db_query("rowanprep", "SELECT * FROM teachers ORDER BY last_name");
			break;
			case 2:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM teachers ORDER BY first_name");
			break;
			case 3: 
				return $results = mysql_db_query("rowanprep", "SELECT * FROM teachers ORDER BY instrument");
			break;
			default:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM teachers");
			break;
		}
	}
	function get_lessons_list($sort){
		switch($sort) {
			case 1: 
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students st JOIN lessons les ON les.student = st.student_key ORDER BY last_name");
			break;
			case 2:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM teachers tea JOIN lessons les ON les.teacher = tea.teacher_key ORDER BY last_name");
			break;
			case 3: 
				return $results = mysql_db_query("rowanprep", "SELECT * FROM lessons ORDER BY instrument");
			break;
			case 4:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM lessons ORDER BY day");
			break;
			default:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM lessons");
			break;
		}
	}
	function get_orchestra_list($sort){
		switch($sort) {
			case 1: 
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students st JOIN orchestra ryor ON ryor.student = st.student_key ORDER BY last_name");
			break;
			case 2:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students st JOIN orchestra ryor ON ryor.student = st.student_key ORDER BY first_name");
			break;
			case 3: 
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students st JOIN orchestra ryor ON ryor.student = st.student_key ORDER BY ryor.instrument");
			break;
			case 4:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students st JOIN orchestra ryor ON ryor.student = st.student_key ORDER BY tuition_owed DESC");
			break;
			default:
				return $results = mysql_db_query("rowanprep", "SELECT * FROM students st JOIN orchestra ryor ON ryor.student = st.student_key"); //"SELECT * FROM `orchestra`");			break;
		}
		
	}
	function get_student_name($key){
		return $results = mysql_db_query("rowanprep", "SELECT last_name, first_name FROM students WHERE student_key =  '$key'");
	}
	function get_teacher_name($key){
		return $results = mysql_db_query("rowanprep", "SELECT last_name, first_name FROM teachers WHERE teacher_key =  '$key'");
	}
	function get_student_info($key){
		return $results = mysql_db_query("rowanprep", "SELECT last_name, first_name, student_email, parent_email 
										FROM students WHERE student_key =  '$key'");
	}

?>
