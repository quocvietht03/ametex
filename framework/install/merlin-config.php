<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */
if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(
	$config = array(
		'directory'            => 'framework/install/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'merlin', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => '', // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'ametex' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'ametex' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'ametex' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'ametex' ),
		'btn-skip'                 => esc_html__( 'Skip', 'ametex' ),
		'btn-next'                 => esc_html__( 'Next', 'ametex' ),
		'btn-start'                => esc_html__( 'Start', 'ametex' ),
		'btn-no'                   => esc_html__( 'Cancel', 'ametex' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'ametex' ),
		'btn-child-install'        => esc_html__( 'Install', 'ametex' ),
		'btn-content-install'      => esc_html__( 'Install', 'ametex' ),
		'btn-import'               => esc_html__( 'Import', 'ametex' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'ametex' ),
		'btn-license-skip'         => esc_html__( 'Later', 'ametex' ),
		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'ametex' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'ametex' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'ametex' ),
		'license-label'            => esc_html__( 'License key', 'ametex' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'ametex' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'ametex' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'ametex' ),
		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'ametex' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'ametex' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'ametex' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'ametex' ),
		'child-header'             => esc_html__( 'Install Child Theme', 'ametex' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'ametex' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'ametex' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'ametex' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'ametex' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'ametex' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'ametex' ),
		'plugins-header'           => esc_html__( 'Install Plugins', 'ametex' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'ametex' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'ametex' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'ametex' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'ametex' ),
		'import-header'            => esc_html__( 'Import Content', 'ametex' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'ametex' ),
		'import-action-link'       => esc_html__( 'Advanced', 'ametex' ),
		'ready-header'             => esc_html__( 'All done. Have fun!', 'ametex' ),
		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'ametex' ),
		'ready-action-link'        => esc_html__( 'Extras', 'ametex' ),
		'ready-big-button'         => esc_html__( 'View your website', 'ametex' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', 'ametex' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themebeans.com/contact/', esc_html__( 'Get Theme Support', 'ametex' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'ametex' ) ),
	)
);

function ametex_merlin_import_files() {
	return array(
		array(
			'import_file_name'           => 'Ametex',
			'import_file_url'            => 'http://bearsthemespremium.com/install/demo/ametex/content.xml',
			'import_widget_file_url'     => 'http://bearsthemespremium.com/install/demo/ametex/widgets.json',
			'import_customizer_file_url' => 'http://bearsthemespremium.com/install/demo/ametex/customizer.dat',
			'import_preview_image_url'   => 'http://bearsthemespremium.com/install/demo/ametex/screenshot.jpg',
			'import_notice'              => __( 'Import demo content.', 'ametex' ),
			'preview_url'                => 'https://bearsthemespremium.com/theme/ametex/',
		),
	);
}
add_filter( 'merlin_import_files', 'ametex_merlin_import_files' );

/**
 * Execute custom code after the whole import has finished.
 */
function ametex_merlin_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	set_theme_mod(
		'nav_menu_locations', array(
			'main_navigation' => $main_menu->term_id,
		)
	);
}
add_action( 'merlin_after_all_import', 'ametex_merlin_after_import_setup' );