        <footer class="footer">
            <div class="container-large">
                <div class="info">
                    <div class="info__items">
                        <div class="info__wrapper">
                            <div class="logo">
                                <?php
                                    if (function_exists('the_custom_logo')) {
                                        the_custom_logo();
                                    }
                                ?>
                            </div>
                            <div class="info__text">We have clothes that suits your style and which you’re proud to wear. From women to men.</div>
                            <div class="social">
                                <a href="#" class="social__link">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Twitter.svg" alt="Twitter icon">
                                </a>
                                <a href="#" class="social__link">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.svg" alt="Facebook icon">
                                </a>
                                <a href="#" class="social__link">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-instagram.svg" alt="Instagram icon">
                                </a>
                                <a href="#" class="social__link">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/github.svg" alt="GitHub icon">
                                </a>
                            </div>
                        </div>
                        <div class="info__links">
                            <div class="info__item">
                                <h3 class="info__title">Company</h3>
                                <ul class="info__list">
                                    <li class="">
                                        <a href="#" class="info__link">About Us</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Features</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Works</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Career</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info__item">
                                <h3 class="info__title">Help</h3>
                                <ul class="info__list">
                                    <li class="">
                                        <a href="#" class="info__link">Customer Support</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Delivery Details</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Terms & Conditions</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info__item">
                                <h3 class="info__title">FAQ</h3>
                                <ul class="info__list">
                                    <li class="">
                                        <a href="#" class="info__link">Account</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Manage Deliveries</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Orders</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Payments</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info__item">
                                <h3 class="info__title">Resources</h3>
                                <ul class="info__list">
                                    <li class="">
                                        <a href="#" class="info__link">Free eBooks</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Development Tutorial</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">How to - Blog</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="info__link">Youtube Playlist</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="copyright">
                        <p class="copyright__text">Shop.co © 2000-2023, All Rights Reserved</p>
                    </div>
                    <div class="bank">
                        <a href="#" class="bank__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Visa.svg" alt="Bank icon">
                        </a>
                        <a href="#" class="bank__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Mastercard.svg" alt="Bank icon">
                        </a>
                        <a href="#" class="bank__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Paypal.svg" alt="Bank icon">
                        </a>
                        <a href="#" class="bank__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ApplePay.svg" alt="Bank icon">
                        </a>
                        <a href="#" class="bank__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/GooglePay.svg" alt="Bank icon">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>