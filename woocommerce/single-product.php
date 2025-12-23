<?php
defined('ABSPATH') || exit;
get_header();


global $product;

if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}
?>
<?php echo $product->get_image('large'); ?>
<h1><?php echo $product->get_name(); ?></h1>
<div class="price">
    <?php echo $product->get_price_html(); ?>
</div>
<div class="description">
    <?php the_content(); ?>
</div>
<div class="short-description">
    <?php echo $product->get_short_description(); ?>
</div>
<?php woocommerce_template_single_add_to_cart(); ?>
<?php do_action( 'woocommerce_before_single_product_summary' ); ?>


<?php get_footer(); ?>