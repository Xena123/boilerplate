<?php get_header(); ?>
<!-- +++front-page -->

  <main class="uk-container">

    <div class="">
      
    </div>

    <?php get_template_part( 'template-parts/partial' ); ?>
    <?php // Use include if variables need to be passed on to partial ?>
    <?php include(locate_template('template-parts/partial')); ?>

  </main>
 
<?php get_footer(); ?>
