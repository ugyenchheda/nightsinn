<?php
	get_header();
	global $wp_query;
	$post_id = isset($wp_query->post->ID) ? $wp_query->post->ID : 0;
	$header_image = page_header(get_post_meta($post_id, 'qns_page_header_image_url', true));
	$content_id_class = content_id_class(get_post_meta($post_id, 'qns_page_sidebar', true));
	wp_reset_query();
	
?>
<div id="page-header" <?php echo $header_image; ?>>
	<h2><?php _e('Search Results','qns'); ?></h2>
</div>
<div class="content-wrapper clearfix">
	<div class="<?php echo $content_id_class; ?> page-content">
		<?php if (have_posts()) : ?>
			<h3 class="title-style1">
				<?php _e('Pages','qns') ?>
				<span class="title-block"></span>
			</h3>
			<ol class="search-results-list">
			<?php 
				$i = 0;
				while (have_posts()) : the_post(); 

					if( get_post_type() !== 'post' and get_post_type() !== 'event' ) { 
						$i++; ?>

						<li><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong><br /> <?php print_excerpt(100); ?></li>
					<?php }
				endwhile;?>
				<?php if( $i == 0 ) { ?><li><?php _e( 'No results were found.', 'qns' ); ?></li><?php } ?>
			</ol>
			<hr class="space1">
			<h3 class="title-style1">
				<?php _e('Blog','qns') ?>
				<span class="title-block"></span>
			</h3>
			<ol class="search-results-list">
			<?php 
				$i = 0;
				while (have_posts()) : the_post(); 

					if( get_post_type() == 'post' ) { 
						$i++; ?>

						<li><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong><br /> <?php print_excerpt(250); ?></li>
					<?php }
				endwhile;?>

				<?php if( $i == 0 ) { ?><li><?php _e( 'No results were found.', 'qns' ); ?></li><?php } ?>
			</ol>
			<hr class="space1">
			<h3 class="title-style1">
				<?php _e('Events','qns') ?>
				<span class="title-block"></span>
			</h3>
			<ol class="search-results-list">
			<?php 
				$i = 0;
				while (have_posts()) : the_post();
					if( get_post_type() == 'event' ) {
						$i++; ?>
	                    <li><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong><br /> <?php print_excerpt(250); ?></li>
					<?php }
		 		endwhile;?>
				<?php if( $i == 0 ) { ?><li><?php _e( 'No results were found.', 'qns' ); ?></li><?php } ?>
			</ol>
			<hr class="space1">
			<h3 class="title-style1">
				<?php _e('Accommodation','qns') ?>
				<span class="title-block"></span>
			</h3>
			<ol class="search-results-list">
			<?php 
				$i = 0;
				while (have_posts()) : the_post();

					if( get_post_type() == 'accommodation' ) {
						$i++; ?>

	                    <li><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong><br /> <?php print_excerpt(250); ?></li>
					<?php }
		 		endwhile;?>
				<?php if( $i == 0 ) { ?><li><?php _e( 'No results were found.', 'qns' ); ?></li><?php } ?>

			<!--END .search-results-list -->
			</ol>
			<?php // Include Pagination feature
			load_template( get_template_directory() . '/includes/pagination.php' );
			?>
		<?php else : ?>
			<h3 class="title-style1">
				<?php _e('Pages','qns') ?>
				<span class="title-block"></span>
			</h3>
			<!--BEGIN .search-results-list -->
			<ol class="search-results-list">
				<li><?php _e( 'No results were found.', 'qns' ); ?></li>
			</ol>
			<hr class="space1">
			<h3 class="title-style1">
				<?php _e('Blog','qns') ?>
				<span class="title-block"></span>
			</h3>

			<!--BEGIN .search-results-list -->
			<ol class="search-results-list">
				<li><?php _e( 'No results were found.', 'qns' ); ?></li>
			</ol>
			<hr class="space1">
			<h3 class="title-style1">
				<?php _e('Events','qns') ?>
				<span class="title-block"></span>
			</h3>
			<!--BEGIN .search-results-list -->
			<ol class="search-results-list">
				<li><?php _e( 'No results were found.', 'qns' ); ?></li>
			</ol>
			<hr class="space1">
			<h3 class="title-style1">
				<?php _e('Accommodation','qns') ?>
				<span class="title-block"></span>
			</h3>
			<ol class="search-results-list">
				<li><?php _e( 'No results were found.', 'qns' ); ?></li>
			</ol>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
