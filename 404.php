<?php
/**
 * The 404 for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <?php /* The Main Loop */?>
      <main class="error">

        <h1>Oops, this is embarrassing!</h1>
        <p>We couldn't find the page you're looking for.</br>
        Please see links below for further browsing pleasure,</br>
        or, let us take you back to the homepage.</p>

        <div class="back-home">
          <a href="<?php bloginfo('url'); ?>">
            Back to the Homepage
          </a>
        </div>

      </main>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
