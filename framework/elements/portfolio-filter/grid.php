<?php
$this->add_render_attribute( 'wrapper', [
	'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-grid' ],
] );

$this->add_render_attribute( 'container', [
	'class' => [
		'elementor-posts-container',
		'elementor-posts',
		'elementor-grid',
		'bt-post--skin-' . $settings['grid_skin']
	],
] );

?>
<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
    <div <?php echo $this->get_render_attribute_string('container'); ?>>
        <div class="grid bt-isotope-grid-<?php echo esc_attr($this->get_id()); ?>" style="<?php echo 'margin: -' . ($settings['space_between']['size'] / 2) . 'px -' . ($settings['space_between']['size'] / 2) . 'px 0 -' . ($settings['space_between']['size'] / 2) . 'px;'; ?>">
            <div class="grid-sizer <?php 
                echo 'item-width--' . esc_attr($settings['columns']) . 
                     ' item-width-tablet--' . (isset($settings['columns_tablet']) ? esc_attr($settings['columns_tablet']) : esc_attr($settings['columns'])) . 
                     ' item-width-mobile--' . (isset($settings['columns_mobile']) ? esc_attr($settings['columns_mobile']) : esc_attr($settings['columns'])); ?>">
            </div>
            <?php $count = 0; while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="grid-item <?php 
                    echo $this->ametex_render_categories_class_for_post(get_the_ID()) . 
                         ' item-width--' . esc_attr($settings['columns']) . 
                         ' item-width-tablet--' . (isset($settings['columns_tablet']) ? esc_attr($settings['columns_tablet']) : esc_attr($settings['columns'])) . 
                         ' item-width-mobile--' . (isset($settings['columns_mobile']) ? esc_attr($settings['columns_mobile']) : esc_attr($settings['columns'])); ?>" 
                    style="<?php echo 'padding: ' . ($settings['space_between']['size'] / 2) . 'px;'; ?>">
                    <?php require get_template_directory() . '/framework/elements/portfolio-filter/' . esc_attr($settings['grid_layout']) . '-' . esc_attr($settings['grid_skin']) . '.php'; ?>
                </div>
                <?php $count++; endwhile; ?>
        </div>
    </div>
</div>