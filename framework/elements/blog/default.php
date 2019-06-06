<?php
use Elementor\Group_Control_Image_Size;

?>

<article <?php post_class('bt-post__item'); ?>>
	<div class="bt-post__header">
		<?php
			$setting_key = 'thumbnail_size';
			$settings[ $setting_key ] = [
				'id' => get_post_thumbnail_id(),
			];
			$thumbnail_html = Group_Control_Image_Size::get_attachment_image_html( $settings, $setting_key );

			if ( !empty( $thumbnail_html ) ) {
				echo '<div class="bt-post__thumbnail">'.$thumbnail_html.'</div>';
			}
			
		?>
	</div>
	
	<div class="bt-post__content">
		<?php
			if( !empty( $settings['show_meta'] ) ) {
				echo '<ul class="bt-post__meta">';
					echo '<li><i class="fa fa-user"></i> <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></li>';
					echo '<li><i class="fa fa-calendar"></i> <a href="'.get_the_permalink().'">'.get_the_date(get_option('date_format')).'</a></li>';	
					if(comments_open()){
						echo '<li><i class="fa fa-comments"></i> <a href="'.get_comments_link().'">'.get_comments_number().'</a></li>';
					}	
				echo '</ul>';
			}
		
			if( !empty( $settings['show_title'] ) ) {
				echo '<h3 class="bt-post__title"><a class="bt-post__link" href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
			}
			
			if( !empty( $settings['show_excerpt'] ) ) {
				echo '<div class="bt-post__excerpt">'.wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], $settings['excerpt_more']).'</div>';
			}
			
			if( !empty( $settings['show_read_more'] ) || ( !empty( $settings['read_more_text'] ) && !empty( $settings['read_more_icon'] ) ) ) { 
				$read_more_icon_html = !empty( $settings['read_more_icon'] ) ? ' <i class="'.$settings['read_more_icon'].'"></i>' : '';
				
				echo '<a class="bt-post__readmore" href="'.get_the_permalink().'">'.$settings['read_more_text'].$read_more_icon_html.'</a>';
			}
		?>
	</div>
</article>
