<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<div class="container py-5">
  <?php
  while ( have_posts() ) :
    the_post();

    wc_get_template_part( 'content', 'single-product' );

  endwhile; // end of the loop.
  ?>
</div>

<?php
get_footer( 'shop' );
