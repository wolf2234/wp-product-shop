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
        <div class="goods">
            <div class="goods__body">
                <div class="goods__header">
                    <div class="goods__info">
                        <span class="subtitle goods__subtitle">Today’s</span>
                        <div class="goods__row">
                            <h4 class="title goods__title">Flash Sales</h4>
                            <div class="time">
                                <div class="time__item">
                                    <span class="time__text">Days</span>
                                    <span class="time__number">03</span>
                                </div>
                                <div class="time__item">
                                    <span class="time__text">Hours</span>
                                    <span class="time__number">23</span>
                                </div>
                                <div class="time__item">
                                    <span class="time__text">Minutes</span>
                                    <span class="time__number">19</span>
                                </div>
                                <div class="time__item">
                                    <span class="time__text">Seconds</span>
                                    <span class="time__number">56</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="goods__buttons">
                        <div class="slider-btns">
                            <button id="prev" class="slick-prev slick-arrow slider-body__btn"
                                aria-label="Previous" type="button">
                            </button>
                            <button id="next" class="slick-next slick-arrow slider-body__btn" aria-label="Next"
                                type="button">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="goods__content">
                    <div class="slider">
                        <div class="slider__item">
                            <div class="product-cards">
                                <div class="product-cards__item">
                                    <div class="product-cards__image">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/product.png" class="product-cards__img" alt="Card Image">
                                        <div class="product-cards__icons">
                                            <span class="product-cards__like">
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/like.svg" alt="">
                                            </span>
                                            <span class="product-cards__view">
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/view.svg" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-cards__info">
                                        <span class="product-cards__name">HAVIT HV-G92 Gamepad</span>
                                        <span class="product-cards__price">
                                            <span class="product-cards__currency">&#36</span>160
                                        </span>
                                        <span class="product-cards__stars">
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/"
                                                alt="Star">
                                        </span>
                                    </div>
                                </div>
                                <div class="product-cards__item">2</div>
                                <div class="product-cards__item">3</div>
                                <div class="product-cards__item">4</div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="product-cards">
                                <div class="product-cards__item">12</div>
                                <div class="product-cards__item">13</div>
                                <div class="product-cards__item">14</div>
                                <div class="product-cards__item">15</div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="product-cards">
                                <div class="product-cards__item"></div>
                                <div class="product-cards__item"></div>
                                <div class="product-cards__item"></div>
                                <div class="product-cards__item"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>