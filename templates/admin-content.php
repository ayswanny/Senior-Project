<style type="text/css">
  table td {
    white-space: nowrap;
  }
</style>

<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>

<div class="container">

  <div style="margin-top:50px;" class="mainbox col-md-12">
    
    <div id="users" class="table-responsive col-md-offset-1">
      <h3 class="col-md-offset-5">Users   </h3>
      <div class="col-md-3 col-md-offset-2">
        <table class="table table-striped">
          <?php

            //output student table.
            $results = get_user_list();
            if(!$results) {
              echo "Database Error";
            }
            else {
              // table headers
                    echo '<thead><tr>';
                    echo '<th></th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Admin</th>
                          ';
                    echo '</tr></thead>';
                    echo '<tbody>';
                   //fill in rows with data
                   while($row = $results->fetch_assoc()) {
                      echo '<tr>
                           <td><button id="close-image" onclick="Confirm.render(\'Delete User?\',\'delete_user\',\'', $row['user_key'], '\')">
                           <img src="./res/image/remove-user.png">
                           </button></td>
                           <td>', $row['username'],'</td>
                           <td>', $row['email'],'</td>
                           <td>', $row['admin'],'</td>
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