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
    // Main stylesheet
    wp_enqueue_style('easywp-style', get_stylesheet_uri());

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', [], '5.3.0');

    // Google Fonts
    wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', [], null);

    // Slick Carousel CSS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Bootstrap JS Bundle
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], '5.3.0', true);

    // jQuery (WordPress includes it by default, no need to enqueue again)

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

    // Custom Slick init
    wp_add_inline_script('slick-js', "
        jQuery(document).ready(function($) {
            $('.easywp-slick-posts').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 2 } },
                    { breakpoint: 768, settings: { slidesToShow: 1 } }
                ]
            });
        });
    ");
}
add_action('wp_enqueue_scripts', 'easywp_scripts');

// Register widget area
function easywp_widgets_init() {
    register_sidebar([
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'easywp_widgets_init');

// Shortcode to show posts in a Slick slider by category
function easywp_post_slider_shortcode($atts) {
    $atts = shortcode_atts([
        'category' => '',
        'posts'    => 6,
    ], $atts);

    $query = new WP_Query([
        'posts_per_page' => (int) $atts['posts'],
        'category_name'  => sanitize_text_field($atts['category']),
    ]);

    if (!$query->have_posts()) return '<p>No posts found.</p>';

    ob_start();
    ?>
    <div class="easywp-slick-posts">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="post-slide p-3">
                <div class="card h-100 shadow-sm">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-img-top">
                            <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-dark btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('easywp_post_slider', 'easywp_post_slider_shortcode');



