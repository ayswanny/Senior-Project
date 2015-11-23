<style type="text/css">
  table td {
    white-space: nowrap;
  }
</style>


<div class="container">

  <div style="margin-top:50px;" class="mainbox col-md-12 text-center">
    
    <div id="users" class="table-responsive">
      <h3>Users</h3>
      <div class="text-center">
        <table class="table table-striped text-center">
          <?php

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
                   while($row = $results->fetch_assoc()) {
                      echo '<tr>
                           <td><div class="text-center"><a href="#" onclick="Confirm.render(\'Delete User?\',\'delete_user\',\'', $row['user_key'], '\')">
                           <img class="table-icon" src="./res/image/rm-user.png">
                           </a></div></td>
                           <td><div class="text-center">', $row['username'],'</div></td>
                           <td><div class="text-center">', $row['email'],'</div></td>
                           <td><div class="text-center">', $row['admin'],'</div></td>
                          '
                            ;
                    }
                     echo '</tbody>';
                }
          ?>
        </table>
      </div>
    </div>
  </div>