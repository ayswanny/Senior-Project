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
  
  $student = $_POST["student"];
  $instrument = ($_POST["instrument"]);
  $ryo_form = ($_POST["ryo_form"]);
  $paid_check = ($_POST["paid_check"]);
  $check_number = ($_POST["check_number"]);
  $paid_card = ($_POST["paid_card"]);
  $payment_date = ($_POST["payment_date"]);
  $tuition_due = ($_POST["tuition_due"]);
  $tuition_paid = ($_POST["tuition_paid"]);
  $notes = $_POST["notes"];
  $tuition_owed = $tuition_due-$tuition_paid;

  if ($addnew) {
    $sql = "INSERT INTO `orchestra` (student, instrument, ryo_form, paid_check, check_number, paid_card, payment_date, tuition_due, tuition_paid, tuition_owed, notes) VALUES ('$student', '$instrument', '$ryo_form', '$paid_check', '$check_number', '$paid_card', '$payment_date', '$tuition_due', '$tuition_paid', '$tuition_owed', '$notes')";

  } else {
  	$sql = "UPDATE `orchestra` SET student='$student', instrument='$instrument', ryo_form='$ryo_form', paid_check='$paid_check', check_number='$check_number', paid_card='$paid_card', payment_date='$payment_date', tuition_due='$tuition_due', tuition_paid='$tuition_paid', tuition_owed='$tuition_owed', notes='$notes' WHERE registration_key= '$orchestra'";
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
