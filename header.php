<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title><?php bloginfo('name'); ?></title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container-large">
            <div class="head">
                <div class="logo">
                    <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                    ?>
                </div>
                <div class="burger">
                    <span class="burger-line"></span>
                </div>
                <nav class="nav-menu">
                    <div class="dropdown">
                        <div class="dropdown__dropbtn">
                            <a href="#" class="dropdown__link">Shop</a>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/arrow.svg" class="dropdown__arrow" alt="">
                        </div>
                        <div class="dropdown__content">
                            <a href="#">All Products</a>
                            <a href="#">New Arrivals</a>
                            <a href="#">Best Sellers</a>
                            <a href="#">Sale Items</a>
                        </div>
                    </div>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'top', 
                        'menu' => 'nav-menu',
                        'container' => null,
                        'menu_class' => 'menu',
                    ));
                    ?>
                    <div class="nav-menu__filters">
                        <button class="nav-menu__btn" data-text-default="Show 22 more filters" data-text-active="Hide filters">
                            Show 22 more filters
                        </button>
                        <div class="filters">
                            <?php
                                $categories = get_terms([
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => true,
                                ]);
                                $colors = get_terms([
                                    'taxonomy' => 'pa_color',
                                    'hide_empty' => true,
                                ]);
                                $sizes = get_terms([
                                    'taxonomy' => 'pa_size',
                                    'hide_empty' => true,
                                ]);
                            ?>
                            <div class="filters__body">
                                <div class="filters__header">
                                    <h3 class="filters__title">Filters</h3>
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/Setting.svg" alt="">
                                </div>
                                <div class="filters__content">
                                    <div class="filters__item">
                                        <div class="filters__categories">
                                            <?php foreach ($categories as $cat): ?>
                                                <a href="#" class="filters__link">
                                                    <?php echo $cat->name; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="filters__item">
                                        <div class="product-filters active">
                                            <div class="product-filters__head">
                                                <h3 class="product-filters__title">Price</h3>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/arrow.svg" alt="">
                                            </div>
                                            <div class="product-filters__content">
                                                <div class="price-slider">
                                                    <div id="price-slider" class="noui-body"></div>
                                                    <div class="price-values"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filters__item">
                                        <div class="product-filters active">
                                            <div class="product-filters__head">
                                                <h3 class="product-filters__title">Colors</h3>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/arrow.svg" alt="">
                                            </div>
                                            <div class="product-filters__content">
                                                <div class="colors">
                                                    <div class="colors__items">
                                                        <?php foreach ($colors as $color): ?>
                                                            <label class="color-radio">
                                                                <input type="radio"
                                                                        name="attribute_pa_color"
                                                                        value="<?php echo esc_attr($color->slug); ?>" hidden>
                                                                <span class="color-circle" style="background-color: <?php echo esc_attr($color->description); ?>"></span>
                                                            </label>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filters__item">
                                        <div class="product-filters active">
                                            <div class="product-filters__head">
                                                <h3 class="product-filters__title">Size</h3>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/arrow.svg" alt="">
                                            </div>
                                            <div class="product-filters__content">
                                                <div class="sizes">
                                                    <div class="sizes__items">
                                                        <?php foreach ($sizes as $size): ?>
                                                            <label class="size-radio">
                                                                <input type="radio"
                                                                    name="attribute_pa_size"
                                                                    value="<?php echo esc_attr($size->slug); ?>" hidden>
                                                                <span class="sizes__name"><?php echo esc_attr($size->name); ?></span>
                                                            </label>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="filters__btn">Apply Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="search">
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/img/shop-search.svg' class="search-icon" alt="">
                    <input type="text" class="search-input" placeholder="Search for products...">
                </div>
                <div class="account-cart">
                    <div class="cart">
                        <a href="#" class="cart-link">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/shop-box.svg" alt="">
                        </a>
                    </div>
                    <div class="account">
                        <a href="#" class="account-link">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/shop-user.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
