<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
/**
 * Elementor icon box widget.
 *
 * Elementor widget that displays an icon, a headline and a text.
 *
 * @since 1.0.0
 */
class GVAElement_Counter extends GVAElement_Base {  

	/**
	 * Get widget name.
	 *
	 * Retrieve icon box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'gva-counter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'GVA Counter', 'krowd-themer' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-icon-box';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'counter', 'icon' ];
	}

	public function get_script_depends() {
      return [
         'jquery.count_to',
         'jquery.appear',
         'gavias.elements'
      ];
   }

	/**
	 * Register icon box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'krowd-themer' ),
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon Class', 'krowd-themer' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-home',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'number',
			[
				'label' => __( 'Number', 'krowd-themer' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 110
			]
		);
		$this->add_control(
			'text_before',
			[
				'label' => __( 'Text Before Number', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'text_after',
			[
				'label' => __( 'Text After Number', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title & Description', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is the heading', 'krowd-themer' ),
				'placeholder' => __( 'Enter your title', 'krowd-themer' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'krowd-themer' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'krowd-themer' ),
			]
		);
		$this->add_control(
			'title_size',
			[
				'label' => __( 'Title HTML Tag', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'div',
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I', 'krowd-themer' ),
					'style-2' 		=> __( 'Style II', 'krowd-themer' )
				],
				'default' => 'style-1',
			]
		);
		$this->end_controls_section();

		//Style Box
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => ['style-2']
				]
			]
		);
		
		$this->add_control(
			'box_bg_color',
			[
				'label' => __( 'Box Background Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block.style-2 .box-content' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'box_bg_color_highlight',
			[
				'label' => __( 'Highlight Background Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block.style-2 .box-content:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Icon
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .milestone-block .milestone-icon .icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Hover - Icon Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block:hover .milestone-icon .icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .milestone-block:hover .milestone-icon .icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label' => __( 'Hover - Icon Background Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 70
				],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 115,
				],
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .milestone-block .milestone-icon .icon svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_box_size',
			[
				'label' => __( 'Icon Box Size(Height & Width Box Icon)', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 80,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .milestone-block.style-1 .milestone-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .milestone-block.style-2 .milestone-icon' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-icon .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .milestone-block .milestone-icon .icon:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();


		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_top_space',
			[
				'label' => __( 'Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .milestone-block .box-content .milestone-content .milestone-text' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block .box-content .milestone-content .milestone-text' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .milestone-block .box-content .milestone-content .milestone-text',
			]
		);

		$this->end_controls_section();

		// Number Text
		$this->start_controls_section(
			'sectionn_number_style',
			[
				'label' => __( 'Number Text', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'number_bottom_space',
			[
				'label' => __( 'Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-number-inner' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'number_text_color',
			[
				'label' => __( 'Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-block .milestone-number-inner .milestone-number' => 'color: {{VALUE}};',
					'{{WRAPPER}} .milestone-block .milestone-number-inner .symbol' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_text_typography',
				'selector' => '{{WRAPPER}} .milestone-block .milestone-number',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template('gva-counter.php');
      print '</div>';
	}
}
