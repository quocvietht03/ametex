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
						while ( have_posts() ) : the_post();
							get_template_part( 'framework/templates/blog/entry');
							
							ametex_post_nav();
							
							$author_desc = get_the_author_meta('description');
							if($author_desc) echo ametex_author_render();
							
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) comments_template();
						endwhile;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>