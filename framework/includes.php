<?php
/* Theme install */
//require get_template_directory() . '/framework/VerifyTheme.php';
require  get_template_directory() . '/framework/install/import-pack/functions.php';

add_filter( 'beplus/import_pack/import_uri', function() {
	return get_template_directory_uri() . '/framework/install/import-pack/';
} );

// require_once get_template_directory().'/framework/install/plugin_required.php';
// require_once get_template_directory().'/framework/install/merlin/vendor/autoload.php';
// require_once get_template_directory().'/framework/install/merlin/class-merlin.php';
// require_once get_template_directory().'/framework/install/merlin-config.php';

// Verify purchase code
/*if(class_exists('VerifyTheme')){
	function verifytheme_init(){
		$VerifyTheme = new VerifyTheme();
	}
	add_action( 'after_setup_theme', 'verifytheme_init' );
}*/
