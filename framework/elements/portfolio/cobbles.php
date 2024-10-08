<?php
$this->add_render_attribute(
	'wrapper',
	[
		'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-cobbles' ],
	]
);

$this->add_render_attribute(
	'container',
	[
		'class' => [ 'elementor-posts-container', 'elementor-posts', 'elementor-cobbles', 'bt-post--skin-'.$settings['cobbles_skin'] ],
	]
);

$cobbles_pattern = !empty($settings['cobbles_pattern']) ? $settings['cobbles_pattern'] : '1:1';
$cobbles_arr = explode(',', $cobbles_pattern);
$cobbles = array();

foreach ($cobbles_arr as $cobbles_key => $cobbles_val) {
    $cobbles_item = explode(':', $cobbles_val);
    // Check if both width and height are set
    if (count($cobbles_item) === 2) {
        $cobbles[$cobbles_key]['width'] = $cobbles_item[0];
        $cobbles[$cobbles_key]['height'] = $cobbles_item[1];
    } else {
        // Default to 1:1 if not set properly
        $cobbles[$cobbles_key]['width'] = 1;
        $cobbles[$cobbles_key]['height'] = 1;
    }
}

$cobbles_total = count($cobbles);

?>
<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
    <div <?php echo $this->get_render_attribute_string('container'); ?>>
        <div class="grid bt-isotope-grid" style="<?php echo 'margin: -' . ($settings['space_between']['size'] / 2) . 'px -' . ($settings['space_between']['size'] / 2) . 'px 0 -' . ($settings['space_between']['size'] / 2) . 'px;'; ?>">
            <div class="grid-sizer <?php echo 'item-width--' . $settings['columns'] . ' item-width-tablet--' . (isset($settings['columns_tablet']) ? $settings['columns_tablet'] : $settings['columns']) . ' item-width-mobile--' . (isset($settings['columns_mobile']) ? $settings['columns_mobile'] : $settings['columns']); ?>"></div>
            <?php $count = 0; while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="grid-item <?php echo 'item-width--' . $cobbles[$count]['width'] . '-' . $settings['columns'] . ' item-width-tablet--' . $cobbles[$count]['width'] . '-' . (isset($settings['columns_tablet']) ? $settings['columns_tablet'] : $settings['columns']) . ' item-width-mobile--' . $cobbles[$count]['width'] . '-' . (isset($settings['columns_mobile']) ? $settings['columns_mobile'] : $settings['columns']); ?>" style="<?php echo 'padding: ' . ($settings['space_between']['size'] / 2) . 'px;'; ?>">
                    <?php require get_template_directory() . '/framework/elements/portfolio/' . $settings['grid_layout'] . '-' . $settings['cobbles_skin'] . '.php'; ?>
                </div>
                <?php $count++; if ($count >= $cobbles_total) { $count = 0; } ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>
