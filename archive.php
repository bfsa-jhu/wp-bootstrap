<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twitter bootstrap
 * @since Twitter bootstrap
 */

get_header(); ?>
 <div class="blog-header">
        <?php
					the_archive_title( '<h1 class="blog-title">', '</h1>' );
					the_archive_description( '<div class="lead blog-description">', '</div>' );
				?>
      </div>

      

       
		  




<?php while ( have_posts() ) : the_post(); ?>
<div class="row">			
	<h2 class="blog-post-title" >
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<?php the_title(); ?></a></h2>
	<p class="blog-post-meta"><?php _e("Posted", "bfsa"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php echo get_the_date('F jS, Y', '','', FALSE); ?></time></p>
	<div class="entry-content">
<?php the_post_thumbnail('thumbnail', array('class' => 'img-rounded pull-left gap-right')); ?>
<?php the_excerpt( __( '(More ...)' , 'p2' ) ); ?>



	</div><!-- .entry-content -->
</div><!-- /.row --><hr />
<?php endwhile; // end of the loop. ?>



  
<?php get_footer(); ?>
