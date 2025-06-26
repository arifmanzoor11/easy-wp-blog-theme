<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>
<style>
    .woocommerce div.product form.cart{ display: flex; align-items: center;}
    .woocommerce .quantity .qty { height: 37px; }
</style>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row g-5 align-items-start', $product ); ?>>

  <!-- Product Images -->
  <div class="col-md-">
    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action( 'woocommerce_before_single_product_summary' );
    ?>
    <div class="summary entry-summary">
    <h1 class="h2 fw-bold mb-3 text-main"><?php the_title(); ?></h1>
            <p class="text-muted small mb-4">
              Published on <?php echo get_the_date(); ?> by <?php the_author(); ?>
            </p>
      <?php
      /**
       * Hook: woocommerce_single_product_summary.
       *
       * @hooked woocommerce_template_single_title - 5
       * @hooked woocommerce_template_single_rating - 10
       * @hooked woocommerce_template_single_price - 10
       * @hooked woocommerce_template_single_excerpt - 20
       * @hooked woocommerce_template_single_add_to_cart - 30
       * @hooked woocommerce_template_single_meta - 40
       * @hooked woocommerce_template_single_sharing - 50
       */
      do_action( 'woocommerce_single_product_summary' );
      ?>

    </div>
  </div>

  <!-- Tabs, Upsells, Related Products -->
  <div class="col-12 mt-5">
    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action( 'woocommerce_after_single_product_summary' );
    ?>
  </div>

</div>
