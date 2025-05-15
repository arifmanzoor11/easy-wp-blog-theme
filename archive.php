<?php get_header(); ?>

<div class="container py-5">
  <div class="row">
    <!-- Main Content Area -->
    <div class="col-lg-8">

      <!-- Blog Posts (Optional below main content) -->
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $args = [
        'post_type'      => 'post',
        'posts_per_page' => 10,
        'paged'          => $paged,
      ];
      $blog_query = new WP_Query($args);

      if ($blog_query->have_posts()) :
        echo '<h3 class="mt-5">Latest Posts</h3>';
        while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
          <div class="mb-4 border-bottom pb-3">
          <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
            <?php endif; ?>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p class="text-muted"><?php the_time('F j, Y'); ?></p>
            <div><?php the_excerpt(); ?></div>
          </div>
        <?php endwhile;

        // Pagination
        echo '<nav class="mt-4">';
        echo paginate_links([
          'total'   => $blog_query->max_num_pages,
          'current' => $paged,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
          'type' => 'list',
          'class' => 'pagination justify-content-center',
        ]);
        echo '</nav>';

        wp_reset_postdata();
      endif;
      ?>
    </div>

    <!-- Sidebar Area -->
    <div class="col-lg-4">
      <?php if (is_active_sidebar('sidebar-1')) : ?>
        <aside class="bg-light p-3 border rounded">
          <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
      <?php else : ?>
        <aside class="bg-light p-3 border rounded">
          <h5>Sidebar</h5>
          <p>Add widgets from Appearance > Widgets</p>
        </aside>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
