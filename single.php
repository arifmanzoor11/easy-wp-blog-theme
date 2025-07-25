<?php get_header(); ?>
<main class="container">
  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>
      <?php if (is_single() && get_post_type() === 'post'): ?>

          <div
          class="row"> <!-- Main Post Content -->
          <div class="col-lg-8">
            <article class="border rounded bg-light p-4 mb-4 shadow-sm" role="article">
              <?php if (has_post_thumbnail()):
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>
                  <div class="mb-3"> <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" width="150" height="150" class="rounded shadow-sm img-fluid" decoding="async">
                </div>
              <?php else: ?>
                <div class="card-img-top mb-4">
                  <svg class="img-fluid rounded" width="150px" viewbox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Bairiya Chords Guitar Piano and Lyrics Arijit Singh Bairiya | Amitabh B">
                    <rect width="100%" height="100%" fill="#BFAF80"></rect>
                    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#fff" font-size="30">
                      No Image
                    </text>
                  </svg>
                </div>
              <?php endif; ?>
              <header>
                <h1 class="h2 fw-bold mb-3 text-main"><?php the_title(); ?></h1>
                <p class="text-muted small mb-4">
                  Published on
                  <?php echo get_the_date(); ?>
                  by
                  <?php the_author(); ?>
                </p>
                <?php
                  $category = get_the_category();
                  if ( $category ) {
                      echo '<div class="mb-4 post-category" style="display: flex; flex-wrap: wrap; gap:10px 5px; list-style: none; padding: 0;">Categories: ';
                      echo '<a style=" background: #3f51b5; padding: 2px 5px; border-radius: 3px; color: white; font-size: 13px;" href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
                      echo '</div>';
                  }
                  ?>
              </header>
              <section class="post-content"><?php the_content(); ?>
                <?php

                $tags = get_the_tags();

                if ($tags) {
                  echo '<ul style="display: flex; flex-wrap: wrap; gap:10px 5px; list-style: none; padding: 0;">';
                  foreach ($tags as $tag) {
                    echo '<li><a style=" background: #edededff; padding: 5px; border-radius: 3px; color: black; font-size: 13px;" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                  }
                  echo '</ul>';
                }
                ?>
              </section>

              <!-- Post pagination (for multi-page posts) -->
              <?php wp_link_pages([
                'before' => '<div class="page-links mt-4"><strong>Pages:</strong> ',
                'after' => '</div>',
              ]); ?>
            </article>

            <!-- Comments -->
            <?php comments_template(); ?>
          </div>

          <!-- Sidebar -->
          <aside
            class="col-lg-4">
            <?php if (is_active_sidebar('sidebar-1')): ?>
              <div
                class="bg-light p-3 border rounded mb-4"><?php dynamic_sidebar('sidebar-1'); ?>
              </div>
            <?php else: ?>
              <div class="bg-light p-3 border rounded mb-4">
                <h5>Sidebar</h5>
                <p>Add widgets from Appearance > Widgets.</p>
              </div>
            <?php endif; ?>
          </aside>
        <?php else: ?>
          <section
            class="post-content"><?php //the_content(); ?>
          </section>
        <?php endif; ?>
      </div>
    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

