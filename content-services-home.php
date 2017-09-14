<?php
/**
 * The services for the homepage of our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<div class="wrapper-bg service-1-bg">
  <div class="wrapper service-1">

    <?php if( get_field('service_1') ) : ?>
      <h2><?php the_field('service_1'); ?></h2>
    <?php endif; ?>

    <?php if( get_field('service_slogan_1') ) : ?>
      <p><?php the_field('service_slogan_1'); ?></p>
    <?php endif; ?>

    <?php if( get_field('service_sub_heading_1') ) : ?>
      <p><?php the_field('service_sub_heading_1'); ?></p>
    <?php endif; ?>

    <?php if( get_field('service_description_1') ) : ?>
      <p><?php the_field('service_description_1'); ?></p>
    <?php endif; ?>

    <div class="service-button">
      <a href="<?php echo get_page_link(110); ?>">Find Out More</a>
    </div>

  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->


<div class="wrapper-bg service-2-bg">
  <div class="wrapper service-2">

    <?php if( get_field('service_2') ) : ?>
      <h2><?php the_field('service_2'); ?></h2>
    <?php endif; ?>

    <?php if( get_field('service_slogan_2') ) : ?>
      <p><?php the_field('service_slogan_2'); ?></p>
    <?php endif; ?>

    <?php if( get_field('service_sub_heading_2') ) : ?>
      <p><?php the_field('service_sub_heading_2'); ?></p>
    <?php endif; ?>

    <?php if( get_field('service_description_2') ) : ?>
      <p><?php the_field('service_description_2'); ?></p>
    <?php endif; ?>

    <div class="service-button">
      <a href="<?php echo get_page_link(116); ?>">Find Out More</a>
    </div>

  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->


<div class="wrapper-bg service-3-bg">
  <div class="wrapper service-3">

    <?php if( get_field('service_3') ) : ?>
      <h2><?php the_field('service_3'); ?></h2>
    <?php endif; ?>

    <?php if( get_field('service_slogan_3') ) : ?>
      <p><?php the_field('service_slogan_3'); ?></p>
    <?php endif; ?>

    <?php if( get_field('service_sub_heading_3') ) : ?>
      <p><?php the_field('service_sub_heading_3'); ?></p>
    <?php endif; ?>

    <?php if( get_field('service_description_3') ) : ?>
      <p><?php the_field('service_description_3'); ?></p>
    <?php endif; ?>

    <div class="service-button">
      <a href="<?php echo get_page_link(114); ?>">Find Out More</a>
    </div>

  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->


<div class="wrapper-bg service-4-bg">
  <div class="wrapper service-4">

    <?php if( get_field('service_4') ) : ?>
      <h2><?php the_field('service_4'); ?></h2>
    <?php endif; ?>

    <?php if( get_field('service_sub_heading_4') ) : ?>
      <p><?php the_field('service_sub_heading_4'); ?></p>
    <?php endif; ?>

    <div class="service-button">
      <a href="<?php echo get_page_link(118); ?>">Find Out More</a>
    </div>

  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->
