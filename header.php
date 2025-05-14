<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?> <!-- Make sure this is present for scripts and styles -->
</head>
<body <?php body_class(); ?>>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <?php
          wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false,
            'menu_class'     => 'navbar-nav ms-auto',
            'item_class'     => 'nav-item',
            'link_class'     => 'nav-link',
            'depth'           => 2, // Optional: change based on your menu structure
            'fallback_cb'     => false, // Disable the fallback if no menu is set
          ]);
        ?>
      </div>
    </div>
  </nav>
</header>

