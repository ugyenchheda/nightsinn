<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="page-content search">
	<input type="text" onblur="if(this.value=='')this.value='<?php _e('Search...', 'qns'); ?>';" onfocus="if(this.value=='<?php _e('Search...', 'qns'); ?>')this.value='';" value="<?php _e('Search...', 'qns'); ?>" name="s" id="widget-search" class="text-input" />
</form>