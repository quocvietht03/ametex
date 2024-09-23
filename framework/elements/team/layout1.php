<?php
use Elementor\Group_Control_Image_Size;

$fields = get_fields();

$position = isset($fields['position']) ? $fields['position'] : '';
$email = isset($fields['email']) ? $fields['email'] : '';
$phone = isset($fields['phone']) ? $fields['phone'] : '';
$social = array();
if(isset($fields['facebook']) && !empty($fields['facebook'])){
	$facebook_icon = isset($fields['facebook_icon']) && !empty($fields['facebook_icon']) ? $fields['facebook_icon'] : 'fa fa-facebook';
	$facebook_link = isset($fields['facebook_link']) && !empty($fields['facebook_link']) ? $fields['facebook_link'] : '#';
	$social[] = '<li><a data-icon="'.esc_attr($facebook_icon).'" href="'.esc_url($facebook_link).'"><i class="'.esc_attr($facebook_icon).'"></i></a></li>';
}
if(isset($fields['twitter']) && !empty($fields['twitter'])){
	$twitter_icon = isset($fields['twitter_icon']) && !empty($fields['twitter_icon']) ? $fields['twitter_icon'] : 'fa fa-twitter';
	$twitter_link = isset($fields['twitter_link']) && !empty($fields['twitter_link']) ? $fields['twitter_link'] : '#';
	$social[] = '<li><a data-icon="'.esc_attr($twitter_icon).'" href="'.esc_url($twitter_link).'"><i class="'.esc_attr($twitter_icon).'"></i></a></li>';
}
if(isset($fields['google']) && !empty($fields['google'])){
	$google_icon = isset($fields['google_icon']) && !empty($fields['google_icon']) ? $fields['google_icon'] : 'fa fa-google-plus';
	$google_link = isset($fields['google_link']) && !empty($fields['google_link']) ? $fields['google_link'] : '#';
	$social[] = '<li><a data-icon="'.esc_attr($google_icon).'" href="'.esc_url($google_link).'"><i class="'.esc_attr($google_icon).'"></i></a></li>';
}
if(isset($fields['linkedin']) && !empty($fields['linkedin'])){
	$linkedin_icon = isset($fields['linkedin_icon']) && !empty($fields['linkedin_icon']) ? $fields['linkedin_icon'] : 'fa fa-linkedin';
	$linkedin_link = isset($fields['linkedin_link']) && !empty($fields['linkedin_link']) ? $fields['linkedin_link'] : '#';
	$social[] = '<li><a data-icon="'.esc_attr($google_icon).'" href="'.esc_url($linkedin_link).'"><i class="'.esc_attr($linkedin_icon).'"></i></a></li>';
}
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
			
			if( !empty( $settings['show_read_more'] ) || !empty( $settings['read_more_icon'] ) ) {
				$read_more_icon_html = !empty( $settings['read_more_icon'] ) ? ' <i class="'.$settings['read_more_icon'].'"></i>' : '';
				
				echo '<a class="bt-post__readmore" href="#">'.$read_more_icon_html.'</a>';
			}
		?>
	</div>
	
	<div class="bt-post__content">
		<?php
			if( !empty( $settings['show_title'] ) ) {
				echo '<h3 class="bt-post__title"><a class="bt-post__link" href="#">'.get_the_title().'</a></h3>';
			}
			
			if( !empty( $settings['show_position'] ) && !empty( $position ) ) {
				echo '<div class="bt-post__position">'.$position.'</div>';
			}
		?>
	</div>
</article>
