<?php
	get_header();
	echo ametex_titlebar();
?>
	<div class="bt-main-content">
		<div class="container">
			<div class="row">
				<div class="bt-content">
					<?php
					while ( have_posts() ) : the_post();
						if ( wp_attachment_is_image( get_the_ID() ) ) {
							$att_image = wp_get_attachment_image_src( get_the_ID(), "full");
							echo '<img src="'.esc_url($att_image[0]).'" width="'.esc_attr($att_image[1]).'" height="'.esc_attr($att_image[2]).'"  class="attachment-medium" alt="'.esc_attr__('Thumbnail', 'ametex').'" />';
						}
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
