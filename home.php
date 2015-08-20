<?php 
//template name: home
get_header();  ?>

<div class="main">
  <div class="container">

    <div class="content">
    
      <section class="header">
        <h1><?php the_field("site-title"); ?></h1>
        <h2><?php the_field("site-subtitle"); ?></h2>
        
      </section>
      <section class="about">
        
      </section>
      <section class="skills">
        
      </section>

      <section class="portfolio">
        
      </section>
      <section class="contact">
        
      </section>

    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>