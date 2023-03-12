<?php global $smof_data; ?>
						
<?php /* Only display widget area if widgets are placed in it */ 
if ( is_active_sidebar('footer-widget-area') ) { ?>
	
	<?php if ( is_page_template('page-templates/template-homepage-2.php') ) { ?>
		<div id="footer" class="footer-full">
	<?php } else { ?>
		<div id="footer">
	<?php } ?>
							
	<!-- BEGIN .content-wrapper -->
	<div class="content-wrapper clearfix">
							
<?php } else { ?>
						
	<?php if ( is_page_template('page-templates/template-homepage-2.php') ) { ?>
		<div id="footer" class="footer-full footer-no-widgets">
	<?php } else { ?>
		<div id="footer" class="footer-no-widgets">
	<?php } ?>
							
	<!-- BEGIN .content-wrapper -->
	<div class="content-wrapper clearfix">
							
<?php } ?>
					
<?php if ( is_active_sidebar('footer-widget-area') ) { ?>	
	<?php dynamic_sidebar( 'footer-widget-area' ); ?>
<?php } ?>
					
<div class="clearboth"></div>
					
<!-- BEGIN #footer-bottom -->

			
<!-- END #footer -->
</div>
<div id="footer-bottom" class="clearfix">
				
	<?php if( $smof_data['footer_msg'] ) { ?>
		<p class="fl"><?php _e($smof_data['footer_msg'],'qns'); ?></p>
	<?php } ?>

	<!-- Footer Navigation -->
	<?php wp_nav_menu( array(
		'theme_location' => 'footer',
		'container' =>false,
		'items_wrap' => '<ul class="fr">%3$s</ul>',
		'fallback_cb' => false,
		'echo' => true,
		'before' => '',
		'after' => '<span>/</span>',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0 )
	); ?>
				
<!-- END #footer-bottom -->
</div>

<?php wp_footer(); ?>

<!-- END body -->
</body>
</html>