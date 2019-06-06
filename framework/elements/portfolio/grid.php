<?php
$this->add_render_attribute(
	'wrapper',
	[
		'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-grid' ],
	]
);

$this->add_render_attribute(
	'container',
	[
		'class' => [ 'elementor-posts-container', 'elementor-posts', 'elementor-grid', 'bt-post--skin-'.$settings['grid_skin'] ],
	]
);

?>
<div <?php echo ''.$this->get_render_attribute_string( 'wrapper' ); ?>>
	<div <?php echo ''.$this->get_render_attribute_string( 'container' ); ?>>
		<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
			<?php require get_template_directory() . '/framework/elements/portfolio/'.$settings['grid_layout'].'-'.$settings['grid_skin'].'.php'; ?>
		<?php } ?>
	</div>
</div>
