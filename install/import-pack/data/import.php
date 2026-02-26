<?php
/**
 * Import pack data package demo
 *
 */
$plugin_includes = array(
  array(
    'name'     => __( 'Elementor Website Builder', 'ametex' ),
    'slug'     => 'elementor',
  ),
  array(
    'name'     => __( 'Elementor Pro', 'ametex' ),
    'slug'     => 'elementor-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'elementor-pro.zip',
  ),
  array(
    'name'     => __( 'Ametex Pack - addon for Ametex theme', 'ametex' ),
    'slug'     => 'ametex-pack',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'ametex-pack.zip',
  ),
  array(
    'name'     => __( 'Essential Addons for Elementor', 'ametex' ),
    'slug'     => 'essential-addons-for-elementor',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'essential-addons-for-elementor.zip',
  ),
  array(
    'name'     => __( 'Sticky Header Effects for Elementor', 'ametex' ),
    'slug'     => 'sticky-header-effects-for-elementor',
  ),
  array(
    'name'     => __( 'Slider Revolution', 'ametex' ),
    'slug'     => 'revslider',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'revslider.zip',
  ),
  array(
    'name'     => __( 'Custom Post Type UI', 'ametex' ),
    'slug'     => 'custom-post-type-ui',
  ),
  array(
    'name'     => __( 'Advanced Custom Fields PRO', 'ametex' ),
    'slug'     => 'advanced-custom-fields-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'advanced-custom-fields-pro.zip',
  ),
  array(
    'name'     => __( 'Newsletter', 'ametex' ),
    'slug'     => 'newsletter',
  ),

);

return apply_filters( 'ametex/import_pack/package_demo', [
    [
        'package_name'  => 'ametex-main',
        'preview'       => get_template_directory_uri() . '/screenshot.jpg',
        'url_demo'      => 'https://ametex.beplusthemes.com/',
        'title'         => __( 'Ametex Demo', 'ametex' ),
        'description'   => __( 'Ametex main demo.', 'ametex' ),
        'plugins'       => $plugin_includes,
    ],
] );
