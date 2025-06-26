<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<main id="primary" class="site-main py-5">
  <div class="container">

    <?php
    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (adds opening divs)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action( 'woocommerce_before_main_content' );
    ?>

    <?php
    while ( have_posts() ) :
      the_post();

      wc_get_template_part( 'content', 'single-product' );

    endwhile; // end of the loop.
    ?>

    <?php
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (adds closing divs)
     */
    do_action( 'woocommerce_after_main_content' );
    ?>
    
  </div>
</main>

<?php
get_footer( 'shop' );
