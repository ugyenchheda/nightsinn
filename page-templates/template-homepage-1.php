<?php
	
	/* 
	Template Name: Homepage 1
	*/

	//Display Header
	get_header();
	
	//Get Post ID
	global $wp_query; $post_id = $wp_query->post->ID;
	
	//Get Header Image
	$header_image = page_header(get_post_meta($post_id, 'qns_page_header_image_url', true));
	
	//Get Content ID/Class
	$content_id_class = content_id_class(get_post_meta($post_id, 'qns_page_sidebar', true));
	
	//Reset Query
	wp_reset_query();


/* ------------------------------------------------
	Display Slideshow
------------------------------------------------ */

if ($smof_data['slideshow_display']) { ?>

<!-- BEGIN #slider -->
<div id="slider">

	<?php if ($smof_data['homepage_slider']) { ?>

		<div class="slider">
			<ul class="slides">
				<?php $slides = $smof_data['homepage_slider']; ?>	
				<?php foreach ($slides as $slide) { ?>
					<li>
						<?php if ( $slide['link'] ) { echo '<a href="' . $slide['link'] . '" target="_blank" class="slide-link">'; } ?>
						<img src="<?php echo $slide['url']; ?>" alt="" />
						<?php if ( $slide['description'] ) { 
							echo '<div class="slider-caption-wrapper"><div class="slider-caption">' . $slide['description'] . '</div></div>'; 
						} ?>
						<?php if ( $slide['link'] ) { echo '</a>'; } ?>
					</li>
				<?php } ?>
			</ul>
		</div>

	<?php } else { ?>
		<p><?php _e('No Slides','qns'); ?></p>
	<?php }



/* ------------------------------------------------
	Display Slideshow Booking Form
------------------------------------------------ */

if(is_plugin_active('quitenicebooking/quitenicebooking.php')) {
	if ( $smof_data['display_slideshow_booking'] && empty($quitenicebooking->settings['hide_booking_system']) ) {echo do_shortcode("[booking_form]");}
} ?>

<!-- END #slider -->
</div>

<div class="content-wrapper clearfix">
	<?php the_content();?> 
</div>

<?php } else { ?>
	
<?php }



/* ------------------------------------------------
	Display Three Blocks
------------------------------------------------ */
?>

<!-- BEGIN .content-wrapper -->

<?php get_footer(); ?>