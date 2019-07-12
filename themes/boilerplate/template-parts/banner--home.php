<?php if( have_rows('hero') ): 

  while( have_rows('hero') ): the_row(); 
  
  // vars
  $image = get_sub_field('image');
  $title = get_sub_field('title');
  $subtitle = get_sub_field('subtitle');
  
?>


  <div class="uk-background-cover uk-flex uk-flex-center uk-flex-middle uk-height-large" uk-img style="background-image: url('<?php echo $image['url']; ?>');">
    <div id="l-banner--txt" class="uk-text-uppercase">
      <h1 class="uk-heading-xlarge"><?php echo $title; ?></h1>
      <p class="uk-text-large"><?php echo $subtitle; ?></p>
    </div>
  </div>


  <?php endwhile; ?>
  
<?php endif; ?>