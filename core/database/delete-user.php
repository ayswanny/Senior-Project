<?php
	require '../init.php';

  if(!isAdmin($_SESSION[id]))
    header("Location: ../../index.php");

	if (isset($_GET['key'])) {
		$key = clean_up($_GET['key']);
    $delete = false;
    $db->query("DELETE FROM `users` WHERE `user_key` LIKE '$key'");
		if($result = $db->query("SELECT * FROM `users` WHERE `user_key` LIKE '$key'")) {
			$row = $result->fetch_assoc();
			if ($result->num_rows == 0) 
				$delete = true;
		}
	}
    	$db->close();
?>