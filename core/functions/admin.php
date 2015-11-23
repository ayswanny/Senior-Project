<?php
	function get_user_list(){		
		$results = mysql_db_query("rowanprep", "SELECT * FROM users");
		return $results;
	}

	function generateRandomString() {
    		 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		 $charactersLength = strlen($characters);
    		 $randomString = '';
     		 for ($i = 0; $i < 10; $i++) {
        	     	 $randomString .= $characters[rand(0, $charactersLength - 1)];
    		 	 return $randomString;
		 }
	}
?>