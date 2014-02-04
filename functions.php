<?php

add_theme_support( 'html5' );

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


function bootstrap_blog_comment( $comment, $args, $depth ) {
	
	$GLOBALS['comment'] = $comment;
			extract($args, EXTR_SKIP);

			if ( 'div' == $args['style'] ) {
				$tag = 'div';
				$add_below = 'comment';
			} else {
				$tag = 'li';
				$add_below = 'div-comment';
			}
	?>
			<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
			<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
				<div class="comment-header">
					<div class="comment-author vcard">
						<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 38 ); ?>
						<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
					</div>
					<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
				?>
					</div>
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="comment-awaiting-moderation alert alert-info"><?php _e('Your comment is awaiting moderation.') ?></em>
						<br />
					<?php endif; ?>
				</div>
				<div class="comment-content">
					<?php comment_text() ?>
					<div class="reply text-right">
						<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ))) ?>
					</div>
				</div>
			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<?php endif; ?>
	<?php
	        }
	


?>