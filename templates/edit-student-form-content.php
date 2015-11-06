<?php
	if(isset($_GET['student'])) {
		$student = clean_up($_GET['student']);
	}
	else {

	}

	if($result = $db->query("SELECT * FROM `students` WHERE `user_key` LIKE '$student'")) {
		$row = $result->fetch_assoc();
		if ($result->num_rows === 0) {
			$addnew = true;
		} else {
			$addnew = false;	
		}
	} 

?>

<form action="core/database/add-edit-student.php?student=<?php echo $student ?>" class="form-horizontal" method="post">
<fieldset>

	<!-- Form Name -->
	<legend><?php echo (($addnew)?"Add":"Edit"); ?> Student</legend>

	<input type="submit" class="btn btn-lg btn-primary" value="Save" />
	<input type="button" class="btn btn-lg btn-primary" onclick="history.back();" value="Back">

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Last Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="last_name" type="text" value="<?php echo $row['last_name']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">First Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="first_name" type="text" value="<?php echo $row['first_name']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Parent</label>
	  <div class="col-md-5">
	  <input id="textinput" name="parent" type="text" value="<?php echo $row['parent']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Teacher</label>
	  <div class="col-md-5">
	  <input id="textinput" name="teacher" type="text" value="<?php echo $row['teacher']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Instrument</label>
	  <div class="col-md-5">
	  <input id="textinput" name="instrument" type="text" value="<?php echo $row['instrument']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Classes</label>
	  <div class="col-md-5">
	  <input id="textinput" name="classes" type="text" value="<?php echo $row['classes']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Ensembles</label>
	  <div class="col-md-5">
	  <input id="textinput" name="ensembles" type="text" value="<?php echo $row['ensembles']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Events</label>
	  <div class="col-md-5">
	  <input id="textinput" name="events" type="text" value="<?php echo $row['events']?>" class="form-control input-md">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Photo Release</label>
	  <div class="col-md-5">
	  <input id="textinput" name="photo_release" type="text" value="<?php echo $row['photo_release']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Progress report date here -->

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Progress Report Date</label>
	  <div class="col-md-5">
	  <input id="dateinput" name="progress_report_date" type="date" value="<?php echo $row['progress_report_date']?>" class="form-control input-md">

	  </div>
	</div>


	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Street Address</label>
	  <div class="col-md-5">
	  <input id="textinput" name="street_address" type="text" value="<?php echo $row['street_address']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">City</label>
	  <div class="col-md-5">
	  <input id="textinput" name="city" type="text" value="<?php echo $row['city']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- State goes here -->

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">State</label>
	  <div class="col-md-5">
	  <input id="textinput" name="state" type="text" value="<?php echo $row['state']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Zip Code</label>
	  <div class="col-md-5">
	  <input id="textinput" name="zip_code" type="text" value="<?php echo $row['zip_code']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Home Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="home_phone" type="text" value="<?php echo $row['home_phone']?>" class="form-control input-md">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Mobile Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="mobile_phone" type="text" value="<?php echo $row['mobile_phone']?>" class="form-control input-md">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Work Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="work_phone" type="text" value="<?php echo $row['work_phone']?>" class="form-control input-md">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Preferred Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="preferred_phone" type="text" value="<?php echo $row['preferred_phone']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Parent Email</label>
	  <div class="col-md-5">
	  <input id="textinput" name="parent_email" type="text" value="<?php echo $row['parent_email']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Student Email</label>
	  <div class="col-md-5">
	  <input id="textinput" name="student_email" type="text" value="<?php echo $row['student_email']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Date of Birth</label>
	  <div class="col-md-5">
	  <input id="datepicker" name="date_of_birth" type="date" value="<?php echo $row['dob']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- starting date -->

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Enrolled</label>
	  <div class="col-md-5">
	  <input id="textinput" name="enrolled" type="date" value="<?php if ($addnew) echo time(); else echo $row['enrolled']; ?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Notes</label>
	  <div class="col-md-5">
	  <input id="textinput" name="notes" type="text" value="<?php echo $row['notes']?>" class="form-control input-md">

	  </div>
	</div>

	</fieldset>
	</form>