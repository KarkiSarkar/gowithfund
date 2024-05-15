<?php
// Your code to enqueue parent theme styles
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
add_action( 'wp_enqueue_scripts', 'grand_sunrise_enqueue_styles' );

function grand_sunrise_enqueue_styles() {
	wp_enqueue_style( 
		'/style.css', 
		get_stylesheet_uri()
	);
}

// Add page title as body class
function add_page_title_as_body_class($classes) {
    // Get the page title
    $page_title = get_the_title();
    
    // Sanitize the page title to make it suitable as a class name
    $sanitized_page_title = sanitize_title($page_title);
    
    // Add the sanitized page title as a class
    $classes[] = $sanitized_page_title;

    return $classes;
}
add_filter('body_class', 'add_page_title_as_body_class');



?>