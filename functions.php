<?php
// Theme setup

function easywp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'main-menu' => 'Main Menu'
    ]);
}
add_action('after_setup_theme', 'easywp_setup');

// Enqueue styles and scripts
function easywp_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', [], '5.3.0');
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], '5.3.0', true);
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

    // Cache-busting version using file modification time
    $style_version = filemtime(get_stylesheet_directory() . '/style.css');
    wp_enqueue_style('easywp-style', get_stylesheet_uri(), [], $style_version);

    // Custom Slick init
    wp_add_inline_script('slick-js', "
        jQuery(document).ready(function($) {
            $('.easywp-slick-posts').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    { breakpoint: 1290, settings: { slidesToShow: 3 } },
                    { breakpoint: 990, settings: { slidesToShow: 2 } },
                    { breakpoint: 768, settings: { slidesToShow: 1 } }
                ]
            });
        });
    ");
}
add_action('wp_enqueue_scripts', 'easywp_scripts');


// Register multiple footer widget areas in a loop
function easywp_widgets_init() {
    $widget_areas = [
        'main-sidebar' => 'Main Sidebar',
        'prefooter'    => 'Prefooter',
        'footer-1'     => 'Footer 1',
        'footer-2'     => 'Footer 2',
        'footer-3'     => 'Footer 3',
        'footer-4'     => 'Footer 4',
    ];

    foreach ($widget_areas as $id => $name) {
        register_sidebar([
            'name'          => __($name, 'easywp'),
            'id'            => $id,
            'description'   => sprintf(__('Widget area: %s', 'easywp'), $name),
            'before_widget' => '<div class="widget mb-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title mb-3">',
            'after_title'   => '</h3>',
        ]);
    }
}
add_action('widgets_init', 'easywp_widgets_init');


include_once('inc/easywp_post_slider_shortcode.php');

function mytheme_widgets_init() {
    register_sidebar([
      'name'          => __('Sidebar', 'mytheme'),
      'id'            => 'sidebar-1',
      'description'   => __('Main sidebar area'),
      'before_widget' => '<div class="mb-4">',
      'after_widget'  => '</div>',
      'before_title'  => '<h5 class="mb-2">',
      'after_title'   => '</h5>',
    ]);
  }
  add_action('widgets_init', 'mytheme_widgets_init');
  
  