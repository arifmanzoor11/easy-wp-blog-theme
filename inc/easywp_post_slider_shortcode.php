<?php
// Shortcode to show posts in a Slick slider by category with fallback SVG image
function easywp_post_slider_shortcode($atts) {
    $atts = shortcode_atts([
        'category'       => '',
        'posts'          => 6,
        'post_type'      => 'post',
        'order'          => 'DESC',
        'orderby'        => 'date',
        'tag'            => '',
        'author'         => '',
        'post_status'    => 'publish',
        'exclude'        => '', // comma-separated IDs
        'include'        => '', // comma-separated IDs
        'meta_key'       => '',
        'meta_value'     => '',
        'paged'          => 1,
    ], $atts, 'easywp_post_slider');

    // Convert comma-separated include/exclude to arrays
    $include_ids = $atts['include'] ? array_map('intval', explode(',', $atts['include'])) : [];
    $exclude_ids = $atts['exclude'] ? array_map('intval', explode(',', $atts['exclude'])) : [];

    $query_args = [
        'post_type'      => sanitize_text_field($atts['post_type']),
        'posts_per_page' => (int) $atts['posts'],
        'category_name'  => sanitize_text_field($atts['category']),
        'tag'            => sanitize_text_field($atts['tag']),
        'order'          => sanitize_text_field($atts['order']),
        'orderby'        => sanitize_text_field($atts['orderby']),
        'author'         => $atts['author'],
        'post_status'    => sanitize_text_field($atts['post_status']),
        'paged'          => (int) $atts['paged'],
    ];
    $category_slug = sanitize_text_field($atts['category']);
    $category = get_category_by_slug($category_slug);
    if (!empty($include_ids)) {
        $query_args['post__in'] = $include_ids;
    }

    if (!empty($exclude_ids)) {
        $query_args['post__not_in'] = $exclude_ids;
    }

    if (!empty($atts['meta_key'])) {
        $query_args['meta_key'] = sanitize_text_field($atts['meta_key']);
        $query_args['meta_value'] = sanitize_text_field($atts['meta_value']);
    }

    $query = new WP_Query($query_args);
    if (!$query->have_posts()) {
        return '<p>No posts found.</p>';
    }
    ob_start();
    ?>
    <div style=" display: flex
;
    align-items: center;
    justify-content: space-between;">
        <div>
            <?php echo '<h2 class="easywp-slider-heading ps-4"><b>' . esc_html($category->name) . '</b></h2>';
             ?>
        </div>
        <div>
            <a href="<?php echo get_category_link($category) ?>">View All</a>
        </div>
    </div>
    <div class="easywp-slick-posts ">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="post-slide p-2">
                <div class="card h-100 shadow-sm border">
                    <a href="<?php the_permalink(); ?>" class="slick-posts-anchor">
                        <div class="card-img-top ps-3 pt-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
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
                                <svg class="img-fluid rounded" width="150px" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="<?php the_title(); ?>">
                                    <rect width="100%" height="100%" fill="<?php echo esc_attr($rand_color); ?>"/>
                                    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="30">
                                    No Image
                                    </text>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><b><?php the_title(); ?></b></h6>
                            <p class="card-text"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-main btn-sm mt-3">Read More</a>
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
