<?php
	function get_user_list(){
		global $db;
		$results = $db->query("SELECT * FROM `users`");
		return $results;
	}
?>