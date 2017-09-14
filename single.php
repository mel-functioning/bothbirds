<?php
/**
 * The single page template for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="single-post">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <article>
        <h1><?php the_title(); ?></h1>
      </article>


      <div class="pagination">
        <?php get_template_part('content', 'pagination'); ?>
      </div><!-- .pagination -->


      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

    </main><!-- .single-post -->


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
