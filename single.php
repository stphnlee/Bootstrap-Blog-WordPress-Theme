<?php get_header(); ?>


      <div class="row">

        <div class="col-sm-8 blog-main">
			
			<?php if ( have_posts () ) : while ( have_posts() ) : the_post(); ?>

				<article class="blog-post">
					<h2 class="blog-post-title"><?php the_title(); ?></h2>
					<p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?> by <?php the_author_posts_link(); ?></p>
					
					<?php the_content(); ?>
  
				</article><!-- /.blog-post -->

				<div id="comments">
					<hr>
					<h2>Comments</h2>

					<?php comments_template( '', true ); ?>
				</div>

			<?php endwhile; endif; ?>

    
		</div><!-- /.blog-main -->

		<?php get_sidebar(); ?>

	</div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>