<?php
/**
 * The front-page for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<main class="front-page">

  <div class="wrapper-bg front-intro-bg">
    <div class="wrapper front-intro">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; endif; ?>

    </div><!-- .wrapper -->
  </div><!-- .wrapper-bg -->


  <?php get_template_part('content', 'services-home'); ?>


</main>

<?php get_footer(); ?>
