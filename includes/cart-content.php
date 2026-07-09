<div class="cart-content">
    <div class="cart-content__body">
        <div class="container-large">
            <div class="cart-content__head">
                <div class="breadcrumbs">
                    <?php woocommerce_breadcrumb(); ?>
                </div>
            </div>
            <div class="orders">
                <div class="orders__row">
                    <div class="orders__column">Product</div>
                    <div class="orders__column">Price</div>
                    <div class="orders__column">Quantity</div>
                    <div class="orders__column">Subtotal</div>
                    <div class="orders__column">Remove</div>
                </div>
                <form method="post" action="<?php echo esc_url( wc_get_cart_url() ); ?>" >
                    <?php $page = get_page_by_path('home-page'); ?>
                    <div class="orders__body">
                        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
                            <?php 
                                $product = $cart_item['data'];
                                $price = $product->get_price();
                                $quantity = $cart_item['quantity'];
                            ?>
    
                            <div class="orders__row">
                                <div class="orders__column">
                                    <?php echo $product->get_image(); ?>
                                    <h3><?php echo $product->get_name(); ?></h3>
                                </div>
    
                                <div class="orders__column product-price" data-price="<?php echo $price; ?>">
                                    <?php echo wc_price($price); ?>
                                </div>
    
                                <div class="orders__column">
                                    <input
                                        type="number"
                                        name="cart_qty[<?php echo $cart_item_key; ?>]"
                                        value="<?php echo $cart_item['quantity']; ?>"
                                        min="1"
                                        class="quantity-input"
                                    >
                                </div>
                                <div class="orders__column product-subtotal" data-subtotal="<?php echo $price * $quantity; ?>">
                                    <?php echo wc_price($price * $quantity); ?>
                                </div>
                                <div class="orders__column">
                                    <button
                                        type="button"
                                        class="remove-item"
                                        data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>"
                                    >
                                        delete
                                    </button>
                                </div>
                            </div>
    
                        <?php endforeach; ?>
                    </div>
                    <div class="cart-actions">
                        <a href="<?php echo get_permalink($page->ID); ?>" class="return-to-shop">
                            Return To Shop
                        </a>
                        <button type="submit" name="update_cart" class="update-cart">
                            Update Cart
                        </button>
                    </div>
                </form>
                <div class="orders__footer">
                    <div class="cupon">
                        <input type="text" name="coupon_code" placeholder="Cupon code">
                        <button class="cupon__btn">Apply Cupon</button>
                    </div>
                    <div class="cart-total">
                        <h4 class="cart-total__title">Cart Total</h4>
                        <div class="cart-total__details">
                            <!--
                                Если тебе нужен “чистый subtotal без налогов/скидок”
                            <?php # echo WC()->cart->get_cart_contents_total(); ?> 
                            -->
                            <div class="cart-total__row">
                                <span class="cart-total__label">Subtotal:</span>
                                <span class="cart-total__value cart-subtotal">
                                    <?php echo WC()->cart->get_total(); ?>
                                </span>
                            </div>
                            <div class="cart-total__row">
                                <span class="cart-total__label">Shipping:</span>
                                <span class="cart-total__value">Free</span>
                            </div>
                            <div class="cart-total__row">
                                <span class="cart-total__label">Total:</span>
                                <span class="cart-total__value cart-total-price"><?php echo WC()->cart->get_total(); ?></span>
                            </div>
                        </div>
                        <div class="cart-total__footer">
                            <a href="<?php echo home_url('/checkout'); ?>" class="proceed-to-checkout">
                                Proceed To Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
