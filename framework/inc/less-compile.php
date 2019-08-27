<?php
function ametex_autoCompileLess($inputFile, $outputFile) {
    require_once ABSPATH.'/wp-admin/includes/file.php';	
	WP_Filesystem();
	if(!class_exists('lessc')){
		require_once get_template_directory().'/framework/inc/lessc.inc.php';
	}
	global $wp_filesystem, $ametex_options;
    $less = new lessc();
    $less->setFormatter("classic");
    $less->setPreserveComments(true);
	
	/*Styling Options*/
	$site_width = '1200px';
	$mobile_width = '991px';
	
	$main_color = '#fa7a60';
	
	
    $variables = array(
		"site-width" => $site_width,
		"mobile-width" => $mobile_width,
		
		"main-color" => $main_color
		
    );
	
    $less->setVariables($variables);
    $cacheFile = $inputFile.".cache";
    if (file_exists($cacheFile)) {
            $cache = unserialize($wp_filesystem->get_contents($cacheFile));
    } else {
            $cache = $inputFile;
    }
    $newCache = $less->cachedCompile($inputFile);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            $wp_filesystem->put_contents($cacheFile, serialize($newCache));
            $wp_filesystem->put_contents($outputFile, $newCache['compiled']);
    }
}
function ametex_addLessStyle() {
	global $ametex_options;
	
	$less_design = (isset($ametex_options['less_design'])&&$ametex_options['less_design']) ? $ametex_options['less_design'] : true; 
	if($less_design){
		try {
			$inputFile = get_template_directory().'/assets/css/less/style.less';
			$outputFile = get_template_directory().'/assets/css/main.css';
			ametex_autoCompileLess($inputFile, $outputFile);
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
}
add_action('wp_enqueue_scripts', 'ametex_addLessStyle');
/* End less*/