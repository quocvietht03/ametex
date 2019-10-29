<?php
/* Register Sidebar */
if (!function_exists('ametex_register_sidebar')) {
	function ametex_register_sidebar(){
		register_sidebar(array(
			'name' => esc_html__('Main Sidebar', 'ametex'),
			'id' => 'main-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
	}
	add_action( 'widgets_init', 'ametex_register_sidebar' );
}

/* Register Default Fonts */
if (!function_exists('ametex_fonts_url')) {
	function ametex_fonts_url() {
		$font_url = '';
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'ametex' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Open+Sans:400,400i,600,700|Poppins:400,400i,500,600,700' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
}
/* Enqueue Script */
if (!function_exists('ametex_enqueue_scripts')) {
	function ametex_enqueue_scripts() {
		global $ametex_options;

		wp_enqueue_style('ametex-fonts', ametex_fonts_url(), false );

		/* Bootstrap */
		wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/vendors/bootstrap/css/bootstrap.min.css', array(), false);
		wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/vendors/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);

		/* Fontawesome */
		$font_awesome = isset($ametex_options['font_awesome']) ? $ametex_options['font_awesome'] : true;
		if($font_awesome){
			wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/iconfonts/font-awesome/css/font-awesome.min.css', array(), false);
		}

		/* Site Loading */
		if(isset($ametex_options['site_loading'])&&$ametex_options['site_loading']){
			wp_enqueue_style( 'ametex-loading', get_template_directory_uri().'/assets/vendors/loading/style.css', array(), false );
			wp_enqueue_script( 'ametex-loading', get_template_directory_uri().'/assets/vendors/loading/loading.js', array('jquery'), '', true  );
		}

		wp_enqueue_style( 'ametex-main', get_template_directory_uri().'/assets/css/main.css',  array(), false );
		wp_enqueue_style( 'ametex-style', get_template_directory_uri().'/style.css',  array(), false );
		wp_enqueue_script( 'ametex-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '', true);


		// Load options to script
		$mobile_width = 991;

		$js_options = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'enable_mobile' => $mobile_width
		);
		wp_localize_script( 'ametex-main', 'option_ob', $js_options );
		wp_enqueue_script( 'ametex-main' );

		if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1 ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'ametex_enqueue_scripts' );
}

/* Add Support Upload Image Type SVG */
function ametex_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'ametex_mime_types');

/* Template functions */
require_once get_template_directory().'/framework/template-functions.php';

/* Less compile functions */
require_once get_template_directory().'/framework/inc/less-compile.php';

/* Post Functions */
require_once get_template_directory().'/framework/templates/post-functions.php';

/* Function framework */
require_once get_template_directory().'/framework/includes.php';

/* Elements function */
require_once get_template_directory().'/framework/elements/register-elements.php';

