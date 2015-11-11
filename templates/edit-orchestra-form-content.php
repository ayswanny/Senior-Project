<?php
	if(isset($_GET['orchestra'])) {
		$orchestra = clean_up($_GET['orchestra']);
	}
	else {

	}

	if($result = $db->query("SELECT * FROM `orchestra` WHERE `registration_key` LIKE '$orchestra'")) {
		$row = $result->fetch_assoc();
		if ($result->num_rows === 0) {
			$addnew = true;
		} else {
			$addnew = false;
		}
	}

?>

<form action="core/database/add-edit-orchestra.php?orchestra=<?php echo $row['registration_key'] ?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

	<!-- Form Name -->
	<legend><?php echo (($addnew)?"Add":"Edit"); ?> Orchestra Student</legend>

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

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Instrument</label>
    <div class="col-md-5">
    <input id="textinput" name="instrument" type="text" value="<?php echo $row['instrument']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">RYO Form</label>
    <div class="col-md-5">
    <input id="textinput" name="ryo_form" type="text" value="<?php echo $row['ryo_form']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Paid by Check</label>
    <div class="col-md-5">
    <input id="textinput" name="paid_check" type="text" value="<?php echo $row['paid_check']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Check Number</label>
    <div class="col-md-5">
    <input id="textinput" name="check_number" type="number" value="<?php echo $row['check_number']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Paid by Card</label>
    <div class="col-md-5">
    <input id="textinput" name="paid_card" type="text" value="<?php echo $row['paid_card']?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Payment Dates</label>
    <div class="col-md-5">
    <input id="textinput" name="payment_date" type="text" value="<?php echo $row['payment_date']?>" class="form-control input-md" required="">

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

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Notes</label>
    <div class="col-md-5">
    <input id="textinput" name="notes" type="text" value="<?php echo $row['notes']?>" class="form-control input-md" required="">

    </div>
  </div>

</fieldset>
</form>