<?php

	function make_swap_code($show_this_one, $tabs)
	{
		foreach ($tabs as $key => $value) {
			if ($key !== $show_this_one) {
				echo "$('$key').hide();";
			}
		}
		echo "$('$show_this_one').show();";
	}

	function make_show_all_tabs_code($tabs)
	{
		foreach ($tabs as $key => $value) {
			echo "$('$key').show();";
		}
	}

	// html

	function make_div_line_code($value, $show)
	{	

		echo "id='$value' ".(($show)?(""):("style='display:none;'"));
	}
	
?>