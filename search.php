<?php get_header(); ?>

<div class="container py-5">
  <div class="row">
    <!-- Main Content -->
    <main class="col-lg-8" role="main">
      <?php if (have_posts()) : ?>
        <header class="mb-4">
          <h1 class="h3">Search Results for: <em><?php echo get_search_query(); ?></em></h1>
          <p class="text-muted">Found <?php echo $wp_query->found_posts; ?> result<?php echo $wp_query->found_posts == 1 ? '' : 's'; ?>.</p>
        </header>

        <?php while (have_posts()) : the_post(); ?>
          <article class="mb-5 pb-4 border-bottom">
            <?php if (has_post_thumbnail()) : ?>
              <div class="mb-3">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <img 
                    src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" 
                    alt="<?php the_title_attribute(); ?>" 
                    class="rounded shadow-sm img-fluid"
                    width="150"
                    height="150"
                    loading="lazy"
                    decoding="async"
                  >
                </a>
              </div>
            <?php endif; ?>

            <header>
              <h2 class="h5">
                <a href="<?php the_permalink(); ?>" class="text-main"><?php the_title(); ?></a>
              </h2>
              <p class="text-muted small mb-2"><?php echo get_the_date(); ?> | by <?php the_author(); ?></p>
            </header>

            <section class="mb-2">
              <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
            </section>

            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-main">Read More</a>
          </article>
        <?php endwhile; ?>

        <!-- Pagination -->
        <nav class="mt-4">
          <?php
          echo paginate_links([
            'total'     => $wp_query->max_num_pages,
            'current'   => max(1, get_query_var('paged')),
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'type'      => 'list',
          ]);
          ?>
        </nav>

      <?php else : ?>
        <div class="alert alert-warning">
          <h5>No results found for "<?php echo get_search_query(); ?>"</h5>
          <p>Try different keywords or go back to the <a href="<?php echo esc_url(home_url('/')); ?>">home page</a>.</p>
        </div>
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
