<?php
	
	//	This will provide initial connection to the database
	// 	Using WAMP and phpmyadmin, you must provide your own
	//  login (usually root) and a password that you choose for development

	function connectDB(){

		$link = mysql_connect('localhost', 'swanson', 'utagydbo4');
	
		// $link = mysql_connect('localhost', 'root', 'utagydbo');
	
		if(mysqli_connect_errno()) {
			die("Could not connect to database");
		}//utagydbo
		 return $link;
	}

	function connectI () {
		$dbi = mysqli_connect('localhost', 'swanson', 'utagydbo4');	
		// $dbi = mysqli_connect('localhost', 'root', 'utagydbo');
	
		if(mysqli_connect_errno()) {
			echo "ERROR";
			die("Could not connect to database");
		}
		return $dbi;
	}

	$link = connectDB();
	
?>
