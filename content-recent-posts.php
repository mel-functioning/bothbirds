<?php
/**
 * The recent posts for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<main class="blog-page">

  <?php
  $recent_posts = new WP_Query( array(
      'posts_per_page'  => 4,
      'post_type'      => 'post',
      'orderby'         => 'date',
      'post__not_in'    => get_option( 'sticky_posts' ),
    ));
  if ( $recent_posts -> have_posts() ) : while ( $recent_posts -> have_posts() ) : $recent_posts -> the_post(); ?>

  <div class="the-recent-post">

		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>
		</div><!-- .post-thumbnail -->

		<div class="recent-content">
			<h3><?php the_title(); ?></h3>
      <div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
		</div><!-- .recent-content" -->

  </div><!-- .the-recent-post -->

  <?php endwhile; ?>

    <div class="blog-button">
      <a href=""><span>Take me to the Blog</span><a>
    </div>

  <?php  wp_reset_query(); endif; ?>

</main>
