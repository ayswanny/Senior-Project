<?php

	function make_swap_code($show_this_one, $tabs)
	{
		foreach ($tabs as $key => $value) {
			if ($key !== $show_this_one) {
				echo "$('$key').hide();";
			}
			# code...
		}
		echo "$('$show_this_one').show();";
		// for ($index=0; $index < count($tabs); $index++) { 

		// 	# code...
		// }
		# code...
	}

	function make_show_all_tabs_code($tabs)
	{
		foreach ($tabs as $key => $value) {
			echo "$('$key').show();";
		}
	}
	
?>