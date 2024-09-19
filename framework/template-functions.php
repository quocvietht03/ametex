<?php
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

if ( ! function_exists( 'ametex_setup' ) ) {
	function ametex_setup() {
		/* Load textdomain */
		load_theme_textdomain( 'ametex', get_template_directory() . '/languages' );

		/* Add custom logo */
		add_theme_support( 'custom-logo' );

		/* Add custom header */
		add_theme_support('custom-header');

		/* Add RSS feed links to <head> for posts and comments. */
		add_theme_support( 'automatic-feed-links' );

		/* Enable support for Post Thumbnails, and declare sizes. */
		add_theme_support( 'post-thumbnails' );

		/* Enable support for Title Tag */
		 add_theme_support( "title-tag" );

		/* This theme uses wp_nav_menu() in locations. */
		register_nav_menus( array(
			'main_navigation'   => esc_html__( 'Main Navigation','ametex' )
		) );

		/* This theme styles the visual editor to resemble the theme style, specifically font, colors, icons, and column width. */
		add_editor_style('editor-style.css');

		/* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/* Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats */
		add_theme_support( 'post-formats', array(
			'video', 'audio', 'quote', 'link', 'gallery',
		) );

		/* This theme allows users to set a custom background. */
		add_theme_support( 'custom-background', apply_filters( 'ametex_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

		/* Add support for featured content. */
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'ametex_get_featured_posts',
			'max_posts' => 6,
		) );

		/* This theme uses its own gallery styles. */
		add_filter( 'use_default_gallery_style', '__return_false' );

		/* Add support for portfolio. */
		add_post_type_support( 'fw-portfolio', array('excerpt') );

	}
}
add_action( 'after_setup_theme', 'ametex_setup' );

/* Header */
if ( ! function_exists( 'ametex_header' ) ) {
	function ametex_header() {
		ob_start();
			?>
			<header id="bt_header" class="bt-header">
				<div class="bt-subheader">
					<div class="bt-subheader-inner container">
						<div class="bt-subheader-cell bt-left">
							<div class="bt-content text-left">
								<?php ametex_logo(get_template_directory_uri() . '/assets/images/logo.png', '30'); ?>
							</div>
						</div>
						<div class="bt-subheader-cell bt-right">
							<div class="bt-content text-right">
								<div class="bt-menu-toggle">
									<div class="bt-menu-toggle-content"></div>
								</div>
								<?php ametex_nav_menu('main_navigation', 'bt-menu-desktop'); ?>
								<?php ametex_nav_menu('main_navigation', 'bt-menu-mobile'); ?>
							</div>
						</div>
					</div>
				</div>
			</header>
			<?php
		return ob_get_clean();
	}
}

/* Title Bar */
if ( ! function_exists( 'ametex_titlebar' ) ) {
	function ametex_titlebar() {
		ob_start();
		?>
		<div class="bt-titlebar">
			<div class="bt-titlebar-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<h1 class="bt-page-title"><?php echo ametex_page_title(); ?></h1>
							<div class="bt-breadcrumb"><?php echo ametex_page_breadcrumb('Home', '-'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

/* Footer */
function ametex_footer() {
    ob_start();
		?>
		<footer id="bt_footer" class="bt-footer bt-footer-default bt-stick" data-space="60">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="bt-content">
							<div class="bt-copyright text-center"><?php esc_html_e('&copy; Ametex. All Rights Reserved . Copyright by Bearsthemes', 'ametex'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php
	return ob_get_clean();
}

/* Logo */
if (!function_exists('ametex_logo')) {
	function ametex_logo($url = '', $height = 30) {
		if(!$url){
			$url = get_template_directory_uri().'/assets/images/logo.png';
		}
		echo '<a href="'.home_url('/').'" class="logo"><img style="height: '.esc_attr($height).'px; width: auto;" src="'.esc_url($url).'" alt="'.esc_attr__('Logo', 'ametex').'"/></a>';
	}
}

/* Nav Menu */
if (!function_exists('ametex_nav_menu')) {
	function ametex_nav_menu($theme_location = '', $container_class = '') {
		if (has_nav_menu($theme_location)) {
			wp_nav_menu(array(
				'container_class' 	=> $container_class,
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'theme_location'  	=> $theme_location
			));
		}
	}
}

/* Page title */
if (!function_exists('ametex_page_title')) {
    function ametex_page_title() {
		ob_start();
		if(is_front_page()){
			esc_html_e('Home', 'ametex');
		}elseif(is_home()){
			esc_html_e('Blog', 'ametex');
		}elseif(is_search()){
			esc_html_e('Search', 'ametex');
		}elseif(is_404()){
			esc_html_e('Page Not Found ', 'ametex');
		}elseif (is_archive()) {
			if (is_category()){
				single_cat_title();
			}elseif(get_post_type() == 'fw-portfolio'||get_post_type() == 'bt_team'||get_post_type() == 'bt_services'||get_post_type() == 'bt_story'){
				single_term_title();
			}elseif (is_tag()){
				single_tag_title();
			}elseif (is_author()){
				printf(__('Author: %s', 'ametex'), '<span class="vcard">' . get_the_author() . '</span>');
			}elseif (is_day()){
				printf(__('Day: %s', 'ametex'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
			}elseif (is_month()){
				printf(__('Month: %s', 'ametex'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
			}elseif (is_year()){
				printf(__('Year: %s', 'ametex'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
			}elseif (is_tax('post_format', 'post-format-aside')){
				esc_html_e('Aside', 'ametex');
			}elseif (is_tax('post_format', 'post-format-gallery')){
				esc_html_e('Gallery', 'ametex');
			}elseif (is_tax('post_format', 'post-format-image')){
				esc_html_e('Image', 'ametex');
			}elseif (is_tax('post_format', 'post-format-video')){
				esc_html_e('Video', 'ametex');
			}elseif (is_tax('post_format', 'post-format-quote')){
				esc_html_e('Quote', 'ametex');
			}elseif (is_tax('post_format', 'post-format-link')){
				esc_html_e('Link', 'ametex');
			}elseif (is_tax('post_format', 'post-format-status')){
				esc_html_e('Status', 'ametex');
			}elseif (is_tax('post_format', 'post-format-audio')){
				esc_html_e('Audio', 'ametex');
			}elseif (is_tax('post_format', 'post-format-chat')){
				esc_html_e('Chat', 'ametex');
			}else{
				esc_html_e('Archive', 'ametex');
			}
		} else {
			the_title();
		}

		return ob_get_clean();
    }
}

/* Page breadcrumb */
if (!function_exists('ametex_page_breadcrumb')) {
    function ametex_page_breadcrumb($home_text = 'Home', $delimiter = '-') {
		global $post;

		if(is_front_page()){
			echo esc_html('Front Page', 'ametex');
		}elseif(is_home()){
			echo esc_html('Blog', 'ametex');
		}else{
			echo '<a href="' . esc_url(home_url('/')) . '">' . $home_text . '</a> ' . $delimiter . ' ';
		}

		if(is_category()){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
			echo '<span class="current">' . single_cat_title(esc_html__('Archive by category: ', 'ametex'), false) . '</span>';
		}elseif ( is_tag() ) {
			echo '<span class="current">' . single_tag_title(esc_html__('Posts tagged: ', 'ametex'), false) . '</span>';
		}elseif(is_tax()){
			echo '<span class="current">' . single_term_title(esc_html__('Archive by taxonomy: ', 'ametex'), false) . '</span>';
		}elseif(is_search()){
			echo '<span class="current">' . esc_html__('Search results for: ', 'ametex') . get_search_query() . '</span>';
		}elseif(is_day()){
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<span class="current">' . get_the_time('d') . '</span>';
		}elseif(is_month()){
			echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';
		}elseif(is_single() && !is_attachment()){
			if(get_post_type() != 'post'){
				if(get_post_type() == 'fw-portfolio'){
					$terms = get_the_terms(get_the_ID(), 'fw-portfolio-category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'fw-portfolio-category', '' , ', ' );
						echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'bt_team'){
					$terms = get_the_terms(get_the_ID(), 'bt_team_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'bt_team_category', '' , ', ' );
						echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'bt_testimonial'){
					$terms = get_the_terms(get_the_ID(), 'bt_testimonial_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'bt_testimonial_category', '' , ', ' );
						echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'bt_services'){
					$terms = get_the_terms(get_the_ID(), 'bt_services_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'bt_services_category', '' , ', ' );
						echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'bt_story'){
					$terms = get_the_terms(get_the_ID(), 'bt_story_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'bt_story_category', '' , ', ' );
						echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}else{
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . esc_url(home_url('/')) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}
			}else{
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo ''.$cats;
				echo '<span class="current">' . get_the_title() . '</span>';
			}
		}elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
		}elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_page() && !is_front_page() && !$post->post_parent ) {
			echo '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_page() && !is_front_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo ''.$breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1)
					echo ' ' . $delimiter . ' ';
			}
			echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo '<span class="current">' . esc_html__('Articles posted by ', 'ametex') . $userdata->display_name . '</span>';
		}elseif ( is_404() ) {
			echo '<span class="current">' . esc_html__('Error 404', 'ametex') . '</span>';
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo ' ' . $delimiter . ' ' . esc_html__('Page', 'ametex') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
    }
}

/* Display navigation to next/previous post */
if ( ! function_exists( 'ametex_post_nav' ) ) {
	function ametex_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="bt-blog-article-nav clearfix">
			<?php
				previous_post_link('<div class="bt-prev">'.esc_html__('Previous Post', 'ametex').'%link</div>');
				next_post_link('<div class="bt-next">'.esc_html__('Next Post', 'ametex').'%link</div>');
			?>
		</nav>
		<?php
	}
}

/* Display paginate links */
if ( ! function_exists( 'ametex_paginate_links' ) ) {
	function ametex_paginate_links($wp_query) {
		global $ametex_options;
		$pagination_style = (isset($ametex_options['pagination_style'])&&$ametex_options['pagination_style'])?'bt-style'.$ametex_options['nav_dots_style']:'bt-style0';
		$prev_text = (isset($ametex_options['pagination_prev_text'])&&$ametex_options['pagination_prev_text'])?'<span>'.$ametex_options['pagination_prev_text'].'</span>':'';
		$next_text = (isset($ametex_options['pagination_next_text'])&&$ametex_options['pagination_next_text'])?'<span>'.$ametex_options['pagination_next_text'].'</span>':'';

		?>
		<nav class="bt-pagination <?php echo esc_attr($pagination_style); ?>" role="navigation">
			<?php
				$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_text' => '<i class="fa fa-angle-left"></i>'.$prev_text,
					'next_text' => $next_text.'<i class="fa fa-angle-right"></i>',
				) );
			?>
		</nav>
		<?php
	}
}

/* Display navigation to next/previous set of posts */
if ( ! function_exists( 'ametex_paging_nav' ) ) {
	function ametex_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		?>
		<nav class="bt-pagination" role="navigation">
			<?php
				echo paginate_links( array(
					'base'     => $pagenum_link,
					'format'   => $format,
					'total'    => $GLOBALS['wp_query']->max_num_pages,
					'current'  => $paged,
					'mid_size' => 1,
					'add_args' => array_map( 'urlencode', $query_args ),
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'next_text' => '<i class="fa fa-angle-right"></i>',
				) );
			?>
		</nav>
		<?php
	}
}

/* Add content before header */
if(!function_exists('ametex_add_content_before_header_func')) {
	function ametex_add_content_before_header_func() {
		global $ametex_options;

		/* Page loading */
		$site_loading = (isset($ametex_options['site_loading'])&&$ametex_options['site_loading'])?$ametex_options['site_loading']: false;
		$site_loading_spinner = (isset($ametex_options['site_loading_spinner'])&&$ametex_options['site_loading_spinner'])?$ametex_options['site_loading_spinner']: 'spinner0';
		if($site_loading){
			echo '<div id="site_loading">
					<div class="loader '.esc_attr($site_loading_spinner).'">
						<div class="dot1"></div>
						<div class="dot2"></div>
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div>';
		}
	}
	add_action( 'ametex_add_content_before_header', 'ametex_add_content_before_header_func' );
}

/* Add menu canvas, back to top, ... */
if(!function_exists('ametex_add_extra_code_wp_footer')) {
	function ametex_add_extra_code_wp_footer() {
		global $ametex_options;

		/* Back to top */
		$back_to_top = (isset($ametex_options['back_to_top'])&&$ametex_options['back_to_top'])?$ametex_options['back_to_top']: false;
		$back_to_top_style = (isset($ametex_options['back_to_top_style'])&&$ametex_options['back_to_top_style'])?$ametex_options['back_to_top_style']: 'style_1';
		if($back_to_top){
			wp_enqueue_style( 'ametex-backtop', get_template_directory_uri().'/assets/vendors/backtop/style.css', false );
			wp_enqueue_script( 'ametex-backtop', get_template_directory_uri().'/assets/vendors/backtop/backtop.min.js', array('jquery'), '', true  );
			echo '<div id="site_backtop" class="'.esc_attr($back_to_top_style).'"><i class="fa fa-arrow-up"></i></div>';
		}
	}
	add_action( 'wp_footer', 'ametex_add_extra_code_wp_footer' );
}

function ametex_hex2rgb( $colour, $str = true) {
	if ( $colour[0] == '#' ) {
		$colour = substr( $colour, 1 );
	}
	if ( strlen( $colour ) == 6 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
	} elseif ( strlen( $colour ) == 3 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
	} else {
		return false;
	}
	$r = hexdec( $r );
	$g = hexdec( $g );
	$b = hexdec( $b );
	if ( $str ) {
		return esc_html( $r . ',' . $g . ',' . $b );
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

function ametex_hex2apack_variable_color( $name_variable, $colour, $a = 1 ) {
	$rgb_str = ametex_hex2rgb( $colour );
	if ( ! $name_variable || ! $colour ) {
		return false;
	}
	$data = array(
		'name'  => '--' . $name_variable,
		'value' => 'rgba(' . $rgb_str . ',' . $a . ')'
	);

	return $data;
}
