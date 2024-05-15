<?php
use Elementor\Controls_Manager;
use Elementor\Repeater;
class GVA_Elementor_Override{
   public function __construct() {
      $this->add_actions();
      $this->elementor_init_setup();
      add_action( 'elementor/editor/after_save', array($this, 'clear_cache_updating_elementor') );
   }

   public function clear_cache_updating_elementor() {
      \Elementor\Plugin::$instance->files_manager->clear_cache();
   }

   function elementor_init_setup(){
      if(!get_option('elementor_allow_svg', '')) update_option( 'elementor_allow_svg', 1 );
      if(!get_option('elementor_load_fa4_shim', '')) update_option( 'elementor_load_fa4_shim', 'yes' );
      if(!get_option('elementor_disable_color_schemes', '')) update_option( 'elementor_disable_color_schemes', 'yes' );
      if(!get_option('elementor_disable_typography_schemes', '')) update_option( 'elementor_disable_typography_schemes', 'yes' );
      if(!get_option('elementor_container_width', '')) update_option( 'elementor_container_width', '1200' );
      $cpt_support = get_option( 'elementor_cpt_support' );
      if( empty($cpt_support) ){
         $cpt_support[] = 'page';
         $cpt_support[] = 'footer';
         $cpt_support[] = 'gva_header';
         update_option('elementor_cpt_support', $cpt_support);
      }else{
         if( !in_array('footer', $cpt_support) || !in_array('gva_header', $cpt_support) ){
            $cpt_support[] = 'footer';
            $cpt_support[] = 'gva_header';
            update_option('elementor_cpt_support', $cpt_support);
            
         }

      }
   }

   public function add_actions() {
      add_action( 'elementor/element/column/layout/after_section_end', [ $this, 'after_column_end' ], 10, 2 );
      add_action( 'elementor/element/section/section_layout/after_section_end', [ $this, 'after_row_end' ], 10, 2 );
      add_action( 'elementor/element/section/section_structure/after_section_end', [ $this, 'row_color_theme' ], 10, 2 );

      //Color theme for Elements
      add_action( 'elementor/element/icon-box/section_icon/after_section_end', array($this,'icon_color_theme'), 10, 2 );
      add_action( 'elementor/element/icon-list/section_icon/after_section_end', array($this,'icon_color_theme'), 10, 2 );
   }

   public function after_column_end( $obj, $args ) {
      $obj->start_controls_section(
         'gva_section_column',
         array(
            'label' => esc_html__( 'Column Theme Settings', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         )
      );

      $obj->add_control(
         '_gva_extra_classes',
         [
            'label' => __( 'Background Style Available', 'gaviasthemer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- None --', 'gaviasthemer' ),
               'bg-overflow-left' => __( 'Background Overflow Left', 'gaviasthemer' ),
               'bg-overflow-right' => __( 'Background Overflow Right', 'gaviasthemer' ),
            ],
            'default' => 'top',
            'prefix_class' => 'column-style-',
         ]
      );
      $obj->add_control(
         '_gva_elements_style',
         [
            'label' => __( 'Elements Style', 'krowd-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- None --', 'krowd-themer' ),
               'flex-element-center' => __( 'Flex Elements Center Align Left', 'krowd-themer' ),
               'flex-element-center-ali-right' => __( 'Flex Elements Center Align Right', 'krowd-themer' ),
            ],
            'default' => '',
            'prefix_class' => '',
         ]
     );
      $obj->add_control(
         'gva_column_color',
         [
            'label' => __( 'Background Color', 'gaviasthemer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'theme'         => __( 'Background Color Theme', 'gaviasthemer' ),
               'theme-second'  => __( 'Background Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'bg-col-',
         ]
      );
 
      $obj->end_controls_section();    

      //Header Builder
      $obj->start_controls_section(
         'gva_section_row',
         array(
            'label' => esc_html__( 'Gavias Extra Settings Column for Header Builder', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_LAYOUT,
         )
      );

      // Has megamenu
      $obj->add_control(
         'row_has_megamenu',
         [
            'label'  => esc_html__( 'Column include main-menu', 'krowd-themer' ),
            'type'      => Controls_Manager::HEADING
         ]
      );

      $obj->add_control(
         '_gva_has_megamenu',
         [
            'label'     => __( 'Enable if Column include main-menu', 'krowd-themer' ),
            'type'      => Controls_Manager::SELECT,
            'label_block'  => true,
            'options'   => [
               'column-main-menu' => __( 'Enable', 'krowd-themer' ),
               '' => __( 'Disable', 'krowd-themer' ),
            ],
            'default'         => '',
            'prefix_class'    => '',
         ]
      ); 
      $obj->end_controls_section();    

   }

   public function after_row_end( $obj, $args ) {
      
      $obj->start_controls_section(
         'gva_section_row',
         array(
            'label' => esc_html__( 'Gavias Extra Settings Row for Header Builder', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_LAYOUT,
         )
      );

      // Header Sticky
      $obj->add_control(
         'row_header_sticky',
         [
            'label'  => esc_html__( 'Sticky Row Settings (Use only for row in header)', 'krowd-themer' ),
            'type'      => Controls_Manager::HEADING
         ]
      );

      $obj->add_control(
         '_gva_sticky_menu',
         [
            'label'     => __( 'Sticky Menu Row', 'krowd-themer' ),
            'type'      => Controls_Manager::SELECT,
            'options'   => [
               '' => __( '-- None --', 'krowd-themer' ),
               'gv-sticky-menu' => __( 'Sticky Menu', 'krowd-themer' ),
            ],
            'default'         => '',
            'prefix_class'    => '',
            'description'     => __('You can only enable sticky menu for one row, please make sure display all sticky menu for other rows')
         ]
      );

      $obj->add_control(
         '_gva_sticky_background',
         [
            'label'     => __('Sticky Background Color', 'krowd-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck' => 'background: {{VALUE}}!important', 
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->add_control(
         '_gva_sticky_menu_text_color',
         [
            'label'     => __('Sticky Text Color', 'krowd-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck' => 'color: {{VALUE}}', 
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->add_control(
         '_gva_sticky_menu_link_color',
         [
            'label'     => __('Sticky Link Menu Color', 'krowd-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck .gva-navigation-menu ul.gva-nav-menu > li > a' => 'color: {{VALUE}}',
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->add_control(
         '_gva_sticky_menu_link_hover_color',
         [
            'label'     => __('Sticky Link Menu Hover Color', 'krowd-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck .gva-navigation-menu ul.gva-nav-menu > li > a:hover' => 'color: {{VALUE}}',
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->end_controls_section();
   }

   public function row_color_theme( $obj, $args ) {
      $obj->start_controls_section(
         'gva_section_icon_style',
         array(
            'label' => esc_html__( 'Row Theme Settings', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         )
      );

      $obj->add_control(
         'gva_row_color',
         [
            'label' => __( 'Background Color', 'gaviasthemer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'theme'         => __( 'Background Color Theme', 'gaviasthemer' ),
               'theme-second'  => __( 'Background Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'bg-row-',
         ]
      );

      $obj->end_controls_section(); 
   }

   public function icon_color_theme( $obj, $args ) {
      $obj->start_controls_section(
         'gva_section_icon_style',
         array(
            'label' => esc_html__( 'Color Theme Settings', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         )
      );

      $obj->add_control(
         'gva_icon_color',
         [
            'label' => __( 'Icon Color', 'gaviasthemer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'color-theme'         => __( 'Color Theme', 'gaviasthemer' ),
               'color-theme-second'  => __( 'Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'icon-',
         ]
      );

      $obj->add_control(
         'gva_hover_color',
         [
            'label' => __( 'Link Hover Color', 'krowd-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'color-theme'         => __( 'Color Theme', 'gaviasthemer' ),
               'color-theme-second'  => __( 'Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'hover-',
         ]
     );
 
      $obj->end_controls_section(); 
   }
}

new GVA_Elementor_Override();

