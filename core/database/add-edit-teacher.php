<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['teacher'])) {
		$teacher = clean_up($_GET['teacher']);

		if($result = $db->query("SELECT * FROM `teachers` WHERE `teacher_key` LIKE '$teacher'")) {
			$row = $result->fetch_assoc();
			if ($result->num_rows !== 0) {
				$addnew = false;	
			}
		}
	}

	$first_name = ($_POST["first_name"]);
	$last_name = ($_POST["last_name"]);
	$street_address = ($_POST["street_address"]);
	$city = ($_POST["city"]);
	$state = ($_POST["state"]);
	$zip_code = ($_POST["zip_code"]);
	$email = ($_POST["email"]);

	$banner_id = ($_POST["banner_id"]);
	$home_phone = store_phone($_POST["home_phone"]);
	$mobile_phone = store_phone($_POST["mobile_phone"]);
	$alternate_email = ($_POST["alternate_email"]);
	$faculty_status = ($_POST["faculty_status"]);
	$instrument = $_POST["instrument"];
	$background_check = $_POST["background_check"];


	/* Prepared statement, stage 1: prepare */
	if ($addnew) {
		$sql = "INSERT INTO `teachers` (last_name, first_name, banner_id, home_phone, mobile_phone, email, alternate_email, street_address, city, state, zip_code, faculty_status, instrument, background_check) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	} else {
		$sql = "UPDATE `teachers` SET last_name=?, first_name=?, banner_id=?, home_phone=?, mobile_phone=?, email=?, alternate_email=?, street_address=?, city=?, state=?, zip_code=?, faculty_status=?, instrument=?, background_check=? WHERE teacher_key = $teacher";
	}

	if (!($stmt = $db->prepare($sql))) {
	     echo "Prepare failed: (" . $db->errno . ") " . $db->error;
	}


	/* Prepared statement, stage 2: bind and execute */
	if (!$stmt->bind_param("ssssssssssssss", $last_name, $first_name, $banner_id, $home_phone, $mobile_phone, $email, $alternate_email, $street_address, $city, $state, $zip_code, $faculty_status, $instrument, $background_check)) {
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	if ($stmt->execute()) {
		if ($addnew) {
			$teacher = $db->insert_id;
		}
		header("Location: ../../edit-teacher-form.php?teacher=$teacher");
	}
	else {
	    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    echo "<a type=\"button\" class=\"btn btn-lg btn-primary\" href=\".\">Back Home</a>";

	}
	

	$db->close();

?>