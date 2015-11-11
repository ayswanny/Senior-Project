<?php

	require '../init.php';
	$student_list = get_student_list();
    while($student_identity = $student_list->fetch_assoc()) {
    	echo $student_identity['student_key'];
    }
?> 