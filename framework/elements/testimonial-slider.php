<?php

use Elementor\Controls_Manager as Controls_Manager;
use Elementor\Group_Control_Border as Group_Control_Border;
use Elementor\Group_Control_Typography as Group_Control_Typography;
use Elementor\Utils as Utils;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.


class Elementor_btTestimonialSlider_Widget extends Widget_Base {

	public function get_name() {
		return 'bt-testimonial-slider';
	}

	public function get_title() {
		return esc_html__( 'BE Testimonial Slider', 'ametex' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'bears-category' ];
	}


	protected function _register_controls() {


		$this->start_controls_section( 'bt_section_testimonial_content', [
			'label' => esc_html__( 'Testimonial Content', 'ametex' )
		] );


		$this->add_control( 'bt_testimonial_slider_item', [
			'type'        => Controls_Manager::REPEATER,
			'default'     => [
				[
					'bt_testimonial_name' => 'John Doe',
				],
				[
					'bt_testimonial_name' => 'Jane Doe',
				],

			],
			'fields'      => [

				[
					'name'    => 'bt_testimonial_enable_avatar',
					'label'   => esc_html__( 'Display Avatar?', 'ametex' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
				],
				[
					'name'      => 'bt_testimonial_image',
					'label'     => esc_html__( 'Testimonial Avatar', 'ametex' ),
					'type'      => Controls_Manager::MEDIA,
					'default'   => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'bt_testimonial_enable_avatar' => 'yes',
					],
				],
				[
					'name'    => 'bt_testimonial_enable_thumb',
					'label'   => esc_html__( 'Use avatar as thumbnail?', 'ametex' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
				],
				[
					'name'      => 'bt_testimonial_image_thumb',
					'label'     => esc_html__( 'Testimonial thumb', 'ametex' ),
					'type'      => Controls_Manager::MEDIA,
					'default'   => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'bt_testimonial_enable_thumb' => '',
					],
				],
				[
					'name'    => 'bt_testimonial_name',
					'label'   => esc_html__( 'User Name', 'ametex' ),
					'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'John Doe', 'ametex' ),
					'dynamic' => [ 'active' => true ]
				],
				[
					'name'    => 'bt_testimonial_company_title',
					'label'   => esc_html__( 'Company Name', 'ametex' ),
					'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Codetic', 'ametex' ),
					'dynamic' => [ 'active' => true ]
				],
				[
					'name'    => 'bt_testimonial_description',
					'label'   => esc_html__( 'Testimonial Description', 'ametex' ),
					'type'    => Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Add testimonial description here. Edit and place your own text.', 'ametex' ),
				],

				[
					'name'    => 'bt_testimonial_enable_rating',
					'label'   => esc_html__( 'Display Rating?', 'ametex' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
				],

				[
					'name'      => 'bt_testimonial_rating_number',
					'label'     => __( 'Rating Number', 'ametex' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'rating-five',
					'options'   => [
						'rating-one'   => __( '1', 'ametex' ),
						'rating-two'   => __( '2', 'ametex' ),
						'rating-three' => __( '3', 'ametex' ),
						'rating-four'  => __( '4', 'ametex' ),
						'rating-five'  => __( '5', 'ametex' ),
					],
					'condition' => [
						'bt_testimonial_enable_rating' => 'yes',
					],
				],


			],
			'title_field' => 'Testimonial Item',
		] );


		$this->end_controls_section();

		/**
		 * Content Tab: Carousel Settings
		 */
		$this->start_controls_section( 'section_additional_options', [
			'label' => __( 'Carousel Settings', 'ametex' ),
		] );

		$this->add_control( 'carousel_effect', [
			'label'       => __( 'Effect', 'ametex' ),
			'description' => __( 'Sets transition effect', 'ametex' ),
			'type'        => Controls_Manager::SELECT,
			'default'     => 'slide',
			'options'     => [
				'slide'     => __( 'Slide', 'ametex' ),
				'fade'      => __( 'Fade', 'ametex' ),
				'cube'      => __( 'Cube', 'ametex' ),
				'coverflow' => __( 'Coverflow', 'ametex' ),
				'flip'      => __( 'Flip', 'ametex' ),
			],
		] );

		$this->add_responsive_control( 'items', [
			'label'          => __( 'Visible Items', 'ametex' ),
			'type'           => Controls_Manager::SLIDER,
			'default'        => [ 'size' => 1 ],
			'tablet_default' => [ 'size' => 1 ],
			'mobile_default' => [ 'size' => 1 ],
			'range'          => [
				'px' => [
					'min'  => 1,
					'max'  => 10,
					'step' => 1,
				],
			],
			'size_units'     => '',
		] );

		$this->add_responsive_control( 'margin', [
			'label'      => __( 'Items Gap', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [ 'size' => 10 ],
			'range'      => [
				'px' => [
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				],
			],
			'size_units' => '',
		] );

		$this->add_control( 'slider_speed', [
			'label'       => __( 'Slider Speed', 'ametex' ),
			'description' => __( 'Duration of transition between slides (in ms)', 'ametex' ),
			'type'        => Controls_Manager::SLIDER,
			'default'     => [ 'size' => 1000 ],
			'range'       => [
				'px' => [
					'min'  => 100,
					'max'  => 3000,
					'step' => 1,
				],
			],
			'size_units'  => '',
		] );

		$this->add_control( 'autoplay', [
			'label'        => __( 'Autoplay', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'label_on'     => __( 'Yes', 'ametex' ),
			'label_off'    => __( 'No', 'ametex' ),
			'return_value' => 'yes',
		] );

		$this->add_control( 'autoplay_speed', [
			'label'      => __( 'Autoplay Speed', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [ 'size' => 2000 ],
			'range'      => [
				'px' => [
					'min'  => 500,
					'max'  => 5000,
					'step' => 1,
				],
			],
			'size_units' => '',
			'condition'  => [
				'autoplay' => 'yes',
			],
		] );

		$this->add_control( 'pause_on_hover', [
			'label'        => __( 'Pause On Hover', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => '',
			'label_on'     => __( 'Yes', 'ametex' ),
			'label_off'    => __( 'No', 'ametex' ),
			'return_value' => 'yes',
			'condition'    => [
				'autoplay' => 'yes',
			],
		] );

		$this->add_control( 'infinite_loop', [
			'label'        => __( 'Infinite Loop', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'label_on'     => __( 'Yes', 'ametex' ),
			'label_off'    => __( 'No', 'ametex' ),
			'return_value' => 'yes',
		] );

		$this->add_control( 'grab_cursor', [
			'label'        => __( 'Grab Cursor', 'ametex' ),
			'description'  => __( 'Shows grab cursor when you hover over the slider', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => '',
			'label_on'     => __( 'Show', 'ametex' ),
			'label_off'    => __( 'Hide', 'ametex' ),
			'return_value' => 'yes',
		] );

		$this->add_control( 'navigation_heading', [
			'label'     => __( 'Navigation', 'ametex' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$this->add_control( 'arrows', [
			'label'        => __( 'Arrows', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'label_on'     => __( 'Yes', 'ametex' ),
			'label_off'    => __( 'No', 'ametex' ),
			'return_value' => 'yes',
		] );

		$this->add_control( 'dots', [
			'label'        => __( 'Dots', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'label_on'     => __( 'Yes', 'ametex' ),
			'label_off'    => __( 'No', 'ametex' ),
			'return_value' => 'yes',
		] );

		$this->add_control( 'thumbs', [
			'label'        => __( 'Thumbs', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => '',
			'label_on'     => __( 'Yes', 'ametex' ),
			'label_off'    => __( 'No', 'ametex' ),
			'return_value' => 'yes',
		] );

		$this->end_controls_section();


		$this->start_controls_section( 'bt_section_testimonial_styles_general', [
			'label' => esc_html__( 'Testimonial Styles', 'ametex' ),
			'tab'   => Controls_Manager::TAB_STYLE
		] );

		$this->add_control( 'bt_testimonial_style', [
			'label'   => __( 'Select Style', 'ametex' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'default-style',
			'options' => [
				'default-style'                    => __( 'Default', 'ametex' ),
				'classic-style'                    => __( 'Classic', 'ametex' ),
				'middle-style'                     => __( 'Content | Icon/Image | Bio', 'ametex' ),
				'icon-img-left-content'            => __( 'Icon/Image | Content', 'ametex' ),
				'icon-img-right-content'           => __( 'Content | Icon/Image', 'ametex' ),
				'content-top-icon-title-inline'    => __( 'Content Top | Icon Title Inline', 'ametex' ),
				'content-bottom-icon-title-inline' => __( 'Content Bottom | Icon Title Inline', 'ametex' )
			]
		] );

		$this->add_control( 'bt_testimonial_background', [
			'label'     => esc_html__( 'Testimonial Background Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-item' => 'background-color: {{VALUE}};',
			],
		] );

		$this->add_control( 'bt_testimonial_alignment', [
			'label'       => esc_html__( 'Set Alignment', 'ametex' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     => [
				'bt-testimonial-align-default'  => [
					'title' => __( 'Default', 'ametex' ),
					'icon'  => 'fa fa-ban',
				],
				'bt-testimonial-align-left'     => [
					'title' => esc_html__( 'Left', 'ametex' ),
					'icon'  => 'fa fa-align-left',
				],
				'bt-testimonial-align-centered' => [
					'title' => esc_html__( 'Center', 'ametex' ),
					'icon'  => 'fa fa-align-center',
				],
				'bt-testimonial-align-right'    => [
					'title' => esc_html__( 'Right', 'ametex' ),
					'icon'  => 'fa fa-align-right',
				],
			],
			'default'     => 'bt-testimonial-align-left'
		] );

		$this->add_control( 'bt_testimonial_user_display_block', [
			'label'   => esc_html__( 'Display User & Company Block?', 'ametex' ),
			'type'    => Controls_Manager::SWITCHER,
			'default' => '',
		] );


		$this->add_responsive_control( 'bt_testimonial_margin', [
			'label'       => esc_html__( 'Margin', 'ametex' ),
			'description' => 'Need to refresh the page to see the change properly',
			'type'        => Controls_Manager::DIMENSIONS,
			'size_units'  => [ 'px', '%', 'em' ],
			'selectors'   => [
				'{{WRAPPER}} .bt-testimonial-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'bt_testimonial_padding', [
			'label'      => esc_html__( 'Padding', 'ametex' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .bt-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'     => 'bt_testimonial_border',
			'label'    => esc_html__( 'Border', 'ametex' ),
			'selector' => '{{WRAPPER}} .bt-testimonial-item',
		] );

		$this->add_control( 'bt_testimonial_border_radius', [
			'label'     => esc_html__( 'Border Radius', 'ametex' ),
			'type'      => Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
			],
		] );

		$this->end_controls_section();


		$this->start_controls_section( 'bt_section_testimonial_image_styles', [
			'label' => esc_html__( 'Testimonial Image Style', 'ametex' ),
			'tab'   => Controls_Manager::TAB_STYLE
		] );

		$this->add_responsive_control( 'bt_testimonial_image_max_width', [
			'label'      => esc_html__( 'Image Wrap Max Width', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [
				'size' => 25,
				'unit' => '%',
			],
			'range'      => [
				'%'  => [
					'min' => 0,
					'max' => 100,
				],
				'px' => [
					'min' => 0,
					'max' => 1000,
				],
			],
			'size_units' => [ '%', 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .bt-testimonial-image' => 'max-width:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'bt_testimonial_image_width', [
			'label'      => esc_html__( 'Image Width', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'%'  => [
					'min' => 0,
					'max' => 100,
				],
				'px' => [
					'min' => 0,
					'max' => 1000,
				],
			],
			'size_units' => [ '%', 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .bt-testimonial-image img' => 'width:{{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'bt_testimonial_image_margin', [
			'label'      => esc_html__( 'Margin', 'ametex' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} .bt-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'bt_testimonial_image_padding', [
			'label'      => esc_html__( 'Padding', 'ametex' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .bt-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'     => 'bt_testimonial_image_border',
			'label'    => esc_html__( 'Border', 'ametex' ),
			'selector' => '{{WRAPPER}} .bt-testimonial-image img',
		] );

		$this->add_control( 'bt_testimonial_image_rounded', [
			'label'        => esc_html__( 'Rounded Avatar?', 'ametex' ),
			'type'         => Controls_Manager::SWITCHER,
			'return_value' => 'testimonial-avatar-rounded',
			'default'      => '',
		] );

		$this->add_control( 'bt_testimonial_image_border_radius', [
			'label'     => esc_html__( 'Border Radius', 'ametex' ),
			'type'      => Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
			],
			'condition' => [
				'bt_testimonial_image_rounded!' => 'testimonial-avatar-rounded',
			],
		] );

		$this->end_controls_section();


		$this->start_controls_section( 'bt_section_testimonial_typography', [
			'label' => esc_html__( 'Color &amp; Typography', 'ametex' ),
			'tab'   => Controls_Manager::TAB_STYLE
		] );

		$this->add_control( 'bt_testimonial_name_heading', [
			'label' => __( 'User Name', 'ametex' ),
			'type'  => Controls_Manager::HEADING,
		] );

		$this->add_control( 'bt_testimonial_name_color', [
			'label'     => esc_html__( 'User Name Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#272727',
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-content .bt-testimonial-user' => 'color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'bt_testimonial_name_typography',
			'selector' => '{{WRAPPER}} .bt-testimonial-content .bt-testimonial-user',
		] );

		$this->add_control( 'bt_testimonial_company_heading', [
			'label' => __( 'Company Name', 'ametex' ),
			'type'  => Controls_Manager::HEADING,
		] );


		$this->add_control( 'bt_testimonial_company_color', [
			'label'     => esc_html__( 'Company Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#272727',
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-content .bt-testimonial-user-company' => 'color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'bt_testimonial_position_typography',
			'selector' => '{{WRAPPER}} .bt-testimonial-content .bt-testimonial-user-company',
		] );

		$this->add_control( 'bt_testimonial_description_heading', [
			'label' => __( 'Testimonial Text', 'ametex' ),
			'type'  => Controls_Manager::HEADING,
		] );

		$this->add_control( 'bt_testimonial_description_color', [
			'label'     => esc_html__( 'Testimonial Text Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#7a7a7a',
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-content .bt-testimonial-text' => 'color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'bt_testimonial_description_typography',
			'selector' => '{{WRAPPER}} .bt-testimonial-content .bt-testimonial-text',
		] );

		$this->add_control( 'bt_testimonial_quotation_heading', [
			'label' => __( 'Quotation Mark', 'ametex' ),
			'type'  => Controls_Manager::HEADING,
		] );

		$this->add_control( 'bt_testimonial_quotation_color', [
			'label'     => esc_html__( 'Quotation Mark Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => 'rgba(0,0,0,0.15)',
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-quote' => 'color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'bt_testimonial_quotation_typography',
			'selector' => '{{WRAPPER}} .bt-testimonial-quote',
		] );


		$this->end_controls_section();

		/**
		 * Style Tab: Arrows
		 */
		$this->start_controls_section( 'section_arrows_style', [
			'label'     => __( 'Arrows', 'ametex' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'arrows' => 'yes',
			],
		] );

		$this->add_control( 'arrow', [
			'label'       => __( 'Choose Arrow', 'ametex' ),
			'type'        => Controls_Manager::SELECT,
			'label_block' => true,
			'default'     => 'fa fa-angle-right',
			'options'     => [
				'fa fa-angle-right'          => __( 'Angle', 'ametex' ),
				'fa fa-angle-double-right'   => __( 'Double Angle', 'ametex' ),
				'fa fa-chevron-right'        => __( 'Chevron', 'ametex' ),
				'fa fa-chevron-circle-right' => __( 'Chevron Circle', 'ametex' ),
				'fa fa-arrow-right'          => __( 'Arrow', 'ametex' ),
				'fa fa-long-arrow-right'     => __( 'Long Arrow', 'ametex' ),
				'fa fa-caret-right'          => __( 'Caret', 'ametex' ),
				'fa fa-caret-square-o-right' => __( 'Caret Square', 'ametex' ),
				'fa fa-arrow-circle-right'   => __( 'Arrow Circle', 'ametex' ),
				'fa fa-arrow-circle-o-right' => __( 'Arrow Circle O', 'ametex' ),
				'fa fa-toggle-right'         => __( 'Toggle', 'ametex' ),
				'fa fa-hand-o-right'         => __( 'Hand', 'ametex' ),
			],
		] );

		$this->add_responsive_control( 'arrows_size', [
			'label'      => __( 'Arrows Size', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [ 'size' => '22' ],
			'range'      => [
				'px' => [
					'min'  => 15,
					'max'  => 100,
					'step' => 1,
				],
			],
			'size_units' => [ 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'left_arrow_position', [
			'label'      => __( 'Align Left Arrow', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'px' => [
					'min'  => - 100,
					'max'  => 40,
					'step' => 1,
				],
			],
			'size_units' => [ 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'right_arrow_position', [
			'label'      => __( 'Align Right Arrow', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'px' => [
					'min'  => - 100,
					'max'  => 40,
					'step' => 1,
				],
			],
			'size_units' => [ 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->start_controls_tabs( 'tabs_arrows_style' );

		$this->start_controls_tab( 'tab_arrows_normal', [
			'label' => __( 'Normal', 'ametex' ),
		] );

		$this->add_control( 'arrows_bg_color_normal', [
			'label'     => __( 'Background Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'background-color: {{VALUE}};',
			],
		] );

		$this->add_control( 'arrows_color_normal', [
			'label'     => __( 'Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'        => 'arrows_border_normal',
			'label'       => __( 'Border', 'ametex' ),
			'placeholder' => '1px',
			'default'     => '1px',
			'selector'    => '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev'
		] );

		$this->add_control( 'arrows_border_radius_normal', [
			'label'      => __( 'Border Radius', 'ametex' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'tab_arrows_hover', [
			'label' => __( 'Hover', 'ametex' ),
		] );

		$this->add_control( 'arrows_bg_color_hover', [
			'label'     => __( 'Background Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
			],
		] );

		$this->add_control( 'arrows_color_hover', [
			'label'     => __( 'Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control( 'arrows_border_color_hover', [
			'label'     => __( 'Border Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
			],
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control( 'arrows_padding', [
			'label'      => __( 'Padding', 'ametex' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'separator'  => 'before',
		] );

		$this->end_controls_section();

		/**
		 * Style Tab: Dots
		 */
		$this->start_controls_section( 'section_dots_style', [
			'label'     => __( 'Dots', 'ametex' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'dots' => 'yes',
			],
		] );

		$this->add_control( 'dots_position', [
			'label'   => __( 'Position', 'ametex' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'inside'  => __( 'Inside', 'ametex' ),
				'outside' => __( 'Outside', 'ametex' ),
			],
			'default' => 'outside',
		] );

		$this->add_responsive_control( 'dots_size', [
			'label'      => __( 'Size', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'px' => [
					'min'  => 2,
					'max'  => 40,
					'step' => 1,
				],
			],
			'size_units' => '',
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
			],
		] );

		$this->add_responsive_control( 'dots_spacing', [
			'label'      => __( 'Spacing', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'px' => [
					'min'  => 1,
					'max'  => 30,
					'step' => 1,
				],
			],
			'size_units' => '',
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
			],
		] );

		$this->start_controls_tabs( 'tabs_dots_style' );

		$this->start_controls_tab( 'tab_dots_normal', [
			'label' => __( 'Normal', 'ametex' ),
		] );

		$this->add_control( 'dots_color_normal', [
			'label'     => __( 'Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'background: {{VALUE}};',
			],
		] );

		$this->add_control( 'active_dot_color_normal', [
			'label'     => __( 'Active Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'        => 'dots_border_normal',
			'label'       => __( 'Border', 'ametex' ),
			'placeholder' => '1px',
			'default'     => '1px',
			'selector'    => '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet',
		] );

		$this->add_control( 'dots_border_radius_normal', [
			'label'      => __( 'Border Radius', 'ametex' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'dots_padding', [
			'label'              => __( 'Padding', 'ametex' ),
			'type'               => Controls_Manager::DIMENSIONS,
			'size_units'         => [ 'px', 'em', '%' ],
			'allowed_dimensions' => 'vertical',
			'placeholder'        => [
				'top'    => '',
				'right'  => 'auto',
				'bottom' => '',
				'left'   => 'auto',
			],
			'selectors'          => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullets' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'tab_dots_hover', [
			'label' => __( 'Hover', 'ametex' ),
		] );

		$this->add_control( 'dots_color_hover', [
			'label'     => __( 'Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
			],
		] );

		$this->add_control( 'dots_border_color_hover', [
			'label'     => __( 'Border Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'border-color: {{VALUE}};',
			],
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


		/**
		 * Style Tab: Thumbs
		 */
		$this->start_controls_section( 'section_thumbs_style', [
			'label'     => __( 'Thumbs', 'ametex' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'thumbs' => 'yes',
			],
		] );


		$this->add_responsive_control( 'thumbs_items', [
			'label'          => __( 'Visible Thumb Items', 'ametex' ),
			'type'           => Controls_Manager::SLIDER,
			'default'        => [ 'size' => 3 ],
			'tablet_default' => [ 'size' => 1 ],
			'mobile_default' => [ 'size' => 1 ],
			'range'          => [
				'px' => [
					'min'  => 1,
					'max'  => 10,
					'step' => 1,
				],
			],
			'size_units'     => '',
		] );

		$this->add_responsive_control( 'thumbs_wrap_size', [
			'label'      => __( 'Thumbs wrap width', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'px' => [
					'min'  => 100,
					'max'  => 1000,
					'step' => 1,
				],
				'%'  => [
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				],
			],
			'default'    => [
				'size' => 150,
				'unit' => 'px',
			],
			'size_units' => [ '%', 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .bt-testimonial-gallery-thumbs .bt-testimonial-slider-thumbs-main' => 'width: {{SIZE}}{{UNIT}}',
			],
		] );
		$this->add_responsive_control( 'thumbs_size', [
			'label'      => __( 'Thumbs size', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => [
				'px' => [
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				],
				'%'  => [
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				],
			],
			'default'    => [
				'size' => 65,
				'unit' => 'px',
			],
			'size_units' => [ '%', 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .swiper-container-wrap .bt-testimonial-thumb-item figure' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
			],
		] );

		$this->add_responsive_control( 'thumbs_margin', [
			'label'      => __( 'Items Gap', 'ametex' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [ 'size' => 10 ],
			'range'      => [
				'px' => [
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				],
			],
			'size_units' => '',
		] );


		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'     => 'bt_testimonial_thumbs_border',
			'label'    => esc_html__( 'Border', 'ametex' ),
			'selector' => '{{WRAPPER}} .bt-testimonial-thumb-item figure',
		] );

		$this->add_control( 'bt_testimonial_thumbs_border_radius', [
			'label'     => esc_html__( 'Border Radius', 'ametex' ),
			'type'      => Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .bt-testimonial-thumb-item figure' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
			],
		] );
		$this->add_control( 'bt_testimonial_thumbs_text_after', [
			'label'     => esc_html__( 'Text info', 'ametex' ),
			'type'      => Controls_Manager::TEXT,
			'default'   => esc_html__( 'More Comments', 'ametex' ),
			'separator' => 'before',
			'dynamic'   => [
				'active' => true,
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'bt_testimonial_name_typography_thumbs_text_after',
			'selector' => '{{WRAPPER}} .swiper-thumbs-container-wrap .text-after-thumb',
		] );

		$this->add_control( 'bt_testimonial_name_color_thumbs_text_after', [
			'label'     => esc_html__( 'Color', 'ametex' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#272727',
			'selectors' => [
				'{{WRAPPER}} .swiper-thumbs-container-wrap .text-after-thumb' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control( 'bt_testimonial_link_thumbs_text_after', [
			'label'   => __( 'Link', 'ametex' ),
			'type'    => Controls_Manager::URL,
			'dynamic' => [
				'active' => true,
			],
			'default' => [
				'url' => '',
			],
		] );
		$this->end_controls_section();

	}

	protected function _render_user_meta( $item ) {
		$settings = $this->get_settings();
		ob_start();
		?>
        <p class="bt-testimonial-user" <?php if ( ! empty( $settings['bt_testimonial_user_display_block'] ) ) : ?> style="display: block; float: none;"<?php endif; ?>><?php echo esc_attr( $item['bt_testimonial_name'] ); ?></p>
        <p class="bt-testimonial-user-company"><?php echo esc_attr( $item['bt_testimonial_company_title'] ); ?></p>
		<?php
		echo ob_get_clean();
	}

	protected function _render_user_avatar( $item ) {
		if ( $item['bt_testimonial_enable_avatar'] != 'yes' ) {
			return;
		}
		$settings = $this->get_settings();
		ob_start();
		?>
        <div class="bt-testimonial-image">
            <?php if ( 'default-style' == $settings['bt_testimonial_style'] ) : ?>
                <span class="bt-testimonial-quote"></span>
            <?php endif; ?>
            <figure>
                <img src="<?php echo $item['bt_testimonial_image']['url']; ?>" alt="<?php echo esc_attr( get_post_meta( $item['bt_testimonial_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
            </figure>
        </div>
		<?php
		echo ob_get_clean();
	}

	protected function _render_user_ratings( $item ) {
		if ( empty( $item['bt_testimonial_enable_rating'] ) ) {
			return;
		}
		ob_start();
		?>
        <ul class="testimonial-star-rating">
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        </ul>
		<?php
		echo ob_get_clean();
	}

	protected function _render_user_description( $item ) {
		echo '<div class="bt-testimonial-text">' . wpautop( $item["bt_testimonial_description"] ) . '</div>';
	}


	protected function _render_quote() {
		echo '<span class="bt-testimonial-quote"></span>';
	}

	protected function render() {

		$settings            = $this->get_settings_for_display();
		$testimonial_classes = $this->get_settings( 'bt_testimonial_image_rounded' ) . " " . $this->get_settings( 'bt_testimonial_alignment' );
		$navigation_type     = $this->get_settings( 'bt_testimonial_slider_navigation' );

		$this->add_render_attribute( 'testimonial-slider-wrap', 'class', 'swiper-container-wrap' );

		if ( $settings['dots_position'] ) {
			$this->add_render_attribute( 'testimonial-slider-wrap', 'class', 'swiper-container-wrap-dots-' . $settings['dots_position'] );
		}

		$this->add_render_attribute( 'testimonial-slider-wrap', [
			'class' => [ 'bt-testimonial-slider', $settings['bt_testimonial_style'] ],
			'id'    => 'bt-testimonial-' . esc_attr( $this->get_id() ),
		] );

		//=================================

		$this->add_render_attribute( 'testimonial-slider-thumbs-wrap', 'class', 'swiper-thumbs-container-wrap' );
		$this->add_render_attribute( 'testimonial-slider-thumbs-wrap', [
			'class' => [ 'bt-testimonial-gallery-thumbs' ],
			'id'    => 'bt-testimonial-thumbs-' . esc_attr( $this->get_id() )
		] );
		$this->add_render_attribute( 'testimonial-slider-thumbs', [
			'class' => [
				'swiper-container',
				'bt-testimonial-slider-thumbs-main',
				'swiper-container-thumbs-' . esc_attr( $this->get_id() )
			]
		] );
		if ( ! empty( $settings['thumbs_items']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-items', $settings['thumbs_items']['size'] );
		}

		if ( ! empty( $settings['thumbs_items_tablet']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-items-tablet', $settings['thumbs_items_tablet']['size'] );
		}

		if ( ! empty( $settings['thumbs_items_mobile']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-items-mobile', $settings['thumbs_items_mobile']['size'] );
		}

		if ( ! empty( $settings['thumbs_margin']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-margin', $settings['thumbs_margin']['size'] );
		}

		if ( ! empty( $settings['margin_tablet']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-margin-tablet', $settings['margin_tablet']['size'] );
		}

		if ( ! empty( $settings['margin_mobile']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-margin-mobile', $settings['margin_mobile']['size'] );
		}

		if ( $settings['carousel_effect'] ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-effect', $settings['carousel_effect'] );
		}

		if ( ! empty( $settings['slider_speed']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-speed', $settings['slider_speed']['size'] );
		}

		if ( $settings['infinite_loop'] == 'yes' ) {
			$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-loop', 1 );
		}
		$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-looped-slides', 5 );
		$this->add_render_attribute( 'testimonial-slider-thumbs', 'data-slider-thumbs-container', 'bt-slider-id-' . esc_attr( $this->get_id() ) );


		//============================================

		$this->add_render_attribute( 'testimonial-slider', 'data-slider-thumbs-container', 'bt-slider-id-' . esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'testimonial-slider', 'data-looped-slides', 5 );
		$this->add_render_attribute( 'testimonial-slider', [
			'class'           => [
				'swiper-container',
				'bt-testimonial-slider-main',
				'swiper-container-' . esc_attr( $this->get_id() )
			],
			'data-pagination' => '.swiper-pagination-' . esc_attr( $this->get_id() ),
			'data-arrow-next' => '.swiper-button-next-' . esc_attr( $this->get_id() ),
			'data-arrow-prev' => '.swiper-button-prev-' . esc_attr( $this->get_id() )
		] );

		if ( ! empty( $settings['items']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-items', $settings['items']['size'] );
		}

		if ( ! empty( $settings['items_tablet']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-items-tablet', $settings['items_tablet']['size'] );
		}

		if ( ! empty( $settings['items_mobile']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-items-mobile', $settings['items_mobile']['size'] );
		}

		if ( ! empty( $settings['margin']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-margin', $settings['margin']['size'] );
		}

		if ( ! empty( $settings['margin_tablet']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-margin-tablet', $settings['margin_tablet']['size'] );
		}

		if ( ! empty( $settings['margin_mobile']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-margin-mobile', $settings['margin_mobile']['size'] );
		}

		if ( $settings['carousel_effect'] ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-effect', $settings['carousel_effect'] );
		}

		if ( ! empty( $settings['slider_speed']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-speed', $settings['slider_speed']['size'] );
		}

		if ( $settings['infinite_loop'] == 'yes' ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-loop', 1 );
		}

		if ( $settings['grab_cursor'] == 'yes' ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-grab-cursor', 1 );
		}

		if ( $settings['arrows'] == 'yes' ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-arrows', 1 );
		}

		if ( $settings['dots'] == 'yes' ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-dots', 1 );
		}

		if ( $settings['autoplay'] == 'yes' && ! empty( $settings['autoplay_speed']['size'] ) ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-autoplay_speed', $settings['autoplay_speed']['size'] );
		}

		if ( $settings['pause_on_hover'] == 'yes' ) {
			$this->add_render_attribute( 'testimonial-slider', 'data-pause-on-hover', 'true' );
		}
		?>

        <div <?php echo $this->get_render_attribute_string( 'testimonial-slider-wrap' ); ?>>
            <div <?php echo $this->get_render_attribute_string( 'testimonial-slider' ); ?>>

                <div class="swiper-wrapper">
                    <?php
                    $i = 0;
                    foreach ( $settings['bt_testimonial_slider_item'] as $item ) :
	                    $this->add_render_attribute( 'testimonial-content-wrapper' . $i, [
		                    'class' => [ 'bt-testimonial-content', $item['bt_testimonial_rating_number'] ],
		                    'style' => $item['bt_testimonial_enable_avatar'] == '' ? 'width: 100%;' : ''
	                    ] );

	                    $this->add_render_attribute( 'testimonial-slide' . $i, [
		                    'class' => [ 'bt-testimonial-item', 'clearfix', 'swiper-slide', $testimonial_classes ]
	                    ] );
	                    ?>


	                    <?php if ( 'classic-style' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <?php $this->_render_quote(); ?>
                            <div class="testimonial-classic-style-content">
                                <?php
                                $this->_render_user_description( $item );
                                $this->_render_user_ratings( $item );
                                $this->_render_user_meta( $item );
                                ?>
                            </div>
	                        <?php $this->_render_user_avatar( $item ); ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( 'middle-style' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <?php

                            $this->_render_quote();
                            $this->_render_user_description( $item );
                            ?>
	                        <?php $this->_render_user_avatar( $item ); ?>
                            <div class="middle-style-content">
                                <?php
                                $this->_render_user_ratings( $item );
                                $this->_render_user_meta( $item );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( 'icon-img-left-content' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <?php $this->_render_user_avatar( $item ); ?>
                            <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <?php
                            $this->_render_user_meta( $item );
                            $this->_render_user_ratings( $item );
                            echo '<div class="user_description_wrap">';
                            $this->_render_quote();
                            $this->_render_user_description( $item );
                            echo '</div>';
                            ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( 'icon-img-right-content' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <?php
                            $this->_render_quote();
                            $this->_render_user_description( $item );
                            $this->_render_user_ratings( $item );
                            $this->_render_user_meta( $item );
                            ?>
                        </div>
		                    <?php $this->_render_user_avatar( $item ); ?>
                    </div>
                    <?php } ?>


                    <?php if ( 'content-top-icon-title-inline' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <?php
                            $this->_render_quote();
                            $this->_render_user_description( $item );
                            ?>
                            <div class="testimonial-inline-style">
                                <?php
                                $this->_render_user_avatar( $item );
                                $this->_render_user_meta( $item );
                                $this->_render_user_ratings( $item );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( 'content-bottom-icon-title-inline' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <div class="testimonial-inline-style">
                                <?php
                                $this->_render_user_avatar( $item );
                                $this->_render_user_meta( $item );
                                $this->_render_user_ratings( $item );
                                ?>
                            </div>
	                        <?php
	                        $this->_render_quote();
	                        $this->_render_user_description( $item );
	                        ?>
                        </div>
                    </div>
                    <?php } ?>


                    <?php if ( 'default-style' == $settings['bt_testimonial_style'] ) { ?>
                        <div <?php echo $this->get_render_attribute_string( 'testimonial-slide' . $i ); ?>>
                        <?php $this->_render_user_avatar( $item ); ?>
                            <div <?php echo $this->get_render_attribute_string( 'testimonial-content-wrapper' . $i ); ?>>
                            <?php //$this->_render_quote(); ?>
                                <div class="default-style-testimonial-content">
                                <?php
                                $this->_render_user_description( $item );
                                $this->_render_user_ratings( $item );
                                $this->_render_user_meta( $item );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


	                    <?php $i ++; endforeach; ?>
                </div>
	            <?php
	            $this->render_dots();

	            $this->render_arrows();
	            ?>
            </div>
			<?php $this->render_thumbs(); ?>
        </div>

		<?php

	}

	/**
	 * Render logo carousel thumbs output on the frontend.
	 */
	protected function render_thumbs() {
		$settings = $this->get_settings_for_display();
		if ( $settings['thumbs'] == 'yes' ) { ?>

            <div <?php echo $this->get_render_attribute_string( 'testimonial-slider-thumbs-wrap' ); ?>>
                <div <?php echo $this->get_render_attribute_string( 'testimonial-slider-thumbs' ); ?>>
                    <div class="swiper-wrapper">
                        <?php
                        $i = 0;
                        foreach ( $settings['bt_testimonial_slider_item'] as $item ) :

	                        $this->add_render_attribute( 'testimonial-slide-thumbs' . $i, [
		                        'class' => [ 'bt-testimonial-thumb-item', 'clearfix', 'swiper-slide', ]
	                        ] );
	                        ?>
                            <div <?php echo $this->get_render_attribute_string( 'testimonial-slide-thumbs' . $i ); ?>>
                                <figure>
                                    <?php
                                    if ( ! $item['bt_testimonial_enable_thumb'] || ! $item['bt_testimonial_enable_avatar'] ) { ?>
                                        <img src="<?php echo $item['bt_testimonial_image_thumb']['url']; ?>" alt="<?php echo esc_attr( get_post_meta( $item['bt_testimonial_image_thumb']['id'], '_wp_attachment_image_alt', true ) ); ?>">
                                    <?php };

                                    if ( $item['bt_testimonial_enable_avatar'] == 'yes' && $item['bt_testimonial_enable_thumb'] == 'yes' ) { ?>
                                        <img src="<?php echo $item['bt_testimonial_image']['url']; ?>" alt="<?php echo esc_attr( get_post_meta( $item['bt_testimonial_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
	                                    <?php
                                    };
                                    ?>

                                </figure>
                            </div>
	                        <?php
	                        $i ++;
                        endforeach; ?>
                    </div>
                </div>
                <div class="text-after-thumb">

                    <?php
                    $title = $settings['bt_testimonial_thumbs_text_after'];
                    if ( ! empty( $settings['bt_testimonial_link_thumbs_text_after']['url'] ) ) {
	                    $this->add_render_attribute( 'thumbs_text_after_url', 'href', $settings['bt_testimonial_link_thumbs_text_after']['url'] );

	                    if ( $settings['bt_testimonial_link_thumbs_text_after']['is_external'] ) {
		                    $this->add_render_attribute( 'thumbs_text_after_url', 'target', '_blank' );
	                    }

	                    if ( ! empty( $settings['bt_testimonial_link_thumbs_text_after']['nofollow'] ) ) {
		                    $this->add_render_attribute( 'thumbs_text_after_url', 'rel', 'nofollow' );
	                    }

	                    $title = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'thumbs_text_after_url' ), $title );
                    }

                    echo $title;
                    ?>
                </div>
            </div>
		<?php }
	}

	/**
	 * Render logo carousel dots output on the frontend.
	 */
	protected function render_dots() {
		$settings = $this->get_settings_for_display();

		if ( $settings['dots'] == 'yes' ) { ?>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-<?php echo esc_attr( $this->get_id() ); ?>"></div>
		<?php }
	}

	/**
	 * Render logo carousel arrows output on the frontend.
	 */
	protected function render_arrows() {
		$settings = $this->get_settings_for_display();

		if ( $settings['arrows'] == 'yes' ) { ?>
			<?php
			if ( $settings['arrow'] ) {
				$pa_next_arrow = $settings['arrow'];
				$pa_prev_arrow = str_replace( "right", "left", $settings['arrow'] );
			} else {
				$pa_next_arrow = 'fa fa-angle-right';
				$pa_prev_arrow = 'fa fa-angle-left';
			}
			?>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-next-<?php echo esc_attr( $this->get_id() ); ?>">
                <i class="<?php echo esc_attr( $pa_next_arrow ); ?>"></i>
            </div>
            <div class="swiper-button-prev swiper-button-prev-<?php echo esc_attr( $this->get_id() ); ?>">
                <i class="<?php echo esc_attr( $pa_prev_arrow ); ?>"></i>
            </div>
		<?php }
	}

	protected function content_template() {
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_btTestimonialSlider_Widget() );
