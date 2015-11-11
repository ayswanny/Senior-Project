<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['student'])) {
		$student = clean_up($_GET['student']);

		if($result = $db->query("SELECT * FROM `students` WHERE `student_key` LIKE '$student'")) {
			$row = $result->fetch_assoc();
			if ($result->num_rows !== 0) {
				$addnew = false;	
			}
		}
	}

	$required_fields = array("first_name","last_name","teacher");


	$first_name = ($_POST["first_name"]);
	$last_name = ($_POST["last_name"]);
	$street_address = ($_POST["street_address"]);
	$city = ($_POST["city"]);
	$state = ($_POST["state"]);
	$zip_code = ($_POST["zip_code"]);
	$student_email = ($_POST["student_email"]);
	$parent = ($_POST["parent"]);
	$teacher = ($_POST["teacher"]);
	$classes = ($_POST["classes"]);
	$ensembles = ($_POST["ensembles"]);
	$events = ($_POST["events"]);
	$progress_report_date = ($_POST["progress_report_date"]);
	$photo_release = ($_POST["photo_release"]);
	$home_phone = store_phone($_POST["home_phone"]);
	$mobile_phone = store_phone($_POST["mobile_phone"]);
	$work_phone = store_phone($_POST["work_phone"]);
	$preferred_phone = store_phone($_POST["preferred_phone"]);
	$parent_email = ($_POST["parent_email"]);
	$instrument = $_POST["instrument"];
	$date_of_birth = $_POST["date_of_birth"];
	$enrolled = $_POST["enrolled"];
	$currently_enrolled = $_POST['currently_enrolled'];
	$notes = $_POST["notes"];


	foreach ($required_fields as $varname) {
		if (empty(${$varname})) {
			echo "Missing $varname";
			echo '<input type="button" class="btn btn-primary" onclick="history.back();" value="Back">';
		}
		# code...
	}


	/* Prepared statement, stage 1: prepare */
	if ($addnew) {
		$sql = "INSERT INTO `students` (last_name, first_name, parent, teacher, classes, ensembles, 
										events, progress_report_date, home_phone, mobile_phone, work_phone, 
										preferred_phone, student_email, parent_email, street_address, city, 
										state, zip_code, photo_release, dob, enrolled, currently_enrolled, instrument, notes) 
										VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	} else {
		// $sql = "UPDATE `students` SET last_name=?, first_name=?, parent=?, teacher=?, classes=?, ensembles=?, events=?, home_phone=?, mobile_phone=?, work_phone=?, preferred_phone=?, student_email=?, parent_email=?, street_address=?, city=?, state=?, zip_code=?, photo_release=?, dob=?, enrolled=?, instrument=?, notes=? WHERE student_key = $student";
		$sql = "UPDATE `students` SET last_name=?, first_name=?, parent=?, teacher=?, classes=?, ensembles=?, events=?, progress_report_date=?, home_phone=?, mobile_phone=?, work_phone=?, preferred_phone=?, student_email=?, parent_email=?, street_address=?, city=?, state=?, zip_code=?, photo_release=?, dob=?, enrolled=?, currently_enrolled=?, instrument=?, notes=? WHERE student_key = $student";
	}

	if (!($stmt = $db->prepare($sql))) {
	     echo "Prepare failed: (" . $db->errno . ") " . $db->error;
	}


	/* Prepared statement, stage 2: bind and execute */
	if (!$stmt->bind_param("ssssssssssssssssssssssss", $last_name, $first_name, $parent, $teacher, $classes, $ensembles, $events, $progress_report_date, $home_phone, $mobile_phone, $work_phone, $preferred_phone, $student_email, $parent_email, $street_address, $city, $state, $zip_code, $photo_release, $date_of_birth, $enrolled, $currently_enrolled, $instrument, $notes)) {
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	if ($stmt->execute()) {
		if ($addnew) {
			$student = $db->insert_id;
		}

		header("Location: ../../reports.php");
	}
	else {
	    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    echo "<a type=\"button\" class=\"btn btn-lg btn-primary\" href=\".\">Back Home</a>";

	}
	

	$db->close();

?>