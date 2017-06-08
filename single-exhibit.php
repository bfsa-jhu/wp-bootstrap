<?php get_header(); ?>
			
			<div class="container">

<div class="row">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					
					<div  id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">	
						<header class="post_header">
						
							        <?php 
		  $bio_image = get_field('bio_image');
$thumb_size = 'full'; // (thumbnail, medium, large, full or custom size)
		  if ( $bio_image ) {
   echo wp_get_attachment_image( $bio_image, $thumb_size );
}
else {
    echo '<img src="http://bfsa.jhu.edu/wp-content/uploads/2016/03/placeholder_m.jpg" />';
} ?>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
							
						
						</header> <!-- end article header -->
					 
					 
						<section class="post_content" itemprop="articleBody">
						<h2><?php the_field('job_title')?></h2>
<?php if( get_field('media_link') ): ?><p><a href="<?php the_field('media_link')?>" class="btn btn-primarybtn btn-primary" role="button">In the Media</a></p><?php endif; ?>
								
							<?php the_field('biography')?>
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bfsa") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bfsa"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</div> <!-- end article -->
					
					
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bfsa"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bfsa"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			
    
			</div> <!-- end #content -->

<?php get_footer(); ?>