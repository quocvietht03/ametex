<?php
$this->add_render_attribute( 'wrapper', [
	'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-cobbles' ],
] );

$this->add_render_attribute( 'container', [
	'class' => [
		'elementor-posts-container',
		'elementor-posts',
		'elementor-cobbles',
		'bt-post--skin-' . $settings['cobbles_skin']
	],
] );

$cobbles_pattern = ! empty( $settings['cobbles_pattern'] ) ? $settings['cobbles_pattern'] : '1:1';
$cobbles_arr     = explode( ',', $cobbles_pattern );
$cobbles         = array();
foreach ( $cobbles_arr as $cobbles_key => $cobbles_val ) {
	$cobbles_item                      = explode( ':', $cobbles_val );
	$cobbles[ $cobbles_key ]['width']  = $cobbles_item[0];
	$cobbles[ $cobbles_key ]['height'] = $cobbles_item[1];
}
$cobbles_total = count( $cobbles );

?>
<div <?php echo '' . $this->get_render_attribute_string('wrapper'); ?>>
    <div <?php echo '' . $this->get_render_attribute_string('container'); ?>>
        <div class="grid bt-isotope-grid-<?php echo esc_attr($this->get_id()); ?>" style="<?php echo 'margin: -' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px -' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px 0 -' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px;'; ?>">
            <div class="grid-sizer <?php echo 'item-width--' . (isset($settings['columns']) ? $settings['columns'] : 'default') . ' item-width-tablet--' . (isset($settings['columns_tablet']) ? $settings['columns_tablet'] : 'default') . ' item-width-mobile--' . (isset($settings['columns_mobile']) ? $settings['columns_mobile'] : 'default'); ?>"></div>
            <?php 
            $count = 0;
            while ($wp_query->have_posts()) {
                $wp_query->the_post(); ?>
                <div class="grid-item <?php 
                    echo $this->ametex_render_categories_class_for_post(get_the_ID());
                    echo ' item-width--' . (isset($cobbles[$count]['width']) ? $cobbles[$count]['width'] : 'default') . '-' . (isset($settings['columns']) ? $settings['columns'] : 'default') . 
                    ' item-width-tablet--' . (isset($cobbles[$count]['width']) ? $cobbles[$count]['width'] : 'default') . '-' . (isset($settings['columns_tablet']) ? $settings['columns_tablet'] : 'default') . 
                    ' item-width-mobile--' . (isset($cobbles[$count]['width']) ? $cobbles[$count]['width'] : 'default') . '-' . (isset($settings['columns_mobile']) ? $settings['columns_mobile'] : 'default'); ?>" 
                    style="<?php echo 'padding: ' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px;'; ?>">
                    <?php require get_template_directory() . '/framework/elements/portfolio-filter/' . $settings['grid_layout'] . '-' . $settings['cobbles_skin'] . '.php'; ?>
                </div>
                <?php 
                $count++;
                if ($count >= $cobbles_total) {
                    $count = 0;
                }
            } ?>
        </div>
    </div>
</div>
