<?php get_header(); ?>
<div class="row">
  <div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="jumbotron">
  <h1><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

  </div>
  
</div>


<?php get_footer(); ?>