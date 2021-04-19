<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="author" content="Maxence Deschamps, Antoine Bonin" />
    <title><?php wp_title(''); ?></title>

    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/css/style.min.css">
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?= get_template_directory_uri() ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?= get_template_directory_uri() ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header id="header" class="on-top">
      <nav id="menu-classique">
        <div class="on-left">
          <a class="logo" href="<?= get_site_url() ?>">Accueil</a>
          <?= do_shortcode('[aws_search_form]'); ?>
        </div>

        <?php if ( has_nav_menu( 'principal-menu' ) ) : ?>
          <?php wp_nav_menu ( array (
            'theme_location' => 'principal-menu' ,
            'menu_class' => 'on-right',
          ) ); ?>
        <?php endif; ?>
      </nav>

      <div class="title">
        <div class="content">
          <?php if (is_front_page()) : ?>
            <h1>Stop Covi2</h1>
            <p><a href="<?= get_permalink(6) ?>">Visiter la boutique</a></p>
          <?php endif; ?>
        </div>
      </div>
    </header>

    <nav id="nav-menu-mobile">
      <?php if ( has_nav_menu( 'mobile-menu' ) ) : ?>
        <?php wp_nav_menu ( array (
          'theme_location' => 'mobile-menu'
        ) ); ?>
      <?php endif; ?>
    </nav>

    <nav id="categories-menu" class="closed">
      <div class="content">
        <?php get_menu_categories(); ?>
        <p><a href="<?= get_permalink(6) ?>">Visiter la boutique</a></p>
      </div>
    </nav>
