<?php
	require '../init.php';
	$pass_one = clean_up($_POST['password']);
	$pass_two = clean_up($_POST['password-match']);
	$pass_three = clean_up($_POST['current-password']);
	if (isset($_SESSION['id'])) {
	   $id = clean_up($_SESSION['id']);
	   if($result = mysql_db_query("rowanprep", "SELECT * FROM users WHERE user_key LIKE '$id'")) {
	       $row = mysql_fetch_assoc($result);
	   }
	   var_dump($row);
	}
	else {
	     header("Location: ../../index.php");
	}
	if (!($pass_one === $pass_two)) {
	   header("Location: ../../change-password.php?missmatch=1");
	}  
	if(!($pass_three === $row['password'])){
	   header("Location: ../../change-password.php?missmatch=0");
	}
	$sql = "UPDATE users SET password = '$pass_one' WHERE user_key = '$id'";
	$link = connectDB();
	$result = mysql_db_query("rowanprep", $sql);
	if(!$result) {
		      echo 'Password change failed<br>';
		      echo mysql_errno($link) . ": " . mysql_error($link). "\n";
	}
	else {
	     header("Location: ../../index.php");
	}
 

 ?>