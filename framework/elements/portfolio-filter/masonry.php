<?php
$this->add_render_attribute( 'wrapper', [
		'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-masonry' ],
	] );

$this->add_render_attribute( 'container', [
		'class' => [
			'elementor-posts-container',
			'elementor-posts',
			'elementor-masonry',
			'bt-post--skin-' . $settings['masonry_skin']
		],
	] );

?>
<div <?php echo '' . $this->get_render_attribute_string( 'wrapper' ); ?>>
	<div <?php echo '' . $this->get_render_attribute_string( 'container' ); ?>>
		<div class="grid bt-isotope-grid-<?php echo esc_attr( $this->get_id() ); ?>" style="<?php echo 'margin: -' . ( $settings['space_between']['size'] / 2 ) . 'px -' . ( $settings['space_between']['size'] / 2 ) . 'px 0 -' . ( $settings['space_between']['size'] / 2 ) . 'px;'; ?>">
			<div class="grid-sizer <?php echo 'item-width--' . $settings['columns'] . ' item-width-tablet--' . $settings['columns_tablet'] . ' item-width-mobile--' . $settings['columns_mobile']; ?>"></div>
			<?php while ( $wp_query->have_posts() ) {
				$wp_query->the_post(); ?>
                <div class="grid-item <?php echo $this->ametex_render_categories_class_for_post( get_the_ID() );
				echo 'item-width--' . $settings['columns'] . ' item-width-tablet--' . $settings['columns_tablet'] . ' item-width-mobile--' . $settings['columns_mobile']; ?>" style="<?php echo 'padding: ' . ( $settings['space_between']['size'] / 2 ) . 'px;' ?>">
					<?php require get_template_directory() . '/framework/elements/portfolio-filter/' . $settings['grid_layout'] . '-' . $settings['masonry_skin'] . '.php'; ?>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
