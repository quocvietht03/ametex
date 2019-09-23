<?php

?>
<article <?php post_class( 'bt-post__item' ); ?>>
	<?php
	$thumbnail_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), $settings['thumbnail_size_size'] );
	$lightbox_attr  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

	?>
    <div class="bt-post__thumbnail">
		<div class="bt-thumb-inner">
			<?php echo '<div class="bt-thumb-poster" style="background-image:url(' . esc_url( $thumbnail_attr[0] ) . ');"></div>'; ?>
		</div>
		<div class="bt-post__overlay">
			<?php echo '<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="' . $this->get_id() . '" href="' . esc_url( $lightbox_attr[0] ) . '" class="bt-post__lightbox elementor-clickable"><i class="fa fa-search"></i></a>'; ?>
		</div>
	</div>
	<div class="bt-post__content">
		<?php
		echo '<h3 class="bt-post__title"><a class="bt-post__link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
		the_terms( get_the_ID(), 'bt_portfolio_category', '<div class="bt-post__category">' . esc_html__( 'Post in: ', 'ametex' ), ', ', '</div>' );
		?>
	</div>
</article>
