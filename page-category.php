<?php
/**
 *
 *  Template Name: Category Page
 *
 * The contact page for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="contact-page">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_title('<h1>','</h1>'); ?>
      <?php the_content(); ?>
      <?php endwhile; endif;  ?>

    </main>

  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
