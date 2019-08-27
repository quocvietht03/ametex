<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

class Elementor_btBlogCarousel_Widget extends Widget_Base {

	public function get_name() {
		return 'bt_blog_carousel';
	}

	public function get_title() {
		return __( 'BE Blog Carousel', 'ametex' );
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
		
		$this->add_responsive_control(
			'slidesPerView',
			[
				'label' => __( 'Slides Per View', 'ametex' ),
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
			]
		);
		
		$this->add_responsive_control(
			'spaceBetween',
			[
				'label' => __( 'Space Between', 'ametex' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 5,
				'default' => 30,
			]
		);
		
		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'speed',
			[
				'label' => __( 'Speed', 'ametex' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5000,
				'step' => 100,
				'default' => 300,
			]
		);
		
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'grabCursor',
			[
				'label' => __( 'Grab Cursor', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'navigationLeftIcon',
			[
				'label' => __( 'Left Icon', 'ametex' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-left',
				'condition' => [
					'navigation!' => '',
				],
			]
		);
		
		$this->add_control(
			'navigationRightIcon',
			[
				'label' => __( 'Right Icon', 'ametex' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-right',
				'condition' => [
					'navigation!' => '',
				],
			]
		);
		
		$this->add_control(
			'pagination',
			[
				'label' => __( 'Pagination', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'paginationClickable',
			[
				'label' => __( 'Clickable', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'condition' => [
					'pagination!' => '',
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
		
		$this->add_control(
			'thumbnail_type',
			[
				'label' => __( 'Image Type', 'ametex' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'auto',
				'options' => [
					'auto' => __( 'Auto', 'ametex' ),
					'ratio' => __( 'ratio', 'ametex' ),
				],
				'prefix_class' => 'bt-posts--thumbnail-',
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
					'{{WRAPPER}}.bt-posts--thumbnail-ratio .bt-post__thumbnail' => 'padding-bottom: calc( {{SIZE}} * 100% );',
				],
				'condition' => [
					'thumbnail_type' => 'ratio',
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => __( 'Image Width', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 10,
						'max' => 100,
					],
					'px' => [
						'min' => 10,
						'max' => 600,
					],
				],
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'tablet_default' => [
					'size' => '',
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => 100,
					'unit' => '%',
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bt-post__thumbnail' => 'width: {{SIZE}}{{UNIT}};',
				],
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
			'show_meta',
			[
				'label' => __( 'Meta Info', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Excerpt', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt Length', 'ametex' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 20,
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'excerpt_more',
			[
				'label' => __( 'Excerpt More', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => '.',
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'show_read_more',
			[
				'label' => __( 'Read More', 'ametex' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'read_more_text',
			[
				'label' => __( 'Read More Text', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Read More',
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'read_more_icon',
			[
				'label' => __( 'Read More Icon', 'ametex' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-double-right',
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function term_option_value() {
		$terms = get_terms('category', 'orderby=count&hide_empty=0');
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
			'navigation_style',
			[
				'label' => __( 'Navigation', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'navigation_size',
			[
				'label' => __( 'Arrow Size', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev i, {{WRAPPER}} .swiper-button-next i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'navigation_padding',
			[
				'label' => __( 'Padding', 'ametex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'navigation_border_width',
			[
				'label' => __( 'Border Width', 'ametex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'navigation_border_radius',
			[
				'label' => __( 'Border Radius', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'navigation_spacing',
			[
				'label' => __( 'Spacing', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .swiper-button-next' => 'right: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 10,
				],
			]
		);
		
		$this->start_controls_tabs( 'navigation_effects_tabs' );

		$this->start_controls_tab( 'navigation_style_normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);
		
		$this->add_control(
			'navigation_color',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'navigation_background',
			[
				'label' => __( 'Backgound Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'navigation_border_color',
			[
				'label' => __( 'Border Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_shadow',
				'selector' => '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next',
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'navigation_style_hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);
		
		$this->add_control(
			'navigation_color_hover',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'navigation_background_hover',
			[
				'label' => __( 'Backgound Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'navigation_border_color_hover',
			[
				'label' => __( 'Border Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'navigation_shadow_hover',
				'selector' => '{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover',
			]
		);
		
		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->add_control(
			'pagination_style',
			[
				'label' => __( 'Pagination', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'pagination_alignment',
			[
				'label' => __( 'Alignment', 'ametex' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ametex' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ametex' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ametex' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'bt-pagination--align-',
			]
		);
		
		$this->add_control(
			'pagination_size',
			[
				'label' => __( 'Bullet Size', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 20,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'pagination_border_radius',
			[
				'label' => __( 'Border Radius', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'pagination_spacing',
			[
				'label' => __( 'Spacing', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 20,
				],
			]
		);
		
		$this->start_controls_tabs( 'pagination_effects_tabs' );

		$this->start_controls_tab( 'pagination_style_normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);
		
		$this->add_control(
			'pagination_color',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'pagination_style_hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);
		
		$this->add_control(
			'pagination_color_hover',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'pagination_style_active',
			[
				'label' => __( 'Active', 'ametex' ),
			]
		);
		
		$this->add_control(
			'pagination_color_active',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();

		$this->end_controls_tabs();
		
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
			'post_alignment',
			[
				'label' => __( 'Alignment', 'ametex' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ametex' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ametex' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ametex' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'bt-post--align-',
			]
		);
		
		$this->add_control(
			'post_border_width',
			[
				'label' => __( 'Border Width', 'ametex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__item' => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'post_border_radius',
			[
				'label' => __( 'Border Radius', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__item' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'post_padding',
			[
				'label' => __( 'Padding', 'ametex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		
		$this->start_controls_tabs( 'post_effects_tabs' );

		$this->start_controls_tab( 'post_style_normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .bt-post__item',
			]
		);

		$this->add_control(
			'post_bg_color',
			[
				'label' => __( 'Background Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-post__item' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'post_border_color',
			[
				'label' => __( 'Border Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-post__item' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'post_style_hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'selector' => '{{WRAPPER}} .bt-post__item:hover',
			]
		);

		$this->add_control(
			'post_bg_color_hover',
			[
				'label' => __( 'Background Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-post__item:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'post_border_color_hover',
			[
				'label' => __( 'Border Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-post__item:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_post_header_style',
			[
				'label' => __( 'Post Header', 'ametex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'post_header_spacing',
			[
				'label' => __( 'Spacing', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__header' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'post_image_style',
			[
				'label' => __( 'Image', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'post_img_border_radius',
			[
				'label' => __( 'Border Radius', 'ametex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bt-post__thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->start_controls_tabs( 'post_thumbnail_effects_tabs' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'post_thumbnail_filters',
				'selector' => '{{WRAPPER}} .bt-post__thumbnail img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'post_thumbnail_hover_filters',
				'selector' => '{{WRAPPER}} .bt-post__item:hover .bt-post__thumbnail img',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		
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
		
		
		$this->start_controls_section(
			'section_post_content_style',
			[
				'label' => __( 'Post Content', 'ametex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'post_content_padding',
			[
				'label' => __( 'Content Padding', 'ametex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
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
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elementor-post__title, {{WRAPPER}} .elementor-post__title a',
			]
		);
		
		$this->add_responsive_control(
			'post_title_spacing',
			[
				'label' => __( 'Spacing', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 10,
				],
			]
		);
		
		$this->start_controls_tabs( 'post_title_effects_tabs' );

		$this->start_controls_tab( 'post_title_normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);
		
		$this->add_control(
			'post_title_color',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__title, {{WRAPPER}} .bt-post__title a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'post_title_hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);
		
		$this->add_control(
			'post_title_color_hover',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__title:hover, {{WRAPPER}} .bt-post__title a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->add_control(
			'post_meta_style',
			[
				'label' => __( 'Meta Info', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_position_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bt-post__meta',
			]
		);
		
		$this->add_responsive_control(
			'post_meta_space_between',
			[
				'label' => __( 'Space Between', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__meta li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 15,
				],
			]
		);
		
		$this->add_responsive_control(
			'post_meta_spacing',
			[
				'label' => __( 'Spacing', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__meta' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 10,
				],
			]
		);
		
		$this->start_controls_tabs( 'post_meta_effects_tabs' );

		$this->start_controls_tab( 'post_meta_normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);
		
		$this->add_control(
			'post_meta_color',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__meta li' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bt-post__meta li a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'post_meta_hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);
		
		$this->add_control(
			'post_meta_color_hover',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__meta li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->add_control(
			'post_excerpt_style',
			[
				'label' => __( 'Excerpt', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'post_excerpt_color',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__excerpt' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_excerpt_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bt-post__excerpt',
			]
		);
		
		$this->add_responsive_control(
			'post_excerpt_spacing',
			[
				'label' => __( 'Spacing', 'ametex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 10,
				],
			]
		);
		
		$this->add_control(
			'post_readmore_style',
			[
				'label' => __( 'Read More', 'ametex' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->start_controls_tabs( 'post_readmore_effects_tabs' );

		$this->start_controls_tab( 'post_readmore_normal',
			[
				'label' => __( 'Normal', 'ametex' ),
			]
		);
		
		$this->add_control(
			'post_readmore_color',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__readmore' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'post_readmore_hover',
			[
				'label' => __( 'Hover', 'ametex' ),
			]
		);
		
		$this->add_control(
			'post_readmore_color_hover',
			[
				'label' => __( 'Color', 'ametex' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post__readmore:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_readmore_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bt-post__readmore',
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function _register_controls() {
		$this->register_layout_design_control();
		$this->register_post_design_control();
		$this->register_query_design_control();
		
		$this->register_layout_style_control();
		$this->register_post_style_control();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$data_setings = array(
			'slidesPerView' => $settings['slidesPerView'],
			'spaceBetween' => $settings['spaceBetween'],
			'breakpoints' => array(
				'767' => array(
					'slidesPerView' => $settings['slidesPerView_mobile'],
					'spaceBetween' => $settings['spaceBetween_mobile'],
				),
				'1024' => array(
					'slidesPerView' => $settings['slidesPerView_tablet'],
					'spaceBetween' => $settings['spaceBetween_tablet'],
				),
			),
			'loop' => $settings['loop'],
			'speed' => $settings['speed'],
			'autoplay' => $settings['autoplay'],
			'grabCursor' => $settings['grabCursor'],
		);
		
		if( !empty( $settings['navigation'] ) ) {
			$data_setings['navigation'] = array(
				'nextEl' => '.swiper-button-next',
				'prevEl' => '.swiper-button-prev',
			);
		}
		
		if( !empty( $settings['pagination'] ) ) {
			$data_setings['pagination'] = array(
				'el' => '.swiper-pagination',
				'type' => 'bullets',
				'clickable' => $settings['paginationClickable'],
			);
		}
		
		
		
		$json_carousel = json_encode($data_setings);
		
		$this->add_render_attribute(
			'wrapper',
			[
				'class' => [ 'elementor-element', 'elementor-widget', 'bt-blog-carousel' ],
			]
		);
		
		$this->add_render_attribute(
			'container',
			[
				'class' => [ 'elementor-posts-container', 'elementor-posts', 'elementor-carousel', 'bt-post--skin-'.$settings['skin'] ],
			]
		);
		
		
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			'posts_per_page' => $settings['posts_per_page'],
			'paged' => $paged,
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
			'post_type' => 'post',
			'post_status' => 'publish');
		if (!empty($settings['category'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
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
		
		if ( $wp_query->have_posts() ) {
		
		?>
			<div <?php echo ''.$this->get_render_attribute_string( 'wrapper' ); ?>>
				<div <?php echo ''.$this->get_render_attribute_string( 'container' ); ?>>
					<div class="swiper-container">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
							<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
								<div class="swiper-slide">
									<?php require get_template_directory() . '/framework/elements/blog/'.$settings['skin'].'.php'; ?>
								</div>
							<?php } ?>
						</div>
						
						<?php if( !empty( $settings['pagination'] ) ) { ?>
							<div class="swiper-pagination bt-swiper__pagination"></div>
						<?php } ?>

						<?php if( !empty( $settings['navigation'] ) ) { ?>
							<div class="swiper-button-prev bt-swiper__button-prev">
								<?php if( !empty( $settings['navigationLeftIcon'] ) ) echo '<i class="'.$settings['navigationLeftIcon'].'"></i>'; ?>
							</div>
							<div class="swiper-button-next bt-swiper__button-next">
								<?php if( !empty( $settings['navigationRightIcon'] ) ) echo '<i class="'.$settings['navigationRightIcon'].'"></i>'; ?>
							</div>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<script>
				!(function($){
					"use strict";
					jQuery(document).ready(function($) {
						var btSwiper = new Swiper('.swiper-container', <?php echo ''.$json_carousel; ?>);
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
