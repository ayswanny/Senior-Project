<style type="text/css">
  table td {
    white-space: nowrap;
  }
</style>

<div style="margin-top:50px;" class="mainbox col-md-12">

  <div class="row">

    <!-- Simple jQuery calls to switch out divs-->
    <a type="button" class="btn btn-primary" href="#" onClick="$('#teacher').hide();
                                                               $('#lessons').hide();
                                                               $('#orchestra').hide();
                                                               $('#student').show()">Student</a>
    <a type="button" class="btn btn-primary" href="#" onClick="$('#student').hide();
                                                               $('#lessons').hide();
                                                               $('#orchestra').hide();
                                                               $('#teacher').show()">Teacher</a>
    <a type="button" class="btn btn-primary" href="#" onClick="$('#teacher').hide();
                                                               $('#student').hide();
                                                               $('#orchestra').hide();
                                                               $('#lessons').show()">Lessons</a>
    <a type="button" class="btn btn-primary" href="#" onClick="$('#teacher').hide();
                                                               $('#student').hide();
                                                               $('#lessons').hide()
                                                               $('#orchestra').show();">Rowan Youth Orchestra</a>

  </div>

  <div id="student" class="table-responsive">
    <h3>Students</h3>
    <div class="col-md-3">
      <table class="table table-striped">
        <?php

          //output student table.
          $results = get_student_list();
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><a href="edit-student-form.php?student=\"new\"">
                         <img class="table-icon" src="./res/image/plus.png"></a></th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Parent</th>
                        <th>Date of Birth</th>
                        <th>Teacher</th>
                        <th>Instrument</th>
                        <th>Classes</th>
                        <th>Ensembles</th>
                        <th>Events</th>
                        <th>Photo Release</th>
                        <th>Progress Report Date</th>
                        <th>Street Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip Code</th>
                        <th>Home Phone</th>
                        <th>Mobile Phone</th>
                        <th>Work Phone</th>
                        <th>Preferred Phone</th>
                        <th>Parent Email</th>
                        <th>Student Email</th>
                        <th>Enrolled</th>
                        <th>Currently Enrolled</th>
                        <th>Notes</th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = $results->fetch_assoc()) {
                    echo '<tr>
                         <td><button id="close-image" onclick="Confirm.render(\'Delete Student?\',\'delete_student\',\'', $row['student_key'], '\')">
                           <img src="./res/image/remove-user.png">
                           </button></td>
                         <td><a href="edit-student-form.php?student=', $row['student_key'], '">
                         <img src="./res/image/edit.png"></a></td>
                         <td>', $row['last_name'],'</td>
                         <td>', $row['first_name'],'</td>
                         <td>', $row['parent'],'</td>
                         <td>', $row['dob'],'</td>
                         <td>', $row['teacher'],'</td>
                         <td>', $row['instrument'],'</td>
                         <td>', $row['classes'],'</td>
                         <td>', $row['ensembles'],'</td>
                         <td>', $row['events'],'</td>
                         <td>', $row['photo_release'],'</td>
                         <td>', $row['progress_report_date'],'</td>
                         <td>', $row['street_address'],'</td>
                         <td>', $row['city'],'</td>
                         <td>', $row['state'],'</td>
                         <td>', $row['zip_code'],'</td>
                         <td>', display_phone($row['home_phone']),'</td>
                         <td>', display_phone($row['mobile_phone']),'</td>
                         <td>', display_phone($row['work_phone']),'</td>
                         <td>', display_phone($row['preferred_phone']),'</td>
                         <td>', $row['parent_email'],'</td>
                         <td>', $row['student_email'],'</td>
                         <td>', $row['enrolled'],'</td>
                         <td>', $row['currently_enrolled'],'</td>
                         <td>', $row['notes'],'</td></tr>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>

  <div id="teacher" style="display:none"; class="table-responsive">
    <h3>Teachers</h3>
    <div class="col-md-3 offset-md-3">
      <table class="table table-striped">
        <?php

          //out teachers table
          $results = get_teacher_list();
          if(!$results) {
            echo "Database Error";
          }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><a href="edit-teacher-form.php?teacher=','new','">
                         <img class="table-icon" src="./res/image/plus.png"></a></th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Banner ID</th>
                        <th>Faculty Status</th>
                        <th>Instrument</th>
                        <th>Backround Check</th>
                        <th>Home Phone</th>
                        <th>Mobile Phone</th>
                        <th>Email</th>
                        <th>Alternate Email</th>
                        <th>Street Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip Code</th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = $results->fetch_assoc()) {

                    echo '<tr>
                         <td><button id="close-image" onclick="Confirm.render(\'Delete Teacher?\',\'delete_teacher\',\'', $row['teacher_key'], '\')">
                         <img src="./res/image/remove-user.png">
                         </button></td>
                         <td><a href="edit-teacher-form.php?teacher=', $row['teacher_key'], '">
                         <img src="./res/image/edit.png"></a></td>
                         <td>', $row['last_name'],'</td>
                         <td>', $row['first_name'],'</td>
                         <td>', $row['banner_id'],'</td>
                         <td>', $row['faculty_status'],'</td>
                         <td>', $row['instrument'],'</td>
                         <td>', $row['background_check'],'</td>
                         <td>', display_phone($row['home_phone']),'</td>
                         <td>', display_phone($row['mobile_phone']),'</td>
                         <td>', $row['email'],'</td>
                         <td>', $row['alternate_email'],'</td>
                         <td>', $row['street_address'],'</td>
                         <td>', $row['city'],'</td>
                         <td>', $row['state'],'</td>
                         <td>', $row['zip_code'],'</td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>

  <div id="lessons" style="display:none";class="table-responsive">
    <h3>Lessons</h3>
    <div class="col-md-3">
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
                  echo '<th><a href="edit-lessons-form.php?lesson=','new','">
                         <img class="table-icon" src="./res/image/plus.png"></a></th>
                        <th>Student Last Name</th>
                        <th>Student First Name</th>
                        <th>Teacher Last Name</th>
                        <th>Teacher First Name</th>
                        <th>Teacher Type</th>
                        <th>Duration</th>
                        <th>Day</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Instrument</th>
                        <th>Tuition Due</th>
                        <th>Tuition Paid</th>
                        <th>Tuition Owed</th>
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
                         <td><button id="close-image" onclick="Confirm.render(\'Delete Lesson?\',\'delete_lesson\',\'', $row['lesson_key'], '\')">
                         <img src="./res/image/remove-user.png">
                         </button></td>
                         <td><a href="edit-lessons-form.php?lesson=', $row['lesson_key'], '">
                         <img src="./res/image/edit.png"></a></td>
                         <td>', $student_name['last_name'],'</td>
                         <td>', $student_name['first_name'],'</td>
                         <td>', $teacher_name['last_name'],'</td>
                         <td>', $teacher_name['first_name'],'</td>
                         <td>', $row['teacher_type'],'</td>
                         <td>', $row['duration'],' minutes</td>
                         <td>', $row['day'],'</td>
                         <td>', $row['semester'],'</td>
                         <td>', $row['year'],'</td>
                         <td>', $row['instrument'],'</td>
                         <td>', $row['tuition_due'],'</td>
                         <td>', $row['tuition_paid'],'</td>
                         <td>', $row['tuition_owed'],'</td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>

  <div id="orchestra" style="display:none";class="table-responsive">
    <h3>Lessons</h3>
    <div class="col-md-3">
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
                  echo '<th><a href="edit-orchestra-form.php?orchestra=','new','">
                         <img class="table-icon" src="./res/image/plus.png"></a></th>
                        <th>Student Last Name</th>
                        <th>Student First Name</th>
                        <th>Intrument</th>
                        <th>Email</th>
                        <th>Parent Email</th>
                        <th>RYO Form</th>
                        <th>Paid Check</th>
                        <th>Check Numbers</th>
                        <th>Paid Card</th>
                        <th>Payment Date</th>
                        <th>Tuition Due</th>
                        <th>Tuition Paid</th>
                        <th>Tuition Owed</th>
                        <th>Notes</th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = $results->fetch_assoc()) {

                  $tmp_student_info = get_student_info($row['student']); // call to get student names
                  $student_info = $tmp_student_info->fetch_assoc();

                    echo '<tr>
                         <td>
                         <td><button id="close-image" onclick="Confirm.render(\'Delete Orchestra Entry?\',\'delete_orchestra\',\'', $row['registration_key'], '\')">
                           <img src="./res/image/remove-user.png">
                           </button></td>
                         <a href="edit-orchestra-form.php?orchestra=', $row['registration_key'], '">
                         <img src="./res/image/edit.png"></a></td>
                         <td>', $student_info['last_name'],'</td>
                         <td>', $student_info['first_name'],'</td>
                         <td>', $row['instrument'],'</td>
                         <td>', $student_info['student_email'],'</td>
                         <td>', $student_info['parent_email'],'</td>
                         <td>', $row['ryo_form'],'</td>
                         <td>', $row['paid_check'],'</td>
                         <td>', $row['check_number'],'</td>
                         <td>', $row['paid_card'],'</td>
                         <td>', $row['payment_date'],'</td>
                         <td>', $row['tuition_due'],'</td>
                         <td>', $row['tuition_paid'],'</td>
                         <td>', $row['tuition_owed'],'</td>
                         <td>', $row['notes'],'</td>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>


</div>
