<?php 
//template name: home
get_header();  ?>

<div class="main clearfix">
  <div class="container clearfix">

    <div class="content clearfix">
    
      <section class="header full clearfix">
        <div class="wrapper-wide clearix">

          <h1><?php the_field("site-title"); ?></h1>
          <h2><?php the_field("site-subtitle"); ?></h2>

        </div><!-- /.wrapper-wide -->

      </section> <!-- /.header-->

        <!-- NAVBAR -->
      <section class="top-menu clearfix">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </section>

      <section class="about clearfix">
        <div class="wrapper-narrow">

          <h3><?php the_field("about-title"); ?></h3>
          <p><?php the_field("about-text") ?></p>

          <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'social-menu'
          )); ?>

        </div><!-- /.wrapper-narrow -->

      </section> <!-- /.about -->

      <section class="skills clearfix"> 

        <div class="wrapper-wide">

          <h3><?php the_field("skills-title"); ?></h3>
          <p><?php the_field("skills-text"); ?></p>

          <?php

            $skillsQuery = new WP_Query(
              array(
                'posts_per_page' => -1,
                'post_type' => 'skills',
                'order' => 'ASC'
                )

            ); ?>
          <?php while ( $skillsQuery->have_posts() ) : $skillsQuery->the_post(); ?>
            <div class="skill-item">
                <?php the_title(); ?>
        
            </div> <!-- /.skill-item -->
          <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          
        </div> <!-- /.wrapper-wide -->
      </section> <!-- /.skills -->

      <section class="portfolio clearfix"> 

        <div class="wrapper-wide">
        <h3><?php the_field('portfolio-title'); ?></h3>


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
            <div class="portfolio-item clearfix">
              <div class="portfolio-item-left clearfix">
              <?php $image = get_field('portfolio-image') ?>
                <img src="<?php echo $image['url'] ?>" alt="">
              </div> <!-- /.portfolio-item-left -->
              <div class="portfolio-item-right clearfix">
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
        <div class="wrapper-wide clearfix">
          <h3><?php the_field("contact-title"); ?></h3>
          <?php echo do_shortcode( '[contact-form-7 id="9" title="Contact form 1"]' ); ?>
        </div><!-- /.wrapper-wide -->
      </section> <!-- /.contact -->

    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>