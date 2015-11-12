<?php
require '../init.php';

/*
There are 2 cases, logged out and logged in.
*/
function _test_logged_in() {
  //Force a log out
  session_start();
  session_destroy();

  //result1 is logged out
  $result1 = logged_in();
  //result2 is a manually logged in session
  $_SESSION['id']=1;
  $result2 = logged_in();

  //Test logged out
  if($result === false){
    echo 'Test case:\'logged out\' succeeded';
  } else{
    echo 'Test case:\'logged out\' failed';
  }

  //Test logged in
  if ($result2 ===true){
    echo 'Test case:\'logged in\' succeeded';
  } else{
    echo 'Test case:\'logged in\' failed';
  }
}

/*
There are cases, is and admin, and is not an admin.
*/
function _test_isAdmin(){
  //The user with user_key '1' is known to be an admin
  $userID1=1;
  //the user with user_key '4' is known to not be an admin
  $userID2=4;

  //Test is an admin
  if(isAdmin($userID1)){
    echo 'Test Case: \'Is an admin\' succeeded';
  } else{
    echo 'Test Case: \'Is an admin\' failed';
  }

  //Test is not an admin
  if(!isAdmin($userID2)){
    echo 'Test Case: \'Is an admin\' succeeded';
  } else{
    echo 'Test Case: \'Is an admin\' failed';
  }
}

/*
There are 2 cases, user exists, and user does not exist.
*/
function _test_user_exists(){
  //The username 'swanso52' is known to exist
  $user1 = 'swanso52';
  //The username 'qwertyuiop123' is known to not exist
  $user2 = 'qwertyuiop123';

  //Test user exists
  if(user_exists($user1)){
    echo 'Test Case: \'User exists\' succeeded';
  } else {
    echo 'Test Case: \'User exists\' failed';
  }

  //Test user does not exist
  if(!user_exists($user2)){
    echo 'Test Case: \'User does not exist\' succeeded';
  } else {
    echo 'Test Case: \'User does not exist\' failed';
  }
}

/*
There are 3 cases, first, middle, last
May want to check oob as well
*/
function _test_get_user_id(){
  //First in the table
  $username1 = 'swanso52';
  //Near middle of table
  $username2 = 'jasper00';
  //Last in table
  $username3 = 'notadmin';

  //Test first in table
  if(get_user_id($username1) == 1){
    echo 'Test case:\'First in table\' succeeded';
  } else{
    echo 'Test case:\'First in table\' failed';
  }

  //Test middle of table
  if(get_user_id($username2) == 3){
    echo 'Test case:\'Middle of table\' succeeded';
  } else{
    echo 'Test case:\'Middle of table\' failed';
  }

  //Test end of table
  if(get_user_id($username3) == 4){
    echo 'Test case:\'\' succeeded';
  } else{
    echo 'Test case:\'\' failed';
  }
}

/*
There are 3 cases, correct username and pass, correct username and incorrect pass, and incorrect username
The tests will check to make sure it returns the correct user_key and flase otherwise
*/
function _test_login(){
  //Test with both correct
  if(login('jasper00','qweasdzxc') == 3){
    echo 'Test case:\'User and Pass correct\' succeeded';
  } else{
    echo 'Test case:\'User and Pass correct\' failed';
  }
  //Test with proper username and incorrect pass
  if(login('jasper00','incorrect') == false){
    echo 'Test case:\'User correct, Pass incorrect\' succeeded';
  } else{
    echo 'Test case:\'User correct, Pass incorrect\' failed';
  }

  //Test with wrong username
  if(login('qwertyuiop123','password') == false){
    echo 'Test case:\'Incorrect username\' succeeded';
  } else{
    echo 'Test case:\'Incorrect username\' failed';
  }
}

/*
There are several cases depending on where the dashes are.
Only 3 common ones will be tested. Dashes with area code, dashes without area code, no dashes at all
*/
function _test_store_phone(){
  //Test Dashes w/ area code
  if(store_phone('123-456-7890') == '1234567890'){
    echo 'Test case:\'Dashes with area code\' succeeded';
  } else{
    echo 'Test case:\'Dashes with area code\' failed';
  }

  //Test Dashes without area code
  if(store_phone('456-7890') == '4567890'){
    echo 'Test case:\'Dashes without area code\' succeeded';
  } else{
    echo 'Test case:\'Dashes without\' failed';
  }

  //Test no dashes
  if (store_phone('1234567890') == '1234567890'){
    echo 'Test case:\'No dashes\' succeeded';
  } else{
    echo 'Test case:\'No dashes\' failed';
  }
}

/*
Only 2 cases because data is from DB and is correct there. With area code, without area code.
*/
function _test_display_phone(){
  //Test with area code.
  if(display_phone('1234567890') == '(123) 456-7890'){
    echo 'Test case:\'With area code\' succeeded';
  } else{
    echo 'Test case:\'With area code\' failed';
  }

  //Test without area code.
  if(display_phone('4567890') == '456-7890'){
    echo 'Test case:\'Without area code\' succeeded';
  } else{
    echo 'Test case:\'Without area code\' failed';
  }
}

/*
Test against a known student's data
*/
function _test_get_student_list() {
  $results = get_student_list();
  $bool = true;
  //Test known student
  $row = $results->fetch_assoc();
  if($row['last_name'] != 'swanson') {
    $bool=false;
    echo 'Test failed, last name mismatch';
  } else if($row['first_name'] != 'austen' and $bool) {
    $bool=false;
    echo 'Test failed, first name mismatch';
  }else if($row['parent'] != 'mona' and $bool) {
    $bool=false;
    echo 'Test failed, parent mismatch';
  }else if($row['dob'] != '1992-03-03' and $bool) {
    $bool=false;
    echo 'Test failed, DOB mismatch';
  }else if($row['teacher'] != 'mr. pickle' and $bool) {
    $bool=false;
    echo 'Test failed, teacher mismatch';
  }else if($row['instrument'] != 'fiddle' and $bool) {
    $bool=false;
    echo 'Test failed, instrument mismatch';
  }else if($row['classes'] != 'brass' and $bool) {
    $bool=false;
    echo 'Test failed, classes mismatch';
  }else if($row['ensembles'] != 'jazzy' and $bool) {
    $bool=false;
    echo 'Test failed, ensembles mismatch';
  }else if($row['events'] != 'orchestra' and $bool) {
    $bool=false;
    echo 'Test failed, events mismatch';
  }else if($row['photo_release'] != 'Y' and $bool) {
    $bool=false;
    echo 'Test failed, photo release mismatch';
  }else if($row['progress_report_date'] != '2015-12-05' and $bool) {
    $bool=false;
    echo 'Test failed, progress report date mismatch';
  }else if($row['street_address'] != '99 red balloons ct' and $bool) {
    $bool=false;
    echo 'Test failed, street address mismatch';
  }else if($row['city'] != 'glassboro' and $bool) {
    $bool=false;
    echo 'Test failed, city mismatch';
  }else if($row['state'] != 'NJ' and $bool) {
    $bool=false;
    echo 'Test failed, state mismatch';
  }else if($row['zip_code'] != '08028' and $bool) {
    $bool=false;
    echo 'Test failed, zip code mismatch';
  }else if($row['home_phone'] != '8565555555' and $bool) {
    $bool=false;
    echo 'Test failed, home phone mismatch';
  }else if($row['mobile_phone'] != '8565555555' and $bool) {
    $bool=false;
    echo 'Test failed, mobile phone mismatch';
  }else if($row['work_phone'] != '8565555555' and $bool) {
    $bool=false;
    echo 'Test failed, work phone mismatch';
  }else if($row['preferred_phone'] != '8565555555' and $bool) {
    $bool=false;
    echo 'Test failed, preferred phone mismatch';
  }else if($row['parent_email'] != 'email@email.com' and $bool) {
    $bool=false;
    echo 'Test failed, parent email mismatch';
  }else if($row['student_email'] != 'email@email.com' and $bool) {
    $bool=false;
    echo 'Test failed, student email mismatch';
  }else if($row['starting_date'] != '2015-04-03' and $bool) {
    $bool=false;
    echo 'Test failed, starting date mismatch';
  }else if($row['enrolled'] != 'Y' and $bool) {
    $bool=false;
    echo 'Test failed, enrolled mismatch';
  }else if($row['notes'] != 'hello' and $bool) {
    $bool=false;
    echo 'Test failed, notes mismatch';
  }else if($row['student_key'] != 1 and $bool) {
    $bool=false;
    echo 'Test failed, student key mismatch';
  }else{
    echo 'Test succeeded. Student is a match.'
  }
}

?>
