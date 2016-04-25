  <head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title><?php bloginfo('name');?>-<?php bloginfo('description');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
	

    <?php wp_head(); ?>

  </head>
<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
<?php 
  // Fix menu overlap bug..
 // if ( is_admin_bar_showing() ) echo '<div style="min-height: 28px;"></div>'; 
?>
   <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo('url');?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="bfsa site logo" /></a>
        </div>
     <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
		  	<?php
if ( is_user_logged_in() &&  !current_user_can( 'manage_options' ) ) {
  
    $menu_type='logged-in-users';
	

}
elseif ( is_user_logged_in() &&  current_user_can( 'manage_options' ) ) {
     $menu_type= 'logged-in-board';
	}
else { 
    $menu_type= 'logged-out-users';
	
}
?>
           <?php wp_nav_menu(array(
						'container_class' => 'menu-header',
						'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
						'walker' => new BS3_Walker_Nav_Menu,
						'menu' => $menu_type
					)); ?>
          </ul>
          
		  <ul class="nav navbar-nav navbar-right">
           		<?php
if ( is_user_logged_in() ) {
  ?><li style="border-right:thin solid #cdcdcd; padding-right:2rem;"><a href="<?php bloginfo('url');?>/wp-login.php?action=logout">Log Out</a></li>
  
<li padding-left:2rem;><a href="<?php bloginfo('url');?>/account/">My Account</a></li><?php
  
}
else { ?><li style="border-right:thin solid #cdcdcd; padding-right:2rem;"><a href="<?php bloginfo('url');?>/wp-login.php">Log In</a></li>
  
<li padding-left:2rem;><a href="<?php bloginfo('url');?>/bfsa-membership/">Register</a></li><?php
}
?>	
			

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<?php if ( function_exists( 'soliloquy' ) && is_front_page() || is_home() ) { soliloquy( '49' ); }?>
	<?php $args = array(
		'container'       => 'div',   // container element
		'separator'       => '>>', // separator between items
		'before'          => '',      // HTML to output before
		'after'           => '',      // HTML to output after
		'show_on_front'   => true,    // whether to show on front
		'network'         => false,   // whether to create trail back to main site (multisite)
		'show_title'      => true,    // whether to show the current page title
		'show_browse'     => false,    // whether to show the "browse" text
		'echo'            => true,    // whether to echo or return the breadcrumbs

		
	);
	if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail($args);?>
	<?php
 
if ( is_front_page() || is_home() ) {
  echo '';
} else {
    // This is not the blog posts index
    echo '<div class="container">';
}

?>
