<?php
	$content_class = ( is_active_sidebar( 'main-sidebar' ) ) ? 'bt-content col-md-8 col-lg-9' : 'bt-content col-md-12';
	
	get_header();
	echo ametex_titlebar();
?>
	<div class="bt-main-content">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr($content_class); ?>">
					<?php
					if( have_posts() ) {
						while ( have_posts() ) : the_post();
							get_template_part( 'framework/templates/blog/entry');
						endwhile;
						
						ametex_paging_nav();
					}else{
						get_template_part( 'framework/templates/entry', 'none');
					}
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
