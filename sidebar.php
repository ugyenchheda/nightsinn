<?php

global $smof_data; //fetch options stored in $smof_data
	if (is_page_template('page-templates/template-left-sidebar.php') ) {
		echo '<div class="sidebar left-sidebar">';
			dynamic_sidebar( 'primary-widget-area' );
		echo '</div>';
	} 
	elseif (is_page_template('page-templates/template-right-sidebar.php') ) {
		echo '<div class="sidebar right-sidebar">';
			dynamic_sidebar( 'primary-widget-area' );
		echo '</div>';
	} 
	elseif (is_page_template('template-full-width.php') ) {
		echo '';
	}
	elseif ($smof_data['sidebar_position']) {
		$position = $smof_data['sidebar_position'];

		if ( $position == 'left' or is_page_template('page-templates/template-left-sidebar.php') ) {
			echo '<div class="sidebar left-sidebar">';
				dynamic_sidebar( 'primary-widget-area' );
			echo '</div>';
		} 
		elseif ( $position == 'right' or is_page_template('page-templates/template-right-sidebar.php') ) {
			echo '<div class="sidebar right-sidebar">';
				dynamic_sidebar( 'primary-widget-area' );
			echo '</div>';
		} 
		elseif ( $position == 'none' or is_page_template('template-full-width.php') ) {
			echo '';
		}
	}
	else { 
		echo '<div class="sidebar right-sidebar">';
			dynamic_sidebar( 'primary-widget-area' );
		echo '</div>';
	}
?>
