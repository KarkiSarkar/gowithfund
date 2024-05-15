<?php
   add_filter( 'elementor/icons_manager/additional_tabs', 'krowd_icons_filters' , 9999999, 1 );
function krowd_icons_filters( $tabs = array() ) {
      $newicons = [];

      $newicons[ 'gva_custom_icon' ] = [
         'name'          => 'gva_custom_icon',
         'label'         => 'Icons of Theme',
         'url'           => '',
         'enqueue'       => '',
         'prefix'        => '',
         'displayPrefix' => 'fi',
         'labelIcon'     => 'fab fa-font-awesome-alt',
         'ver'           => '1.2',
         'fetchJson'     => GAVIAS_KROWD_PLUGIN_URL . 'elementor/assets/icons.json',
      ];

      return array_merge( $tabs, $newicons );

   }

   add_action( 'wp_print_footer_scripts', 'krowd_insert_icons_footer_css'  );
   function krowd_insert_icons_footer_css() {
      echo '<link rel="stylesheet" type="text/css" href="' . GAVIAS_KROWD_PLUGIN_URL . 'elementor/assets/icons/flaticon.css">';
   }
