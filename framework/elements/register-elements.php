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

//add_filter( 'apack/css_variables/font', function ( $data ) {
//} );
add_filter( 'apack/css_variables/color', function ( $data ) {
	//		var_dump( $data );

	$apack_color_primary_rbg   = ametex_hex2rgb( $data['apack-color-primary']['value'] );
	$apack_color_secondary_rbg = ametex_hex2rgb( $data['apack-color-secondary']['value'] );
	$apack_color_text_hex_rbg  = ametex_hex2rgb( $data['apack-color-text']['value'] );
	$apack_color_accent_rbg    = ametex_hex2rgb( $data['apack-color-accent']['value'] );
	//	var_dump($apack_color_accent_rbg);

	$data['apack-color-accent-opacity-25'] = ametex_hex2apack_variable_color( 'apack-color-accent-opacity-25', $data['apack-color-accent']['value'], '.25' );
	$data['apack-color-accent-opacity-90'] = ametex_hex2apack_variable_color( 'apack-color-accent-opacity-90', $data['apack-color-accent']['value'], '.9' );

	//	var_dump( $data );

	return $data;
} );
global $apack_elementor_widgets;

$apack_elementor_widgets['apack_elementor_portfolio_filter']  = [
	'label'       => __( 'BE Portfolio Filter', 'ametex-pack' ),
	'description' => __( 'Widget display portfolio filter.', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/portfolio-filter.php',
	'scss_file'   => __DIR__ . '/scss/apack-elementor-portfolio-filter.scss',
];
$apack_elementor_widgets['apack_elementor_portfolio_cobbles'] = [
	'label'       => __( 'BE Portfolio Cobbles', 'ametex-pack' ),
	'description' => __( 'Widget display portfolio cobbles.', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/portfolio-cobbles.php',
	'scss_file'   => __DIR__ . '/scss/apack-elementor-portfolio-cobbles.scss',
];

$apack_elementor_widgets['apack_elementor_portfolio_grid'] = [
	'label'       => __( 'BE Portfolio Grid', 'ametex-pack' ),
	'description' => __( 'Widget display portfolio grid .', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/portfolio-grid.php',
	'scss_file'   => __DIR__ . '/scss/apack-elementor-portfolio-grid.scss',
];

$apack_elementor_widgets['apack_elementor_testimonial_slider'] = [
	'label'       => __( 'BE Testimonial Slider', 'ametex-pack' ),
	'description' => __( 'Widget display testimonial slider.', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/testimonial-slider.php',
];

$apack_elementor_widgets['apack_elementor_team_carousel'] = [
	'label'       => __( 'BE Team Carousel', 'ametex-pack' ),
	'description' => __( 'Widget display team carousel.', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/team-carousel.php',
];

$apack_elementor_widgets['apack_elementor_blog_carousel'] = [
	'label'       => __( 'BE Blog Carousel', 'ametex-pack' ),
	'description' => __( 'Widget display blog carousel.', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/blog-carousel.php',
];

$apack_elementor_widgets['apack_elementor_team_grid'] = [
	'label'       => __( 'BE Team Grid', 'ametex-pack' ),
	'description' => __( 'Widget display team grid .', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/team-grid.php',
];


$apack_elementor_widgets['apack_elementor_blog_grid'] = [
	'label'       => __( 'BE Blog Grid', 'ametex-pack' ),
	'description' => __( 'Widget display blog grid .', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/blog-grid.php',
];

$apack_elementor_widgets['apack_elementor_step_box'] = [
	'label'       => __( 'BE Step Box', 'ametex-pack' ),
	'description' => __( 'Widget display step box .', 'ametex-pack' ),
	'icon'        => '',
	'active'      => true,
	'path_file'   => __DIR__ . '/step-box.php',
	'scss_file'   => __DIR__ . '/scss/apack-elementor-step-box.scss',
];
