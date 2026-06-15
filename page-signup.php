<?php
/*
Template Name: Sign Up
*/
get_header();
?>

<main class="main">
    <div class="auth">
            <div class="auth__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dl-beatsnoop_signup.png" alt="beatsnoop">
            </div>
            <form class="auth__form">
                <div class="auth__header">
                    <h1 class="auth__title">Create an account</h1>
                    <p class="auth__subtitle">Enter your details below</p>
                </div>
                <div class="auth__fields">
                    <label class="auth__field" for="name">
                        <input id="name" type="text" name="name" value="Name" required>
                    </label>
                    <label class="auth__field" for="name">
                        <input id="name" type="text" name="register_type" value="Email or Phone Number" required>
                    </label>
                    <label class="auth__field" for="password">
                        <input id="password" type="password" name="password" value="Password" required>
                    </label>
                </div>
                <!-- Submit -->
                <button type="submit" class="auth__btn">
                    Create account
                </button>
                <!-- Login link -->
                <div class="auth__footer">
                    <span>Already have an account?</span>
                    <a href="/login" class="auth__link">Log in</a>
                </div>
            </form>
    </div>
</main>

<?php get_footer(); ?>