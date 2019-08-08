

<?php $custom_query = new WP_Query('posts_per_page=1&cat=21'); // only category 21
while($custom_query->have_posts()) : $custom_query->the_post(); ?>

    <?php
      $category = get_the_category();
      $first_category = $category[0];
      $link = get_category_link( $category[0]->term_id );
    ?>

    <div class="jumbotron l-hero--main d-flex justify-content-center align-items-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>');background-position: center center; background-repeat: no-repeat;background-size: cover;">
      <div class="l-hero--overlay"></div>
      <div class="l-hero--content">
        <div class="flex-item">
          <div class="l-hero--cat">
            <a href="<?php echo $link; ?>">In: <?php echo $first_category->name; ?></a>
          </div>
          <h3><?php the_title(); ?></h3>
          <hr class="divider">
          <div class="btn btn--more">
            <a href="<?php the_permalink(); ?>">Read more</a>
          </div>
        </div>
      </div>
    </div>
  
  <?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>