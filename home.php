<?php 
//template name: home
get_header();  ?>

<div class="main clearfix">
  <div class="container clearfix">

    <div class="content clearfix">
    
      <section class="header full clearfix" id="home">

        <div class="site-headings">
          <a href="#about">
            <h1><?php the_field("site-title"); ?></h1>
            <h2><?php the_field("site-subtitle"); ?></h2>
          </a>
        </div><!-- /.site-headings -->

      </section> <!-- /.header-->

        <!-- NAVBAR -->
      <section class="top-menu clearfix">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
        <i class="fa fa-bars"></i>
      </section>
      
      <div class="under-menu">
        <section class="about clearfix">
          <a name="about"></a>
          <div class="wrapper-wide">
            <div class="about-left">
            <?php $image_url  = get_field('about-image') ?>
              <img src="<?php echo $image_url['url'] ?> " alt="">
            </div>
            
            <div class="about-right">
              <h3><?php the_field("about-title"); ?></h3>
              <p><?php the_field("about-text"); ?></p>

              <h4><?php the_field("social-media-title"); ?></h4>

              <?php wp_nav_menu( array(
                'container' => false,
                'theme_location' => 'social-menu'
              )); ?>
            </div><!-- /.about-right -->

             <div class="about-hidden">
            <?php $image_url  = get_field('about-image') ?>
              <img src="<?php echo $image_url['url'] ?> " alt="">
            </div><!-- /.about-hidden -->


          </div><!-- /.wrapper-wide -->

        </section> <!-- /.about -->

        <section class="skills clearfix"> 

          <a name="skills"></a>

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


              <button class="resume">download my resume</button>    

          </div> <!-- /.wrapper-wide -->
        </section> <!-- /.skills -->

        <section class="portfolio clearfix"> 
          
          <a name="portfolio"></a>
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
                  <h4><?php the_field('portfolio-item-title'); ?></h4>
                  <h5><?php the_field('client-name'); ?></h5>
                  <h6><?php the_field('technologies'); ?></h6>
                  <p><?php the_field('portfolio-item-description'); ?></p>
                  <a href="<?php the_field('view-live'); ?>"><button class="view-live">view live</button></a>
                </div> <!-- /.portfolio-item-right -->
              </div> <!-- /.portfolio-item -->
            <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>

          <?php else:  ?>
            [stuff that happens if there aren't any posts]
          <?php endif; ?>
          
        </section> <!-- /.portfolio -->

        <section class="contact clearfix">
          <a name="contact"></a>
          <div class="wrapper-wide clearfix">
            <h3><?php the_field("contact-title"); ?></h3>
            <p class="email-link">Fill out the form below or email me at <a href="mailto:anya@anyacraig.com">anya@anyacraig.com</a>!</p>
</p>
            <?php echo do_shortcode( '[contact-form-7 id="9" title="Contact form 1"]' ); ?>
          </div><!-- /.wrapper-wide -->
        </section> <!-- /.contact -->
      </div> <!-- /.under-menu -->
    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>