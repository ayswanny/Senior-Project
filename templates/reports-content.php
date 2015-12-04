
<div style="margin-top:10px;" class="mainbox col-md-12 text-center">

  <div class="row">

    <!-- Simple jQuery calls to switch out divs-->
    <a type="button" class="btn btn-primary" href="reports.php?tab=students">Student</a>
    <a type="button" class="btn btn-primary" href="reports.php?tab=teachers">Teacher</a>
    <a type="button" class="btn btn-primary" href="reports.php?tab=lessons">Lessons</a>
    <a type="button" class="btn btn-primary" href="reports.php?tab=orchestra" >Rowan Orchestra</a>
    <a type="button" class="btn btn-primary" href="reports.php?tab=band">Atlantic Brass Band</a>
    
     <span class="btn-group">
        <button class="drop-down-btn dropdown-toggle" data-toggle="dropdown">Classes <span class="caret"></span></button>
         <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            <?php
              $link = connectDB();
              $result = get_class_list();
              while ($class_id = mysql_fetch_assoc($result)) {
                echo '<li role="presentation"><a role="menuitem" href="reports.php?tab=class&class-key=', $class_id['class_id'],'">', $class_id['class_name'] ,'</a></li>';
              }
            ?>
          </ul>
      </span>

  </div>
  <br>
  

  
  <?php if($tab == 'students') {  ?>
  <div id="student" class="table-responsive">
    <div class="text-center">
      <h3>Students</h3>
      <ul class="list-inline">
      <li><a href="reports.php?tab=students&sortby=1">Last Name</a></li>
      <li><a href="reports.php?tab=students&sortby=2">First Name</a></li>
      <li><a href="reports.php?tab=students&sortby=3">Teacher</a></li>
      <li><a href="reports.php?tab=students&sortby=4">Instrument</a></li>
      <li><a href="reports.php?tab=students&sortby=5">Photo Release</a></li>
    </ul>
    </div>

      <table class="table table-striped text-center">
        <?php
	        $link = connectDB();
          //output student table.
          if(isset($_GET['sortby']))  {
            $sort = $_GET['sortby'];
            $results = get_student_list($sort);
          }
          else {
            $sort = 0;
            $results = get_student_list($sort);
          }
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-student-form.php?student=new"">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center">Last Name</div></th>
                        <th><div class="text-center">First Name</div></th>
                        <th><div class="text-center">Parent</div></th>
                        <th><div class="text-center">Date of Birth</div></th>
                        <th><div class="text-center">Teacher</div></th>
                        <th><div class="text-center">Instrument</div></th>
                        <th><div class="text-center">Classes</div></th>
                        <th><div class="text-center">Ensembles</div></th>
                        <th><div class="text-center">Events</div></th>
                        <th><div class="text-center">Photo Release</div></th>
                        <th><div class="text-center">Progress Report Date</div></th>
                        <th><div class="text-center">Street Address</div></th>
                        <th><div class="text-center">City</div></th>
                        <th><div class="text-center">State</div></th>
                        <th><div class="text-center">Zip Code</div></th>
                        <th><div class="text-center">Home Phone</div></th>
                        <th><div class="text-center">Mobile Phone</div></th>
                        <th><div class="text-center">Work Phone</div></th>
                        <th><div class="text-center">Preferred Phone</div></th>
                        <th><div class="text-center">Parent Email</div></th>
                        <th><div class="text-center">Student Email</div></th>
                        <th><div class="text-center">Starting Date</div></th>
                        <th><div class="text-center">Currently Enrolled</div></th>
                        <th><div class="text-center">Notes</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {
                    echo '<tr>
                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Student?\',\'delete_student\',\'', $row['student_key'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>

                         <td><div class="text-center"><a href="edit-student-form.php?student=', $row['student_key'], '">
                         <img class="table-icon" src="./res/image/edit.png"></a></div></td>
                         <td><div class="text-center">', $row['last_name'],'</div></td>
                         <td><div class="text-center">', $row['first_name'],'</div></td>
                         <td><div class="text-center">', $row['parent'],'</div></td>
                         <td><div class="text-center">', $row['dob'],'</div></td>
                         <td><div class="text-center">', $row['teacher'],'</div></td>
                         <td><div class="text-center">', $row['instrument'],'</div></td>
                         <td><div class="text-center">', $row['classes'],'</div></td>
                         <td><div class="text-center">', $row['ensembles'],'</div></td>
                         <td><div class="text-center">', $row['events'],'</div></td>
                         <td><div class="text-center">', $row['photo_release'],'</div></td>
                         <td><div class="text-center">', $row['progress_report_date'],'</div></td>
                         <td><div class="text-center">', $row['street_address'],'</div></td>
                         <td><div class="text-center">', $row['city'],'</div></td>
                         <td><div class="text-center">', $row['state'],'</div></td>
                         <td><div class="text-center">', $row['zip_code'],'</div></td>
                         <td><div class="text-center">', display_phone($row['home_phone']),'</div></td>
                         <td><div class="text-center">', display_phone($row['mobile_phone']),'</div></td>
                         <td><div class="text-center">', display_phone($row['work_phone']),'</div></td>
                         <td><div class="text-center">', display_phone($row['preferred_phone']),'</div></td>
                         <td><div class="text-center">', $row['parent_email'],'</div></td>
                         <td><div class="text-center">', $row['student_email'],'</div></td>
                         <td><div class="text-center">', $row['starting_date'],'</div></td>
                         <td><div class="text-center">', $row['enrolled'],'</div></td>
                         <td><div class="text-center">', $row['notes'],'</div></td></tr>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>
  <?php } else if($tab == 'teachers') { ?>
  <div id="teacher" class="table-responsive">
    <h3>Teachers</h3>
    <ul class="list-inline">
      <li><a href="reports.php?tab=teachers&sortby=1">Last Name</a></li>
      <li><a href="reports.php?tab=teachers&sortby=2">First Name</a></li>
      <li><a href="reports.php?tab=teachers&sortby=3">Instrument</a></li>
    </ul>
    <div class="text-center">
      <table class="table table-striped text-center">
        <?php
 	        $link = connectDB();
          //out teachers table
           if(isset($_GET['sortby']))  {
            $sort = $_GET['sortby'];
            $results = get_teacher_list($sort);
          }
          else {
            $sort = 0;
            $results = get_teacher_list($sort);
          }
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-teacher-form.php?teacher=','new','">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center">Last Name</div></th>
                        <th><div class="text-center">First Name</div></th>
                        <th><div class="text-center">Banner ID</div></th>
                        <th><div class="text-center">Faculty Status</div></th>
                        <th><div class="text-center">Instrument</div></th>
                        <th><div class="text-center">Backround Check</div></th>
                        <th><div class="text-center">Home Phone</div></th>
                        <th><div class="text-center">Mobile Phone</div></th>
                        <th><div class="text-center">Email</div></th>
                        <th><div class="text-center">Alternate Email</div></th>
                        <th><div class="text-center">Street Address</div></th>
                        <th><div class="text-center">City</div></th>
                        <th><div class="text-center">State</div></th>
                        <th><div class="text-center">Zip Code</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {

                    echo '<tr>
                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Teacher?\',\'delete_teacher\',\'', $row['teacher_key'], '\')">
                         <img class="table-icon" src="./res/image/rm-user.png">
                         </a></div></td>
                         <td><div class="text-center"><a href="teacher-timesheet.php?teacher=', $row['teacher_key'], '">
                         <img class="table-icon" src="./res/image/timesheet.png" alt="edit" ></a></div></td>
                         <td><div class="text-center"><a href="edit-teacher-form.php?teacher=', $row['teacher_key'], '">
                         <img class="table-icon" src="./res/image/edit.png" alt="edit" ></a></div></td>
                         <td><div class="text-center">', $row['last_name'],'</div></td>
                         <td><div class="text-center">', $row['first_name'],'</div></td>
                         <td><div class="text-center">', $row['banner_id'],'</div></td>
                         <td><div class="text-center">', $row['faculty_status'],'</div></td>
                         <td><div class="text-center">', $row['instrument'],'</div></td>
                         <td><div class="text-center">', $row['background_check'],'</div></td>
                         <td><div class="text-center">', display_phone($row['home_phone']),'</div></td>
                         <td><div class="text-center">', display_phone($row['mobile_phone']),'</div></td>
                         <td><div class="text-center">', $row['email'],'</div></td>
                         <td><div class="text-center">', $row['alternate_email'],'</div></td>
                         <td><div class="text-center">', $row['street_address'],'</div></td>
                         <td><div class="text-center">', $row['city'],'</div></td>
                         <td><div class="text-center">', $row['state'],'</div></td>
                         <td><div class="text-center">', $row['zip_code'],'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>
  <?php } else if($tab == 'lessons') { ?>
  <div id="lessons" class="table-responsive">
    <h3>Lessons</h3>
    <ul class="list-inline">
      <li><a href="reports.php?tab=lessons&sortby=1">Student Last Name</a></li>
      <li><a href="reports.php?tab=lessons&sortby=2">Teacher Last Name</a></li>
      <li><a href="reports.php?tab=lessons&sortby=3">Instrument</a></li>
      <li><a href="reports.php?tab=lessons&sortby=4">Day</a></li>
    </ul>
    <div class="text-center">
      <table class="table table-striped">
        <?php
	  $link = connectDB();
          //out lessons table
           if(isset($_GET['sortby']))  {
            $sort = $_GET['sortby'];
            $results = get_lessons_list($sort);
          }
          else {
            $sort = 0;
            $results = get_lessons_list($sort);
          }
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-lessons-form.php?lesson=','new','">
                         <img class="table-icon" src="./res/image/add-record.png"></a></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center">Student Last Name</div></th>
                        <th><div class="text-center">Student First Name</div></th>
                        <th><div class="text-center">Teacher Last Name</div></th>
                        <th><div class="text-center">Teacher First Name</div></th>
                        <th><div class="text-center">Teacher Type</div></th>
                        <th><div class="text-center">Duration</div></th>
                        <th><div class="text-center">Day</div></th>
                        <th><div class="text-center">Semester</div></th>
                        <th><div class="text-center">Year</div></th>
                        <th><div class="text-center">Instrument</div></th>
                        <th><div class="text-center">Number of Lessons</div></th>
                        <th><div class="text-center">Tuition Due</div></th>
                        <th><div class="text-center">Tuition Paid</div></th>
                        <th><div class="text-center">Tuition Owed</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {
                    $tmp_student_name = get_student_name($row['student']); // call to get student names
                    $student_name = mysql_fetch_assoc($tmp_student_name);

                    $tmp_teacher_name = get_teacher_name($row['teacher']); // call to get teacher names
                    $teacher_name = mysql_fetch_assoc($tmp_teacher_name);
                    
                    $tmp_payment = get_payment(0, $row['lesson_key']);
                    $payment = 0;
                    while($rows = mysql_fetch_assoc($tmp_payment)){
                      $payment = $payment + $rows['amount_paid'];
                    }
                    $payment_due = $row['tuition_due'] - $payment;
                  

                    echo '<tr>
                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Lesson?\',\'delete_lesson\',\'', $row['lesson_key'], '\')">
                         <img class="table-icon" src="./res/image/rm-record.png">
                         </a></div></td>
                         <td><div class="text-center"><a href="edit-lessons-form.php?lesson=', $row['lesson_key'], '">
                         <img class="table-icon" src="./res/image/edit.png"></a></div></td>
                         <td><div class="text-center">', $student_name['last_name'],'</div></td>
                         <td><div class="text-center">', $student_name['first_name'],'</div></td>
                         <td><div class="text-center">', $teacher_name['last_name'],'</div></td>
                         <td><div class="text-center">', $teacher_name['first_name'],'</div></td>
                         <td><div class="text-center">', $row['teacher_type'],'</div></td>
                         <td><div class="text-center">', $row['duration'],' minutes</div></td>
                         <td><div class="text-center">', $row['day'],'</div></td>
                         <td><div class="text-center">', $row['semester'],'</div></td>
                         <td><div class="text-center">', $row['year'],'</div></td>
                         <td><div class="text-center">', $row['instrument'],'</div></td>
                         <td><div class="text-center">', $row['total_lessons'],'</div></td>
                         <td><div class="text-center">', $row['tuition_due'],'</div></td>
                         <td><div class="text-center">', $payment,'</div></td>
                         <td><div class="text-center">', $payment_due,'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>
  <?php } else if($tab == 'orchestra') { ?>
  <div id="orchestra" class="table-responsive">
    <h3>Rowan Youth Orchestra</h3>
    <ul class="list-inline">
      <li><a href="reports.php?tab=orchestra&sortby=1">Last Name</a></li>
      <li><a href="reports.php?tab=orchestra&sortby=2">First name</a></li>
      <li><a href="reports.php?tab=orchestra&sortby=3">Instrument</a></li>
      <li><a href="reports.php?tab=orchestra&sortby=4">Tuition Owed</a></li>
    </ul>
    <div class="text-center">
      <table class="table table-striped">
        <?php

          //out lessons table
	  $link = connectDB();
         if(isset($_GET['sortby']))  {
            $sort = $_GET['sortby'];
            $results = get_orchestra_list($sort);
          }
          else {
            $sort = 0;
            $results = get_orchestra_list($sort);
          }
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-orchestra-form.php?orchestra=','new','">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center">Student Last Name</div></th>
                        <th><div class="text-center">Student First Name</div></th>
                        <th><div class="text-center">Intrument</div></th>
                        <th><div class="text-center">Email</div></th>
                        <th><div class="text-center">Parent Email</div></th>
                        <th><div class="text-center">RYO Form</div></th>
                        <th><div class="text-center">Tuition Due</div></th>
                        <th><div class="text-center">Tuition Paid</div></th>
                        <th><div class="text-center">Tuition Owed</div></th>
                        <th><div class="text-center">Notes</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {

                    $tmp_payment = get_payment(1, $row['registration_key']);
                    $payment = 0;
                    $payment_dates = "";
                    while($rows = mysql_fetch_assoc($tmp_payment)){
                      $payment = $payment + $rows['amount_paid'];
                    }
                    $payment_due = $row['tuition_due'] - $payment;

                    echo '<tr>

                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Orchestra Entry?\',\'delete_orchestra\',\'', $row['registration_key'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>
                         <td><div class="text-center"><a href="edit-orchestra-form.php?orchestra=', $row['registration_key'], '">
                         <img class="table-icon" src="./res/image/edit.png"></a></div></td>
                         <td><div class="text-center">', $row['last_name'],'</div></td>
                         <td><div class="text-center">', $row['first_name'],'</div></td>
                         <td><div class="text-center">', $row['instrument'],'</div></td>
                         <td><div class="text-center">', $row['student_email'],'</div></td>
                         <td><div class="text-center">', $row['parent_email'],'</div></td>
                         <td><div class="text-center">', $row['ryo_form'],'</div></td>
                         <td><div class="text-center">', $row['tuition_due'],'</div></td>
                         <td><div class="text-center">', $payment,'</div></td>
                         <td><div class="text-center">', $payment_due,'</div></td>
                         <td><div class="text-center">', $row['notes'],'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>
  <?php } else if($tab == 'band') { ?>
  <div id="band" class="table-responsive">
    <h3>Atlantic Youth Brass Band</h3>
    <ul class="list-inline">
      <li><a href="reports.php?tab=band&sortby=1">Last Name</a></li>
      <li><a href="reports.php?tab=band&sortby=2">First name</a></li>
      <li><a href="reports.php?tab=band&sortby=3">Instrument</a></li>
      <li><a href="reports.php?tab=band&sortby=4">Tuition Owed</a></li>
    </ul>
    <div class="text-center">
      <table class="table table-striped">
        <?php

          //out lessons table
    $link = connectDB();
         if(isset($_GET['sortby']))  {
            $sort = $_GET['sortby'];
            $results = get_band_list($sort);
          }
          else {
            $sort = 0;
            $results = get_band_list($sort);
          }
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-band-form.php?band=','new','">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center">Student Last Name</div></th>
                        <th><div class="text-center">Student First Name</div></th>
                        <th><div class="text-center">Intrument</div></th>
                        <th><div class="text-center">Email</div></th>
                        <th><div class="text-center">Parent Email</div></th>
                        <th><div class="text-center">RYO Form</div></th>
                        <th><div class="text-center">Tuition Due</div></th>
                        <th><div class="text-center">Tuition Paid</div></th>
                        <th><div class="text-center">Tuition Owed</div></th>
                        <th><div class="text-center">Notes</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {

                    $tmp_payment = get_payment(2, $row['registration_key']);
                    $payment = 0;
                    $payment_dates = "";
                    while($rows = mysql_fetch_assoc($tmp_payment)){
                      $payment = $payment + $rows['amount_paid'];
                    }
                    $payment_due = $row['tuition_due'] - $payment;

                    echo '<tr>

                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Band Entry?\',\'delete_band\',\'', $row['registration_key'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>
                         <td><div class="text-center"><a href="edit-band-form.php?band=', $row['registration_key'], '">
                         <img class="table-icon" src="./res/image/edit.png"></a></div></td>
                         <td><div class="text-center">', $row['last_name'],'</div></td>
                         <td><div class="text-center">', $row['first_name'],'</div></td>
                         <td><div class="text-center">', $row['instrument'],'</div></td>
                         <td><div class="text-center">', $row['student_email'],'</div></td>
                         <td><div class="text-center">', $row['parent_email'],'</div></td>
                         <td><div class="text-center">', $row['ryo_form'],'</div></td>
                         <td><div class="text-center">', $row['tuition_due'],'</div></td>
                         <td><div class="text-center">', $payment,'</div></td>
                         <td><div class="text-center">', $payment_due,'</div></td>
                         <td><div class="text-center">', $row['notes'],'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>
  <?php } else if($tab == 'class') { ?>
  <div id="class" class="table-responsive">
    <h3>Class</h3>
    <ul class="list-inline">
      <li><a href="reports.php?tab=class&class-key="<?php echo $class_key ?>"&sortby=1">Last Name</a></li>
      <li><a href="reports.php?tab=class&class-key="<?php echo $class_key ?>"&sortby=2">First name</a></li>
      <li><a href="reports.php?tab=class&class-key="<?php echo $class_key ?>"&sortby=3">Instrument</a></li>
      <li><a href="reports.php?tab=class&class-key="<?php echo $class_key ?>"&sortby=4">Tuition Owed</a></li>
    </ul>
    <div class="text-center">
      <table class="table table-striped">
        <?php

          //out lessons table
        $link = connectDB();
         if(isset($_GET['sortby']))  {
            $sort = $_GET['sortby'];
            $results = get_class_student_list($class_key);
          }
          else {
            $sort = 0;
            $results = get_class_student_list($class_key);
          }
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="add-student-to-class.php?class=', $class_key,'">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                        <th><div class="text-center"></div></th>
                        <th><div class="text-center">Student Last Name</div></th>
                        <th><div class="text-center">Student First Name</div></th>
                        <th><div class="text-center">Intrument</div></th>
                        <th><div class="text-center">Email</div></th>
                        <th><div class="text-center">Parent Email</div></th>
                        <th><div class="text-center">Tuition Due</div></th>
                        <th><div class="text-center">Tuition Paid</div></th>
                        <th><div class="text-center">Tuition Owed</div></th>
                        <th><div class="text-center">Notes</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {

                    $tmp_payment = get_class_payment('3', $row['class_ref'], $row['student_key']);
                    $payment = 0;
                    $payment_dates = "";
                    while($rows = mysql_fetch_assoc($tmp_payment)){
                      $payment = $payment + $rows['amount_paid'];
                    }
                    $payment_due = $row['tuition_due'] - $payment;

                    echo '<tr>
                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete student from class?\',\'delete_student_from_class\',\'', $row['id'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>
                         <td><div class="text-center"><a href="#" onclick="Alert.render(\'Cannot edit students from class tab. Use student tab.\')">
                         <img class="table-icon" src="./res/image/edit.png"></a></div></td>
                         <td><div class="text-center">', $row['last_name'],'</div></td>
                         <td><div class="text-center">', $row['first_name'],'</div></td>
                         <td><div class="text-center">', $row['instrument'],'</div></td>
                         <td><div class="text-center">', $row['student_email'],'</div></td>
                         <td><div class="text-center">', $row['parent_email'],'</div></td>
                         <td><div class="text-center">', $row['tuition_due'],'</div></td>
                         <td><div class="text-center">', $payment,'</div></td>
                         <td><div class="text-center">', $payment_due,'</div></td>
                         <td><div class="text-center">', $row['notes'],'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>
  <?php } else { ?>
  <div class="text-center">
    <h3>Please Select a Tab !</h3>
  </div>
  <?php } ?>
</div>