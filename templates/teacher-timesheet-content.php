<style type="text/css">
	table td {
		white-space: nowrap;
	}
</style>


<?php 
	$db = connectDB();
	if(isset($_GET['teacher'])) {
		$teacher = clean_up($_GET['teacher']);
	}
	else {
		header('Location: ../reports.php');
	}
	// $sql_lessons = 	"SELECT st.first_name AS student_first_name, st.last_name AS student_last_name, te.first_name, te.last_name, el.tuition_due, el.tuition_paid, el.tuition_owed, el.instrument, el.duration FROM lessons el " .
	// 				"JOIN students st ON el.student = st.student_key JOIN teachers te ON el.teacher = te.teacher_key WHERE te.teacher_key = $teacher";

	


?>



<div class="mainbox col-md-12" >
	
	<input type="button" class="btn btn-lg btn-primary" onclick="history.back();" value="Back">

	<div id="timesheet" class="table-responsive">  
		<h3>Timesheet</h3>
		<table class="table table-striped">

			<?php

				if ($results = get_teacher_timesheet($teacher)) {
				} else {
					echo mysql_error ();
					die();
				}

				$columns = array(
					1 => "Student", 
					2 => "Total Lessons",
					3 => "Pay Rate",
					4 => "Payout Now",
					5 => "Total");
					
				$fields = array(
					1 => "student_name", 
					2 => "total_lessons",
					3 => "pay_rate");

				$pay_fields = array(
					1 => "student_first_name", 
					2 => "student_last_name", 
					8 => "amount_paid");

				echo '<thead><tr>';
				echo '<th></th>';
				foreach ($columns as $key => $value) {
					echo "<th>$columns[$key]</th>";
					# code...
				}
				echo '</tr></thead>';
                echo '<tbody>';
                //fill in rows with data
                while($row = mysql_fetch_assoc ( $results )) {
                	echo '<tr>';
                	echo '<td></td>';
	                foreach ($fields as $key => $value) {
	                	echo "<td>$row[$value]</td>";
	                }
	                echo '<td><select id="selectbasic" name="total_lessons" class="form-control">';
                      
                      for ($tmp_int=1; $tmp_int < $row['total_lessons']; $tmp_int++) { 
                      	if($row['total_lessons'] === $tmp_int) {
			             echo '<option value="', $tmp_int,'" selected>', $tmp_int,'</option>';
			            }
			            else {
			             echo '<option value="', $tmp_int,'">', $tmp_int,'</option>';
			            }
                      }
			        echo '</select></td>';
	                echo "</tr>";
	            }

	            $sumresult = mysql_query("SELECT SUM(el.tuition_due),SUM(ps.amount_paid) FROM lessons el JOIN payments ps ON el.lesson_key = ps.lesson WHERE el.teacher = $teacher");
	            
	            $sumrow =  mysql_fetch_assoc($sumresult);

				echo '<tr>';
            	echo '<td></td>';
                foreach ($fields as $key => $value) {
                	$tmp = "SUM($value)";
                	if ($key >= 7 and $key <= 9) {
                		echo "<td>". $sumrow[$tmp] ."</td>";	
                	} else {
                		echo "<td></td>";
                	}
                	
                }
                echo "</tr>";

	            echo "</tbody>";

			?>
		</table>

	</div>

	
</div>


