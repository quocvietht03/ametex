<?php
// Check if Elementor installed and activated
if ( ! did_action( 'elementor/loaded' ) ) {
	return;
}

function ametex_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category( 'bears-category', [
		'title' => __( 'Bears Category', 'ametex' ),
		'icon'  => 'fa fa-plug',
	] );

}

add_action( 'elementor/elements/categories_registered', 'ametex_add_elementor_widget_categories' );

// Add Plugin actions
function ametex_init_widgets() {
	// Register Widget Scripts
	wp_register_script('isotope-pkgd-min', get_template_directory_uri().'/framework/elements/js/isotope.pkgd.min.js', array('jquery'), '', true);

	// Include Widget files
	require_once( get_template_directory() . '/framework/elements/step-box.php' );

	require_once( get_template_directory() . '/framework/elements/blog-grid.php' );
	require_once( get_template_directory() . '/framework/elements/portfolio-grid.php' );
	require_once( get_template_directory() . '/framework/elements/team-grid.php' );

	require_once( get_template_directory() . '/framework/elements/blog-carousel.php' );
	require_once( get_template_directory() . '/framework/elements/team-carousel.php' );

	require_once( get_template_directory() . '/framework/elements/portfolio-cobbles.php' );
	require_once( get_template_directory() . '/framework/elements/testimonial-slider.php' );
	require_once( get_template_directory() . '/framework/elements/portfolio-filter.php' );


	// Register widget
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btStepBox_Widget() );

	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btBlogGrid_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btPortfolioGrid_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btTeamGrid_Widget() );

	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btBlogCarousel_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btTeamCarousel_Widget() );

	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btPortfolioCobbles_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btTestimonialSlider_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btPortfolioFilter() );

}

add_action( 'elementor/widgets/widgets_registered', 'ametex_init_widgets' );
