<?php /**
 * Template Name: BFSA--Exhibit
 * Description: A full-width template with no sidebar
 */
 get_header(); 
?>
<div class="row">
  <div>

		<?php echo '<h1 class="entry-title">'.get_the_title().'</h1>';?>
			
			<?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$theexhibit = new WP_Query(array(
						'post_type' => 'exhibit',
						'posts_per_page' => 18,
						'paged' => $paged,
						'orderby'=> 'title', 
						'order' => 'ASC'


						)); 
						$wp_query = new WP_Query();
$wp_query->query('post_type=exhibit' . '&paged=' . $paged . '&posts_per_page=18&orderby=title&order=ASC');?>
			<div class="exhibit">

						<?php if($theexhibit->have_posts()):$i=0;while($theexhibit->have_posts()): $theexhibit->the_post();?>
					<ul class="exhibit_person">
    <li>
        <figure>
          <?php the_post_thumbnail('full', array( 'alt' => get_the_title())); ?>
            <figcaption>
                <h2><?php the_title(); ?></h2>
                <p><?php the_field('job_title')?></p>
            </figcaption>
        </figure>
    </li>
    <li class="exhibit_title"><?php the_title(); ?></li>
     <li class="exhibit_hidden_title"><a href="#openModal-<?php echo $i;?>">Read More</a></li>
<div id="openModal-<?php echo $i;?>" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		  <?php the_post_thumbnail('thumbnail', array( 'alt' => get_the_title())); ?><h2><?php the_title(); ?></h2>
		<p><strong><?php the_field('job_title')?></strong></p>
		<?php the_field('biography')?>
	</div>
</div>


</ul>


						<?php $i++; ?>
						<?php endwhile;endif; ?>

						  <!-- pagination -->
        <ul class="pagination">
             <li class="previous_posts"><?php echo get_previous_posts_link( 'Previous Page' ); ?></li>
             <li class="next_posts"><?php echo get_next_posts_link( 'Next Page' ); ?></li>
            
        </ul>
						<?php wp_reset_postdata(); ?>
					
					</div><!-- .exhibit -->
		<div style="display:block;float:left;clear:both;">The exhibit is a work in progress. If you would like to nominate someone for inclusion on the website, please send an email to <a href="mailto:bfsa@jhu.edu">bfsa@jhu.edu</a>.</div>
		
	
<style>
article[id*="post-"] {
  
    padding: 0!important;
}
.exhibit .pagination{ padding:1em;}
.pagination .next_posts{float:right; margin-right: 12em; }
.pagination .previous_posts{float:left;}
ul.exhibit_person li{list-style:none;}
.exhibit_person {
    position:relative;
    width:11em;
    height:12em;
   
    float:left;
    margin-right:2em;
    margin-top:2em;
}
.exhibit_person figure {
    margin:0;
    padding:0;
    position:relative;
	width:11em;
    
    /*margin-left:-50px*/
}
.exhibit_person figure img {
    display:block;
    position:relative;
    z-index:10;
    margin:-15px 0;
     width:11em;
    height:11em;
}
.exhibit_person figure figcaption {
    display:block;
    position:absolute;
    z-index:5;
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
}
.exhibit_person figure figcaption h2 {
    font-family:'Lato';
    color:#fff;
    font-size:17px;
    text-align:left
	line-height:1;
}

.exhibit_person figure figcaption p {
    display:block;
    font-family:'Lato';
    font-size:12px;
    line-height:18px;
    margin:0;
    color:#fff;
    text-align:left
}
.exhibit_person figure:hover img{  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";

  /* IE 5-7 */
  filter: alpha(opacity=50);

  /* Netscape */
  -moz-opacity: 0.5;

  /* Safari 1.x */
  -khtml-opacity: 0.5;

  /* Good browsers */
  opacity: 0.5;}

.exhibit_person figure figcaption {display:none;}
.exhibit_person figure:hover figcaption {
    top:0;
    left:0;
     width:11em;
    height:11em;
    padding:1em;
      text-align:center;
    color:#000;
    background-color: rgba(0,0,0,0.8);
    opacity:inherit;
    display: block;
	
    
}

.exhibit_person .exhibit_title{position:absolute; z-index: 900; display: block; width:11em;background-color: #cdcdcd; font-weight: bold; float:left; text-align: center; }
.exhibit_person .exhibit_hidden_title{position:absolute; z-index: 900; display: none; width:11em;background-color: #cdcdcd; font-weight: bold; float:left; text-align: center; }
.exhibit_person:hover .exhibit_title{display: none; }
.exhibit_person:hover .exhibit_hidden_title{display: block; }


.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	overflow:auto;
	height:100%;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
	
}



.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}

.modalDialog > div {
	width: 60%;
	position: relative;
margin-top:5%;
left:20%;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
	
}
@media only screen and (max-width: 824px) { 
.modalDialog {
	overflow-y: scroll;
	top:0;
	word-break: keep-all;
}
.modalDialog > div h2{font-size: 1.5em;}
.modalDialog > div img {
   width:70%;
   height:auto;
}
}

.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
	opacity:1!important;
}

.close:hover { background: #00d9ff; }


.modalDialog > div img{float:left;
margin:1em;}

</style>

  </div>
  
</div>


<?php get_footer(); ?>