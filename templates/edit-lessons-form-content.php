<?php

	if(isset($_GET['lesson'])) {
		$lesson = clean_up($_GET['lesson']);
	}
	else {

	}

	if($result = $db->query("SELECT * FROM `lessons` WHERE `lesson_key` LIKE '$lesson'")) {
		$row = $result->fetch_assoc();
		if ($result->num_rows === 0) {
			$addnew = true;
		} else {
			$addnew = false;
		}
	}

?>

<form action="core/database/add-edit-lessons.php?lesson=<?php echo $row['lesson_key'] ?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

	<!-- Form Name -->
	<legend><?php echo (($addnew)?"Add":"Edit"); ?> Lesson</legend>

	<input type="submit" class="btn btn-lg btn-primary" value="Save" />
	<input type="button" class="btn btn-lg btn-primary" onclick="history.back();" value="Back">


	<!-- Text input-->
	<form class="form-horizontal">
  <fieldset>

  <!-- Select Basic -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Student</label>
    <div class="col-md-5">
      <select id="selectbasic" name="student" class="form-control">
        <?php 
          if($addnew) {
            echo '<option value="0"> - Select Student</option>';
          }
          $student_list = get_student_list();
          while($student_identity = $student_list->fetch_assoc()) {
            if($student_identity['student_key'] === $row['student']) {
             echo '<option value="', $student_identity['student_key'],'" selected>', $student_identity['last_name'], ', ', $student_identity['first_name'], '</option>';
            }
            else {
             echo '<option value="', $student_identity['student_key'],'">', $student_identity['last_name'], ', ', $student_identity['first_name'], '</option>';
            }
          }
        ?>
      </select>
    </div>
  </div>
  <?php
  
   ?>
  <div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Teacher</label>
    <div class="col-md-5">
      <select id="selectbasic" name="teacher" class="form-control">
        <?php 
         if($addnew) {
            echo '<option value="0"> - Select Teacher</option>';
          }
          $teacher_list = get_teacher_list();
          while($teacher_identity = $teacher_list->fetch_assoc()) {
            if($teacher_identity['teacher_key'] === $row['teacher']) {
             echo '<option value="', $teacher_identity['teacher_key'],'" selected>', $teacher_identity['last_name'], ', ', $teacher_identity['first_name'], '</option>';
            }
            else {
             echo '<option value="', $teacher_identity['teacher_key'],'">', $teacher_identity['last_name'], ', ', $teacher_identity['first_name'], '</option>';
            }
          }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Teacher Type</label>
    <div class="col-md-5">
      <select id="selectbasic" name="teacher_type" class="form-control">
        <option value="Rowan Prep">Rowan Prep</option>
        <option value="Rowan University">Rowan University</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Duration</label>
    <div class="col-md-5">
    <input id="textinput" name="duration" type="number" value="<?php echo $row['duration']?>" class="form-control input-md" required="">

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
