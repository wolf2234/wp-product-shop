<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title><?php bloginfo('name'); ?></title>
</head>
<body>
<!-- <a href="href="<?php ## echo esc_url(get_permalink(get_page_by_path('basket'))); ?>"" class="cart-link"> -->
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
                    <div class="nav-menu__filters">
                        <?php
                            if (is_page('contact')) {
                                include get_template_directory() . '/includes/contact-filters.php';
                            } else {
                                include get_template_directory() . '/includes/filters.php';
                            }
                        ?>
                    </div>
                </nav>
                <div class="nav-menu-header">
                    <div class="nav-menu__main">
                        <?php include 'includes/dropdown.php';?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'top', 
                            'menu' => 'nav-menu',
                            'container' => null,
                            'menu_class' => 'menu',
                        ));
                        ?>
                    </div>
                </div>
                <div class="search">
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/img/shop-search.svg' class="search-icon" alt="">
                    <input type="text" class="search-input" placeholder="Search for products...">
                </div>
                <div class="account-cart">
                    <div class="wish-list">
                        <a href="<?php echo get_permalink(get_page_by_path('wish-list')); ?>" class="wish-list__link">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/wish-list.svg" alt="">
                        </a>
                    </div>
                    <div class="cart">
                        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/shop-box.svg" alt="">
                        </a>
                    </div>
                    <div class="account">
                        <?php if (is_user_logged_in()) : ?>
                            <?php $current_user = wp_get_current_user(); ?>
                            <a href="<?php echo get_permalink(get_page_by_path('profile')); ?>"
                            class="account-link">
                                <img
                                    src="<?php bloginfo('template_directory'); ?>/assets/img/shop-user.svg"
                                    alt="Account">
                            </a>
                            <div class="account-menu">
                                <?php $current_user = wp_get_current_user();?>
                                <span class="account-menu__name">
                                    <?php echo esc_html($current_user->display_name); ?>
                                </span>
                                <a href="<?php echo wp_logout_url(home_url()); ?>">
                                    Logout
                                </a>
                            </div>
                        <?php else : ?>
                            <a href="#"
                            class="account-link">
                                <img
                                    src="<?php bloginfo('template_directory'); ?>/assets/img/logout.png"
                                    alt="Login">
                            </a>
                            <div class="account-menu">
                                <a href="<?php echo get_permalink(get_page_by_path('sign-up')); ?>">Sign Up</a>
                                <a href="<?php echo get_permalink(get_page_by_path('log-in')); ?>">Login</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
