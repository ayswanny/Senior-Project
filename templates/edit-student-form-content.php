<?php
	if(isset($_GET['student'])) {
		$student = $_GET['student'];
	}
	else {

	}

	if($result = $db->query("SELECT * FROM `students` WHERE `student_key` LIKE '$student'")) {
		$row = $result->fetch_assoc();
	}

?>

<form class="form-horizontal">
<fieldset>

	<!-- Form Name -->
	<legend>Add/Edit Student</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Last Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="last_name" type="text" placeholder="<?php echo $row['last_name']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">First Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="first_name" type="text" placeholder="<?php echo $row['first_name']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Parent</label>
	  <div class="col-md-5">
	  <input id="textinput" name="parent" type="text" placeholder="<?php echo $row['parent']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Teacher</label>
	  <div class="col-md-5">
	  <input id="textinput" name="teacher" type="text" placeholder="<?php echo $row['teacher']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Instrument</label>
	  <div class="col-md-5">
	  <input id="textinput" name="instrument" type="text" placeholder="<?php echo $row['instrument']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Classes</label>
	  <div class="col-md-5">
	  <input id="textinput" name="classes" type="text" placeholder="<?php echo $row['classes']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Ensembles</label>
	  <div class="col-md-5">
	  <input id="textinput" name="ensembles" type="text" placeholder="<?php echo $row['ensembles']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Events</label>
	  <div class="col-md-5">
	  <input id="textinput" name="events" type="text" placeholder="<?php echo $row['events']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Photo Release</label>
	  <div class="col-md-5">
	  <input id="textinput" name="photo_release" type="text" placeholder="<?php echo $row['photo_release']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Progress report date here -->

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Street Address</label>
	  <div class="col-md-5">
	  <input id="textinput" name="street_address" type="text" placeholder="<?php echo $row['street_address']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">City</label>
	  <div class="col-md-5">
	  <input id="textinput" name="city" type="text" placeholder="<?php echo $row['city']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- State goes here -->

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Zip Code</label>
	  <div class="col-md-5">
	  <input id="textinput" name="zip_code" type="text" placeholder="<?php echo $row['zip_code']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Home Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="home_phone" type="text" placeholder="<?php echo $row['home_phone']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Mobile Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="mobile_phone" type="text" placeholder="<?php echo $row['mobile_phone']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Work Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="work_phone" type="text" placeholder="<?php echo $row['work_phone']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Preferred Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="preferred_phone" type="text" placeholder="<?php echo $row['preferred_phone']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Parent Email</label>
	  <div class="col-md-5">
	  <input id="textinput" name="parent_email" type="text" placeholder="<?php echo $row['parent_email']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Student Email</label>
	  <div class="col-md-5">
	  <input id="textinput" name="student_email" type="text" placeholder="<?php echo $row['student_email']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Preferred Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="date_of_birth" type="text" placeholder="<?php echo $row['preferred_phone']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- starting date -->

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Enrolled</label>
	  <div class="col-md-5">
	  <input id="textinput" name="enrolled" type="text" placeholder="<?php echo $row['enrolled']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Notes</label>
	  <div class="col-md-5">
	  <input id="textinput" name="notes" type="text" placeholder="<?php echo $row['notes']?>" class="form-control input-md" required="">

	  </div>
	</div>

	</fieldset>
	</form>