<?php
	function get_student_list() {
		global $db;
		return $results = $db->query("SELECT * FROM `students`");
	}
	function get_teacher_list(){
		global $db;
		return $results = $db->query("SELECT * FROM `teachers`");
	}
?>