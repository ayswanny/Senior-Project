<form action="core/database/change-password.php" class="form-horizontal" method="post" onsubmit="validate()">

	<!-- Form Name -->
  <legend><div class="row text-center">Change Account Passowrd</div></legend>
  <?php
	if($missmatch == 1) {
		      echo '<p style="font-color: red;">MISMATCH PASSWORDS TRY AGAIN</p>';
	}
  ?>
  <!-- Text input-->
  <form class="form-horizontal">
  <fieldset>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Current Password</label>
    <div class="col-md-5">
    <input id="textinput" name="current-password" type="text" value="" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">New Password</label>
    <div class="col-md-5">
    <input id="textinput" name="password" type="text" value="" class="form-control input-md" required="">

    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Re-type New Password</label>
    <div class="col-md-5">
    <input id="textinput" name="password-match" type="text" value="" class="form-control input-md" required="">

    </div>
  </div>
  


<div class="row text-center">
    <input type="submit" class="btn btn-primary" value="Save" />
     <a type="button" class="btn btn-primary" href="index.php" value="Back">Back</a>
  </div>
 

</fieldset>
</form> 