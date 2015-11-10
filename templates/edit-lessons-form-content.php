<?php
	if(isset($_GET['lesson'])) {
		$lessons = clean_up($_GET['lesson']);

	}
	else {

	}

	if($result = $db->query("SELECT * FROM `lessons` WHERE `lesson_key` LIKE '$lessons'")) {
		$row = $result->fetch_assoc();
		if ($result->num_rows === 0) {
			$addnew = true;
		} else {
			$addnew = false;
      $tmp_student_name = get_student_name($row['student']); // call to get student names
      $student_name = $tmp_student_name->fetch_assoc();

      $tmp_teacher_name = get_teacher_name($row['teacher']); // call to get teacher names
      $teacher_name = $tmp_teacher_name->fetch_assoc();
		}
	}

?>

<form action="core/database/add-edit-lessons.php?lessons=<?php echo $lessons ?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

	<!-- Form Name -->
	<legend><?php echo (($addnew)?"Add":"Edit"); ?> Lesson</legend>

	<input type="submit" class="btn btn-lg btn-primary" value="Save" />
	<input type="button" class="btn btn-lg btn-primary" onclick="history.back();" value="Back">


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Student Last Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="student_last_name" type="text" value="<?php echo (($addnew)?"NAME TO VALIDATE":$student_name['last_name'])?>" class="form-control input-md"  required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Student First Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="student_first_name" type="text" value="<?php echo (($addnew)?"NAME TO VALIDATE":$student_name['first_name'])?>" class="form-control input-md" required="">

	  </div>
	</div>

  <div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Teacher Last Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="teacher_last_name" type="text" value="<?php echo (($addnew)?"NAME TO VALIDATE":$teacher_name['last_name'])?>" class="form-control input-md" required="">

	  </div>
	</div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Teacher First Name</label>
    <div class="col-md-5">
    <input id="textinput" name="teacher_first_name" type="text" value="<?php echo (($addnew)?"NAME TO VALIDATE":$teacher_name['first_name'])?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Teacher Type</label>
    <div class="col-md-5">
    <input id="textinput" name="teacher_type" type="text" value="<?php echo $row['teacher_type']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Duration</label>
    <div class="col-md-5">
    <input id="textinput" name="teacher_type" type="number" value="<?php echo $row['duration']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Day</label>
    <div class="col-md-5">
    <input id="textinput" name="day" type="text" value="<?php echo $row['day']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Semester</label>
    <div class="col-md-5">
    <input id="textinput" name="semester" type="text" value="<?php echo $row['semester']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Year</label>
    <div class="col-md-5">
    <input id="textinput" name="year" type="number" value="<?php echo $row['year']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Instrument</label>
    <div class="col-md-5">
    <input id="textinput" name="instrument" type="text" value="<?php echo $row['instrument']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Tuition Due</label>
    <div class="col-md-5">
    <input id="textinput" name="tuition_due" type="text" value="<?php echo (($addnew)?"XXXXX.XX":$row['tuition_due'])?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Tuition Paid</label>
    <div class="col-md-5">
    <input id="textinput" name="tuition_paid" type="text" value="<?php echo (($addnew)?"XXXXX.XX":$row['tuition_paid'])?>" class="form-control input-md" required="">

    </div>
  </div>

</fieldset>
</form>
