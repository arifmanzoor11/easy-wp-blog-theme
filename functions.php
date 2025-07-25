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
    // Load Bootstrap CSS with preload and media swap trick
    add_filter('style_loader_tag', function ($tag, $handle) {
        if ($handle === 'bootstrap-css') {
            return str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $tag);
        }
        return $tag;
    }, 10, 2);

    // Load Slick styles similarly
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Theme CSS with cache busting
    $style_version = filemtime(get_stylesheet_directory() . '/style.css');
    wp_enqueue_style('easywp-style', get_stylesheet_uri(), [], $style_version);

    // Defer JavaScript files
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

  
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
  
  
  /**
 * Register Custom Navigation Walker
 */

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'register_navwalker' );
