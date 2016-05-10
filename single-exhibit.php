<?php get_header(); ?>
			
			<div class="container">

<div class="row">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					
					<div class="jumbotron" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">	
						<header>
						
							<?php the_post_thumbnail('thumb-194-194', array( 'alt' => get_the_title())); ?>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
							
						
						</header> <!-- end article header -->
					 
					 
						<section class="post_content" itemprop="articleBody">
						<h2><?php the_field('job_title')?></h2>	
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