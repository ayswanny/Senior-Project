<?php
	require '../init.php';


	$addnew = true;
	if (isset($_GET['lesson'])) {
		$lesson = clean_up($_GET['lesson']);

		if($result = $db->query("SELECT * FROM `lessons` WHERE `lesson_key` LIKE '$lesson'")) {
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
  $teacher = $_POST["teacher"];
  $teacher_type = ($_POST["teacher_type"]);
  $duration = ($_POST["duration"]);
  $day = ($_POST["day"]);
  $semester = ($_POST["semester"]);
  $year = ($_POST["year"]);
  $instrument = ($_POST["instrument"]);
  $tuition_due = ($_POST["tuition_due"]);
  $tuition_paid = ($_POST["tuition_paid"]);
  $tuition_owed = $tuition_due-$tuition_paid;



  /* Prepared statement, stage 1: prepare */
  if ($addnew) {
    $sql = "INSERT INTO `lessons` (student, teacher, teacher_type, duration, day,
                                  semester, year, instrument, tuition_due, tuition_paid, tuition_owed) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";

  } else {

    	$sql = "UPDATE `lessons` 
              SET student=?, teacher=?, teacher_type=?, duration=?, day=?,
                  semester=?, year=?, instrument=?, tuition_due=?, tuition_paid=?, 
                  tuition_owed=? 
              WHERE lesson_key=$lesson";

  }

  if(!($stmt = $db->prepare($sql))) {
	     echo "Prepare failed: (" . $db->errno . ") " . $db->error;
	}


  	/* Prepared statement, stage 2: bind and execute */
    	if (!$stmt->bind_param("sssssssssss", $student, $teacher, $teacher_type, $duration, $day, $semester, $year, $instrument, $tuition_due, $tuition_paid, $tuition_owed)){
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
      }

      if ($stmt->execute()) {
    		if ($addnew) {
    			$lesson = $db->insert_id;
    		}

    		header("Location: ../../edit-lessons-form.php?lesson=$lesson");
    	}
    	else {
    	    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    	    echo "<a type=\"button\" class=\"btn btn-lg btn-primary\" href=\".\">Back Home</a>";

    	}


    	$db->close();


  ?>
