<?php
/*
Template Name: Checkout
*/
get_header();
?>

<div class="checkout">
    <div class="container-large">
        <div class="billing">
            <div class="billing__head">
                <div class="breadcrumbs">
                    <?php woocommerce_breadcrumb(); ?>
                </div>
            </div>
            <div class="billing__title">Billing Details</div>
            <div class="billing__body">
                <div class="billing__details">
                    <div class="billing__field">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first-name" id="first-name">
                    </div>
                    <div class="billing__field">
                        <label for="company-name">Company Name</label>
                        <input type="text" name="company-name" id="company-name">
                    </div>
                    <div class="billing__field">
                        <label for="street-address">Street Address</label>
                        <input type="text" name="street-address" id="street-address">
                    </div>
                    <div class="billing__field">
                        <label for="apartment-number">Apartment, floor, etc. (optional)</label>
                        <input type="text" name="apartment-number" id="apartment-number">
                    </div>
                    <div class="billing__field">
                        <label for="town-city">Town/City</label>
                        <input type="text" name="town-city" id="town-city">
                    </div>
                    <div class="billing__field">
                        <label for="phone-number">Phone Number</label>
                        <input type="text" name="phone-number" id="phone-number">
                    </div>
                    <div class="billing__field">
                        <label for="email-address">Email Address*</label>
                        <input type="email" name="email-address" id="email-address">
                    </div>
                    <label class="custom-checkbox">
                        <input type="checkbox" name="agree">
                        <span class="custom-checkbox__mark"></span>
                        Save this information for faster check-out next time
                    </label>
                </div>
                <div class="billing__order">
                    <div class="billing__goods">
                        <?php foreach (WC()->cart->get_cart() as $cart_item): ?>
                            <?php
                                $product = $cart_item['data'];
                                $quantity = $cart_item['quantity'];
                                $price = $product->get_price();
                                $subtotal = $price * $quantity;
                            ?>
                            <div class="billing__good">
                                <div class="billing__good-info">
                                    <?php echo $product->get_image(); ?>
                                    <h4 class="billing__name"><?php echo esc_html($product->get_title()); ?></h4>
                                </div>
                                <span class="billing__price"><?php echo wc_price($subtotal); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="billing__summary">
                        <div class="billing__item">
                            <span class="billing__total-label">Subtotal:</span>
                            <span class="billing__total-amount"><?php echo wc_price(WC()->cart->get_subtotal()); ?></span>
                        </div>
                        <div class="billing__item">
                            <span class="billing__total-label">Shipping:</span>
                            <span class="billing__total-amount">Free</span>
                        </div>
                        <div class="billing__item">
                            <span class="billing__total-label">Total:</span>
                            <span class="billing__total-amount"><?php echo wc_price(WC()->cart->get_subtotal()); ?></span>
                        </div>
                    </div>
                    <div class="billing__bank">
                        <div class="billing__radio">
                            <div class="billing__radio-option">
                                <input type="radio" name="bank" id="bank">
                                <label for="bank">Bank</label>
                            </div>
                            <div class="banks">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/b-kash.png" alt="Bank 1">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Visa.svg" alt="Bank 2">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/master-card.png" alt="Bank 3">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/india-bank.png" alt="Bank 4">
                            </div>
                        </div>
                        <div class="billing__radio">
                            <div class="billing__radio-option">
                                <input type="radio" name="bank" id="cash-on-delivery">
                                <label for="cash-on-delivery">Cash on delivery</label>
                            </div>
                        </div>
                        <div class="cupon">
                            <input type="text" name="coupon_code" placeholder="Cupon code">
                            <button class="cupon__btn">Apply Cupon</button>
                        </div>
                        <button id="pay-btn" class="pay-btn">
                            Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>