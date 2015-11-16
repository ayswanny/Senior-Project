<?php

	if(isset($_GET['teacher'])) {
		$teacher = clean_up($_GET['teacher']);

	}
	else {

	}

	if($result = $db->query("SELECT * FROM `teachers` WHERE `teacher_key` LIKE '$teacher'")) {
		$row = $result->fetch_assoc();
		if ($result->num_rows === 0) {
			$addnew = true;
		} else {
			$addnew = false;	
		}
	} 

?>

<form action="core/database/add-edit-teacher.php?teacher=<?php echo $teacher ?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

	<!-- Form Name -->
	<legend><?php echo (($addnew)?"Add":"Edit"); ?> Teacher
	<input type="submit" class="btn btn-primary" value="Save" />
	<a type="button" class="btn btn-primary" href="reports.php?tab=teacher" value="Back">Back</a>
	</legend>

	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Last Name</label>
	  <div class="col-md-5">
	  <input id="textinput" name="last_name" type="text" value="<?php echo $row['last_name']?>" class="form-control input-md"  required="">

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
	  <label class="col-md-4 control-label" for="textinput">Banner ID</label>
	  <div class="col-md-5">
	  <input id="textinput" name="banner_id" type="text" value="<?php echo $row['banner_id']?>" class="form-control input-md" required="">

	  </div>
	</div>


	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Faculty Status</label>
		<div class="col-md-5">
		<input id="textinput" name="faculty_status" type="text" value="<?php echo $row['faculty_status']?>" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Instrument</label>
	  <div class="col-md-5">
	  <input id="textinput" name="instrument" type="text" value="<?php echo $row['instrument']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Background Check</label>
	  <div class="col-md-5">
	  <input id="textinput" name="background_check" type="text" value="<?php echo $row['background_check']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Home Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="home_phone" type="text" value="<?php echo $row['home_phone']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Mobile Phone</label>
		<div class="col-md-5">
		<input id="textinput" name="mobile_phone" type="text" value="<?php echo $row['mobile_phone']?>" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Email</label>
	  <div class="col-md-5">
	  <input id="textinput" name="email" type="text" value="<?php echo $row['email']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Alternate Email</label>
		<div class="col-md-5">
		<input id="textinput" name="alternate_email" type="text" value="<?php echo $row['alternate_email']?>" class="form-control input-md">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Street Address</label>
		<div class="col-md-5">
		<input id="textinput" name="street_address" type="text" value="<?php echo $row['street_address']?>" class="form-control input-md" required="">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">City</label>
	  <div class="col-md-5">
	  <input id="textinput" name="city" type="text" value="<?php echo $row['city']?>" class="form-control input-md" required="">

	  </div>
	</div>

	<!-- Text input-->
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


	</fieldset>
	</form>
