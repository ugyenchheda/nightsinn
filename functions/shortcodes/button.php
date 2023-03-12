<?php

function button_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'link_url' => '',
			'type' => 'button1',
			'rounded' => '',
			'target' => '_parent',
			'background_color' => '',
			'text_color' => ''
		), $atts ) );

	switch($type) {
		case 'small': $type = 'button1'; break;
		case 'medium': $type = 'button4'; break;
		case 'large':
		case 'extra-large': $type = 'button5'; break;
	}

	if (!empty($background_color)) {
		if (!preg_match('/^#/', $background_color)) {
			$background_color = '#'.$background_color;
		}
	}
	if (!empty($text_color)) {
		if (!preg_match('/^#/', $text_color)) {
			$text_color = '#'.$text_color;
		}
	}
	
	ob_start(); ?><a target="<?php echo $target; ?>" href="<?php echo $link_url; ?>" class="<?php echo $type; ?> <?php echo !empty($rounded) ? 'rounded-button' : ''; ?>" <?php if (!empty($background_color) || !empty($text_color)) { ?>style="<?php echo !empty($background_color) ? 'background-color:'.$background_color.';' : ''; echo !empty($text_color) ? 'color:'.$text_color.';' : ''; ?>"<?php } ?>><?php echo $content; ?></a><div class="clearboth"></div><?php return ob_get_clean();
}

add_shortcode( 'button', 'button_shortcode' );

?>