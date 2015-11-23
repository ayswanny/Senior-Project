<?php
	require_once "core/init.php";

//	$link = connectDB();
//	if(!$link) {
//		   echo "Unable to connect to DB";
//		   exit;
//	}	

	$results = get_student_list();

	if(!$results)
		echo "results are empty";

	while($row = $result->fetch_assoc())
		echo $row['first_name'];		
?>