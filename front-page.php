<?php get_header(); ?>




<div class="row">





<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<div>
  <h1><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>

<?php //
		// Post Content here
		//
	} // end while
} // end if
?>
<h2 class="text-center">Featured Events</h2>
<div class="poasterboard-calendar" >
<?php echo do_shortcode( '[ai1ec view="posterboard" events_limit="3"]' ); ?>
 <p class="pull-right">
    <a class="btn btn-primary btn-large" href="/events/">
      View all Events
    </a></p>
</div>
<div class="clearfix"></div>
<h2 class="text-center">Featured Exhibit additions</h2>
<?php

// The Query
$the_query = new WP_Query( array( 'exhibit_tag' => 'featured', 'post_type' => 'exhibit', 'posts_per_page' => 3, 'orderby' => 'rand' ) );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="col-sm-6 col-md-4"><div class="thumbnail">';
		   $bio_image = get_field('bio_image');
$thumb_size = 'thumb-194-194'; // (thumbnail, medium, large, full or custom size)
		  if ( $bio_image ) {
   echo wp_get_attachment_image( $bio_image, $thumb_size,"", array( "class" => "img-circle" ) );
}
else {
    echo '<img src="http://bfsa.jhu.edu/wp-content/uploads/2016/03/placeholder_m.jpg" class="img-circle" />';
} 
		
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

<?php get_footer(); ?>