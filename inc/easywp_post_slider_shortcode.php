<?php
// Shortcode to show posts in a Slick slider by category with fallback SVG image
function easywp_post_slider_shortcode($atts) {
    $atts = shortcode_atts([
        'category' => '',
        'posts'    => 6,
    ], $atts, 'easywp_post_slider');

    $query = new WP_Query([
        'posts_per_page' => (int) $atts['posts'],
        'category_name'  => sanitize_text_field($atts['category']),
    ]);

    if (!$query->have_posts()) {
        return '<p>No posts found.</p>';
    }
    ob_start();
    ?>
    <div class="easywp-slick-posts">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="post-slide p-3">
                <div class="card h-100 shadow-sm">
                    <a href="<?php the_permalink(); ?>" class="slick-posts-anchor">
                        <div class="card-img-top">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                                <?php else : ?>
                                <?php
                                // Generate random color in hex
                                 // Classy modern color palette
                                 $modern_colors = [
                                    '#3E3E3E', // Charcoal Black
                                    '#2C3E50', // Deep Navy Blue
                                    '#1C1C1C', // Jet Black
                                    '#4B5320', // Army Green
                                    '#8D8741', // Olive Gold
                                    '#C0B283', // Warm Beige
                                    '#A67B5B', // Luxe Copper
                                    '#BFAF80', // Soft Gold
                                    '#8C7853', // Bronze
                                    '#D5CABD', // Pale Champagne
                                ];
                                
                                $rand_color = $modern_colors[array_rand($modern_colors)];
                                ?>
                                <!-- Fallback SVG with random color -->
                                <svg class="img-fluid w-100" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="<?php the_title(); ?>">
                                    <rect width="100%" height="100%" fill="<?php echo esc_attr($rand_color); ?>"/>
                                    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="30">
                                        No Image
                                    </text>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 15)); ?></p>
                            <br>
                            <a href="<?php the_permalink(); ?>" class="btn btn-dark btn-sm">Read More</a>
                        </div>
                    </a>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('easywp_post_slider', 'easywp_post_slider_shortcode');
