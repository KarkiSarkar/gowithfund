<?php

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
/**
 * Elementor tabs widget.
 *
 * Elementor widget that displays vertical or horizontal tabs with different
 * pieces of content.
 *
 * @since 1.0.0
 */
class GVAElement_Content_Horizontal extends GVAElement_Base {

   /**
    * Get widget name.
    *
    * Retrieve tabs widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
   public function get_name() {
      return 'gva-content-horizontal';
   }

   /**
    * Get widget title.
    *
    * Retrieve tabs widget title.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget title.
    */
   public function get_title() {
      return __( 'GVA Content Horizontal', 'krowd-themer' );
   }

   /**
    * Get widget icon.
    *
    * Retrieve tabs widget icon.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget icon.
    */
   public function get_icon() {
      return 'eicon-tabs';
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
      return [ 'tabs', 'accordion', 'horizontal' ];
   }

   /**
    * Register tabs widget controls.
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

      $repeater = new Repeater();

      $repeater->add_control(
         'title',
         [
            'label' => __( 'Title', 'krowd-themer' ),
            'type' => Controls_Manager::TEXT,
            'default' => __( 'Coworking Space', 'krowd-themer' ),
            'placeholder' => __( 'Tab Title', 'krowd-themer' ),
            'label_block' => true,
         ]
      );
      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Image', 'krowd-themer' ),
            'type' => Controls_Manager::MEDIA,
            'label_block' => true,
            'dynamic' => [
              'active' => true,
            ],
            'default' => [
               'url' => GAVIAS_KROWD_PLUGIN_URL . 'elementor/assets/images/image-6.jpg',
            ],
         ]
      );
      $repeater->add_control(
         'content',
         [
            'label' => __( 'Content', 'krowd-themer' ),
            'default' => __( 'Tab Content', 'krowd-themer' ),
            'placeholder' => __( 'Tab Content', 'krowd-themer' ),
            'type' => Controls_Manager::WYSIWYG,
            'show_label' => false,
         ]
      );
      $repeater->add_control(
        'link',
          [
            'label' => __( 'Link', 'krowd-themer' ),
            'type' => Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'krowd-themer' ),
          ]
      );
      
      $this->add_control(
         'content_items',
         [
            'label' => __( 'Content Items', 'krowd-themer' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
               [
                  'title' => __( 'Coworking Space', 'krowd-themer' ),
                  'content' => __( 'There are many new variations of pasages of available text.', 'elementor' ),
               ],
               [
                  'title' => __( 'Financial Advice', 'krowd-themer' ),
                  'content' => __( 'There are many new variations of pasages of available text.', 'elementor' ),
               ],
               [
                  'title' => __( 'Gobal Solutions', 'krowd-themer' ),
                  'content' => __( 'There are many new variations of pasages of available text.', 'elementor' ),
               ],
            ],
            'title_field' => '{{{ title }}}',
         ]
      );
   
      $this->add_control(
         'column',
         [
            'label'   => __( 'Column per row', 'krowd-themer' ),
            'type'    => Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
               '2'    => __( '2 Column', 'krowd-themer' ),
               '3'    => __( '3 Column', 'krowd-themer' ),
               '4'    => __( '4 Column', 'krowd-themer' ),
            ],
         ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
         'section_tabs_style',
         [
            'label' => __( 'Tabs', 'krowd-themer' ),
            'tab' => Controls_Manager::TAB_STYLE,
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

      $this->add_control(
         'background_active',
         [
            'label' => __( 'Active Background Color', 'krowd-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffff',
            'selectors' => [
               '{{WRAPPER}} .gsc-tabs-color .nav_tabs > li.active a' => 'background: {{VALUE}};',
            ],
         ]
      );

      $this->add_control(
         'color_active',
         [
            'label' => __( 'Active Color', 'krowd-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#18212e',
            'selectors' => [
               '{{WRAPPER}} .gsc-tabs-color .nav_tabs > li.active a' => 'color: {{VALUE}};',
            ],
         ]
      );

      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'tab_typography',
            'selector' => '{{WRAPPER}} .gsc-tabs-color .nav_tabs > li a',
         ]
      );

      $this->add_control(
         'heading_content',
         [
            'label' => __( 'Content', 'krowd-themer' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
         ]
      );

      $this->add_control(
         'content_color',
         [
            'label' => __( 'Color', 'krowd-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .gsc-tabs-color .tab-content .tab-pane .tab-content-item' => 'color: {{VALUE}};',
            ],
         ]
      );

      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .gsc-tabs-color .tab-content .tab-pane .tab-content-item',
         ]
      );

      $this->end_controls_section();
   }

   /**
    * Render tabs widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
   protected function render() {
      $settings = $this->get_settings_for_display();
      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template('gva-content-horizontal.php');
      print '</div>';
   }

}
