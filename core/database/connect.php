<?php

	//	This will provide initial connection to the database
	// 	Using WAMP and phpmyadmin, you must provide your own
	//  login (usually root) and a password that you choose for development
	$db = new mysqli('localhost', 'root', 'utagydbo', 'rowanprep');
	if($db->connect_errno) {
		die("Could not connect to database");
	}
?>
