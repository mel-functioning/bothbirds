<?php
/**
 * The search page for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="search-page">

      <h2>Your Search Results</h2>
      <p>You searched for "<?php echo esc_html( get_search_query( false ) ); ?>".</p>

      <?php if ( have_posts() ) :
        ?><p>We found the following posts that match your query:</p><?php
        while ( have_posts() ) : the_post(); ?>

        <!-- ENTER HTML BLOG ELEMENTS HERE -->

      <?php
      $GLOBALS[ 'search_post_id' ] = get_the_ID();
      endwhile;

      /*
      ?><div class="posts-pagination"><?php
        the_posts_pagination( array(
        	'mid_size'  => 2,
        	'prev_text' => __( 'Back', 'textdomain' ),
        	'next_text' => __( 'Next', 'textdomain' ),
        ) );
      ?></div><?php
      */


      else : ?>
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
        <div class="search-search">
          <?php get_search_form(); ?>
        </div>
      <?php endif; ?>


    </main>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer();
