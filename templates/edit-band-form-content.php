<?php
	if(isset($_GET['band'])) {
		$band = clean_up($_GET['band']);
	}
	else {

	}

	$addnew = false;
  $link = connectDB();
  $result = mysql_db_query("rowanprep", "SELECT * FROM brass_band WHERE registration_key LIKE '$band'");
  $num_rows = mysql_num_rows($result);
  if($num_rows === 0) {
    $addnew = true;
  } 
  $row = mysql_fetch_assoc($result);

?>

<form action="core/database/add-edit-band.php?band=<?php echo $row['registration_key']?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

	<legend><div class="row text-center"><?php echo (($addnew)?"Add":"Edit"); ?> Band Student</div></legend>

	

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
          while($student_identity = mysql_fetch_assoc($student_list)) {
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
    <label class="col-md-4 control-label" for="textinput">Form</label>
    <div class="col-md-5">
     <select id="selectbasic" name="ryo_form" class="form-control">
      <?php 
        if($addnew) {
          echo '<option value="Y">Yes</option>';
          echo '<option value="N">No</option>';
        }
        else if($row['ryo_form'] == 'Y') {
          echo '<option value="Y" selected>Yes</option>';
          echo '<option value="N">No</option>';
        }
        else {
          echo '<option value="Y">Yes</option>';
          echo '<option value="N" selected>No</option>';
        }
      ?>
        </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Tuition Due</label>
    <div class="col-md-5">
    <input id="textinput" name="tuition_due" type="text" value="<?php echo (($addnew)?"\" placeholder=\"Amount\"":$row['tuition_due'])?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Notes</label>
    <div class="col-md-5">
    <input id="textinput" name="notes" type="text" value="<?php echo $row['notes']?>" class="form-control input-md" required="">

    </div>
  </div>
  
  <div class="row text-center">
    <input type="submit" class="btn btn-primary" value="Save" />
     <a type="button" class="btn btn-primary" href="reports.php?tab=lessons" value="Back">Back</a>
  </div>
</fieldset>
</form>