<?php
	
	if ( is_post_type( "testimonial" )) {
		load_template(get_template_directory().'/single-testimonial.php');
	}
	
	elseif ( is_post_type( "accommodation" )) {
		load_template(get_template_directory().'/single-accommodation.php');
	}
	
	elseif ( is_post_type( "event" )) {
		load_template(get_template_directory().'/single-event.php');
	}

	elseif ( is_post_type( "booking" )) {
		load_template(get_template_directory().'/single-booking.php');
	}

	else {
		load_template(get_template_directory().'/single-default.php');
	}

?>