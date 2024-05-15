<?php
function krowd_register_meta_boxes(){

   $prefix = 'krowd_';
   global $meta_boxes, $wp_registered_sidebars;;
   $sidebar = array();
   $sidebar[""] = ' --Default-- ';
   foreach($wp_registered_sidebars as $key => $value){
      $sidebar[$value['id']] = $value['name'];
   }
   $default_options = get_option('krowd_options');
   
   $meta_boxes = array();

   /* Thumbnail Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_post_thumbnail',
      'title' => esc_html__('Thumbnail', 'krowd'),
      'pages' => array( 'post' ),
      'context' => 'normal',
      'fields' => array(
         
         // THUMBNAIL IMAGE
         array(
            'name'  => esc_html__('Thumbnail image', 'krowd'),
            'desc'  => esc_html__('The image that will be used as the thumbnail image.', 'krowd'),
            'id'    => "{$prefix}thumbnail_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // THUMBNAIL VIDEO
         array(
            'name' => esc_html__('Thumbnail video URL', 'krowd'),
            'id' => $prefix . 'thumbnail_video_url',
            'desc' => esc_html__('Enter the video url for the thumbnail. Only links from Vimeo & YouTube are supported.', 'krowd'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL AUDIO
         array(
            'name' => esc_html__('Thumbnail audio URL', 'krowd'),
            'id' => "{$prefix}thumbnail_audio_url",
            'desc' => esc_html__('Enter the audio url for the thumbnail.', 'krowd'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL GALLERY
         array(
            'name'             => esc_html__('Thumbnail gallery', 'krowd'),
            'desc'             => esc_html__('The images that will be used in the thumbnail gallery.', 'krowd'),
            'id'               => "{$prefix}thumbnail_gallery",
            'type'             => 'image_advanced',
            'max_file_uploads' => 50,
         ),

         // THUMBNAIL LINK TYPE
         array(
            'name' => esc_html__('Thumbnail link type', 'krowd'),
            'id'   => "{$prefix}thumbnail_link_type",
            'type' => 'select',
            'options' => array(
               'link_to_post'    => esc_html__('Link to item', 'krowd'),
               'link_to_url'     => esc_html__('Link to URL', 'krowd'),
               'link_to_url_nw'  => esc_html__('Link to URL (New Window)', 'krowd'),
               'lightbox_thumb'  => esc_html__('Lightbox to the thumbnail image', 'krowd'),
               'lightbox_image'  => esc_html__('Lightbox to image (select below)', 'krowd'),
               'lightbox_video'  => esc_html__('Fullscreen Video Overlay (input below)', 'krowd')
            ),
            'multiple' => false,
            'std'  => 'link-to-post',
            'desc' => esc_html__('Choose what link will be used for the image(s) and title of the item.', 'krowd')
         ),

         // THUMBNAIL LINK URL
         array(
            'name' => esc_html__('Thumbnail link URL', 'krowd'),
            'id' => $prefix . 'thumbnail_link_url',
            'desc' => esc_html__('Enter the url for the thumbnail link.', 'krowd'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),

         // THUMBNAIL LINK LIGHTBOX IMAGE
         array(
            'name'  => esc_html__('Thumbnail link lightbox image', 'krowd'),
            'desc'  => esc_html__('The image that will be used as the lightbox image.', 'krowd'),
            'id'    => "{$prefix}thumbnail_link_image",
            'type'  => 'thickbox_image'
         ),
      )
   );

    /* Page Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_page',
      'title' => esc_html__('Page Meta', 'krowd'),
      'pages' => array( 'page', 'portfolio', 'product', 'post', 'give_forms', 'service' ),
      'priority'   => 'high',
      'fields' => array(
         // Full width
         array(
            'name' => esc_html__('Full Width( 100% Main Width )', 'krowd'),
            'id'   => "{$prefix}page_full_width",
            'type' => 'switch',
            'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'krowd'),
            'std' => 0,
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Header', 'krowd'),
            'id' => $prefix . 'page_header',
            'desc' => esc_html__("You can change header for page if you like's.", 'krowd'),
            'type'  => 'select',
            'options'   => krowd_get_headers(),
            'std' => '__default_option_theme',
         ),
         array(
            'name'      => esc_html__('Footer', 'krowd'),
            'id'        => $prefix . 'page_footer',
            'desc'      => esc_html__("You can change footer for page if you like's",'krowd'),
            'type'      => 'select',
            'options'   =>  krowd_get_footer(),
            'std'       => '__default_option_theme'
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Extra page class', 'krowd'),
            'id' => $prefix . 'extra_page_class',
            'desc' => esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'krowd'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),
        
      )
   );

   /* Page Title Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_page_heading',
      'title' => esc_html__('Page Title & Breadcrumb', 'krowd'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'give_forms', 'tribe_events', 'gva_team', 'service'),
      'context' => 'normal',
      'priority'   => 'high',
      'fields' => array(
        array(
          'name' => esc_html__('Remove Title of Page', 'krowd'),   
          'id'   => "{$prefix}disable_page_title",
          'type' => 'switch',
          'std'  => 0,
        ),
        array(
          'name' => esc_html__('Disable Breadcrumbs', 'krowd'),
          'id'   => "{$prefix}no_breadcrumbs",
          'type' => 'switch',
          'desc' => esc_html__('Disable the breadcrumbs from under the page title on this page.', 'krowd'),
          'std' => 0,
        ),
        array(
          'name' => esc_html__('Breadcrumb Layout', 'krowd'),
          'id'   => "{$prefix}breadcrumb_layout",
          'type' => 'select',
          'options' => array(
             'theme_options'     => esc_html__('Default Options in Theme-Settings', 'krowd'),
             'page_options'      => esc_html__('Individuals Options This Page', 'krowd')
          ),
          'multiple' => false,
          'std'  => 'theme_options',
          'desc' => esc_html__('You can use breadcrumb settings default in Theme-Settings or individuals this page', 'krowd')
        ),
        array(
          'name'    => esc_html__('Show page title in the breadcrumbs', 'krowd'),   
          'id'      => "{$prefix}page_title",
          'type'    => 'switch',
          'std'     => 1,
          'class'   => 'breadcrumb_setting'
        ),
        array(
          'name' => esc_html__('Page Title Override', 'krowd'),
          'id' => $prefix . 'page_title_one',
          'desc' => esc_html__("Enter a custom page title if you'd like.", 'krowd'),
          'type'  => 'text',
          'std' => '',
          'class'   => 'breadcrumb_setting'
        ),
        array(
          'name'        => esc_html__( 'Breadcrumb Padding Top (px)', 'krowd' ),
          'id'          => "{$prefix}breadcrumb_padding_top",
          'type'        => 'number',
          'prefix'      => '',
          'class'       => 'breadcrumb_setting',
          'desc'        => esc_html__('Option Padding Top of Breacrumb, set empty = padding default of theme', 'krowd'),
          'std'         => krowd_get_option('breadcrumb_padding_top', '135'),
        ),
        array(
          'name'       => esc_html__( 'Breadcrumb Padding Bottom (px)', 'krowd' ),
          'id'         => "{$prefix}breadcrumb_padding_bottom",
          'type'       => 'number',
          'prefix'     => 'px',
          'class'      => 'breadcrumb_setting',
          'desc'        => esc_html__('Option Padding Bottom of Breacrumb, set empty = padding default of theme', 'krowd'),
          'std'        => krowd_get_option('breadcrumb_padding_bottom', '135'),
        ),
        array(
          'name' => esc_html__( 'Background Overlay Color', 'krowd' ),
          'id'   => "{$prefix}bg_color_title",
          'desc' => esc_html__( "Set an overlay color for hero heading image.", 'krowd' ),
          'type' => 'color',
          'class'   => 'breadcrumb_setting',
          'std'  => '',
        ),
        array(
          'name'       => esc_html__( 'Overlay Opacity', 'krowd' ),
          'id'         => "{$prefix}bg_opacity_title",
          'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'krowd' ),
          'clone'      => false,
          'type'       => 'slider',
          'prefix'     => '',
          'class'   => 'breadcrumb_setting',
          'js_options' => array(
              'min'  => 0,
              'max'  => 100,
              'step' => 1,
          ),
          'std'   => '50'
        ),
        array(
          'name'    => esc_html__('Enable Breadcrumb Image', 'krowd'),
          'id'      => "{$prefix}image_breadcrumbs",
          'type'    => 'switch',
          'class'   => 'breadcrumb_setting',
          'std'     => 1,
        ),
        array(
          'name'  => esc_html__('Breadcrumb Background Image', 'krowd'),
          'id'    => "{$prefix}page_title_image",
          'type'  => 'image_advanced',
          'class'   => 'breadcrumb_setting',
          'max_file_uploads' => 1
        ),
        array(
          'name' => esc_html__('Heading Text Style', 'krowd'),
          'id'   => "{$prefix}page_title_text_style",
          'type' => 'select',
          'class'   => 'breadcrumb_setting',
          'options' => array(
             'text-light'     => esc_html__('Light', 'krowd'),
             'text-dark'      => esc_html__('Dark', 'krowd')
          ),
          'multiple' => false,
          'std'  => krowd_get_option('breadcrumb_text_stype', 'text-dark'),
          'desc' => esc_html__('If you uploaded an image in the option above, choose light/dark styling for the text heading text here.', 'krowd')
        ),
        array(
          'name' => esc_html__('Heading Text Align', 'krowd'),
          'id'   => "{$prefix}page_title_text_align",
          'type' => 'select',
          'class'   => 'breadcrumb_setting',
          'options' => array(
             'text-left'      => esc_html__('Left', 'krowd'),
             'text-center'    => esc_html__('Center', 'krowd'),
             'text-right'     => esc_html__('Right', 'krowd')
          ),
          'multiple' => false,
          'std'  => krowd_get_option('breadcrumb_text_align', 'text-center'),
          'desc' => esc_html__('Choose the text alignment for the hero heading.', 'krowd')
        ),
      )
   );

   /* Brands Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_brands_options',
      'title' => esc_html__('Brands Options', 'krowd'),
      'pages' => array( 'brands'),
      'priority'   => 'high',
      'fields' => array(
         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Url Link', 'krowd'),
             'id'    => "{$prefix}url_link",
             'type' => 'text',
             'std'   => ''
         ),
      )
   );

   /* Sidebar Meta Box Page
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_sidebar_page',
      'title' => esc_html__('Sidebar Options', 'krowd'),
      'pages' => array( 'post', 'page', 'portfolio', 'gallery', 'give_forms', 'tribe_events', 'service' ),
      'priority'   => 'high',
      'fields' => array(

         // SIDEBAR CONFIG
         array(
            'name' => esc_html__('Sidebar configuration', 'krowd'),
            'id'   => "{$prefix}sidebar_config",
            'type' => 'select',
            'options' => array(
              ''                   => esc_html__('--Default--', 'krowd'),
              'no-sidebars'        => esc_html__('No Sidebars', 'krowd'),
              'left-sidebar'       => esc_html__('Left Sidebar', 'krowd'),
              'right-sidebar'      => esc_html__('Right Sidebar', 'krowd'),
            ),
            'multiple' => false,
            'std'  => '',
            'desc' => esc_html__('Choose the sidebar configuration for the detail page of this page.', 'krowd'),
         ),

         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Left Sidebar', 'krowd'),
             'id'    => "{$prefix}left_sidebar",
             'type' => 'select',
             'options'  => $sidebar,
             'std'   => ''
         ),

         // RIGHT SIDEBAR
         array (
            'name'   => esc_html__('Right Sidebar', 'krowd'),
            'id'    => "{$prefix}right_sidebar",
            'type' => 'select',
            'options'  => $sidebar,
            'std'   => ''
         ),
      )
   );

  /* Gallery Meta Box 
  ================================================== */
  $meta_boxes[] = array(
    'id'    => 'metaboxes_portfolio_page',
    'title' => esc_html__('Portfolio Settings', 'krowd'),
    'pages' => array( 'portfolio' ),
    'priority'   => 'high',
    'fields' => array(
      array (
        'name'   => esc_html__('Gallery Images', 'krowd'),
        'id'    => "{$prefix}gallery_images",
        'type'             => 'image_advanced',
        'max_file_uploads' => 50,
      ),
    )
  );


  $meta_boxes[] = array(
    'id'    => 'metaboxes_gallery_page',
    'title' => esc_html__('Gallery Settings', 'krowd'),
    'pages' => array( 'gallery' ),
    'priority'   => 'high',
    'fields' => array(
      array (
        'name'   => esc_html__('Gallery Images', 'krowd'),
        'id'    => "{$prefix}gallery_images",
        'type'             => 'image_advanced',
        'max_file_uploads' => 50,
      ),
    )
  );

  /* Service Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'metaboxes_service_page',
      'title' => esc_html__('Service Link Settings', 'krowd'),
      'pages' => array( 'service' ),
      'priority' => 'low',
      'fields' => array(
        array (
          'name'   => esc_html__('Gallery Images', 'krowd'),
          'id'    => "{$prefix}gallery_images",
          'type'             => 'image_advanced',
          'max_file_uploads' => 50,
        ),
        array(
          'name' => esc_html__('Show Gallery Top Service Single Page', 'krowd'),
          'id'   => "{$prefix}show_service_gallery",
          'type' => 'switch',
          'std' => 0,
        ),
        array (
          'name'    => esc_html__('Extra Link', 'krowd'),
          'id'      => "{$prefix}service_extra_link",
          'type'    => 'text'
        ),
      )
   );

   $map_api_key = krowd_get_option('map_api_key', 'AIzaSyChkvQkXo_61RR7u-XJOj-rLF9ekk9eRYc'); 
    /* Event Meta Box 
   ================================================== */

  $meta_boxes[] = array(
    'id'    => 'metaboxes_team_page',
    'title' => esc_html__('Team Settings', 'krowd'),
    'pages' => array( 'gva_team' ),
    'priority'   => 'high',
    'fields' => array(
      array (
        'name'   => esc_html__('Position', 'krowd'),
        'id'    => "{$prefix}team_position",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Quote', 'krowd'),
        'id'    => "{$prefix}team_quote",
        'type' => 'textarea',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Email', 'krowd'),
        'id'    => "{$prefix}team_email",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Phone', 'krowd'),
        'id'    => "{$prefix}team_phone",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Address', 'krowd'),
        'id'    => "{$prefix}team_address",
        'type' => 'text',
        'std'   => ''
      ),
    )
  );

  $meta_boxes[] = array(
    'id'    => 'metaboxes_header_builder',
    'title' => esc_html__('Header Builder', 'krowd'),
    'pages' => array( 'gva_header' ),
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => esc_html__('Enable Background Black', 'krowd'),
        'id'   => "{$prefix}header_bg_black",
        'type' => 'switch',
        'desc' => esc_html__('It will display background black when builder header.', 'krowd'),
        'std' => 0,
      ),
      array(
        'name' => esc_html__('Full Width( 100% Main Width )', 'krowd'),
        'id'   => "{$prefix}header_full_width",
        'type' => 'switch',
        'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'krowd'),
        'std' => 0,
     ),
      array(
        'name' => esc_html__('Position Styling', 'krowd'),
        'id'   => "{$prefix}header_position",
        'type' => 'select',
        'options' => array(
          'relative'      => esc_html__('Relative', 'krowd'),
          'absolute'      => esc_html__('Absolute', 'krowd'),
        ),
        'std' => 'relative',
        'multiple' => false,
      ),
    )
  );

  $meta_boxes[] = array(
    'id'    => 'project_other_settings',
    'title' => esc_html__('Project Other Settings', 'krowd'),
    'pages' => array( 'product' ),
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => esc_html__('Project Extra Link', 'krowd'),
        'id' => $prefix . 'project_link',
        'type' => 'text'
      ),
    )
  );
  
  $meta_boxes_result = apply_filters( 'krowd_metabox', $meta_boxes );
  return $meta_boxes_result;
 }  
  /********************* META BOX REGISTERING ***********************/
  add_filter( 'rwmb_meta_boxes', 'krowd_register_meta_boxes' , 99 );

