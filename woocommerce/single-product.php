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
    <div class="comments cart-wrapper__comments">
        <?php
        $comments = get_comments( array(
            'post_id' => get_the_ID(),
            'status'  => 'approve',
        ) );
        foreach ( $comments as $comment ) :
            $rating = floatval(
                get_comment_meta( $comment->comment_ID, 'rating_half', true )
            );
        ?>
            <div class="comment">
                <div class="comment__body">
                    <div class="comment__header">
                        <div class="review-rating">
                            <div
                                class="rating-stars-display"
                                style="--rating: <?php echo esc_attr( $rating ); ?>;"
                                aria-label="Rating <?php echo esc_attr( $rating ); ?> out of 5"
                            >
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <div class="comment__content">
                        <h3 class="comment__user">
                            <span class="comment__user-name">
                                <?php echo esc_html( $comment->comment_author ); ?>
                            </span>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/check-user.svg" alt="Сheck User">
                        </h3>
                        <p class="comment__text">
                            <?php echo esc_html( $comment->comment_content ); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" id="commentform" class="comment-form">
    <div class="comment-form-rating">
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
            Your review&nbsp;<span class="required">*</span>
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


<?php get_footer(); ?>