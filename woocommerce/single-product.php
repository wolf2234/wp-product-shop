<?php
defined('ABSPATH') || exit;
get_header();

global $product;


if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}

$avg_rating = get_product_average_rating_half( $product->get_id() );
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
<!-- <div class="description">
    <?php the_content(); ?>
</div> -->

<div class="cart-wrapper container-large">
    <div class="cart-product">
        <div class="cart-product__images">
            <div class="mini-swiper">
                <div class="mini-swiper-wrapper swiper-wrapper">
                    <?php foreach ($image_ids as $image_id): ?>
                        <div class="mini-swiper-slide swiper-slide">
                            <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'thumbnail',
                                    false,
                                    ['class' => 'mini-product-img']
                                );
                            ?>
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
                            <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'large',
                                    false,
                                    ['class' => 'product-img']
                                );
                            ?>
                        </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
        <div class="cart-product__info">
            <h2 class="title cart-product__title"><?php echo $product->get_name(); ?></h2>
            <div class="stars">
                <?php 
                    $avg_rating = get_product_average_rating_half( $product->get_id() );
                ?>
                <div class="review-rating">
                    <div
                        class="rating-stars-display"
                        style="--rating: <?php echo esc_attr( $avg_rating ); ?>;"
                        aria-label="Rating <?php echo esc_attr( $avg_rating ); ?> out of 5"
                    >
                        ★★★★★
                    </div>
                    <span class="review-rating__count"><?php echo $avg_rating; ?>/<span>5</span></span>
                </div>
            </div>
            <div class="cart-product__price">
                <?php if ( $product->is_on_sale() ) : ?>
                    <span class="price cart-product__price_sale">
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
                <span class="discount cart-product__discount">
                    <?php echo get_product_discount_percent($product); ?>
                </span>
            </div>
            <div class="cart-product__short-description">
                <?php echo $product->get_short_description(); ?>
            </div>
            <div class="cart-product__add-cart"><?php woocommerce_template_single_add_to_cart(); ?></div>
        </div>
    </div>
    <div class="cart-wrapper__sections" data-block-parent>
        <div class="cart-wrapper__links">
            <a href="#" class="cart-wrapper__link" data-block-link="1">Product Details</a>
            <a href="#" class="cart-wrapper__link active" data-block-link="2">Rating & Reviews</a>
            <a href="#" class="cart-wrapper__link" data-block-link="3">FAQs</a>
        </div>
        <div class="cart-wrapper__row">
            <div class="cart-wrapper__column">
                <span class="cart-wrapper__all-reviews">All Reviews <span class="cart-wrapper__reviews-count">(<?php echo $product->get_review_count(); ?>)</span></span>
            </div>
            <div class="cart-wrapper__column">
                <div class="cart-wrapper__select">
                    <select name="select" id="cat1" data-custom-select>
                        <option value="0" selected>latest</option>
                        <option value="1">popular</option>
                        <option value="2">oldest</option>
                    </select>
                </div>
                <button id="openModalBtn" class="cart-wrapper__btn cart-wrapper__btn_black">Write a Review</button>
                <div class="modal-overlay" id="modalOverlay">
                    <div class="modal">
                        <button class="modal-close" id="closeModalBtn">&times;</button>
                        <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" id="commentform" class="comment-form">
                            <div class="comment-form-rating">
                                <label for="rating">
                                    Rate the product&nbsp;<span class="required"></span>
                                </label>
                                <div class="rating-stars" data-rating="0">
                                    <span class="star" data-value="1">
                                        <span class="half left" data-value="0.5"></span>
                                        <span class="half right" data-value="1"></span>
                                        ★
                                    </span>
                                    <span class="star" data-value="2">
                                        <span class="half left" data-value="1.5"></span>
                                        <span class="half right" data-value="2"></span>
                                        ★
                                    </span>
                                    <span class="star" data-value="3">
                                        <span class="half left" data-value="2.5"></span>
                                        <span class="half right" data-value="3"></span>
                                        ★
                                    </span>
                                    <span class="star" data-value="4">
                                        <span class="half left" data-value="3.5"></span>
                                        <span class="half right" data-value="4"></span>
                                        ★
                                    </span>
                                    <span class="star" data-value="5">
                                        <span class="half left" data-value="4.5"></span>
                                        <span class="half right" data-value="5"></span>
                                        ★
                                    </span>
                                </div>
                                <input type="hidden" name="rating" id="rating" value="0">
                            </div>
                            <p class="comment-form-comment">
                                <label for="comment">
                                    Comment&nbsp;<span class="required"></span>
                                </label>
                                <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                <input type="hidden" name="comment_post_ID" value="<?php echo $product->get_id(); ?>" id="comment_post_ID">
                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            </p>
                            <?php wp_nonce_field('comment_nonce', '_wp_unfiltered_html_comment'); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-wrapper__items">
            <div class="cart-wrapper__item" data-block-item="1"></div>
            <div class="cart-wrapper__item active" data-block-item="2">
                <div class="cart-wrapper__comments" data-product-id="<?php echo get_the_ID(); ?>">
                    <div class="comments">
                    </div>
                    <button class="view-all cart-wrapper__view-all">
                        load more reviews
                    </button>
                </div>
            </div>
            <div class="cart-wrapper__item" data-block-item="3"></div>
        </div>
    </div>
    <div class="goods" data-parent-of-view-all="">
        <div class="goods__body goods__body_padding-bottom">
            <div class="goods__header">
                <div class="goods__info">
                    <span class="subtitle goods__subtitle_capitalize">You might also like</span>
                </div>
            </div>
            <div class="goods__content" data-slider="">
                <div class="product-cards" data-items-wrapper="" data-step="2" data-count="4"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>