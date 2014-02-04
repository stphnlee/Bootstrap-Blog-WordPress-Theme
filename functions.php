<?php


// Enable menu

function bootstrap_blog_menus() {
	
	register_nav_menus(
		array(
			
			'primary-menu' => 'Primary Menu'
		
		)
	);
}

add_action( 'init', 'bootstrap_blog_menus');
add_theme_support( 'menus' );
// Load JS
function bootstrap_blog_scripts() {
	
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'docs_js', get_template_directory_uri() . '/js/docs.js', array( 'jquery', 'bootstrap_js' ), false, true );
	

}

add_action( 'wp_enqueue_scripts', 'bootstrap_blog_scripts' );


// Load CSS
function bootstrap_blog_styles() {
	
	wp_enqueue_style( 'bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'main_style', get_template_directory_uri() . '/style.css' );
	
}

add_action( 'wp_enqueue_scripts', 'bootstrap_blog_styles' );

// Modify the more link
function bootstrap_blog_add_morelink_class( $link, $text )
{
    return '<br>' . str_replace(
         'more-link'
        ,'more-link btn btn-default pull-right'
        ,$link
    );
}
add_action( 'the_content_more_link', 'bootstrap_blog_add_morelink_class', 10, 2 );
	
// Add Widget Areas

register_sidebar( array(
		'name'			=>	__( 'Primary Sidebar', 'bootstrap_blog' ),
		'id'			=>	'primary_sidebar',
		'description'	=>	'This is the primary sidebar.',
		'before_widget'	=>	'<div class="sidebar-module">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h4>',
		'after_title'	=>	'</h4>'
			) 
);


?>