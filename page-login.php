<?php
/*
Template Name: Log In
*/
get_header();
?>

<main class="main">
    <div class="auth">
            <div class="auth__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dl-beatsnoop_signup.png" alt="beatsnoop">
            </div>
            <form id="login-form" class="auth__form" novalidate>
                <div class="auth__header">
                    <h1 class="auth__title">Log in to Exclusive</h1>
                    <p class="auth__subtitle">Enter your details below</p>
                </div>
                <div class="auth__fields">
                    <label class="auth__field" for="email">
                        <input id="email" type="email" name="email" placeholder="Email" required>
                        <span class="auth__error"></span>
                    </label>
                    <label class="auth__field" for="password">
                        <input id="password" type="password" name="password" placeholder="Password" required>
                        <span class="auth__error"></span>
                    </label>
                </div>
                <div class="auth__footer">
                    <button type="submit" class="auth__btn">
                        Login
                    </button>
                    <a href="#" class="auth__link auth__link_color">Forget password?</a>
                </div>
            </form>
    </div>
</main>

<?php get_footer(); ?>