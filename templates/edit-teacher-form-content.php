<?php
	if(isset($_GET['teacher'])) {
		$teacher = $_GET['teacher'];
	}
	else {

	}

	if($result = $db->query("SELECT * FROM `teachers` WHERE `teacher_key` LIKE '$teacher'")) {
		$row = $result->fetch_assoc();
	}

?>

<form class="form-horizontal">
<fieldset>

	<!-- Form Name -->
	<legend>Add/Edit Teacher</legend>

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
	  <label class="col-md-4 control-label" for="textinput">Banner ID</label>
	  <div class="col-md-5">
	  <input id="textinput" name="banner_id" type="text" placeholder="<?php echo $row['banner_id']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Faculty Status</label>
		<div class="col-md-5">
		<input id="textinput" name="faculty_status" type="text" placeholder="<?php echo $row['faculty_status']?>" class="form-control input-md">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Instrument</label>
	  <div class="col-md-5">
	  <input id="textinput" name="instrument" type="text" placeholder="<?php echo $row['instrument']?>" class="form-control input-md">

	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Background Check</label>
	  <div class="col-md-5">
	  <input id="textinput" name="background_check" type="text" placeholder="<?php echo $row['background_check']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Home Phone</label>
	  <div class="col-md-5">
	  <input id="textinput" name="home_phone" type="text" placeholder="<?php echo $row['home_phone']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Mobile Phone</label>
		<div class="col-md-5">
		<input id="textinput" name="mobile_phone" type="text" placeholder="<?php echo $row['mobile_phone']?>" class="form-control input-md">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Email</label>
	  <div class="col-md-5">
	  <input id="textinput" name="email" type="text" placeholder="<?php echo $row['email']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Alternate Email</label>
		<div class="col-md-5">
		<input id="textinput" name="alternate_email" type="text" placeholder="<?php echo $row['alternate_email']?>" class="form-control input-md">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Street Address</label>
		<div class="col-md-5">
		<input id="textinput" name="street_address" type="text" placeholder="<?php echo $row['street_address']?>" class="form-control input-md">

		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">City</label>
	  <div class="col-md-5">
	  <input id="textinput" name="city" type="text" placeholder="<?php echo $row['city']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">State</label>
	  <div class="col-md-5">
	  <input id="textinput" name="state" type="text" placeholder="<?php echo $row['state']?>" class="form-control input-md">

	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Zip Code</label>
	  <div class="col-md-5">
	  <input id="textinput" name="zip_code" type="text" placeholder="<?php echo $row['zip_code']?>" class="form-control input-md">

	  </div>
	</div>

	</fieldset>
	</form>

?>
