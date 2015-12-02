<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['band'])) {
		$band = clean_up($_GET['band']);
		if($result = mysql_db_query("rowanprep", "SELECT * FROM brass_band WHERE registration_key LIKE '$band'")) {
			$row = mysql_fetch_assoc($result);
			if (mysql_num_rows($result) !== 0) {
        $addnew = false;  
      }
		}
	}
  
  $student = $_POST["student"];
  $instrument = ($_POST["instrument"]);
  $ryo_form = ($_POST["ryo_form"]);
  $tuition_due = ($_POST["tuition_due"]);
  $notes = $_POST["notes"];
  $tuition_owed = $tuition_due-$tuition_paid;

  if ($addnew) {
    $sql = "INSERT INTO band (student, instrument, ryo_form, tuition_due, notes) VALUES ('$student', '$instrument', '$ryo_form', '$tuition_due', '$notes')";

  } else {
  	$sql = "UPDATE band SET student='$student', instrument='$instrument', ryo_form='$ryo_form', tuition_due='$tuition_due', notes='$notes' WHERE registration_key= '$band'";
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