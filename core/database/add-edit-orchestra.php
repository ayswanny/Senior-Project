<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['orchestra'])) {
		$orchestra = clean_up($_GET['orchestra']);

		if($result = $db->query("SELECT * FROM `orchestra` WHERE `registration_key` LIKE '$orchestra'")) {
			$row = $result->fetch_assoc();
			if ($result->num_rows !== 0) {
				$addnew = false;
			}
		}
	}
 
  /* This, I think, is where the check for names should go.
  * Somehow need to get IDs to put into the lessons table.
  * Really not sure on how to do this.
  * Highly doubt this works, probably needs $row like on line 10.
  */
  
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



  /* Prepared statement, stage 1: prepare */
  if ($addnew) {
    $sql = "INSERT INTO `orchestra` (student, instrument, ryo_form, paid_check, check_number,
                                  paid_card, payment_date, tuition_due, tuition_paid, tuition_owed, notes) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";

  } else {

    	$sql = "UPDATE `orchestra` 
              SET student=?, instrument=?, ryo_form=?, paid_check=?, check_number=?,
                  paid_card=?, payment_date=?, tuition_due=?, tuition_paid=?, 
                  tuition_owed=?, notes=?
              WHERE registration_key=$orchestra";

  }

  if(!($stmt = $db->prepare($sql))) {
	     echo "Prepare failed: (" . $db->errno . ") " . $db->error;
	}


  	/* Prepared statement, stage 2: bind and execute */
    	if (!$stmt->bind_param("sssssssssss", $student, $instrument, $ryo_form, $paid_check, $check_number, $paid_card, $payment_date, $tuition_due, $tuition_paid, $tuition_owed, $notes)){
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
      }

      if ($stmt->execute()) {
    		if ($addnew) {
    			$orchestra = $db->insert_id;
    		}

    		header("Location: ../../edit-orchestra-form.php?orchestra=$orchestra");
    	}
    	else {
    	    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    	    echo "<a type=\"button\" class=\"btn btn-lg btn-primary\" href=\".\">Back Home</a>";

    	}


    	$db->close();


  ?>
