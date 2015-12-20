<?php

   require_once '../init.php';
   
   $link = connectDB();
   $results = get_class_payment(3, 1, 1);
   $row = mysql_fetch_assoc($results);
   var_dump($row);
/*
   $results = get_student_list();
   echo "here we go";
   if(isEmpty($results) {
   	echo 'could not retrieve';
   }
   else {
   	echo 'it isn't empty';
   	while($row = $results->fetch()){
		   echo $row['first_name'] . '<br>';
	}
   }*/
   echo 'hi';
?>
