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



<?php
global $product;
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



<div class="slider-wrapper">
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


<?php get_footer(); ?>