<?php if ( have_posts () ) : while ( have_posts() ) : the_post(); ?>

<article class="blog-post">
  <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?> by <?php the_author_posts_link(); ?></p>
  <?php the_content( 'Read more &rarr;' ); ?>
  
</article><!-- /.blog-post -->

<?php endwhile; endif; ?>

<div class="navigation">
	<ul class="pager">
		<li>
		<?php posts_nav_link( '</li> <li>','Previous','Next' ); ?>
		</li>
	</ul>
</div>