<?php get_header(); ?>
<!-- +++front-page -->

  <section>
    <?php get_template_part( 'template-parts/banner--home' ); ?>
  </section>

  <main class="container">
    <div class="row">
    <div class="col-8">


      <?php $custom_query = new WP_Query('posts_per_page=5&cat=-21'); // exclude category 21
      while($custom_query->have_posts()) : $custom_query->the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <div class="post--content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); // reset the query ?>

    </div>

    <aside class="sidebar col-4" role="complementary">
      <?php get_template_part( 'sidebar' ); ?>
    </aside>
    </div>
  </main>
 
<?php get_footer(); ?>
