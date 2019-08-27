<?php
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

class Elementor_btStepBox_Widget extends Widget_Base {

	public function get_name() {
		return 'bt_step_box';
	}

	public function get_title() {
		return __( 'BE Step Box', 'ametex' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'bears-category' ];
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'ametex' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'list_number', [
				'label' => __( 'Number', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Number' , 'ametex' ),
			]
		);
		
		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'ametex' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'ametex' ),
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'ametex' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'ametex' ),
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'ametex' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_number' => __( '1', 'ametex' ),
						'list_title' => __( 'Title #1', 'ametex' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'ametex' ),
					],
					[
						'list_number' => __( '2', 'ametex' ),
						'list_title' => __( 'Title #2', 'ametex' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'ametex' ),
					],
					[
						'list_number' => __( '3', 'ametex' ),
						'list_title' => __( 'Title #3', 'ametex' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'ametex' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$this->add_render_attribute(
			'wrapper',
			[
				'class' => [ 'elementor-element', 'elementor-widget', 'bt-step-box' ],
			]
		);
		$this->add_render_attribute(
			'container',
			[
				'class' => [ 'elementor-posts-container', 'elementor-posts', 'elementor-step-box' ],
			]
		);
		
		?>
			<div <?php echo ''.$this->get_render_attribute_string( 'wrapper' ); ?>>
				<div <?php echo ''.$this->get_render_attribute_string( 'container' ); ?>>
					<?php
						if ( $settings['list'] ) {
							foreach (  $settings['list'] as $item ) {
								echo '<div class="bt-box__item">
										<div class="bt-box__number">' . $item['list_number'] . '</div>
										<h3 class="bt-box__title">' . $item['list_title'] . '</h3>
										<div class="bt-box__description">' . $item['list_content'] . '</div>
									</div>';
							}
						}
					?>
				</div>
			</div>
		<?php

	}

}