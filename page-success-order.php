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
            <div class="success-details__item">
                <div class="success-details__column">
                    Image
                </div>
                <div class="success-details__column">
                    Name
                </div>
                <div class="success-details__column">
                    Quantity
                </div>
                <div class="success-details__column">
                    <span>Price</span>
                </div>
            </div>
            <?php foreach ($order->get_items() as $item): ?>
                <?php
                    $product = $item->get_product();
                ?>
                <div class="success-details__item">
                    <div class="success-details__column">
                        <?php echo $product->get_image(); ?>
                    </div>
                    <div class="success-details__column">
                        <h4 class="success-details__name">
                            <?php echo $item->get_name(); ?>
                        </h4>
                    </div>
                    <div class="success-details__column">
                        <p class="success-details__quantity">
                            <?php echo $item->get_quantity(); ?>
                        </p>
                    </div>
                    <div class="success-details__column">
                        <span class="success-details__price">
                            <?php echo wc_price(
                                $item->get_total()
                            ); ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="success-details__item">
                <span>Total:</span>
                <span><?php echo $order->get_formatted_order_total(); ?></span>
            </div>
        </div>
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

<?php get_footer(); ?>