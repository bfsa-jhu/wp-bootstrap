<?php get_header(); ?>
<div class="row">
  

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div>		
			<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail();
}?>
  <h1><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

  
  
</div>


<?php get_footer(); ?>