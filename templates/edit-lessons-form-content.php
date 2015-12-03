<?php
  if(isset($_GET['lesson'])) {
    $lesson = clean_up($_GET['lesson']);
  }
  else {
  }
  
  $addnew = false;
  $link = connectDB();
  $result = mysql_db_query("rowanprep", "SELECT * FROM lessons WHERE lesson_key LIKE '$lesson'");
  $num_rows = mysql_num_rows($result);
  if ($num_rows === 0) {
    $addnew = true;
  } else {
    $row = mysql_fetch_assoc($result);
  }
?>

<form action="core/database/add-edit-lessons.php?lesson=<?php echo $row['lesson_key']?>" class="form-horizontal" method="post" onsubmit="validate()">
<fieldset>

  <!-- Form Name -->
  <legend><?php echo (($addnew)?"Add":"Edit"); ?> Lesson
  <input type="submit" class="btn btn-primary" value="Save" />
  <a type="button" class="btn btn-primary" href="reports.php?tab=lessons" value="Back">Back</a>
  </legend>

  

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
    <label class="col-md-4 control-label" for="selectbasic">Teacher</label>
    <div class="col-md-5">
      <select id="selectbasic" name="teacher" class="form-control">
        <?php 
         if($addnew) {
            echo '<option value="0"> - Select Teacher</option>';
          }
          $teacher_list = get_teacher_list();
          while($teacher_identity = mysql_fetch_assoc($teacher_list)) {
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
    <select id="selectbasic" name="day" class="form-control">
      <?php if($addnew == true) { ?>
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Fall</option>
      <?php } else { ?>
        <option value="Sunday"<?php echo (($row['day']=='Sunday')?"selected>":">");?>Sunday</option>
        <option value="Monday"<?php echo (($row['day']=='Monday')?"selected>":">");?>Monday</option>
        <option value="Tuesday"<?php echo (($row['day']=='Tuesday')?"selected>":">");?>Tuesday</option>
        <option value="Wednesday"<?php echo (($row['day']=='Wednesday')?"selected>":">");?>Wednesday</option>
        <option value="Thursday"<?php echo (($row['day']=='Thursday')?"selected>":">");?>Thursday</option>
        <option value="Friday"<?php echo (($row['day']=='Friday')?"selected>":">");?>Friday</option>
        <option value="Saturday"<?php echo (($row['day']=='Saturday')?"selected>":">");?>Saturday</option>
      <?php }?>
        
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Semester</label>
    <div class="col-md-5">
      <select id="selectbasic" name="semester" class="form-control">
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Year</label>
    <div class="col-md-5">
    <select id="selectbasic" name="year" class="form-control">
      <option value="-1">- Select Year</option>
       <?php $int_year = 2000; 
             while($int_year != 2100) {
                if($int_year == $row['year']) {
                  echo '<option value="', $int_year,'" selected>', $int_year, '</option>';
                }
                else {
                echo '<option value="', $int_year,'">', $int_year, '</option>';
                }
                $int_year++;
             }
       ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Instrument</label>
    <div class="col-md-5">
    <input id="textinput" name="instrument" type="text" value="<?php echo $row['instrument']; ?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Tuition Due</label>
    <div class="col-md-5">
    <input id="textinput" name="tuition_due" type="text" value="<?php echo (($addnew)?"\"placeholder=\"Amount\"":$row['tuition_due'])?>" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Number of Lessons</label>
    <div class="col-md-5">
      <select id="selectbasic" name="total_lessons" class="form-control">
        <?php 
          if($addnew) {
            echo '<option value="0"> - Select a Value</option>';
          }
          $tmp_int = 1;
          while($tmp_int != '100') {
            if($row['total_lessons'] === $tmp_int) {
             echo '<option value="', $tmp_int,'" selected>', $tmp_int,'</option>';
            }
            else {
             echo '<option value="', $tmp_int,'">', $tmp_int,'</option>';
            }
            $tmp_int++;
          }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Teacher Pay Rate</label>
    <div class="col-md-5">
    <input id="textinput" name="pay_rate" type="text" value="<?php echo (($addnew)?"\"placeholder=\"Amount\"":$row['pay_rate'])?>" class="form-control input-md" required="">

    </div>
  </div>

</fieldset>
</form>