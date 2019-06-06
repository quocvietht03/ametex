<?php
	get_header();
	
	if( ! did_action( 'elementor/loaded' ) ) {
		echo ametex_titlebar();
		?>
		<div class="bt-main-content">
			<div class="container">
				<div class="row">
					<div class="bt-content">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php 
								the_content();
								wp_link_pages(array(
									'before' => '<div class="page-links">' . esc_html__('Pages:', 'ametex'),
									'after' => '</div>',
								));
							?>
							
							<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
							
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	<?php 
	}else{
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; 
	} 
	?>
	
<?php get_footer(); ?>