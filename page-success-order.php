<?php
/*
Template Name: Success Order
*/
get_header();

$order_id = WC()->session->get(
    'last_order_id'
);

if (!$order_id) {
    wp_redirect(
        home_url()
    );
    exit;
}

$order = wc_get_order(
    $order_id
);

$current_user = wp_get_current_user();
if (
    $current_user->exists()
    &&
    $order->get_customer_id()
    &&
    $order->get_customer_id() !== $current_user->ID
) {
    wp_die(
        'Access denied'
    );
}

if (!$order) {
    wp_redirect(
        home_url()
    );
    exit;
}
?>

<div class="success-order">
    <div class="container-large">
        <div class="breadcrumbs">
            <?php woocommerce_breadcrumb(); ?>
        </div>
        <div class="order-details">
            <h2 class="order-details__title">Order #<?php echo $order->get_id(); ?></h2>
            <?php foreach ($order->get_items() as $item): ?>
                <?php
                    $product = $item->get_product();
                ?>
                <div class="success-details__item">
                    <?php echo $product->get_image(); ?>
                    <h4 class="success-details__name">
                        <?php echo $item->get_name(); ?>
                    </h4>
                    <p class="success-details__quantity">
                        Qty: <?php echo $item->get_quantity(); ?>
                    </p>
                    <span class="success-details__price">
                        <?php echo wc_price(
                            $item->get_total()
                        ); ?>
                    </span>
                </div>
            <?php endforeach; ?>
            <?php echo $order->get_formatted_order_total(); ?>
            <div class="success-details__message">
                <h3>
                    Your order has been placed successfully
                </h3>
                <p>
                    Thank you for your purchase.
                    We are processing your order.
                </p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>