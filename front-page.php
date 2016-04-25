<?php get_header(); ?>


<div class="container">

<div class="row">





<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<div class="jumbotron">
  <h1><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>

<?php //
		// Post Content here
		//
	} // end while
} // end if
?>
<h2>Featured Exhibit additions</h2>
<?php

// The Query
$the_query = new WP_Query( array( 'exhibit_tag' => 'featured', 'post_type' => 'exhibit', 'posts_per_page' => 3, 'orderby' => 'rand' ) );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="col-sm-6 col-md-4"><div class="thumbnail">';
		the_post_thumbnail( 'full', array( 'class' => "img-circle",'title' => trim( strip_tags( $attachment->post_title ) ) ) ); 
		echo '<div class="caption">';
echo '<h3>'.get_the_title().'</h3>';
	echo '<p>'.the_field('job_title').'</p>';
	echo '<p><a href="'.get_bloginfo('url').'/exhibits/exhibit-list/" class="btn btn-primary" role="button">Exhibits</a></p>';

echo '</div></div></div>';
		
		
		
	}
	
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();?>
</div>
</div>
<?php get_footer(); ?>