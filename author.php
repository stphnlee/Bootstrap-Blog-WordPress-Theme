<?php get_header(); ?>


      <div class="row">

        <div class="col-sm-8 blog-main">
			<div class="alert alert-info"><p class="lead">These are all the posts we have by <?php the_author_link(); ?>.</p></div>
			<?php get_template_part( 'content' ); ?>
			
          

        </div><!-- /.blog-main -->

		<?php get_sidebar(); ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

	<?php get_footer(); ?>