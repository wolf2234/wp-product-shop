<?php
/*
Template Name: Stripe Debug
*/
get_header();
?>
<main class="main" style="padding: 150px 0 30px 0px; ">
    <?php
        $data = get_option(
        'last_checkout_completed'
        );
        echo '<pre>';
        print_r(
            json_decode($data, true)
        );
        echo '</pre>';
    ?>
</main>

<?php get_footer();?>