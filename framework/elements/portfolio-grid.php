<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

class Elementor_btPortfolioGrid_Widget extends Widget_Base {

	public function get_name() {
		return 'bt_portfolio_grid';
	}

	public function get_title() {
		return __( 'BE Portfolio Grid', 'ametex' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'bears-category' ];
	}

	protected function register_layout_design_control() {
		$this->start_controls_section(
			'section_layout_design',
			[
				'label' => __( 'Layout', 'ametex' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'grid_layout',
			[
				'label' => __( 'Grid Layout', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid' => 'Grid',
					'masonry' => 'Masonry',
					'cobbles' => 'Cobbles',
				],
			]
		);

		$this->add_responsive_control(
			'grid_columns',
			[
				'label' => __( 'Columns', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'prefix_class' => 'elementor-grid%s-',
				'condition' => [
					'grid_layout' => 'grid',
				],
			]
		);

		$this->add_control(
			'grid_space_between',
			[
				'label' => __( 'Space Between', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-grid.elementor-posts-container' => 'grid-column-gap: {{SIZE}}{{UNIT}}; grid-row-gap: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'grid_layout' => 'grid',
				],
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'condition' => [
					'grid_layout!' => 'grid',
				],
			]
		);

		$this->add_control(
			'space_between',
			[
				'label' => __( 'Space Between', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 30,
				],
				'condition' => [
					'grid_layout!' => 'grid',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail_size',
				'default' => 'medium',
			]
		);

		$this->add_responsive_control(
			'thumbnail_ratio',
			[
				'label' => __( 'Image Ratio', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.66,
				],
				'tablet_default' => [
					'size' => '',
				],
				'mobile_default' => [
					'size' => 0.5,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 2,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__thumbnail .bt-thumb-inner' => 'padding-bottom: calc( {{SIZE}} * 100% );',
				],
				'condition' => [
					'grid_layout' => 'grid',
				],
			]
		);

		$this->add_control(
			'thumbnail_height',
			[
				'label' => __( 'Image Height', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'size' => 300,
				],
				'condition' => [
					'grid_layout' => 'cobbles',
				],
			]
		);

		$this->add_control(
			'grid_skin',
			[
				'label' => __( 'Skin', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'ametex' ),
					'layout1' => __( 'Layout 1', 'ametex' ),
				],
				'default' => 'default',
				'condition' => [
					'grid_layout' => 'grid',
				],
			]
		);

		$this->add_control(
			'masonry_skin',
			[
				'label' => __( 'Skin', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'ametex' ),
					'layout1' => __( 'Layout 1', 'ametex' ),
				],
				'default' => 'default',
				'condition' => [
					'grid_layout' => 'masonry',
				],
			]
		);

		$this->add_control(
			'cobbles_skin',
			[
				'label' => __( 'Skin', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'ametex' ),
					'layout1' => __( 'Layout 1', 'ametex' ),
				],
				'default' => 'default',
				'condition' => [
					'grid_layout' => 'cobbles',
				],
			]
		);

		$this->add_control(
			'cobbles_pattern',
			[
				'label' => __( 'Cobbles Pattern', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '2:1,1:1,1:1,1:1,1:1', 'ametex' ),
				'condition' => [
					'grid_layout' => 'cobbles',
				],
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Pagination', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ametex' ),
				'label_off' => __( 'Hide', 'ametex' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_prev_next',
			[
				'label' => __( 'Show Previous and Next', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ametex' ),
				'label_off' => __( 'Hide', 'ametex' ),
				'default' => 'no',
				'condition' => [
					'show_pagination!' => '',
				],

			]
		);

		$this->add_control(
			'prev_icon',
			[
				'label' => __( 'Previous Icon', 'ametex' ),
				'type' => Controls_Manager::ICON,
				'default' => 'eicon-chevron-left',
				'condition' => [
					'show_pagination!' => '',
					'show_prev_next!' => '',
				],
			]
		);

		$this->add_control(
			'prev_text',
			[
				'label' => __( 'Previous Text', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Previous', 'ametex' ),
				'condition' => [
					'show_pagination!' => '',
					'show_prev_next!' => '',
				],
			]
		);

		$this->add_control(
			'next_icon',
			[
				'label' => __( 'Next Icon', 'ametex' ),
				'type' => Controls_Manager::ICON,
				'default' => 'eicon-chevron-right',
				'condition' => [
					'show_pagination!' => '',
					'show_prev_next!' => '',
				],
			]
		);

		$this->add_control(
			'next_text',
			[
				'label' => __( 'Next Text', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Next', 'ametex' ),
				'condition' => [
					'show_pagination!' => '',
					'show_prev_next!' => '',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function term_option_value() {
		$terms = get_terms('bt_portfolio_category', 'orderby=count&hide_empty=0');
		$term_val = array();
		if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
				$term_val[$term->slug] = $term->name;
            }
        }
		return $term_val;
	}

	protected function register_query_design_control() {
		$this->start_controls_section(
			'section_query_design',
			[
				'label' => __( 'Query', 'ametex' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'ametex' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'ametex' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->term_option_value(),
				'default' => '',
			]
		);

		$this->add_control(
			'post_ids',
			[
				'label' => __( 'Post IDs', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => __( 'Enter post IDs to be include (Note: separate values by commas (,)).', 'ametex' ),
				'placeholder' => __( 'Enter post IDs', 'ametex' ),
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order by', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'date' => __( 'Date', 'ametex' ),
					'title' => __( 'Title', 'ametex' ),
					'ID' => __( 'ID', 'ametex' ),
					'random' => __( 'Random', 'ametex' ),
				],
				'default' => 'date',
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'DESC' => __( 'DESC', 'ametex' ),
					'ASC' => __( 'ASC', 'ametex' ),
				],
				'default' => 'DESC',
			]
		);

		$this->end_controls_section();
	}

	protected function _register_controls() {
		$this->register_layout_design_control();
		$this->register_query_design_control();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		$args = array(
			'posts_per_page' => $settings['posts_per_page'],
			'paged' => $paged,
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
			'post_type' => 'bt_portfolio',
			'post_status' => 'publish');
		if (!empty($settings['category'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'bt_portfolio_category',
					'field' => 'slug',
					'terms' => $settings['category']
				)
			);
		}
		if (isset($settings['post_ids']) && $settings['post_ids'] != '') {
			$ids = explode(',', $settings['post_ids']);
			$p_ids = array();
			foreach ((array) $ids as $id){
				$p_ids[] = trim($id);
			}
			$args['post__in'] = $p_ids;
		}
		$wp_query = new WP_Query($args);

		wp_enqueue_script('isotope-pkgd-min');
		?>
		<script>
			!(function($){
				"use strict";
				jQuery(document).ready(function($) {
					$('.bt-isotope-grid').isotope({
						itemSelector: '.grid-item',
						percentPosition: true,
						masonry: {
							columnWidth: '.grid-sizer'
						}
					}).trigger('resize');
					setTimeout(function(){
						$('.bt-isotope-grid').isotope({
							itemSelector: '.grid-item',
							percentPosition: true,
							masonry: {
								columnWidth: '.grid-sizer'
							}
						});
					}, 1000);
				});
			})(jQuery);
		</script>
		<?php
		if ( $wp_query->have_posts() ) {
			require get_template_directory() . '/framework/elements/portfolio/'.$settings['grid_layout'].'.php';

			if( !empty ($settings['show_pagination']) && $wp_query->max_num_pages > 1 ) {
				?>
				<nav class="elementor-pagination bt-elementor__pagination" role="navigation">
					<?php
						$show_prev_next = !empty($settings['show_prev_next']) ? true : false;
						$prev_text = !empty($settings['prev_icon']) ? '<i class="'.$settings['prev_icon'].'"></i>' : '';
						$prev_text .= !empty($settings['prev_text']) ? ' '.$settings['prev_text'] : '';
						$next_text = !empty($settings['next_text']) ? $settings['next_text'].' ' : '';
						$next_text .= !empty($settings['next_icon']) ? '<i class="'.$settings['next_icon'].'"></i>' : '';

						$big = 999999999; // need an unlikely integer
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'prev_next' => $show_prev_next,
							'prev_text' => $prev_text,
							'next_text' => $next_text,
						) );
					?>
				</nav>
				<?php
			}
		} else {
			esc_html_e('Post not found!', 'ametex');
		}
		wp_reset_postdata();
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btPortfolioGrid_Widget() );
