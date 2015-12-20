
<style type="text/css">
  table td {
    white-space: nowrap;
  }
  textarea {
    resize: vertical;
    min-height: 400px;
  }
</style>

<div class="container">

  <div style="margin-top:10px;" class="mainbox col-md-12 text-center">

    <div class="row">
         <a type="button" class="btn btn-primary" href="admin.php?tab=users">Users</a>
         <a type="button" class="btn btn-primary" href="admin.php?tab=classes">Classes</a>
         <span class="btn-group">
         <button class="drop-down-btn dropdown-toggle" data-toggle="dropdown">Email  <span class="caret"></span></button>
         <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
           <li role="presentation"><a role="menuitem" href="admin.php?tab=email&option=class">Email by Class</a></li>
            <li role="presentation"><a role="menuitem" href="admin.php?tab=email&option=day">Email by Day of the Week</a></li>
            <li role="presentation"><a role="menuitem" href="admin.php?tab=email&option=orchestra">Email Orchestra</a></li>
            <li role="presentation"><a role="menuitem" href="admin.php?tab=email&option=band">Email Band</a></li>
            <li role="presentation"><a role="menuitem" href="admin.php?tab=email&option=student">Email Students</a></li>
            <li role="presentation"><a role="menuitem" href="admin.php?tab=email&option=teacher">Email Teachers</a></li>
          }
      </ul>
  </span>
    </div>


  <?php if($tab === 'users') {?>
    <div id="users" class="table-responsive">
      <h3>Users</h3>
      <div class="text-center">
        <table class="table table-striped text-center">
          <?php
            $link = connectDB();
            //output student table.
            $results = get_user_list();
            if(!$results) {
              echo "Database Error";
            }
            else {
              // table headers
                 echo '<thead><tr>';
                    echo '<th><div class="text-center"><a href="add-user-form.php">
                         <img class="table-icon" src="./res/image/add-user.png"></a></div></th>
                          <th><div class="text-center">Username</div></th>
                          <th><div class="text-center">Email</div></th>
                          <th><div class="text-center">Admin</div></th>
                          ';
                    echo '</tr></thead>';
                    echo '<tbody>';
                   //fill in rows with data
                   while($row = mysql_fetch_assoc($results)) {
                      echo '<tr>
                           <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete User?\',\'delete_user\',\'', $row['user_key'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>
                           <td><div class="text-center">', $row['username'],'</div></td>
                           <td><div class="text-center">', $row['email'],'</div></td>
                           <td><div class="text-center">', $row['admin'],'</div></td>
                          ';
                    }
                     echo '</tbody>';
                }
          ?>
        </table>
      </div>
    </div>
  </div>
<?php } else if($tab === 'classes') { ?>
    <div id="student" class="table-responsive">
    <div class="text-center">
      <h3>Classes</h3>
    </div>
    <table class="table table-striped text-center">
        <?php
                $link = connectDB();
          //output student table.
            $results = get_class_list();
            if(!$results) {
            echo "Database Error";
            }
          else {
            // table headers
                  echo '<thead><tr>';
                  echo '<th><div class="text-center"><a href="edit-class-form.php?class=new"">
                         <img class="table-icon" src="./res/image/add-record.png"></a></div></th>
                        <th></th>
                        <th><div class="text-center">Class Name</div></th>
                        <th><div class="text-center">Teacher Last Name</div></th>
                        <th><div class="text-center">Teacher First Name</div></th>
                        <th><div class="text-center">Teacher Pay Rate</div></th>
                        <th><div class="text-center">Total Number of Classes</div></th>
                        <th><div class="text-center">Day</div></th>
                        <th><div class="text-center">Semester</div></th>
                        <th><div class="text-center">Year</div></th>
                        ';
                  echo '</tr></thead>';
                  echo '<tbody>';
                 //fill in rows with data
                 while($row = mysql_fetch_assoc($results)) {
                      echo '<tr>
                         <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete Class?\',\'delete_class\',\'', $row['class'], '\')">
                           <img class="table-icon" src="./res/image/rm-record.png">
                           </a></div></td>
                        <td><div class="text-center"><a href="edit-class-form.php?class=', $row['class_id'], '">
                         <img class="table-icon" src="./res/image/edit.png"></a></div></td>
                         <td><div class="text-center">', $row['class_name'],'</div></td>
                         <td><div class="text-center">', $row['last_name'],'</div></td>
                         <td><div class="text-center">', $row['first_name'],'</div></td>
                         <td><div class="text-center">', $row['pay_rate'],'</div></td>
                         <td><div class="text-center">', $row['total_number'],'</div></td>
                         <td><div class="text-center">', $row['day'],'</div></td>
                         <td><div class="text-center">', $row['semester'],'</div></td>
                         <td><div class="text-center">', $row['year'],'</div></td>
                        </tr>'
                          ;
                  }
                   echo '</tbody>';
              }
        ?>
      </table>
  </div>
<?php } else if ($tab === 'email') {
                $option = $_GET['option'];
                if($option === 'class') { ?>
                         <br>
                         <br>

                         <div class="text-center">
                         <h4>Select a Class</h4>

                         <br>
                         <br>


                        <form class="form-horizontal" action="core/database/email.php?option=<?php echo $option; ?>" method="post" onsubmit="validate()">
                        <fieldset>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic"></label>
                        <div class="col-md-4">
                        <select id="selectbasic" name="selectbasic" class="form-control" required="">
                             <option value="" selected disabled>Select Class</option>
                        <?php
                                $link = connectDB();
                                $result = get_class_list();
                                while ($class_id = mysql_fetch_assoc($result)) { 
                                    echo '<option value="', $class_id['class_id'],'">',$class_id['class_name'] ,'</option>';
                                }
                        ?>
                        </select>                                                                              
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for="textarea"></label>
                        <div class="col-md-4">
                              <textarea class="form-control" id="textarea" name="message" placeholder="Email body goes here..."></textarea>
                        </div>
                        </div>

                        <div class="row text-center">
                        <input type="submit" class="btn btn-primary" value="Send Email" />
                        <a type="button" class="btn btn-primary" href="admin.php" value="Back">Back</a>
                        </div>

                        </fieldset>
                        </form>
                        </div>

                         <?php } else if($option === 'day'){ ?>
                         
                         <br>
                         <br>

                         <div class="text-center">
                         <h4>Select a Day of the Week</h4>

                         <br>
                         <br>

                        <form class="form-horizontal" action="core/database/email.php?option=<?php echo $option; ?>" method="post" onsubmit="validate()">
                        <fieldset>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic"></label>
                        <div class="col-md-4">
                        <select id="selectbasic" name="selectbasic" class="form-control" required="">
                                 <option value="" selected disabled>Select Day</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                        </select>
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for="textarea"></label>
                        <div class="col-md-4">
                              <textarea class="form-control" id="textarea" name="message" placeholder="Email body goes here..."></textarea>
                        </div>
                        </div>

                        <div class="row text-center">
                        <input type="submit" class="btn btn-primary" value="Send Email" />
                        <a type="button" class="btn btn-primary" href="admin.php" value="Back">Back</a>
                        </div>

                        </fieldset>
                        </form>
                        </div>                                                                                
                  <?php } else if($option === 'orchestra'){ ?>

                        <br>
                        <br>

                        <div class="text-center">
                         <h4>Email Orchesta Students</h4>

                         <br>
                         <br>

                        <form class="form-horizontal" action="core/database/email.php?option=<?php echo $option; ?>" method="post" onsubmit="validate()">
                        <fieldset>

                        <div class="form-group">
                         <label class="col-md-4 control-label" for="textarea"></label>
                        <div class="col-md-4">
                              <textarea class="form-control" id="textarea" name="message" placeholder="Email body goes here..."></textarea>
                        </div>
                        </div>

                        <div class="row text-center">
                        <input type="submit" class="btn btn-primary" value="Send Email" />
                        <a type="button" class="btn btn-primary" href="admin.php" value="Back">Back</a>
                        </div>

                        </fieldset>
                        </form>
                        </div>
                     <?php } else if($option === 'band'){ ?>
                        
                        <br>
                        <br>
                        
                        <div class="text-center">
                         <h4>Email Brass Band Students</h4>

                         <br>
                         <br>

                        <form class="form-horizontal" action="core/database/email.php?option=<?php echo $option; ?>" method="post" onsubmit="validate()">
                        <fieldset>

                        <div class="form-group">
                         <label class="col-md-4 control-label" for="textarea"></label>
                        <div class="col-md-4">
                              <textarea class="form-control" id="textarea" name="message" placeholder="Email body goes here..."></textarea>
                        </div>
                        </div>

                        <div class="row text-center">
                        <input type="submit" class="btn btn-primary" value="Send Email" />
                        <a type="button" class="btn btn-primary" href="admin.php" value="Back">Back</a>
                        </div>

                        </fieldset>
                        </form>
                        </div>
                     <?php } else if($option === 'student'){ ?>

                         <br>
                         <br>

                        <div class="text-center">
                         <h4>Email All Students</h4>

                         <br>
                         <br>

                        <form class="form-horizontal" action="core/database/email.php?option=<?php echo $option; ?>" method="post" onsubmit="validate()">
                        <fieldset>

                        <div class="form-group">
                         <label class="col-md-4 control-label" for="textarea"></label>
                        <div class="col-md-4">
                              <textarea class="form-control" id="textarea" name="message" placeholder="Email body goes here..."></textarea>
                        </div>
                        </div>

                        <div class="row text-center">
                        <input type="submit" class="btn btn-primary" value="Send Email" />
                        <a type="button" class="btn btn-primary" href="admin.php" value="Back">Back</a>
                        </div>

                        </fieldset>
                        </form>
                        </div>
                     <?php } else if($option === 'teacher'){ ?>

                         <br>
                         <br>

                        <div class="text-center">
                         <h4>Email All Teachers</h4>
                         
                         <br>
                         <br>
                        <form class="form-horizontal" action="core/database/email.php?option=<?php echo $option; ?>" method="post" onsubmit="validate()">
                        <fieldset>

                        <div class="form-group">
                         <label class="col-md-4 control-label" for="textarea"></label>
                        <div class="col-md-4">
                              <textarea class="form-control" id="textarea" name="message" placeholder="Email body goes here..."></textarea>
                        </div>
                        </div>

                        <div class="row text-center">
                        <input type="submit" class="btn btn-primary" value="Send Email" />
                        <a type="button" class="btn btn-primary" href="admin.php" value="Back">Back</a>
                        </div>

                        </fieldset>
                        </form>
                        </div>        
                    <?php } else {
                        echo '<br><h3>Please select an option from the Email button above!</h3>';               
                    }
    } else  {
      echo '<div class="text-center">';
      echo '<h3>Select a tab to get started!</h3>';
      echo '</div>';
}?>





