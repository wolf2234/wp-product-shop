<?php
/*
Template Name: Page Not Found
*/
get_header();
?>

<main class="main">
    <div class="page-errors">
        <div class="container-large">
            <div class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </div>
            <div class="error">
                <div class="error__content">
                    <h1 class="error__title">404 Not Found</h1>
                    <p class="error__text">Your visited page not found. You may go home page.</p>
                    <a href="<?php echo home_url(); ?>" class="error__btn">
                        Back to home page
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>