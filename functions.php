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
    wp_enqueue_style('noUiSlider-css', get_template_directory_uri() . '/node_modules/nouislider/dist/nouislider.min.css');
    wp_enqueue_style('noUiSlider', get_template_directory_uri() . '/assets/css/noUiSlider.css');
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
    wp_enqueue_style('comment-form', get_template_directory_uri() . '/assets/css/comment-form.css');
    wp_enqueue_style('subscribe-form', get_template_directory_uri() . '/assets/css/subscribe-form.css');
    wp_enqueue_style('modal-view', get_template_directory_uri() . '/assets/css/modal-view.css');
    wp_enqueue_style( 'customSelectField', get_template_directory_uri() . '/modules/customSelectField/css/select-custom.css');
    wp_enqueue_style('burger-style', get_template_directory_uri() . '/assets/css/burger.css');
    wp_enqueue_style('breadcrumbs-style', get_template_directory_uri() . '/assets/css/breadcrumbs.css');
    wp_enqueue_style('cart-style', get_template_directory_uri() . '/assets/css/cart.css');
    wp_enqueue_style('orders-style', get_template_directory_uri() . '/assets/css/orders.css');
    wp_enqueue_style('cupon-style', get_template_directory_uri() . '/assets/css/cupon.css');
    wp_enqueue_style('wish-list-style', get_template_directory_uri() . '/assets/css/wish-list.css');
    wp_enqueue_style('auth-style', get_template_directory_uri() . '/assets/css/auth.css');
    wp_enqueue_style('profile-style', get_template_directory_uri() . '/assets/css/profile.css');
    wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/contact.css');
    wp_enqueue_style('page-errors-style', get_template_directory_uri() . '/assets/css/page-errors.css');
    wp_enqueue_style('checkout-style', get_template_directory_uri() . '/assets/css/checkout.css');
    wp_enqueue_style('billing-style', get_template_directory_uri() . '/assets/css/billing.css');
}

function product_shop_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js");
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('comment-reply');
    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'slider-jquery', get_template_directory_uri() . '/assets/js/slider_jquery.js', array('jquery'), null, true);
    wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'noUiSlider-js', get_template_directory_uri() . '/node_modules/nouislider/dist/nouislider.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'noUiSlider', get_template_directory_uri() . '/assets/js/noUiSlider.js', array('jquery'), null, true);
    wp_enqueue_script( 'bootstrap-min-map-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js.map', array('jquery'), null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/modules/swiper/js/swiper-bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper-script-js', get_template_directory_uri() . '/modules/swiper/js/swiper-script.js', array('jquery'), null, true);
    wp_enqueue_script( 'stars', get_template_directory_uri() . '/assets/js/stars.js', array('jquery'), null, true);
    // wp_enqueue_script( 'stripe-js', get_template_directory_uri() . '/assets/js/stripe.js', array('jquery'), null, true);
    wp_enqueue_script('stripe-js', 'https://js.stripe.com/v3/', [], null, true);
    // wp_enqueue_script( 'view-all', get_template_directory_uri() . '/assets/js/view-all.js', array('jquery'), null, true);
    wp_enqueue_script( 'view-all-db', get_template_directory_uri() . '/assets/js/view-all-db.js', array('jquery'), null, true);
    wp_localize_script('view-all-db', 'product_obj', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script( 'quantity-input', get_template_directory_uri() . '/assets/js/quantity-input.js', array('jquery'), null, true);
    wp_enqueue_script( 'cart-product', get_template_directory_uri() . '/assets/js/cart-product.js', array('jquery'), null, true);
    wp_enqueue_script( 'burger', get_template_directory_uri() . '/assets/js/burger.js', array('jquery'), null, true);
    wp_enqueue_script( 'filters', get_template_directory_uri() . '/assets/js/filters.js', array('jquery'), null, true);
    wp_enqueue_script( 'product-filters', get_template_directory_uri() . '/assets/js/product-filters.js', array('jquery'), null, true);
    wp_enqueue_script( 'clickToShowBlock', get_template_directory_uri() . '/modules/clickToShowBlock/js/show-block.js', array('jquery'), null, true);
    wp_enqueue_script( 'customSelectField', get_template_directory_uri() . '/modules/customSelectField/js/select-custom.js', array('jquery'), null, true);
    wp_enqueue_script( 'modal-view', get_template_directory_uri() . '/assets/js/modal-view.js', array('jquery'), null, true);
    wp_enqueue_script( 'load-comments', get_template_directory_uri() . '/assets/js/load-comments.js', array('jquery'), null, true);
    wp_localize_script('load-comments', 'comment_obj', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
    wp_enqueue_script( 'cart', get_template_directory_uri() . '/assets/js/cart.js', array('jquery'), null, true);
    wp_localize_script('cart', 'cart_obj', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('orders', get_template_directory_uri() . '/assets/js/orders.js', array('jquery'), null, true);
    wp_enqueue_script( 'wish-list', get_template_directory_uri() . '/assets/js/wish-list.js', array('jquery'), null, true);
    wp_enqueue_script('auth', get_template_directory_uri() . '/assets/js/auth.js', array('jquery'), null, true);
    wp_enqueue_script('profile', get_template_directory_uri() . '/assets/js/profile.js', array('jquery'), null, true);
    wp_enqueue_script('checkout', get_template_directory_uri() . '/assets/js/checkout.js', array('jquery'), null, true);
    wp_localize_script('checkout', 'stripe_data', ['publishable_key' => STRIPE_PUBLIC_KEY,]);
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


add_filter('duplicate_comment_id', '__return_false');

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


add_action('phpmailer_init', function ($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'da98037ed33222';
    $phpmailer->Password = '795d39dcd756e2';
    $phpmailer->From = 'noreply@example.com';
    $phpmailer->FromName = 'Product Shop';
    $phpmailer->SMTPSecure = 'tls';
});

add_filter('wp_mail_from', function () {
    return 'noreply@example.com';
});

add_filter('wp_mail_from_name', function () {
    return 'Product Shop';
});

// add_action('wp_mail_failed', function ($wp_error) {
//     echo "<pre>";
//     print_r($wp_error->get_error_data());
//     print_r($wp_error->get_error_messages());
//     echo "</pre>";
//     exit;
// });


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


function get_product_discount_percent($product) {

    if (!$product->is_on_sale()) {
        return 0;
    }

    $regular = $product->get_regular_price();
    $sale = $product->get_sale_price();
    $result = round((($regular - $sale) / $regular) * 100);
    return '-' . $result . '%';
}

function prepare_product_data($product) {
    return [
        'id'            => $product->get_id(), 
        'title'         => get_the_title(), 
        'permalink'     => get_permalink(), 
        'image'         => get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: wc_placeholder_img_src(), 
        'regular_price' => wc_price($product->get_regular_price()),
        'sale_price'    => $product->is_on_sale() ? wc_price($product->get_sale_price()) : null, 
        'rating'        => function_exists('get_product_average_rating_half') ? get_product_average_rating_half($product->get_id()) : 5, 
        'is_on_sale'    => $product->is_on_sale(),
        'home_domain'   => get_template_directory_uri(),
        'discount'      => function_exists('get_product_discount_percent') ? get_product_discount_percent($product) : '', 
        'reviews'       => '(' . $product->get_review_count() . ')',
    ];
}

function get_sorting_args($sort) {
    switch ($sort) {

        case 'latest':
            return [
                'orderby' => 'comment_date',
                'order'   => 'DESC',
            ];

        case 'oldest':
            return [
                'orderby' => 'comment_date',
                'order'   => 'ASC',
            ];

        case 'popular':
            return [
                'meta_key' => 'rating_half',
                'orderby'  => 'meta_value_num',
                'order'    => 'DESC',
            ];

        default:
            return [
                'orderby' => 'date',
                'order'   => 'DESC',
            ];
    }
}

function build_taxonomy_filter($taxonomy, $request_value) {
    if (empty($request_value)) {
        return null;
    }

    $value = sanitize_text_field($request_value);

    if ($value === 'undefined' || trim($value) === '') {
        return null;
    }

    return [
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => explode(',', $value),
        'operator' => 'IN',
    ];
}
function build_tax_query(array $filters): array{
    $tax_query = array_filter($filters);
    return $tax_query;
}

function add_relation_to_tax_query($tax_query, $relation) {
    if (count($tax_query) > 1) {
        $tax_query['relation'] = $relation;
    }
    return $tax_query;
}

function prepare_auth_data($data) {
    if (!is_array($data)) {
        return [];
    }
    $auth_data = [];
    $fields = [
        'username' => 'sanitize_text_field',
        'email'    => 'sanitize_email',
        'password' => 'trim',
    ];
    foreach ($fields as $field => $callback) {
        if (!array_key_exists($field, $data)) {
            continue;
        }
        $auth_data[$field] =
            $callback($data[$field] ?? '');
    }
    return $auth_data;
}


function validate_auth_data($data, $mode = 'register') {
    $errors = [];
    $username = trim(
        $data['username'] ?? ''
    );
    $email = trim(
        $data['email'] ?? ''
    );
    $password =
        $data['password'] ?? '';

    if ($mode === 'register') {
        if (empty($username)) {
            $errors['username'] =
                'Name is required.';
        }
        if (
            !empty($username) &&
            mb_strlen($username) < 2
        ) {
            $errors['username'] =
                'Name is too short. Must be at least 2 characters.';
        }
        if (
            !empty($email) &&
            email_exists($email)
        ) {
            $errors['email'] =
                'Email already exists.';
        }

        if (
            !empty($username) &&
            username_exists($username)
        ) {
            $errors['username'] =
                'Username already exists.';
        }
    }
    if ($mode === 'profile') {
        if (empty($username)) {
            $errors['username'] = 'Name is required.';
        }
        if (mb_strlen($username) < 2) {
            $errors['username'] =
                'Name is too short. Must be at least 2 characters.';
        }
        if (!is_email($email)) {
            $errors['email'] =
                'Invalid email.';
        }
    } else {
        if (!is_email($email)) {
            $errors['email'] =
                'Invalid email. Please enter a valid email address.';
        }

        if (empty($password)) {
            $errors['password'] =
                'Password is required.';
        }

        if (
            $mode === 'register' &&
            !empty($password) &&
            strlen($password) < 4
        ) {
            $errors['password'] =
                'Password is too short. Must be at least 4 characters.';
        }
    }
    return $errors;
}

function validate_contact_data($data) {
    $errors = [];
    $username = trim(sanitize_text_field($data['contact-name']) ?? '');
    $phone = trim(sanitize_text_field($data['phone']) ?? '');
    $email = sanitize_email($data['email']) ?? '';
    $message = trim($data['message']) ?? '';
    if (empty($username)) {
        $errors['contact-name'] = 'Name is required.';
    }
    if (!is_email($email)) {
        $errors['email'] =
            'Invalid email.';
    }
    if (empty($phone)) {
        $errors['phone'] =
            'Phone is required.';
    }
    if (empty($message)) {
        $errors['message'] =
            'Message is required.';
    }
    return $errors;
}

add_action('wp_ajax_load_products', 'load_products'); 
add_action('wp_ajax_nopriv_load_products', 'load_products'); 

function load_products() { 
    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0; 
    $limit  = isset($_GET['limit']) ? intval($_GET['limit']) : 12; 
    $sort   = $_GET['sort'] ?? 'popular'; 

    $args = [ 
        'post_type'      => 'product', 
        'posts_per_page' => $limit, 
        'offset'         => $offset, 
        'post_status'    => 'publish',
    ]; 

    // Сортировка
    $args = array_merge(
        $args,
        get_sorting_args($sort)
    );

    // --- ФИЛЬТР ЦЕНЫ ---
    $min_price = isset($_GET['minprice']) ? intval($_GET['minprice']) : 0;
    $max_price = isset($_GET['maxprice']) ? intval($_GET['maxprice']) : 0;

    // Применяем фильтр по цене только если max_price передан корректно
    if ($max_price > 0 && $max_price > $min_price) {
        $args['meta_query'] = [
            'relation' => 'AND',
            [
                'key'     => '_price', 
                'value'   => [$min_price, $max_price],
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ]
        ];
    }

    // --- ФИЛЬТР ПО АТРИБУТАМ ---
    $tax_query = build_tax_query([
        build_taxonomy_filter('pa_color', $_GET['colors'] ?? ''),
        build_taxonomy_filter('pa_size', $_GET['sizes'] ?? ''),
    ]);
    $$tax_query = add_relation_to_tax_query($tax_query, 'AND');

    // Если есть хотя бы одна таксономия, добавляем её в запрос
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    // Считаем общее количество
    $count_args = $args;
    $count_args['posts_per_page'] = -1;
    $count_args['offset'] = 0;
    $count_query = new WP_Query($count_args);
    $total_products = $count_query->found_posts;

    // Получаем товары
    $query = new WP_Query($args); 
    $products = [];

    if ($query->have_posts()) { 
        while ($query->have_posts()) { 
            $query->the_post();
            global $product;
            $products[] = prepare_product_data($product); 
        } 
    }
    wp_reset_postdata(); 

    wp_send_json_success([ 
        'products' => $products, 
        'count'    => count($products), 
        'total'    => $total_products, 
    ]); 
}

add_action('wp_ajax_load_product_reviews', 'load_product_reviews');
add_action('wp_ajax_nopriv_load_product_reviews', 'load_product_reviews');
function load_product_reviews() {

    $product_id = intval($_GET['product_id']);
    $offset     = intval($_GET['offset']);
    $limit      = intval($_GET['limit']);
    $sort = $_GET['sort'] ?? 'latest';

    $args = [
        'post_id' => $product_id,
        'number'  => $limit,
        'offset'  => $offset,
        'status'  => 'approve',
        'type'    => 'review',
    ];

    $args = array_merge(
        $args,
        get_sorting_args($sort)
    );

    $comments = get_comments($args);

    $total = get_comments([
        'post_id' => $product_id,
        'status'  => 'approve',
        'count'   => true,
        'type'    => 'review',
    ]);
    error_log($sort);

    $reviews = [];

    foreach ($comments as $comment) {

        $rating = get_comment_meta( $comment->comment_ID, 'rating_half', true );

        $reviews[] = [
            'author'  => $comment->comment_author,
            'content' => wpautop($comment->comment_content),
            'date'    => get_comment_date('F j, Y', $comment),
            'rating'  => floatval($rating),
            'home_domain' => get_template_directory_uri(),
        ];
    }

    wp_send_json_success([
        'reviews' => $reviews,
        'count'   => count($reviews),
        'total'   => $total,
    ]);
}


add_action('wp_ajax_add_to_cart_ajax', 'add_to_cart_ajax');
add_action('wp_ajax_nopriv_add_to_cart_ajax', 'add_to_cart_ajax');
function add_to_cart_ajax() {

    $product_id = intval($_POST['product_id']);

    if (!$product_id) {
        wp_send_json_error();
    }

    WC()->cart->add_to_cart($product_id);

    wp_send_json_success([
        'cart_count' => WC()->cart->get_cart_contents_count(),
    ]);
}


add_filter('woocommerce_breadcrumb_defaults', function($defaults) {
    $defaults['delimiter'] = '<span class="breadcrumb-separator"> / </span>';
    return $defaults;
});



add_action('init', 'custom_update_cart_quantities');
function custom_update_cart_quantities() {

    if (
        isset($_POST['update_cart']) &&
        isset($_POST['cart_qty']) &&
        is_array($_POST['cart_qty'])
    ) {

        foreach ($_POST['cart_qty'] as $cart_item_key => $qty) {
            if (!isset(WC()->cart->get_cart()[$cart_item_key])) {
                continue;
            }
            $qty = intval($qty);
            if ($qty <= 0) {
                WC()->cart->remove_cart_item($cart_item_key);
            } else {
                WC()->cart->set_quantity(
                    $cart_item_key,
                    $qty,
                    false
                );
            }
        }

        WC()->cart->calculate_totals();

        wp_safe_redirect(wc_get_cart_url());
        exit;
    }
}

add_action('wp_ajax_remove_cart_item_ajax', 'remove_cart_item_ajax');
add_action('wp_ajax_nopriv_remove_cart_item_ajax', 'remove_cart_item_ajax');
function remove_cart_item_ajax() {

    $cart_key = sanitize_text_field($_POST['cart_key']);

    if (!$cart_key) {
        wp_send_json_error();
    }

    WC()->cart->remove_cart_item($cart_key);
    WC()->cart->calculate_totals();

    wp_send_json_success([
        'cart_total' => WC()->cart->get_total(),
        'cart_count' => WC()->cart->get_cart_contents_count(),
    ]);
}

add_action('template_redirect', function () {

    if (is_user_logged_in()) {
        return;
    }

    $allowed = [
        'home-page',
        'shop',
        'cart',
        'checkout',
        'sign-up',
        'log-in',
        'wish-list',
    ];

    if (is_page($allowed) || is_front_page() || is_shop() || is_product()) {
        return;
    }

    wp_redirect(wp_login_url());
    exit;
});

add_action('wp_ajax_add_to_wishlist_ajax', 'add_to_wishlist_ajax');
add_action('wp_ajax_nopriv_add_to_wishlist_ajax', 'add_to_wishlist_ajax');
function add_to_wishlist_ajax() {

    $product_id = intval($_POST['product_id']);

    if (!$product_id) {
        wp_send_json_error();
    }

    $wishlist = WC()->session->get('wishlist', []);

    if (!in_array($product_id, $wishlist)) {
        $wishlist[] = $product_id;
    }

    WC()->session->set('wishlist', $wishlist);

    wp_send_json_success([
        'wishlist_count' => count($wishlist)
    ]);
}



add_action('wp_ajax_remove_from_wishlist_ajax', 'remove_from_wishlist_ajax');
add_action('wp_ajax_nopriv_remove_from_wishlist_ajax', 'remove_from_wishlist_ajax');
function remove_from_wishlist_ajax() {

    $product_id = intval($_POST['product_id']);

    if (!$product_id) {
        wp_send_json_error();
    }

    $wishlist = WC()->session->get('wishlist', []);

    if (!is_array($wishlist)) {
        $wishlist = [];
    }

    // удаляем товар
    $wishlist = array_values(array_filter($wishlist, function($id) use ($product_id) {
        return (int)$id !== $product_id;
    }));

    WC()->session->set('wishlist', $wishlist);

    wp_send_json_success([
        'wishlist' => $wishlist,
        'count' => count($wishlist),
        'wishlist_count' => count($wishlist)
    ]);
}


add_action('wp_ajax_load_wishlist_ajax', 'load_wishlist_ajax');
add_action('wp_ajax_nopriv_load_wishlist_ajax', 'load_wishlist_ajax');
function load_wishlist_ajax() {

    $wishlist = WC()->session->get('wishlist', []);

    if (empty($wishlist)) {

        wp_send_json_success([
            'products' => []
        ]);
    }

    $query = new WP_Query([
        'post_type'      => 'product',
        'post__in'       => $wishlist,
        'posts_per_page' => -1,
        'orderby'        => 'post__in',
    ]);

    $products = [];

    while ($query->have_posts()) {

        $query->the_post();

        global $product;

        $products[] = prepare_product_data($product);
    }

    wp_reset_postdata();

    wp_send_json_success([
        'products' => $products,
        'wishlist_count' => count($wishlist),
    ]);
}

add_action('wp_ajax_move_wishlist_to_cart_ajax', 'move_wishlist_to_cart_ajax');
add_action('wp_ajax_nopriv_move_wishlist_to_cart_ajax', 'move_wishlist_to_cart_ajax');
function move_wishlist_to_cart_ajax() {

    $wishlist = WC()->session->get('wishlist', []);
    if (empty($wishlist)) {
        wp_send_json_error([
            'message' => 'Wishlist is empty'
        ]);
    }
    foreach ($wishlist as $product_id) {
        WC()->cart->add_to_cart($product_id);
    }
    WC()->session->set('wishlist', []);
    wp_send_json_success([
        'moved' => count($wishlist),
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);
}


add_action('wp_ajax_nopriv_register_user_ajax', 'register_user_ajax');
add_action('wp_ajax_register_user_ajax', 'register_user_ajax');
function register_user_ajax() {
    $data = prepare_auth_data($_POST);
    $errors = validate_auth_data($data, 'register');
    if (!empty($errors)) {
        wp_send_json_error([
            'message' => 'WTF! ERRORS',
            'errors' => $errors
        ]);
    }
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    if (
        empty($username) ||
        empty($email) ||
        empty($password)
    ) {
        wp_send_json_error([
            'message' => 'Fill all fields'
        ]);
    }
    $user_id = wp_create_user(
        $username,
        $password,
        $email
    );
    if (is_wp_error($user_id)) {
        wp_send_json_error([
            'message' => $user_id->get_error_message() ?? 'User already exists'
        ]);
    }
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_send_json_success([
        'user_id' => $user_id,
        'message' => 'Registration successful',
        'redirect' => home_url('/'),
    ]);
}

add_action('wp_ajax_nopriv_login_user_ajax','login_user_ajax');
add_action('wp_ajax_login_user_ajax', 'login_user_ajax');
function login_user_ajax() {
    $data = prepare_auth_data($_POST);
    $errors = validate_auth_data($data, 'login');
    if (!empty($errors)) {
        wp_send_json_error([
            'errors' => $errors
        ]);
    }

    $user = get_user_by(
        'email',
        $data['email']
    );

    if (!$user) {
        wp_send_json_error([
            'errors' => ['email'=>'User not found']
        ]);
    }

    $credentials = [
        'user_login' =>
            $user->user_login,

        'user_password' =>
            $data['password'],

        'remember' => true,
    ];

    $result = wp_signon(
        $credentials,
        false
    );

    if (is_wp_error($result)) {
        wp_send_json_error([
            'errors' => ['password'=>'Invalid password']
        ]);
    }

    wp_send_json_success([
        'user_id' => $user->ID,
        'message' => 'Login successful',
        'redirect' => home_url('/'),
    ]);
}


add_action(
    'wp_ajax_update_profile_ajax',
    'update_profile_ajax'
);
function update_profile_ajax() {
    if (!is_user_logged_in()) {
        wp_send_json_error([
            'message' => 'You are not authorized.'
        ]);
    }
    $data = prepare_auth_data($_POST);
    $errors = validate_auth_data($data, 'profile');
    $current_user = wp_get_current_user();
    $email_owner = email_exists($email);
    if (
        $email_owner &&
        $email_owner != $current_user->ID
    ) {
        $errors['email'] = 'Email already exists.';
    }
    if (!empty($errors)) {
        wp_send_json_error([
            'errors' => $errors
        ]);
    }
    $update_data = [
        'ID' => $current_user->ID,
        'user_email' => $data['email'],
        'display_name' => $data['username'],
    ];
    $result = wp_update_user($update_data);
    if (is_wp_error($result)) {
        wp_send_json_error([
            'errors' => ['massage' => $result->get_error_message()]
        ]);
    }
    if (!empty($_FILES['avatar']['name'])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        $allowed = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];
        if (!in_array($_FILES['avatar']['type'], $allowed)) {
            wp_send_json_error([
                'errors' => [
                    'avatar' => 'Only JPG, PNG and WEBP images are allowed.'
                ]
            ]);
        }
        if ($_FILES['avatar']['size'] > 2 * 1024 * 1024) {
            wp_send_json_error([
                'errors' => [
                    'avatar' => 'Maximum image size is 2 MB.'
                ]
            ]);
        }
        $upload = wp_handle_upload(
            $_FILES['avatar'],
            [
                'test_form' => false
            ]
        );
        if (isset($upload['error'])) {
            wp_send_json_error([
                'errors' => [
                    'avatar' => $upload['error']
                ]
            ]);
        }
        update_user_meta(
            get_current_user_id(),
            'profile_avatar',
            esc_url_raw($upload['url'])
        );
        $avatar = get_user_meta(
            get_current_user_id(),
            'profile_avatar',
            true
        );
        wp_send_json_success([
            'message' => 'Profile updated.',
            'avatar' => $avatar
        ]);
    }
    wp_send_json_success([
        'massage' => 'Profile updated successfully.'
    ]);
}


add_action(
    'wp_ajax_change_password_ajax',
    'change_password_ajax'
);
function change_password_ajax() {
    if (!is_user_logged_in()) {
        wp_send_json_error([
            'message' => 'Unauthorized'
        ]);
    }
    $current_password = trim($_POST['password'] ?? '');
    $new_password = trim($_POST['new_password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
    $errors = [];
    if (empty($current_password)) {
        $errors['password'] =
            'Current password is required.';
    }
    if (strlen($new_password) < 4) {
        $errors['new_password'] =
            'Password is too short.';
    }
    if ($new_password !== $confirm_password) {
        $errors['confirm_password'] =
            'Passwords do not match.';
    }
    $user = wp_get_current_user();
    if (!wp_check_password(
        $current_password,
        $user->user_pass,
        $user->ID
    )) {

        $errors['password'] =
            'Current password is incorrect.';
    }
    if (!empty($errors)) {
        wp_send_json_error([
            'errors' => $errors
        ]);
    }
    wp_set_password(
        $new_password,
        $user->ID
    );
    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID);

    wp_send_json_success([
        'message' => 'Password changed successfully.'
    ]);
}


add_action('wp_ajax_nopriv_send_contact_ajax','send_contact_ajax');
add_action('wp_ajax_send_contact_ajax','send_contact_ajax');
function send_contact_ajax() {
    $data = [
        'contact-name' => sanitize_text_field($_POST['contact-name']),
        'email' => sanitize_email($_POST['email']),
        'phone' => sanitize_text_field($_POST['phone']),
        'message' => sanitize_textarea_field($_POST['message']),
    ];
    $errors = validate_contact_data($data);
    if (!empty($errors)) {
        wp_send_json_error([
            'errors' => $errors
        ]);
    }
    $message =
        "Name: {$data['contact-name']}\n".
        "Email: {$data['email']}\n".
        "Phone: {$data['phone']}\n\n".
        "Message:\n{$data['message']}";
    $mail_sent = wp_mail(
        get_option('admin_email'),
        'New contact message',
        $message
    );
    // var_dump($mail_sent);
    // exit;
    if (!$mail_sent) {
        wp_send_json_error([
            'errors' => ['message' => 'Failed to send email.']
        ]);
    }
    // wp_mail(get_option('admin_email'),'New contact message', $data['message']);
    // wp_mail(get_option('pahitom485@fishnone.com'),'New contact message', $_POST['message']);
    wp_send_json_success([
        'message' => 'Email sent successfully.'
    ]);
}


add_action(
    'wp_ajax_create_checkout_session',
    'create_checkout_session'
);
add_action(
    'wp_ajax_nopriv_create_checkout_session',
    'create_checkout_session'
);
function create_checkout_session() {
    $secret_key = STRIPE_SECRET_KEY;
    $body = [
        'mode' => 'payment',
        'success_url' => home_url('/success'),
        'cancel_url' => home_url('/cancel'),
    ];
    $current_user = wp_get_current_user();
    if ($current_user->exists()) {
        $body['customer_email'] = $current_user->user_email;
    }
    $index = 0;
    foreach (WC()->cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        $body["line_items[$index][price_data][currency]"] = 'usd';
        $body["line_items[$index][price_data][product_data][name]"] = $product->get_name();
        $body["line_items[$index][price_data][unit_amount]"] = intval($product->get_price() * 100);
        $body["line_items[$index][quantity]"] = $cart_item['quantity'];
        $index++;
    }
    $response = wp_remote_post(
        'https://api.stripe.com/v1/checkout/sessions',
        [
            'headers' => [
                'Authorization' => 'Bearer ' . $secret_key,
            ],
            'body' => $body,
        ]
    );
    $data = json_decode(
        wp_remote_retrieve_body($response),
        true
    );
    wp_send_json_success([
        'session_id' => $data['id']
    ]);
}

?>