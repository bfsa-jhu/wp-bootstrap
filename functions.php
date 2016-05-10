<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
register_nav_menu( 'primary', __( 'Primary Menu', 'wp-bootstrap' ) );

	class BS3_Walker_Nav_Menu extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];

		if ( isset( $args[0] ) && is_object( $args[0] ) )
		{
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( is_object($args) && !empty($args->has_children) && $item->menu_item_parent == 0 )
		{
			$link_after = $args->link_after;
			$args->link_after = ' <b class="caret"></b>';
		}

		parent::start_el($output, $item, $depth, $args, $id);

		if ( is_object($args) && !empty($args->has_children) )
			$args->link_after = $link_after;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = '';
		$output .= "$indent<ul class=\"dropdown-menu list-unstyled\">";
	}
}
add_filter('nav_menu_link_attributes', 'nav_link_att', 10, 3);

function nav_link_att($atts, $item, $args) {
	if ( $args->has_children && $item->menu_item_parent == 0 )
	{
		$atts['data-toggle'] = 'dropdown';
		$atts['class'] = 'dropdown-toggle';
	}
	return $atts;
}
add_theme_support( 'post-thumbnails' );

function the_breadcrumb() {
		echo '<ol class="breadcrumb">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo get_bloginfo('name');
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ol>';
}
$args = array(
	'flex-width'    => true,
	'width'         => 212,
	'flex-height'    => true,
	'height'        => 40,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );
function new_excerpt_more($more) {
return '<p><a href="'. get_permalink($post->ID) . '" class="btn btn-info">' . 'Continue Reading' . '</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_image_size('thumb-194-194', 194, 194, array( center, top ));
/*function featured_image_requirement() {
     if(!has_post_thumbnail()) {
          wp_die( 'You forgot to set the featured image. please make the size 194px x 194px Click the back button on your browser and set it.' ); 
     } 
}
add_action( 'pre_post_update', 'featured_image_requirement' );*/
add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');
function tc_handle_upload_prefilter($file)
{

    $img=getimagesize($file['tmp_name']);
    $minimum = array('width' => '194', 'height' => '194');
    $width= $img[0];
    $height =$img[1];

    if ($width < $minimum['width'] )
        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");

    elseif ($height <  $minimum['height'])
        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']}px. Uploaded image height is $height px");
    else
        return $file; 
}
add_action('save_post', 'wpds_check_thumbnail');
add_action('admin_notices', 'wpds_thumbnail_error');
function wpds_check_thumbnail($post_id) {
    // change to any custom post type
    if(get_post_type($post_id) != 'exhibit')
        return;
    if ( !has_post_thumbnail( $post_id ) ) {
        // set a transient to show the users an admin message
        set_transient( "has_post_thumbnail", "no" );
        // unhook this function so it doesn't loop infinitely
        remove_action('save_post', 'wpds_check_thumbnail');
        // update the post set it to draft
        wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
        add_action('save_post', 'wpds_check_thumbnail');
    } else {
        delete_transient( "has_post_thumbnail" );
    }
}
function wpds_thumbnail_error()
{
    // check if the transient is set, and display the error message
    if ( get_transient( "has_post_thumbnail" ) == "no" ) {
        echo "<div id='message' class='error'><p><strong>You must select Featured Image, your Exhibit is saved but it can not be published. Please make the size 194px x 194px.</strong></p></div>";
        delete_transient( "has_post_thumbnail" );
    }
}
?>