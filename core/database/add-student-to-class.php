<?php
	require '../init.php';

  $student = clean_up($_POST['student']);
  $tuition_due = clean_up($_POST['tuition_due']);

	$can_add = true;
	if (isset($_GET['class'])) {
		$class_id = clean_up($_GET['class']);
		if($result = mysql_db_query("rowanprep", "SELECT * FROM class_link WHERE class_ref LIKE '$class_id' AND student = '$student'")) {
			$row = mysql_fetch_assoc($result);
			if (mysql_num_rows($result) !== 0) {
        $can_add = false;  
      }
		}
	}

  if ($can_add) {
    $sql = "INSERT INTO `class_link` (student, class_ref, tuition_due) VALUES ('$student', '$class_id', '$tuition_due')";

  } else {
  	   echo 'Student already exists in this class or the class doesn\'t exist!';
  }
  
  $link = connectDB();
   $results = mysql_db_query("rowanprep", $sql);
   if(!$results) {
    echo 'Input failed...<br>';
    echo mysql_errno($link) . ": " . mysql_error($link). "\n";
   }
   else {
     header("Location:../../reports.php?tab=class&class-key=$class_id");
   }

  ?>