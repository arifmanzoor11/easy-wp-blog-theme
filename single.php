<?php get_header(); ?>
<main class="container"> 
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="row">
       <div class="col-lg-8">
            <article class="border rounded bg-light p-3">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
            <?php endif; ?>
                <h1 style="font-size:2rem" class="mt-4 fw-bold"><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>
        
            </article>
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
    <?php comments_template(); ?>
  <?php endwhile; endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
