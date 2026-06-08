<div class="wish-list-content">
    <div class="container-large">
        <?php $wishlist = WC()->session->get('wishlist', []);?>
    <?php
        echo '<pre>';
        print_r($wishlist);
        echo '</pre>';
    ?>
        <div class="goods">
            <div class="goods__body goods__body_padding-bottom">
                <div class="goods__header">
                    <div class="goods__info">
                        <div class="goods__row">
                            <h4 class="title">Wishlist</h4>
                        </div>
                    </div>
                    <div class="goods__buttons">
                        <div class="goods__btn">
                            <button class="view-all" view-all-btn="">Move All To Bag</button>
                        </div>
                    </div>
                </div>
                <div class="goods__content" data-slider="">
                    <div class="product-cards wishlist-products" data-items-wrapper="" 
                        data-step="2" data-count="4"></div>
                </div>
            </div>
        </div>
        <div class="goods" data-parent-of-view-all="">
            <div class="goods__body goods__body_padding-bottom">
                <div class="goods__header">
                    <div class="goods__info">
                        <span class="subtitle">Just For You</span>
                    </div>
                    <div class="goods__buttons">
                        <div class="goods__btn">
                            <button class="view-all" view-all-btn="">See All</button>
                        </div>
                    </div>
                </div>
                <div class="goods__content" data-slider="">
                    <div class="product-cards" data-items-wrapper="" data-step="2" data-count="4"></div>
                </div>
            </div>
        </div>
    </div>
</div>