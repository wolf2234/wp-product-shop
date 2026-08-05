<div class="filters" data-parent-filter="">
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
                                        <input type="checkbox"
                                                name="attribute_pa_color[]"
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
                                        <input type="checkbox"
                                            name="attribute_pa_size[]"
                                            value="<?php echo esc_attr($size->slug); ?>" hidden>
                                        <span class="sizes__name"><?php echo esc_attr($size->name); ?></span>
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
                        <h3 class="product-filters__title">Menu</h3>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/arrow.svg" alt="">
                    </div>
                    <div class="product-filters__content">
                        <?php include 'dropdown.php';?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'top', 
                            'menu' => 'nav-menu',
                            'container' => null,
                            'menu_class' => 'menu',
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="filters__btn-wrapper">
            <button class="filters__btn">Apply Filter</button>
        </div>
    </div>
</div>