<?php
defined('ABSPATH') || exit;
get_header();

global $product;

if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}
?>
<div class="description">
    <?php the_content(); ?>
</div>



<?php
$regular_price = $product->get_regular_price();
$sale_price    = $product->get_sale_price();
$main_image_id = $product->get_image_id();
$gallery_image_ids = $product->get_gallery_image_ids();
$image_ids = [];
if ($main_image_id) {
    $image_ids[] = $main_image_id;
}
if (!empty($gallery_image_ids)) {
    $image_ids = array_merge($image_ids, $gallery_image_ids);
} 
?>



<div class="cart-product container-large">
    <div class="cart-product__images">
        <div class="mini-swiper">
            <div class="mini-swiper-wrapper swiper-wrapper">
                <?php foreach ($image_ids as $image_id): ?>
                    <div class="mini-swiper-slide swiper-slide">
                        <div class="image-wrapper">
                            <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'thumbnail',
                                    false,
                                    ['class' => 'mini-product-img']
                                );
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach ($image_ids as $image_id): ?>
                    <div class="swiper-slide">
                        <div class="image-wrapper">
                            <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'large',
                                    false,
                                    ['class' => 'product-img']
                                );
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->
            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
        </div>
    </div>
    <div class="cart-product__info">
        <h2 class="title cart-product__title"><?php echo $product->get_name(); ?></h2>
        <div class="stars">Stars</div>
        <div class="cart-product__price">
                    <?php if ( $product->is_on_sale() ) : ?>
                        <span class="price">
                            <?php echo wc_price( $sale_price ); ?>
                        </span>
                        <span class="price cart-product__price_regular">
                            <?php echo wc_price( $regular_price ); ?>
                        </span>
                    <?php else : ?>
                        <span class="price cart-product__price_regular">
                            <?php echo wc_price( $regular_price ); ?>
                        </span>
                    <?php endif; ?>
        </div>
        <div class="cart-product__short-description">
            <?php echo $product->get_short_description(); ?>
        </div>
        <div class="cart-product__add-cart"><?php woocommerce_template_single_add_to_cart(); ?></div>
    </div>
</div>


<?php
$terms = wc_get_product_terms(
    $product->get_id(),
    'pa_color'
);
?>
<div class="product-colors">
    <?php foreach ($terms as $term): ?>
        <label class="color-radio" style="">
        <input type="radio"
                name="attribute_pa_color"
                value="<?php echo esc_attr($term->slug); ?>">
        <span class="color-circle"></span>
        </label>
    <?php endforeach; ?>
</div>


<?php get_footer(); ?>