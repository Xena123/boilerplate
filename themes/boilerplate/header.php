<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

	<header class="l-header">
    <section class="container-fluid">
    <div class="sticky-top">
      <nav class="l-nav row">

        <div class="col-3">
          <div class="navbar justify-content-start">
          <?php 
            wp_nav_menu( array(
              'menu' => 'social',
              'menu_class' => 'nav'
            ) ); 
          ?>
          </div>
        </div>
        
        <div class="col-6">
          <div class="navbar justify-content-center">
          <?php 
            wp_nav_menu( array(
              'menu' => 'primary',
              'menu_class' => 'nav'
            ) ); 
          ?>
          </div>
        </div>
          
        <div class="col-3">
          <div class="navbar justify-content-end">
            <ul class="nav">
              <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('header-widget')) ?>
            </ul>
          </div>
        </div>

      </nav>
    </div>
    </section>

    <section class="l-banner--main jumbotron d-flex justify-content-center align-items-center">
      
        <div class="flex-item">
          <a href="<?php echo get_site_url(); ?>"><?php bloginfo( ‘name’ ); ?></a>
        </div>
      
    </section>

  </header>