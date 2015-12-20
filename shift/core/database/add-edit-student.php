<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['student'])) {
		$student = clean_up($_GET['student']);
		if($result = mysql_db_query("rowanprep", "SELECT * FROM students WHERE student_key LIKE '$student'")) {
			$row = mysql_fetch_assoc($result);
			if (mysql_num_rows($result) !== 0) {
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
	$starting_date = $_POST["starting_date"];
	$enrolled = $_POST['currently_enrolled'];
	$notes = $_POST["notes"];


		/* Prepared statement, stage 1: prepare */
	if ($addnew) {
		$sql = "INSERT INTO students (last_name, first_name, street_address, city, state, zip_code, student_email, parent, teacher, classes, ensembles, events, progress_report_date, photo_release, home_phone, mobile_phone, work_phone, preferred_phone, parent_email, instrument, dob, starting_date, enrolled, notes) VALUES ('$last_name', '$first_name', '$street_address', '$city', '$state', '$zip_code', '$student_email', '$parent', '$teacher', '$classes', '$ensembles', '$events', '$progress_report_date', '$photo_release', '$home_phone', '$mobile_phone', '$work_phone', '$preferred_phone', '$parent_email', '$instrument', '$date_of_birth', '$starting_date', '$currently_enrolled', '$notes')
			";
	} else {
		$sql = "UPDATE students SET last_name='$last_name', first_name='$first_name', street_address='$street_address', city='$city', state='$state', zip_code='$zip_code', student_email='$student_email', parent='$parent', teacher='$teacher', classes='$classes', ensembles='$ensembles', events='$events', progress_report_date='$progress_report_date', photo_release='$photo_release', home_phone='$home_phone', mobile_phone='$mobile_phone', preferred_phone='$preferred_phone', parent_email='$parent_email', instrument='$instrument', dob='$date_of_birth', starting_date='$starting_date', enrolled='$currently_enrolled', notes='$notes' WHERE student_key = '$student'";
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