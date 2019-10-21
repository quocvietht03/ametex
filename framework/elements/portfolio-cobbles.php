<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

class Elementor_btPortfolioCobbles_Widget extends Widget_Base {

	public function get_name() {
		return 'bt_portfolio_cobbles';
	}

	public function get_title() {
		return __( 'BE Portfolio Cobbles', 'ametex' );
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
			'heading_icon',
			[
				'label' => __( 'Icon', 'ametex' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-codiepie',
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Case Studies', 'ametex' ),
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'ametex' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Are you looking for ways to increase conversions but having a hard time turning visits into sales?', 'ametex' ),
			]
		);

		$this->add_control(
			'heading_btn_label',
			[
				'label' => __( 'Button Label', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Schedule a call', 'ametex' ),
			]
		);

		$this->add_control(
			'heading_btn_link',
			[
				'label' => __( 'Button Link', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => '#',
				'condition' => [
					'heading_btn_label!' => '',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_post_design_control() {
		$this->start_controls_section(
			'section_post_design',
			[
				'label' => __( 'Post', 'ametex' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'skin',
			[
				'label' => __( 'Skin', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'ametex' ),
					'layout1' => __( 'Layout 1', 'ametex' ),
				],
				'default' => 'default',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail_size',
				'default' => 'medium',
			]
		);

		$this->add_control(
			'show_lightbox',
			[
				'label' => __( 'Lightbox', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => __( 'Title', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_category',
			[
				'label' => __( 'Category', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
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

	protected function register_layout_style_control() {
		$this->start_controls_section(
			'section_layout_style',
			[
				'label' => __( 'Layout', 'ametex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);



		$this->add_control(
			'heading_icon_style',
			[
				'label' => __( 'Icon', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(
			'heading_title_style',
			[
				'label' => __( 'Title', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(
			'heading_description_style',
			[
				'label' => __( 'Description', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(
			'heading_button_style',
			[
				'label' => __( 'Button', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->end_controls_section();
	}

	protected function register_post_style_control() {
		$this->start_controls_section(
			'section_post_layout_style',
			[
				'label' => __( 'Post Layout', 'ametex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'post_title_style',
			[
				'label' => __( 'Title', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(
			'post_category_style',
			[
				'label' => __( 'Category', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(
			'post_lightbox_style',
			[
				'label' => __( 'Lightbox', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(
			'post_overlay_style',
			[
				'label' => __( 'Overlay', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		//overlay options


		$this->end_controls_section();

	}

	protected function _register_controls() {
		$this->register_layout_design_control();
		$this->register_post_design_control();
		$this->register_query_design_control();

		//$this->register_layout_style_control();
		//$this->register_post_style_control();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
			'wrapper',
			[
				'class' => [ 'elementor-element', 'elementor-widget', 'bt-portfolio-cobbles' ],
			]
		);

		$this->add_render_attribute(
			'container',
			[
				'class' => [ 'elementor-posts-container', 'elementor-posts', 'elementor-cobbles', 'bt-post--skin-'.$settings['skin'] ],
			]
		);


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

		if ( $wp_query->have_posts() ) {

		?>
			<div <?php echo ''.$this->get_render_attribute_string( 'wrapper' ); ?>>
				<div <?php echo ''.$this->get_render_attribute_string( 'container' ); ?>>
					<div class="grid">
						<div class="grid-sizer"></div>
						<div class="grid-item grid-item--width2">
							<div class="bt-grid__heading">
								<?php
									if( !empty( $settings['heading_icon'] ) ) {
										echo '<div class="bt-icon"><i class="'.$settings['heading_icon'].'"></i></div>';
									}

									if( !empty( $settings['heading_title'] ) ) {
										echo '<h3 class="bt-title">'.$settings['heading_title'].'</h3>';
									}

									if( !empty( $settings['heading_description'] ) ) {
										echo '<div class="bt-description">'.$settings['heading_description'].'</div>';
									}

									if( !empty( $settings['heading_btn_label'] ) ) {
										echo '<a href="'.$settings['heading_btn_link'].'" class="bt-btn-link">'.$settings['heading_btn_label'].'</a>';
									}
								?>




							</div>
						</div>
						<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
							<?php
								$thumbnail_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), $settings['thumbnail_size_size'] );
								$lightbox_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

							?>
							<div class="grid-item">
								<article <?php post_class('bt-post__item'); ?> style="background-image:url(<?php echo esc_url($thumbnail_attr[0]); ?>); background-repeat: no-repeat; background-size: cover; background-position: center center;">
									<div class="bt-post__overlay">
										<?php if( !empty( $settings['show_lightbox'] ) ) echo '<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="'.$this->get_id().'" href="'.$lightbox_attr[0].'" class="bt-post__lightbox elementor-clickable"><i class="fa fa-search"></i></a>'; ?>
										<div class="bt-post__content">
											<?php
												if( !empty( $settings['show_title'] ) ) {
													echo '<h3 class="bt-post__title"><a class="bt-post__link" href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
												}
												if( !empty( $settings['show_category'] ) ) {
													the_terms( get_the_ID(), 'bt_portfolio_category', '<div class="bt-post__category">'.esc_html__('Post in: ', 'ametex'), ', ', '</div>' );
												}
											?>
										</div
									</div>
								</article>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
			<script>
				!(function($){
					"use strict";
					jQuery(document).ready(function($) {
						$('.grid').isotope({
							itemSelector: '.grid-item',
							percentPosition: true,
							masonry: {
								columnWidth: '.grid-sizer'
							}
						}).trigger('resize');
					});
				})(jQuery);
			</script>
		<?php
		} else {
			esc_html_e('Post not found!', 'ametex');
		}
		wp_reset_postdata();
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btPortfolioCobbles_Widget() );
