<?php get_header(); ?>

<div class="container py-5">
  <div class="row">
    <!-- Main Content -->
    <main class="col-lg-8" role="main">

      <?php if (have_posts()) : ?>
        <header class="mb-4">
          <h1 class="h3"><?php the_archive_title(); ?></h1>
          <?php the_archive_description('<p class="text-muted">', '</p>'); ?>
        </header>

        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = [
          'post_type'      => 'post',
          'posts_per_page' => 10,
          'paged'          => $paged,
        ];
        $blog_query = new WP_Query($args);
        ?>

        <?php if ($blog_query->have_posts()) : ?>
          <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            <article class="mb-5 pb-4 border-bottom">
              <?php if (has_post_thumbnail()) : ?>
                <div class="mb-3">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid rounded', 'alt' => get_the_title()]); ?>
                  </a>
                </div>
              <?php endif; ?>
              <header>
                <h2 class="h5"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h2>
                <p class="text-muted small mb-2"><?php echo get_the_date(); ?> | by <?php the_author(); ?></p>
              </header>
              <section class="mb-2">
                <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
              </section>
              <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Read More</a>
            </article>
          <?php endwhile; ?>

          <!-- Pagination -->
          <nav class="mt-4">
            <?php
            echo paginate_links([
              'total'     => $blog_query->max_num_pages,
              'current'   => $paged,
              'prev_text' => '&laquo;',
              'next_text' => '&raquo;',
              'type'      => 'list',
            ]);
            ?>
          </nav>

          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>No posts found.</p>
        <?php endif; ?>

      <?php else : ?>
        <p>No posts available.</p>
      <?php endif; ?>
    </main>

    <!-- Sidebar -->
    <aside class="col-lg-4" role="complementary">
      <?php if (is_active_sidebar('sidebar-1')) : ?>
        <div class="bg-light p-4 border rounded">
          <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
      <?php else : ?>
        <div class="bg-light p-4 border rounded">
          <h5>Sidebar</h5>
          <p>Add widgets from Appearance > Widgets</p>
        </div>
      <?php endif; ?>
    </aside>
  </div>
</div>

<?php get_footer(); ?>
