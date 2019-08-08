<?php
/**
 * Plugin Name:   CC Recent Posts Widget Plugin
 * Description:   Adds an recent posts widget that displays the most recent posts in a widget area.
 * Version:       1.0
 * Author:        Cheryl Casteling
 */

class cc_Recent_Posts_Widget extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'cc_recent_posts_widget', 'description' => 'CC Recent Posts Widget' );
    parent::__construct( 'cc_recent_posts_widget', 'CC Recent Posts Widget', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $dis_posts = $instance['dis_posts'];
    $category = $instance['category'];
    ?>
    
      <?php echo $before_widget; ?>
         <?php if ( $title )
            echo $before_title . $title . ' from: ' . $category . $after_title; ?>
              
              <?php
                  global $post;
                  $args = array( 'numberposts' => $dis_posts, 'category_name' => $category );
                  $myposts = get_posts( $args );
                  foreach( $myposts as $post ) : setup_postdata($post); ?>

                    <div class="cc-widget-post-block">
                      <?php the_post_thumbnail(); ?>
                      <h3 class="cc-recent-post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <div class="cc-recent-post-date"><?php echo get_the_date( 'F j, Y' ); ?></li>
                    </div>
                  
                  <?php endforeach; ?>
          

         <?php echo $after_widget; ?>
    
      <?php
    }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = esc_attr($instance['title']);
    $dis_posts = esc_attr($instance['dis_posts']);
    $category = esc_attr($instance['category']);
    ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
            <?php _e('Title:'); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
          </label>
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('dis_posts'); ?>">
            <?php _e('Number of Posts Displayed:'); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('dis_posts'); ?>" name="<?php echo $this->get_field_name('dis_posts'); ?>" type="text" value="<?php echo $dis_posts; ?>" />
          </label>
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('category'); ?>">
            <?php _e('Category:'); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo $category; ?>" />
          </label>
        </p>
    <?php 
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'dis_posts' ] = strip_tags( $new_instance[ 'dis_posts' ] );
    $instance[ 'category' ] = strip_tags( $new_instance[ 'category' ] );
    return $instance;
  }

}


function add_my_plugin_stylesheet() {
  wp_register_style('mypluginstylesheet', '/wp-content/plugins/cc-recent-posts-plugin/cc-recent-posts-style.css');
  wp_enqueue_style('mypluginstylesheet');
}
add_action( 'wp_print_styles', 'add_my_plugin_stylesheet' );

// Register the widget.
function cc_register_example_widget() { 
  register_widget( 'cc_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'cc_register_example_widget' );


?>