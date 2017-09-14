<?php
/**
 *
 *  Template Name: Services Page 1
 *
 * The Services 1 page for our theme (Web Design)
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<main class="service1-page">
  <div class="wrapper-bg">
    <div class="wrapper">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; endif;  ?>

    </div><!-- .wrapper -->
  </div><!-- .wrapper-bg -->
  <?php

  // check if the flexible content field has rows of data
  if( have_rows('services_content') ): while ( have_rows('services_content') ) : the_row(); ?>

    <div class="wrapper-bg">
      <div class="wrapper">

        <?php if( get_row_layout() == 'article' ): ?>

        	<h2><?php the_sub_field('heading'); ?></h2>
          <p><?php the_sub_field('description'); ?></p>

        <?php endif; ?>

        <?php if( get_sub_field('quote') ): ?>
          <h3><?php the_sub_field('quote_heading'); ?></h3>
          <p><?php the_sub_field('quote_description'); ?></p>
        <?php endif; ?>

        </div><!-- .wrapper -->
      </div><!-- .wrapper-bg -->

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
