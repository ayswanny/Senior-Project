<?php
	require '../init.php';

	$addnew = true;
  if (isset($_GET['lesson'])) {
    $lesson = clean_up($_GET['lesson']);
    if($result = mysql_db_query("rowanprep", "SELECT * FROM lessons WHERE lesson_key LIKE '$lesson'")) {
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
  $total_lessons = clean_up($_POST["total_lessons"]);
  $pay_rate = clean_up($_POST["pay_rate"]);
  
  if ($addnew) {
    $sql = "INSERT INTO lessons (student, teacher, teacher_type, duration, day, semester, year, instrument, tuition_due, total_lessons, pay_rate) VALUES ('$student', '$teacher', '$teacher_type', '$duration', '$day', '$semester', '$year', '$instrument', '$tuition_due', '$total_lessons', '$pay_rate')";
  } else {
    	$sql = "UPDATE lessons SET student='$student', teacher='$teacher', teacher_type='$teacher_type', duration='$duration', day='$day', semester='$semester', year='$year', instrument='$instrument', tuition_due='$tuition_due', total_lessons='$total_lessons', pay_rate='$pay_rate' WHERE lesson_key = '$lesson'";
  }

  $link = connectDB();
   $results = mysql_db_query("rowanprep", $sql);
   if(!$results) {
    echo 'Input failed...<br>';
    echo mysql_errno($link) . ": " . mysql_error($link). "\n";
   }
   else {
    header("Location:../../reports.php");
   }


  ?>
