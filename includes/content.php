<div class="content">
    <div class="container-large">
        <div class="page-hero">
            <div class="filters">
                <div class="filters__body">
                    <a href="#" class="filters__link">
                        Woman’s Fashion
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/black-arrow-right.svg" alt="">
                    </a>
                    <a href="#" class="filters__link">
                        Men’s Fashion
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/black-arrow-right.svg" alt="">
                    </a>
                    <a href="#" class="filters__link">Electronics</a>
                    <a href="#" class="filters__link">Home & Lifestyle</a>
                    <a href="#" class="filters__link">Medicine</a>
                    <a href="#" class="filters__link">Sports & Outdoor</a>
                    <a href="#" class="filters__link">Baby’s & Toys</a>
                    <a href="#" class="filters__link">Groceries & Pets</a>
                    <a href="#" class="filters__link">Health & Beauty</a>
                </div>
            </div>
            <div class="banner">
                <div class="banner__item">
                    <div class="product">
                        <div class="product__info">
                            <h3 class="product__title">
                                <img src="<?php the_field('product-logo'); ?>" alt="">
                                <?php the_field('product-name'); ?>
                            </h3>
                            <span class="product__subtext"><?php the_field('product-subtext'); ?></span>
                            <a href="#" class="product__btn">Shop Now</a>
                        </div>
                        <img src="<?php the_field('product-image'); ?>" alt="">
                    </div>
                </div>
                <div class="banner__item">
                    <img src="<?php the_field('product-image'); ?>" alt="">
                </div>
                <div class="banner__item">
                    <img src="<?php the_field('product-image'); ?>" alt="">
                </div>
            </div>
        </div>


    </div>
</div>