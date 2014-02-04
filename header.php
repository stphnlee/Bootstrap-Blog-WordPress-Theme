<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/favicon.ico'?>">

    <title>Blog Template for Bootstrap</title>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	<?php wp_head(); ?>
	
  </head>

  <body <?php body_class(); ?>>
	  
      <div class="blog-masthead">
        <div class="container">
         
			  <?php 
			  
			  $args = array(
				  'theme_location' 	=> 	'primary-menu',
				  'items_wrap'		=>	'<ul class="blog-nav">%3$s</ul>',
				  'container'		=>  false
			  );
			  
			  wp_nav_menu( $args );
			  ?>
			  
        </div>
      </div>
	  
      <div class="container">

        <div class="blog-header">
          <h1 class="blog-title"><?php echo bloginfo( 'name' ); ?></h1>
          <p class="lead blog-description"><?php echo bloginfo( 'description' ); ?></p>
        </div>