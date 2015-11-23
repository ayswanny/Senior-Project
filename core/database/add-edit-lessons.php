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
 
 
  /* This, I think, is where the check for names should go.
  * Somehow need to get IDs to put into the lessons table.
  * Really not sure on how to do this.
  * Highly doubt this works, probably needs $row like on line 10.
  */
  
  $student = clean_up($_POST["student"]);
  $teacher = clean_up($_POST["teacher"]);
  $teacher_type = clean_up($_POST["teacher_type"]);
  $duration = clean_up($_POST["duration"]);
  $day = clean_up($_POST["day"]);
  $semester = clean_up($_POST["semester"]);
  $year = clean_up($_POST["year"]);
  $instrument = clean_up($_POST["instrument"]);
  $tuition_due = clean_up($_POST["tuition_due"]);
  $tuition_paid = clean_up($_POST["tuition_paid"]);
  $tuition_owed = $tuition_due-$tuition_paid;

  if ($addnew) {
    $sql = "INSERT INTO lessons (student, teacher, teacher_type, duration, day, semester, year, instrument, tuition_due, tuition_paid, tuition_owed) VALUES ('$student', '$teacher', '$teacher_type', '$duration', '$day', '$semester', '$year', '$instrument', '$tuition_due', '$tuition_paid', '$tuition_owed')";
  } else {
    echo 'update';
    	$sql = "UPDATE lessons SET student='$student', teacher='$teacher', teacher_type='$teacher_type', duration='$duration', day='$day', semester='$semester', year='$year', instrument='$instrument', tuition_due='$tuition_due', tuition_paid='$tuition_paid', tuition_owed='$tuition_owed' WHERE lesson_key = '$lesson'";
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
