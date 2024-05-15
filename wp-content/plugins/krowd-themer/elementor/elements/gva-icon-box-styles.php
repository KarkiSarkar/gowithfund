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
use Elementor\Icons_Manager;
/**
 * Elementor icon box widget.
 *
 * Elementor widget that displays an icon, a headline and a text.
 *
 * @since 1.0.0
 */
class GVAElement_Icon_Box_Styles extends GVAElement_Base {  

	public function get_name() {
		return 'gva-icon-box-styles';
	}

	public function get_title() {
		return __( 'GVA Icon Box Styles', 'krowd-themer' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_keywords() {
		return [ 'icon box', 'icon' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'GVA Icon Box Style', 'krowd-themer' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I', 'krowd-themer' ),
					'style-2' 		=> __( 'Style II', 'krowd-themer' ),
				],
				'default' => 'style-1',
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-home',
					'library' => 'fa-solid',
				],
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
			'description_text',
			[
				'label' => '',
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'There are many new variations of pasages of available text.', 'krowd-themer' ),
				'placeholder' => __( 'Enter your description', 'krowd-themer' ),
				'rows' => 10,
				'separator' => 'none',
				'show_label' => false,
				'condition' => [
					'style' => [ 'style-1', 'style-2']
				]
			]
		);

		$this->add_control(
			'header_tag',
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( //** Section Button
			'section_button',
			[
				'label' => __( 'Button & Link', 'krowd-themer' ),
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'krowd-themer' ),
				'type' => Controls_Manager::URL,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Box Style', 'krowd-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_primary_color',
			[
				'label' => __( 'Primary Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles.style-2 .block-content::before, {{WRAPPER}} .gsc-icon-box-styles.style-2 .block-content::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles.style-3 .block-content::before, {{WRAPPER}} .gsc-icon-box-styles.style-3 .block-content::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' 		=> 0,
					'right' 		=> 0,
					'left'		=> 0,
					'bottom'		=> 0,
					'unit'		=> 'px'
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles.style-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_height',
			[
				'label' => __( 'Min Height', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .block-content' => 'min-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'style' => ['style-3'],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'selected_icon[value]!' => ''
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_background',
			[
				'label' => __( 'Icon Background', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon' => 'background: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles:hover .icon-inner .box-icon:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Hover | Icon Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles:hover .icon-inner .box-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles:hover .icon-inner .box-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_background_hover',
			[
				'label' => __( 'Hover | Icon Background', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles:hover .icon-inner .box-icon:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon:before' => 'background: {{VALUE}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 52
				],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 90,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 25,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1 .icon-inner' => 'padding-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles.style-2 .icon-inner' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 105,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon' => 'width: {{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' 		=> 25,
					'right' 		=> 10,
					'left'		=> 10,
					'bottom'		=> 10,
					'unit'		=> 'px'
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' 		=> 50,
					'right' 		=> 50,
					'left'		=> 50,
					'bottom'		=> 50,
					'unit'		=> '%'
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'krowd-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'	=> [
					'size'	=> 0
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1 .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles.style-2 .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .gsc-icon-box-styles .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-icon-box-styles .title, {{WRAPPER}} .gsc-icon-box-styles .title a',
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'krowd-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style' => ['style-1', 'style-2', 'style-3'],
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .desc' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1', 'style-2', 'style-3'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .gsc-icon-box-styles .desc',
				'condition' => [
					'style' => ['style-1', 'style-2', 'style-3'],
				],

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
         include $this->get_template('gva-icon-box-styles.php');
      print '</div>';
	}
}
