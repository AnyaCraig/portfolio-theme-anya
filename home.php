<?php 
//template name: home
get_header();  ?>

<div class="main clearfix">
  <div class="container clearfix">

    <div class="content clearfix">
    
      <section class="header full clearfix">

        <h1><?php the_field("site-title"); ?></h1>
        <h2><?php the_field("site-subtitle"); ?></h2>
        
      </section> <!-- /.header-->

        <!-- NAVBAR -->
      <section class="top-menu clearfix">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </section>

      <section class="about clearfix">

        <h3><?php the_field("about-title"); ?></h3>
        <p><?php the_field("about-text") ?></p>


      </section> <!-- /.about -->

      <section class="skills clearfix"> 
        <h3><?php the_field("skills-title"); ?></h3>
        <p><?php the_field("skills-text"); ?></p>
        
      </section> <!-- /.skills -->

      <section class="portfolio clearfix"> 
        <h3><?php the_field("portfolio-title") ?></h3>

      <!--   <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <?php the_field('portfolio-item-title'); ?>
          <?php the_field('client_name'); ?>
          <?php the_field('technologies'); ?>
          <?php the_field('portfolio-item-description'); ?>
        <?php endwhile; ?> -->

        <?php

          $portfolioQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'portfolio',
              'order' => 'ASC'
              )
          ); ?>

        <?php if ( $portfolioQuery->have_posts() ) : ?>

          <?php while ( $portfolioQuery->have_posts() ) : $portfolioQuery->the_post(); ?>
            <div class="portfolio-item">
              <div class="portfolio-item-left">
              <?php $image = get_field('portfolio-image') ?>
                <img src="<?php echo $image['url'] ?>" alt="">
              </div> <!-- /.portfolio-item-left -->
              <div class="portfolio-item-right">
                <?php the_field('portfolio-item-title'); ?>
                <?php the_field('client_name'); ?>
                <?php the_field('technologies'); ?>
                <?php the_field('portfolio-item-description'); ?>
              </div> <!-- /.portfolio-item-right -->
            </div> <!-- /.portfolio-item -->
          <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else:  ?>
          [stuff that happens if there aren't any posts]
        <?php endif; ?>
        
      </section> <!-- /.portfolio -->

      <section class="contact clearfix">
        <h3><?php the_field("contact-title"); ?></h3>
        <?php echo do_shortcode( '[contact-form-7 id="9" title="Contact form 1"]' ); ?>
        
      </section> <!-- /.contact -->

    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>