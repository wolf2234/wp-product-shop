<?php
/*
Template Name: Profile
*/
get_header();
?>

<main class="main">
        <div class="profile">
            <?php $current_user = wp_get_current_user(); ?>
            <?php
                $avatar = get_user_meta(get_current_user_id(), 'profile_avatar', true);
                if (!$avatar) {
                    $avatar = get_template_directory_uri() . '/assets/img/shop-user.svg';
            }
            ?>
            <div class="container-large">
                <div class="profile__header">
                    <div class="breadcrumbs">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>
                    <div class="profile__text">
                        Welcome!
                        <span class="profile__name">
                            <?php echo $current_user->display_name; ?>
                        </span>
                    </div>
                </div>
                <div class="profile__body">
                    <div class="profile__menu">
                        <ul>
                            <li>Lorem Sapiente, asperiores!</li>
                            <li>Lorem Sapiente, asperiores!</li>
                            <li>Lorem Sapiente, asperiores!</li>
                        </ul>
                    </div>
                    <form id="#profile" class="profile-form" enctype="multipart/form-data" 
                    data-auth-type="profile" novalidate>
                        <div class="profile-form__body">
                            <div class="profile-avatar">
                                <img
                                    id="profile-avatar-preview"
                                    class="avatar__img"
                                    src="<?php echo esc_url($avatar); ?>"
                                    alt="Avatar"
                                >
                                <label for="avatar">
                                    <input
                                        id="avatar"
                                        type="file"
                                        name="avatar"
                                        accept="image/jpeg,image/png,image/webp"
                                    >
                                </label>
                            </div>
                            <div class="profile__row">
                                <label class="profile-form__field" for="username">
                                    <span class="profile-form__label">Username</span>
                                    <input id="username"
                                    type="text"
                                    name="username"
                                    placeholder="Name"
                                    value="<?php echo $current_user->display_name; ?>" required>
                                    <span class="auth__error"></span>
                                </label>
                                <label class="profile-form__field" for="email">
                                    <span class="profile-form__label">Email</span>
                                    <input id="email" 
                                    type="email" 
                                    name="email" 
                                    placeholder="Email" 
                                    value="<?php echo esc_attr($current_user->user_email); ?>" required>
                                    <span class="auth__error"></span>
                                </label>
                            </div>
                            <div class="profile__password">
                                <label for="password">
                                    <span class="profile-form__label">Password Changes</span>
                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        placeholder="Current password"
                                    >
                                    <span class="auth__error"></span>
                                </label>
                                <label for="new_password">
                                    <input
                                        id="new_password"
                                        type="password"
                                        name="new_password"
                                        placeholder="New password"
                                    >
                                    <span class="auth__error"></span>
                                </label>
                                <label for="confirm_password">
                                    <input
                                        id="confirm_password"
                                        type="password"
                                        name="confirm_password"
                                        placeholder="Confirm password"
                                    >
                                    <span class="auth__error"></span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="profile-form__btn">
                            Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
</main>

<?php get_footer(); ?>