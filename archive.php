<?php

	//Display Header
	get_header();
	
	//Get Post ID
	global $wp_query;
	$post_id = isset($wp_query->post->ID) ? $wp_query->post->ID : 0;
	
	//Get Header Image
	$header_image = page_header(get_post_meta($post_id, 'qns_page_header_image_url', true));
	
	//Get Content ID/Class
	$content_id_class = content_id_class(get_post_meta($post_id, 'qns_page_sidebar', true));
	
	//Reset Query
	wp_reset_query();
	
	if (is_category()) :
		$page_title = sprintf( __('All posts in: "%s"', 'qns'), single_cat_title('',false) );

	elseif (is_tag()) :
		$page_title = sprintf( __('All posts tagged: "%s"', 'qns'), single_tag_title('',false) );

	elseif ( is_author() ) :	
		$userdata = get_userdata($author);
		$page_title = sprintf( __('All posts by: "%s"', 'qns'), $userdata->display_name );

	elseif ( is_day() ) :
		$page_title = sprintf( __( 'Daily Archives: <span>%s</span>', 'qns' ), get_the_date() );
		
	elseif ( is_month() ) :
		$page_title = sprintf( __( 'Monthly Archives: <span>%s</span>', 'qns' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'qns' ) ) );
	
	elseif ( is_year() ) :
		$page_title = sprintf( __( 'Yearly Archives: <span>%s</span>', 'qns' ), get_the_date( _x( 'Y', 'yearly archives date format', 'qns' ) ) );
	
	else : 
		$page_title = __('Archives', 'qns');
	
	endif; ?>


<div id="page-header" <?php echo $header_image; ?>>
	<h2><?php echo $page_title; ?></h2>
</div>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper clearfix">

	<!-- BEGIN .main-content -->
	<div class="<?php echo $content_id_class; ?> page-content">

		<?php if ( have_posts() ) : ?>
			<ul class="article-category-col-2 clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop', 'style1' ); ?>
				<?php endwhile; ?>
			</ul>

			<?php load_template( get_template_directory() . '/includes/pagination.php' ); ?>

		<?php else : ?>
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'qns' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>

	<!-- END .main-content -->	
	</div>

	<?php get_sidebar(); ?>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>
