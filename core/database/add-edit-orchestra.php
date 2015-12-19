<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['orchestra'])) {
		$orchestra = clean_up($_GET['orchestra']);
		if($result = mysql_db_query("rowanprep", "SELECT * FROM orchestra WHERE registration_key LIKE '$orchestra'")) {
			$row = mysql_fetch_assoc($result);
			if (mysql_num_rows($result) !== 0) {
        $addnew = false;  
      }
		}
	}
  
  $student = clean_up($_POST["student"]);
  $instrument = clean_up($_POST["instrument"]);
  $ryo_form = clean_up($_POST["ryo_form"]);
  $tuition_due = clean_up($_POST["tuition_due"]);
  $notes = clean_up($_POST["notes"]);

  $tuition_owed = $tuition_due-$tuition_paid;

  if ($addnew) {
    $sql = "INSERT INTO `orchestra` (student, instrument, ryo_form, tuition_due, notes) VALUES ('$student', '$instrument', '$ryo_form', '$tuition_due', '$notes')";

  } else {
  	$sql = "UPDATE `orchestra` SET student='$student', instrument='$instrument', ryo_form='$ryo_form', tuition_due='$tuition_due', notes='$notes' WHERE registration_key= '$orchestra'";
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
