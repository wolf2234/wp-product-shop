<?php 
add_action('wp_enqueue_scripts', 'product_shop_styles');
add_action('wp_enqueue_scripts', 'product_shop_scripts');
add_action('after_setup_theme', 'product_shop_nav_menu');


function product_shop_nav_menu() {
    register_nav_menu( 'top', 'menu in header' );
    register_nav_menu( 'bottom', 'menu in footer' );
}

function product_shop_styles() {
    wp_enqueue_style('null-style', get_template_directory_uri() . '/assets/css/null-style.css');
    wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-min-map-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css.map');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/modules/swiper/css/swiper-bundle.min.css');
    wp_enqueue_style('swiper-style-css', get_template_directory_uri() . '/assets/css/swiper-style.css');
    wp_enqueue_style('null-style', get_template_directory_uri() . '/assets/css/null-style.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main-style.css');
    wp_enqueue_style('menu-style', get_template_directory_uri() . '/assets/css/menu.css');
    wp_enqueue_style('head-style', get_template_directory_uri() . '/assets/css/head.css');
    wp_enqueue_style('copyright-style', get_template_directory_uri() . '/assets/css/copyright.css');
    wp_enqueue_style('bank-style', get_template_directory_uri() . '/assets/css/bank.css');
    wp_enqueue_style('banner-style', get_template_directory_uri() . '/assets/css/banner.css');
    wp_enqueue_style('product-style', get_template_directory_uri() . '/assets/css/product.css');
    wp_enqueue_style('filters-style', get_template_directory_uri() . '/assets/css/filters.css');
    wp_enqueue_style('goods-cards-style', get_template_directory_uri() . '/assets/css/goods.css');
    wp_enqueue_style('product-cards-style', get_template_directory_uri() . '/assets/css/product-cards.css');
    wp_enqueue_style('time-style', get_template_directory_uri() . '/assets/css/time-style.css');
    wp_enqueue_style('view-all-style', get_template_directory_uri() . '/assets/css/view-all.css');
    wp_enqueue_style('category-style', get_template_directory_uri() . '/assets/css/category.css');
    wp_enqueue_style('banner-category-style', get_template_directory_uri() . '/assets/css/banner-category.css');
    wp_enqueue_style('grid-wrapper-style', get_template_directory_uri() . '/assets/css/grid-wrapper.css');
    wp_enqueue_style('happy-customers-style', get_template_directory_uri() . '/assets/css/happy-customers.css');
    wp_enqueue_style('comment-style', get_template_directory_uri() . '/assets/css/comment.css');
    wp_enqueue_style('cart-product-style', get_template_directory_uri() . '/assets/css/cart-product.css');
    wp_enqueue_style('price-style', get_template_directory_uri() . '/assets/css/price.css');
    wp_enqueue_style('stars-style', get_template_directory_uri() . '/assets/css/stars.css');
    wp_enqueue_style('burger-style', get_template_directory_uri() . '/assets/css/burger.css');
}

function product_shop_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js");
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('comment-reply');
    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'slider-jquery', get_template_directory_uri() . '/assets/js/slider_jquery.js', array('jquery'), null, true);
    wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'bootstrap-min-map-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js.map', array('jquery'), null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/modules/swiper/js/swiper-bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper-script-js', get_template_directory_uri() . '/modules/swiper/js/swiper-script.js', array('jquery'), null, true);
    wp_enqueue_script( 'stars', get_template_directory_uri() . '/assets/js/stars.js', array('jquery'), null, true);
    // wp_enqueue_script( 'view-all', get_template_directory_uri() . '/assets/js/view-all.js', array('jquery'), null, true);
    wp_enqueue_script( 'view-all-db', get_template_directory_uri() . '/assets/js/view-all-db.js', array('jquery'), null, true);
    wp_localize_script('view-all-db', 'product_obj', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script( 'quantity-input', get_template_directory_uri() . '/assets/js/quantity-input.js', array('jquery'), null, true);
    wp_enqueue_script( 'cart-product', get_template_directory_uri() . '/assets/js/cart-product.js', array('jquery'), null, true);
    wp_enqueue_script( 'burger', get_template_directory_uri() . '/assets/js/burger.js', array('jquery'), null, true);
    wp_enqueue_script( 'filters', get_template_directory_uri() . '/assets/js/filters.js', array('jquery'), null, true);
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
}

add_theme_support('custom-logo');

add_action( 'after_setup_theme', 'theme_add_woocommerce_support' );
function theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


remove_action(
    'woocommerce_single_variation',
    20
);


// Нужно один раз обновить старые товары.
// Добавь временно в functions.php:
// add_action('init', function() {
//     if ( isset($_GET['fix_ratings']) ) {
//         $products = get_posts([
//             'post_type' => 'product',
//             'posts_per_page' => -1,
//             'fields' => 'ids'
//         ]);
//         foreach ( $products as $product_id ) {
//             if ( ! metadata_exists( 'post', $product_id, 'rating_half' ) ) {
//                 update_post_meta( $product_id, 'rating_half', 0 );
//             }
//         }
//         echo 'Ratings fixed';
//         exit;
//     }
// });
// Открой в браузере:
// https://your-site.com/?fix_ratings=1
// Он пройдётся по всем товарам и поставит 0 тем, у кого нет.
// После этого код можно удалить.



add_action( 'save_post_product', function( $post_id ) {

    if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
        return;
    }

    if ( ! metadata_exists( 'post', $post_id, 'rating_half' ) ) {
        update_post_meta( $post_id, 'rating_half', 0 );
    }

});

add_action( 'comment_post', function ( $comment_id ) {
    if ( isset($_POST['rating']) ) {
        update_comment_meta(
            $comment_id,
            'rating_half',
            floatval($_POST['rating'])
        );
    }
});


function get_product_average_rating_half( $product_id ) {
    $comments = get_comments( [
        'post_id' => $product_id,
        'status'  => 'approve',
        'meta_key'=> 'rating_half',
    ] );

    if ( empty( $comments ) ) {
        return 0;
    }

    $sum = 0;
    $count = 0;

    foreach ( $comments as $comment ) {
        $rating = floatval(
            get_comment_meta( $comment->comment_ID, 'rating_half', true )
        );

        if ( $rating > 0 ) {
            $sum += $rating;
            $count++;
        }
    }

    if ( ! $count ) {
        return 0;
    }

    $average = $sum / $count;
    $rounded = ceil( $average * 2 ) / 2;

    update_post_meta( $product_id, 'rating_half', $rounded );

    return $rounded;
}





add_action('wp_ajax_load_products', 'load_products');
add_action('wp_ajax_nopriv_load_products', 'load_products');

function load_products() {
    $offset = intval($_GET['offset']); #0
    $limit  = intval($_GET['limit']); #12

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'offset'         => $offset,
        'meta_key'       => 'rating_half',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'meta_type'      => 'NUMERIC',
    ];

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            ?>
            <a href="<?php the_permalink(); ?>" class="product-cards__item" data-items-item="">
                <div class="product-cards__image">
                    <?php the_post_thumbnail('medium'); ?>
                    <div class="product-cards__icons">
                        <span class="product-cards__like">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/like.svg" alt="">
                        </span>
                        <span class="product-cards__view">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/view.svg" alt="">
                        </span>
                    </div>
                    <button class="product-cards__add">Add to Cart</button>
                </div>
                <div class="product-cards__info">
                    <span class="product-cards__name"><?php the_title(); ?></span>
                    <span class="product-cards__price">
                        <?php if ( $product->is_on_sale() ) : ?>
                            <span class="price product-cards__sale-price">
                                <?php echo wc_price( $sale_price ); ?>
                            </span>
                            <span class="price product-cards__regular-price">
                                <?php echo wc_price( $regular_price ); ?>
                            </span>
                        <?php else : ?>
                            <span class="price product-cards__regular-price">
                                <?php echo wc_price( $regular_price ); ?>
                            </span>
                        <?php endif; ?>
                    </span>
                    <span class="product-cards__stars">
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
                    </span>
                </div>
            </a>
            <?php
        }
    }

    wp_reset_postdata();

    wp_send_json_success([
        'html' => ob_get_clean(),
        'count' => $query->post_count,
    ]);
}

?>