<style type="text/css">
  table td {
    white-space: nowrap;
  }
</style>

<div style="margin-top:50px;" class="mainbox col-md-12">

  <div class="row">

    <!-- Simple jQuery calls to switch out divs-->
    <a type="button" class="btn btn-primary" href="#" onClick="$('#teacher').hide(); $('#student').show()">Student</a>
    <a type="button" class="btn btn-primary" href="#" onClick="$('#student').hide(); $('#teacher').show()">Teacher</a>
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
                        <th>Starting Date</th>
                        <th>Enrolled</th>
                        <th>Notes</th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = $results->fetch_assoc()) {
                    echo '<tr>
                         <td><a href="edit-student-form.php?student=', $row['user_key'], '">
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
                         <td>', $row['starting_date'],'</td>
                         <td>', $row['enrolled'],'</td>
                         <td>', $row['notes'],'</td></tr>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
    </div>
  </div>

  <div id="teacher" style="display:none";class="table-responsive">
    <h3>Teachers</h3>
    <div class="col-md-3">
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

</div>
