<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['teacher'])) {
		$teacher = clean_up($_GET['teacher']);
		if($result = mysql_db_query("rowanprep", "SELECT * FROM teachers WHERE teacher_key LIKE '$teacher'")) {
			$row = mysql_fetch_assoc($result);
			if (mysql_num_rows($result) !== 0) {
				$addnew = false;	
			}
		}
	}

	//var_dumpclean_up($_POST);

	$first_name = clean_up($_POST["first_name"]);
	$last_name = clean_up($_POST["last_name"]);
	$street_address = clean_up($_POST["street_address"]);
	$city = clean_up($_POST["city"]);
	$state = clean_up($_POST["state"]);
	$zip_code = clean_up($_POST["zip_code"]);
	$email = clean_up($_POST["email"]);
	$banner_id = clean_up($_POST["banner_id"]);
	$home_phone = store_phone(clean_up($_POST["home_phone"]));
	$mobile_phone = store_phone(clean_up($_POST["mobile_phone"]));
	$alternate_email = clean_up($_POST["alternate_email"]);
	$faculty_status = clean_up($_POST["faculty_status"]);
	$instrument = clean_up($_POST["instrument"]);
	$background_check = clean_up($_POST["background_check"]);


	/* Prepared statement, stage 1: prepare */
	if ($addnew) {
		$sql = "INSERT INTO teachers (last_name, first_name, banner_id, home_phone, mobile_phone, email, alternate_email, street_address, city, state, zip_code, faculty_status, instrument, background_check) VALUES ('$last_name', '$first_name','$banner_id','$home_phone','$mobile_phone','$email','$alternate_email','$street_address','$city','$state','$zip_code','$faculty_status','$instrument','$background_check')";
	} else {
		$sql = "UPDATE teachers SET last_name='$last_name', first_name='$first_name', banner_id='$banner_id', home_phone='$home_phone', mobile_phone='$mobile_phone', email='$email', alternate_email='$alternate_email', street_address='$street_address', city='$city', state='$state', zip_code='$zip_code', faculty_status='$faculty_status', instrument='$instrument', background_check='$background_check' WHERE teacher_key = '$teacher'";
	}
	 $link = connectDB();
	 $results = mysql_db_query("rowanprep", $sql);
	 if(!$results) {
	 	echo 'Input failed...<br>';
	 	echo mysql_errno($link) . ": " . mysql_error($link). "\n";
	 }
	 else {
	 	header("Location:../../reports.php?tab=teachers");
	 }

?>