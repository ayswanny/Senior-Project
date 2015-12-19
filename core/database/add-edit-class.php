<?php
	require '../init.php';

	$addnew = true;
  if (isset($_GET['class_id'])) {
    $class_id = clean_up($_GET['class_id']);
    if($result = mysql_db_query("rowanprep", "SELECT * FROM classes WHERE class_id_key LIKE '$class_id'")) {
      $row = mysql_fetch_assoc($result);
      if (mysql_num_rows($result) !== 0) {
        $addnew = false;  
      }
    }
	}
  
  $class_name = clean_up($_POST["class_name"]);
  $teacher = clean_up($_POST["teacher"]);
  $total_number = clean_up($_POST["total_number"]);
  $duration = clean_up($_POST["duration"]);
  $day = clean_up($_POST["day"]);
  $semester = clean_up($_POST["semester"]);
  $year = clean_up($_POST["year"]);
  $instrument = clean_up($_POST["instrument"]);
  $tuition_due = clean_up($_POST["tuition_due"]);
  $total_class_ids = clean_up($_POST["total_class_ids"]);
  $pay_rate = clean_up($_POST["pay_rate"]);
  
  if ($addnew) {
    $sql = "INSERT INTO classes (class_name, teacher, total_number, duration, day, semester, year, instrument, tuition_due, total_classes, pay_rate) VALUES ('$class_name', '$teacher', '$total_number', '$duration', '$day', '$semester', '$year', '$instrument', '$tuition_due', '$total_classes', '$pay_rate')";
  } else {
    	$sql = "UPDATE classes SET class_name='$class_name', teacher='$teacher', total_number='$total_number', duration='$duration', day='$day', semester='$semester', year='$year', instrument='$instrument', tuition_due='$tuition_due', total_classes='$total_classes', pay_rate='$pay_rate' WHERE class_id = '$class_id'";
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
