<?php
	require '../init.php';

  if(!isAdmin($_SESSION[id]))
    header("Location: ../../index.php");

	if (isset($_GET['key'])) {
		$key = clean_up($_GET['key']);
    $delete = false;
    mysql_db_query("rowanprep", "DELETE FROM `class_link` WHERE `id` LIKE '$key'");
		if($result = mysql_db_query("rowanprep", "SELECT * FROM `class_link` WHERE `id` LIKE '$key'")) {
			$row = mysql_fetch_assoc($result);
			if ($result->num_rows == 0) 
				$delete = true;
		}
	}
    header("Location: ../../reports.php");
?>