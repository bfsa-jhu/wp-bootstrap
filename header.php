  <head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title><?php bloginfo('name');?>-<?php bloginfo('description');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>?v=2.1" rel="stylesheet">


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
<header>
<div class="topnav">
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<ul class="nav nav-pills navbar-right">
  <li role="presentation" href="bfsa-list@lists.johnshopkins.edu"><a href="#">Join our mailing list</a></li>
  
  <?php
if ( is_user_logged_in() ) {
  ?><li role="presentation"><a href="<?php bloginfo('url');?>/wp-login.php?action=logout" >Log Out</a></li>
  
<li role="presentation"><a href="<?php bloginfo('url');?>/account/" >My Account</a></li><?php
  
}
else { ?><li role="presentation"><a href="<?php bloginfo('url');?>/wp-login.php" >Log In</a></li>
  
<li role="presentation"><a href="<?php bloginfo('url');?>/bfsa-membership/" >Join</a></li><?php
}
?>
</ul>

	</div>
</nav>
	  
	

</div>
<div class="hsalogo">
<a href="<?php bloginfo('url');?>"><?php $bfsalogo = get_field('bfsa_logo', 'option'); if( $bfsalogo ): ?>

	<img src="<?php echo $bfsalogo; ?>" alt="bfsa site logo"/>

<?php endif; ?></a></div>

   <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
		
			<div class="logo">
			
			</div>
				
      <div class="container">
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
     <div id="navbar" class="navbar-collapse collapse">
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
          
       
			<form role="search" method="get"  class="navbar-form navbar-right search-form" action="<?php bloginfo('url'); ?>">
        <div class="form-group nav-search">
          <input class="search-field form-control" id="main-search" placeholder="Search" value="" name="s" type="search">
		  <input name="site_section" type="hidden" value="main-search" />
        </div>
        <button type="submit" class="btn btn-primary">
<span class="glyphicon glyphicon glyphicon-search"></span>
<span style="text-indent: -9999px;position:absolute;">Submit</span></button>
      </form>
		  
        </div><!--/.nav-collapse -->
		 
      </div>
	      
    </nav>
</header>
	<?php if ( function_exists( 'soliloquy' )&& is_front_page() || is_home() ) { soliloquy( 'template-header', 'slug' ); }?>
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
	<?php /*?><form class="search-form" role="search" method="get" action="<?php bloginfo('url'); ?>">
		<div class="form-group">
			<div class="input-group input-group-lg">
				<input class="search-field form-control" id="main-search" placeholder="Search" value="" name="s" type="search">
				    <input name="site_section" type="hidden" value="main-search" />
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							Search
						</button>
					</span>
			</div>
		</div>
	</form>
           	<?php */?>
	
	
	<?php
 

    echo '<div class="container">';


?>
