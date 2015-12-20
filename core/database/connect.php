<?php

	class DBi {
	    public static $link;
	}
	
	//	This will provide initial connection to the database
	// 	Using WAMP and phpmyadmin, you must provide your own
	//  login (usually root) and a password that you choose for development

	function connectDB(){

		// $link = mysql_connect('localhost', 'swanso52', 'utagydbo4');
		$link = mysql_connect('localhost', 'root', 'utagydbo');
	
		if(mysql_errno()) {
			die("Could not connect to database: mysql_connect()");
		}//utagydbo
		 return $link;
	}

	function connectI () {
		// $dbi = mysqli_connect('localhost', 'swanso52', 'utagydbo4');	
		$dbi = mysqli_connect('localhost', 'root', 'utagydbo');
		DBi::$link = $dbi;	
		if(mysqli_connect_errno()) {
			
			die("Could not connect to database: mysqli_connect()");
		}
		return $dbi;
	}



	$link = connectDB();

	global $dbi;
	$dbi = connectI();
	
?>
