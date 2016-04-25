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

      <div class="row">

       

          
		  
<?php if (have_posts()) :
   while (have_posts()) :
      the_post();?>
         <div class="blog-post" ><div class="col-xs-6 col-md-4">
		 <h2 class="blog-post-title" >
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<?php the_title(); ?></a></h2>
<p class="blog-post-meta"><?php the_time('F jS, Y') ?> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  
<?php comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?></p>

    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('thumbnail', array('class' => 'img-rounded')); ?>
    </a>

</div> 
<div class="col-xs-6 col-md-4"><?php the_excerpt(); ?>
</div>
</div><!-- /.blog-post -->
  <?php endwhile; ?>
    <nav>
            <ul class="pager">
 <li><?php previous_posts_link('&laquo; Previous Entries') ?></li>
 <li><?php next_posts_link('Next Entries &raquo;','') ?></li>
  </ul>
          </nav>  
<?php endif;
				
	?>		
		            
      </div><!-- /.row -->
<?php get_footer(); ?>