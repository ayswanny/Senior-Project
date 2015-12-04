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
  
  $student = clean_up($_POST["student"]);
  $teacher = clean_up($_POST["teacher"]);
  $teacher_type = clean_up($_POST["teacher_type"]);
  $duration = clean_up($_POST["duration"]);
  $day = clean_up($_POST["day"]);
  $semester = clean_up($_POST["semester"]);
  $year = clean_up($_POST["year"]);
  $instrument = clean_up($_POST["instrument"]);
  $tuition_due = clean_up($_POST["tuition_due"]);
  $total_class_ids = clean_up($_POST["total_class_ids"]);
  $pay_rate = clean_up($_POST["pay_rate"]);
  
  if ($addnew) {
    $sql = "INSERT INTO classes (student, teacher, teacher_type, duration, day, semester, year, instrument, tuition_due, total_classes, pay_rate) VALUES ('$student', '$teacher', '$teacher_type', '$duration', '$day', '$semester', '$year', '$instrument', '$tuition_due', '$total_classes', '$pay_rate')";
  } else {
    	$sql = "UPDATE classes SET student='$student', teacher='$teacher', teacher_type='$teacher_type', duration='$duration', day='$day', semester='$semester', year='$year', instrument='$instrument', tuition_due='$tuition_due', total_classes='$total_classes', pay_rate='$pay_rate' WHERE class_id = '$class_id'";
  }

  $link = connectDB();
   $results = mysql_db_query("rowanprep", $sql);
   if(!$results) {
    echo 'Input failed...<br>';
    echo mysql_errno($link) . ": " . mysql_error($link). "\n";
   }
   else {
    header("Location:../../reports.php?tab=classes");
   }


?>
