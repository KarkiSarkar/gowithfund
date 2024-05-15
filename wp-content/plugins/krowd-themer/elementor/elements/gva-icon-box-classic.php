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
class GVAElement_Icon_Box_Classic extends GVAElement_Base {  

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
		return 'gva-icon-box-classic';
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
		return __( 'GVA Icon Box Classic', 'krowd-themer' );
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
		return [ 'icon box', 'icon' ];
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
			'section_icon',
			[
				'label' => __( 'GVA Icon Box Classic', 'krowd-themer' ),
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
			'view',
			[
				'label' => __( 'View', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'krowd-themer' ),
					'stacked' => __( 'Stacked', 'krowd-themer' ),
					'framed' => __( 'Framed', 'krowd-themer' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'krowd-themer' ),
					'square' => __( 'Square', 'krowd-themer' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
					'icon!' => '',
				],
				'prefix_class' => 'elementor-shape-',
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top-center' 		=> __( 'Top Center', 'krowd-themer' ),
					'top-left' 			=> __( 'Top Left', 'krowd-themer' ),
					'top-right' 		=> __( 'Top Right', 'krowd-themer' ),
					'right' 				=> __( 'Right', 'krowd-themer' ),
					'left' 				=> __( 'Left', 'krowd-themer' ),
				],
				'default' => 'top-center',
				'condition' => [
					'icon!' => '',
				],
			]
		);
		$this->add_control(
			'subtitle_text',
			[
				'label' => __( 'Sub-Title', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub title', 'krowd-themer' ),
				'label_block' => true,
				'condition' => [
					'position' => 'top-center',
				],
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title & Description', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
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
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'krowd-themer' ),
				'placeholder' => __( 'Enter your description', 'krowd-themer' ),
				'rows' => 10,
				'separator' => 'none',
				'show_label' => false,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'krowd-themer' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'krowd-themer' ),
				'separator' => 'before',
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

	
		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'icon_size_font',
			[
				'label' => __( 'Size', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min' => 12,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'default'	=>[
					'unit' => 'px'
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'rotate',
			[
				'label' => __( 'Rotate', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
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
					'{{WRAPPER}} .gsc-icon-box .highlight-icon .box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'default',
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
			'content_vertical_alignment',
			[
				'label' => __( 'Vertical Alignment', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'krowd-themer' ),
					'middle' => __( 'Middle', 'krowd-themer' ),
					'bottom' => __( 'Bottom', 'krowd-themer' ),
				],
				'default' => 'top',
				'prefix_class' => 'elementor-vertical-align-',
			]
		);

		$this->add_control(
			'heading_subtitle_style',
			[
				'label' => __( 'Sub Title', 'krowd-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'position' => 'top-center',
				]
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .highlight_content .sub-title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'position' => 'top-center',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .highlight_content .sub-title',
				'condition' => [
					'position' => 'top-center',
				]
			]
		);
		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => __( 'Padding', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'	=> [
					'top' 		=> 10,
					'bottom'		=> 0,
					'right' 		=> 0,
					'left'  		=> 0,
					'unit'		=> 'px'
				],
				'condition' => [
					'position' => 'top-center',
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight_content .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => __( 'Margin', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight_content .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'position' => 'top-center',
				]
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
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .highlight_content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .highlight_content .title' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .highlight_content .title, {{WRAPPER}} .highlight_content .title a',
			]
		);
		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'krowd-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .highlight_content .desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .highlight_content .desc',
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'	=> [
					'top' 		=> 10,
					'bottom'		=> 0,
					'right' 		=> 0,
					'left'  		=> 0,
					'unit'		=> 'px'
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight_content .desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_margin',
			[
				'label' => __( 'Margin', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box .highlight_content .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
         include $this->get_template('gva-icon-box-classic.php');
      print '</div>';
	}

}
