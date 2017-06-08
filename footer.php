     <hr>
  </div> <!-- /container -->
      <footer class="footer">
      <div class="container">
		<div class="footer-identification pull-left">
		
		<a class="footer__logo" href="//www.jhu.edu">
<?php if( get_field('jhu_logo', 'option') ): ?>

	<img src="<?php the_field('jhu_logo', 'option'); ?>" />

<?php endif; ?>

</a>
			<p class="copy">©Johns Hopkins University</p>
			<p class="copy">Baltimore, Maryland 21218</p>
			<p class="copy">All rights reserved</p>
		</div>
	    <div class="footer-menu pull-right">
   	 		  	<?php
if ( is_user_logged_in() &&  !current_user_can( 'manage_options' ) ) {
  
    $menu_footer='logged-in-users';
	

}
elseif ( is_user_logged_in() &&  current_user_can( 'manage_options' ) ) {
     $menu_footer= 'logged-in-board';
	}
else { 
    $menu_footer= 'logged-out-users';
	
}
?>


	 <?php $foot_args = array(
	 
	  'menu' => $menu_footer,
  'container'       => false,
  'echo'            => false,
  'link_before'       => '<p>',
  'link_after'        => '</p>',
  'items_wrap'      => '%3$s',
    'depth'           => 1,
  
);
?>
 
<?php echo strip_tags(wp_nav_menu( $foot_args ), '<a>, <p>' );


?>
	</div>
  </div>
    </footer>
    
  

    <?php wp_footer(); ?>

  </body>
</html>