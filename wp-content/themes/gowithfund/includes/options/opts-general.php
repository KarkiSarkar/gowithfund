<?php
	Redux::setSection( $opt_name, array(
		'title' => esc_html__('General Options', 'krowd'),
		'desc' => '',
		'icon' => 'el-icon-wrench',
		'fields' => array(
			array(
			  'id' => 'skin_color',
			  'type' => 'select',
			  'title' => esc_html__('Skin Colors Available', 'krowd'),
			  'desc' => '',
			  'options' => array(
				 '' => 'Default',
				 'blue'          => 'Blue',
				 'brown'         => 'Brown',
				 'green'         => 'Green',
				 'lilac'         => 'Lilac',
				 'lime-green'    => 'Lime Green',
				 'orange'        => 'Orange',
				 'pigad-blue'    => 'Pigad Blue',
				 'pink'          => 'Pink',
				 'purple'        => 'Purple',
				 'red'           => 'Red',
				 'turquoise'     => 'Turquoise',
				 'turquoise2'    => 'Turquoise II',
				 'violet-red'    => 'Violet Red',
				 'yellow'        => 'Yellow'
				 ),
			  'default' => ''
			),
			array(
		      'id'        => 'color_theme',
		      'type'         => 'color',
		      'title'        => esc_html__( 'Custom Color Theme', 'krowd' ),
		      'desc'         => esc_html__( 'Used custom color theme instead of Skin Colors Available.', 'krowd' ),
		      'default'      => '',
		      'transparent'  => false,
		      'validate'     => 'color'
		   ),
		   array(
		      'id'        => 'color_theme_second',
		      'type'         => 'color',
		      'title'        => esc_html__( 'Custom Color Theme Second', 'krowd' ),
		      'desc'         => esc_html__( 'Used custom color theme second instead of Skin Colors Available.', 'krowd' ),
		      'default'      => '',
		      'transparent'  => false,
		      'validate'     => 'color'
		   ),
			array(
			  'id' => 'page_layout',
			  'type' => 'button_set',
			  'title' => esc_html__('Page Layout', 'krowd'),
			  'subtitle' => esc_html__('Select the page layout type', 'krowd'),
			  'desc' => '',
			  'options' => array('boxed' => 'Boxed','fullwidth' => 'Fullwidth'),
			  'default' => 'fullwidth'
			),
			array(
			  'id' => 'enable_backtotop',
			  'type' => 'button_set',
			  'title' => esc_html__('Enable Back To Top', 'krowd'),
			  'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'krowd'),
			  'desc' => '',
			  'options' => array('1' => 'On','0' => 'Off'),
			  'default' => '1'
			),
			array(
			  'id' => 'map_api_key',
			  'type' => 'text',
			  'title' => esc_html__('Google Map API key', 'krowd'),
			  'default' => ''
			),

		)
	));