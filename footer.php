<?php
/**
 * The footer for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>


<div class="wrapper-bg">

  <footer>
    <div class="site-footer">

      <?php
        $defaults = array(
          'container' => false,
          'theme_location' => 'secondary-menu',
          'menu_class' => 'secondary-navigation'
        );
      ?><div class="footer-nav">
        <?php wp_nav_menu( $defaults ); ?>
      </div><!-- .footer-nav -->


      <div class="social-icons">
        <a href="<?php echo get_option('facebook'); ?>" target="_blank"><img src="<?php site_url(); ?>/wp-content/uploads/2017/08/facebook.svg" alt="" /></a>
      </div><!-- .social-icons -->


      <div class="footer-newsletter">
      </div>


      <div class="site-info">
        <a href="mailto:<?php echo get_option('email'); ?>"><?php echo get_option('email'); ?></a>
      </div><!-- .site-info -->


      <div class="footer-legal">
        <span>&copy; Both Birds <?php echo ('&nbsp'); echo date('Y'); ?></span>
        <a href="#"><span>Privacy Policy</span></a>
      </div>


    </div><!-- .site-footer -->
  </footer>
  <?php wp_footer(); ?>


</div><!-- .wrapper-bg -->

</body>
</html>
