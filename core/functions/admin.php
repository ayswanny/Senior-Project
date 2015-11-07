<?php
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