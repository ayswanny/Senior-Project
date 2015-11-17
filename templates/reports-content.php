<style type="text/css">
  table td {
    white-space: nowrap;
  }
  a.tooltip{
    position: relative;
    display: inline;
  }
</style>

<div style="margin-top:50px;" class="mainbox col-md-12 text-center">

  <div class="row">

    <!-- Simple jQuery calls to switch out divs-->
    <a type="button" class="btn btn-primary" href="#" onClick="<?php make_swap_code('#student',$mytabs); ?>">Student</a>
    <a type="button" class="btn btn-primary" href="#" onClick="<?php make_swap_code('#teacher',$mytabs); ?>">Teacher</a>
    <a type="button" class="btn btn-primary" href="#" onClick="<?php make_swap_code('#lessons',$mytabs); ?>">Lesson</a>
    <a type="button" class="btn btn-primary" href="#" onClick="<?php make_swap_code('#orchestra',$mytabs); ?>">Rowan Youth Orchestra</a>

  </div>

  <div <?php $my_id = "student"; make_div_line_code($my_id, $tab===$my_id); ?> class="table-responsive">
    <h3>Students</h3>
    <div class="text-center">
      <table class="table table-striped text-center">
        <?php

          //output student table.
          $results = get_student_list();
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-student-form.php?student=\"new\"">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                        <th><div class="text-center"></div></th>
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
                 while($row = $results->fetch_assoc()) {
                    echo '<tr>
                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Student?\',\'delete_student\',\'', $row['student_key'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>

                         <td><div class="text-center"><a href="student-timesheet.php?student=', $row['student_key'], '">
                         <img class="table-icon" src="./res/image/timesheet.png"></a></div></td>
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

  <div <?php $my_id = "teacher"; make_div_line_code($my_id, $tab===$my_id); ?> class="table-responsive">
    <h3>Teachers</h3>
    <div class="text-center">
      <table class="table table-striped text-center">
        <?php

          //out teachers table
          $results = get_teacher_list();
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
                 while($row = $results->fetch_assoc()) {

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

  <div <?php $my_id = "lessons"; make_div_line_code($my_id, $tab===$my_id); ?> class="table-responsive">
    <h3>Lessons</h3>
    <div class="text-center">
      <table class="table table-striped">
        <?php

          //out lessons table
          $results = get_lessons_list();
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
                        <th><div class="text-center">Tuition Due</div></th>
                        <th><div class="text-center">Tuition Paid</div></th>
                        <th><div class="text-center">Tuition Owed</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = $results->fetch_assoc()) {
                    $tmp_student_name = get_student_name($row['student']); // call to get student names
                    $student_name = $tmp_student_name->fetch_assoc();

                    $tmp_teacher_name = get_teacher_name($row['teacher']); // call to get teacher names
                    $teacher_name = $tmp_teacher_name->fetch_assoc();

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
                         <td><div class="text-center">', $row['tuition_due'],'</div></td>
                         <td><div class="text-center">', $row['tuition_paid'],'</div></td>
                         <td><div class="text-center">', $row['tuition_owed'],'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>

  <div <?php $my_id = "orchestra"; make_div_line_code($my_id, $tab===$my_id); ?> class="table-responsive">
    <h3>Rowan Youth Orchestra</h3>
    <div class="text-center">
      <table class="table table-striped">
        <?php

          //out lessons table
          $results = get_orchestra_list();
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
                        <th><div class="text-center">Paid Check</div></th>
                        <th><div class="text-center">Check Numbers</div></th>
                        <th><div class="text-center">Paid Card</div></th>
                        <th><div class="text-center">Payment Date</div></th>
                        <th><div class="text-center">Tuition Due</div></th>
                        <th><div class="text-center">Tuition Paid</div></th>
                        <th><div class="text-center">Tuition Owed</div></th>
                        <th><div class="text-center">Notes</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = $results->fetch_assoc()) {

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
                         <td><div class="text-center">', $row['paid_check'],'</div></td>
                         <td><div class="text-center">', $row['check_number'],'</div></td>
                         <td><div class="text-center">', $row['paid_card'],'</div></td>
                         <td><div class="text-center">', $row['payment_date'],'</div></td>
                         <td><div class="text-center">', $row['tuition_due'],'</div></td>
                         <td><div class="text-center">', $row['tuition_paid'],'</div></td>
                         <td><div class="text-center">', $row['tuition_owed'],'</div></td>
                         <td><div class="text-center">', $row['notes'],'</div></td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>


</div>