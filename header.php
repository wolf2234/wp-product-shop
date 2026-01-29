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
