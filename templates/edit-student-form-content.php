<?php

	if(isset($_GET['student'])) {
		$student = clean_up($_GET['student']);
	}
	else {

	}
	$addnew = false;
	$link = connectDB();
	$result = mysql_db_query("rowanprep", "SELECT * FROM students WHERE student_key LIKE '$student'");
	$num_rows = mysql_num_rows($result);
	if ($num_rows === 0) {
		$addnew = true;
	} else {
		$row = mysql_fetch_assoc($result);
	}
	 
?>

<form action="core/database/add-edit-student.php?student=<?php echo $row['student_key']?>" class="form-horizontal" method="post">
<fieldset>

	<!-- Form Name -->
  <legend><div class="row text-center"><?php echo (($addnew)?"Add":"Edit"); ?> Student</div></legend>
	

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

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Date of Birth</label>
	  <div class="col-md-5">
	  <input id="datepicker" name="date_of_birth" type="date" value="<?php echo $row['dob']?>" class="form-control input-md" required="">

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

	<div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Photo Release</label>
      <div class="col-md-5">
        <select id="selectbasic" name="photo_release" class="form-control" required="">
          <option value="N">No</option>
          <option value="Y">Yes</option>
          <option value="S">See Notes</option>
        </select>
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
	  <label class="col-md-4 control-label" for="textinput">Enrollment Date</label>
	  <div class="col-md-5">
	  <input id="textinput" name="starting_date" type="date" value="<?php if ($addnew) echo time(); else echo $row['starting_date']; ?>" class="form-control input-md" required="">
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Currently Enrolled</label>
	  <div class="col-md-5">
	  <input id="textinput" name="currently_enrolled" type="text" value="<?php echo $row['enrolled']?>" class="form-control input-md" required="">
	  </div>
	</div>


	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Notes</label>
	  <div class="col-md-5">
	  <input id="textinput" name="notes" type="text" value="<?php echo $row['notes']?>" class="form-control input-md">

	  </div>
	</div>

	<div class="row text-center">
    <input type="submit" class="btn btn-primary" value="Save" />
     <a type="button" class="btn btn-primary" href="reports.php?tab=lessons" value="Back">Back</a>
  </div>

	</fieldset>
	</form>