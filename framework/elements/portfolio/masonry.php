<?php
$this->add_render_attribute(
	'wrapper',
	[
		'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-masonry' ],
	]
);

$this->add_render_attribute(
	'container',
	[
		'class' => [ 'elementor-posts-container', 'elementor-posts', 'elementor-masonry', 'bt-post--skin-'.$settings['masonry_skin'] ],
	]
);

?>
<div <?php echo '' . $this->get_render_attribute_string('wrapper'); ?>>
    <div <?php echo '' . $this->get_render_attribute_string('container'); ?>>
        <div class="grid bt-isotope-grid" style="<?php echo 'margin: -' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px -' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px 0 -' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px;'; ?>">
            <div class="grid-sizer <?php 
                echo 'item-width--' . (isset($settings['columns']) ? $settings['columns'] : 'default') . 
                ' item-width-tablet--' . (isset($settings['columns_tablet']) ? $settings['columns_tablet'] : 'default') . 
                ' item-width-mobile--' . (isset($settings['columns_mobile']) ? $settings['columns_mobile'] : 'default'); ?>">
            </div>
            <?php while ($wp_query->have_posts()) { 
                $wp_query->the_post(); ?>
                <div class="grid-item <?php 
                    echo 'item-width--' . (isset($settings['columns']) ? $settings['columns'] : 'default') . 
                    ' item-width-tablet--' . (isset($settings['columns_tablet']) ? $settings['columns_tablet'] : 'default') . 
                    ' item-width-mobile--' . (isset($settings['columns_mobile']) ? $settings['columns_mobile'] : 'default'); ?>" 
                    style="<?php echo 'padding: ' . (isset($settings['space_between']['size']) ? $settings['space_between']['size'] / 2 : 0) . 'px;'; ?>">
                    <?php require get_template_directory() . '/framework/elements/portfolio/' . $settings['grid_layout'] . '-' . $settings['masonry_skin'] . '.php'; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
