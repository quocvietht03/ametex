<?php
/* Count post view. */
function ametex_set_count_view(){
    $post_id = get_the_ID();
	if(is_single() && !empty($post_id) && !isset($_COOKIE['ametex_post_view_'. $post_id])){

        $views = get_post_meta($post_id , '_ametex_post_views', true);

        $views = $views ? $views : 0 ;

        $views++;

        update_post_meta($post_id, '_ametex_post_views' , $views);

        /* set cookie. */
        setcookie('ametex_post_view_'. $post_id, $post_id, time() * 20, '/');
    }
}

add_action( 'wp', 'ametex_set_count_view' );

/* Get Post view */
function ametex_get_count_view() {
	$post_id = get_the_ID();
    $views = get_post_meta($post_id , '_ametex_post_views', true);

    $views = $views ? $views : 0 ;
    return $views;
}

/* Author */
if ( ! function_exists( 'ametex_author_render' ) ) {
	function ametex_author_render() {
		ob_start();
		?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<span class="featured-post"> <?php esc_html_e( 'Sticky', 'ametex' ); ?></span>
		<?php } ?>
		<div class="bt-about-author clearfix">
			<div class="bt-author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?></div>
			<div class="bt-author-info">
				<h4 class="bt-title"><?php esc_html_e('About The Author', 'ametex'); ?></h4>
				<h6 class="bt-name"><?php the_author(); ?></h6>
				<?php the_author_meta('description'); ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	} 
}

/* Custom comment list */
function ametex_custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? 'bt-comment-item clearfix' : 'bt-comment-item parent clearfix' ) ?> id="comment-<?php comment_ID() ?>">
	<div class="bt-avatar">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	</div>
	<div class="bt-comment">
		<h5 class="bt-name">
			<?php echo '<span class="name">'.get_comment_author( get_comment_ID() ).'</span><span class="bt-time"> / '.get_comment_date().'</span>'; ?>
		</h5>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'ametex' ); ?></em>
		<?php endif; ?>
		<?php comment_text(); ?>
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
<?php
}
