<?php

	if(isset($_GET['class'])) {
		$class = clean_up($_GET['class']);
	}
	else {

	}
	
  $link = connectDB();
  $result = mysql_db_query("rowanprep", "SELECT * FROM classes WHERE class_id LIKE '$class'");
  $num_rows = mysql_num_rows($result);
  if ($num_rows === 0) {

  } else {
    $row = mysql_fetch_assoc($result);
  }

?>

<form action="core/database/add-student-to-class.php?class=<?php echo $row['class_id']?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

	<legend><div class="row text-center">Add Student to <?php echo $row['class_name'] ?></div></legend>

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
    <label class="col-md-4 control-label" for="textinput">Tuition For Class</label>
    <div class="col-md-5">
    <input id="textinput" name="tuition_due" type="text" placeholder="Amount" class="form-control input-md" required="">

    </div>
  </div>



  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <div class="row text-center">
    <input type="submit" class="btn btn-primary" value="Add" />
     <a type="button" class="btn btn-primary" href="reports.php?tab=lessons" value="Back">Back</a>
  </div>

  
</fieldset>
</form>