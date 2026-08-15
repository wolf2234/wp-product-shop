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
                        <aside class="profile-asidebar">
                            <nav class="profile-asidebar__nav" aria-label="Account navigation">
                                <div class="profile-asidebar__group">
                                    <h2 class="profile-asidebar__title">
                                        Manage My Account
                                    </h2>
                                    <ul class="profile-asidebar__list">
                                        <li class="profile-asidebar__item active" data-profile-tab="profile">
                                            My Profile
                                        </li>
                                        <li class="profile-asidebar__item" data-profile-tab="addresses">
                                            My Addresses
                                        </li>
                                    </ul>
                                </div>
                                <div class="profile-asidebar__group">
                                    <h2 class="profile-asidebar__title">
                                        My Orders
                                    </h2>
                                </div>
                                <div class="profile-asidebar__group">
                                    <h2 class="profile-asidebar__title">
                                        My Wishlist
                                    </h2>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="person-details">
                        <form id="#profile" class="profile-form active" enctype="multipart/form-data" 
                        data-auth-type="profile" data-profile-content="profile" novalidate>
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
                        <form class="profile-content" data-profile-content="addresses" id="#addresses" novalidate>
                            <div class="profile-form__body">
                                <div class="profile__row">
                                    <label class="profile-form__field" for="billing_first_name">
                                        <span class="profile-form__label">First Name</span>
                                        <input
                                            id="billing_first_name"
                                            type="text"
                                            name="billing_first_name"
                                            placeholder="First Name"
                                            value="<?php echo esc_attr($current_user->first_name); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                    <label class="profile-form__field" for="billing_last_name">
                                        <span class="profile-form__label">Last Name</span>
                                        <input
                                            id="billing_last_name"
                                            type="text"
                                            name="billing_last_name"
                                            placeholder="Last Name"
                                            value="<?php echo esc_attr($current_user->last_name); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                </div>
                                <label class="profile-form__field" for="billing_company">
                                    <span class="profile-form__label">Company</span>
                                    <input
                                        id="billing_company"
                                        type="text"
                                        name="billing_company"
                                        placeholder="Company"
                                        value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_company', true)); ?>"
                                    >
                                    <span class="auth__error"></span>
                                </label>
                                <label class="profile-form__field" for="billing_address_1">
                                    <span class="profile-form__label">Street Address</span>
                                    <input
                                        id="billing_address_1"
                                        type="text"
                                        name="billing_address_1"
                                        placeholder="Street Address"
                                        value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_address_1', true)); ?>"
                                    >
                                    <span class="auth__error"></span>
                                </label>
                                <label class="profile-form__field" for="billing_address_2">
                                    <span class="profile-form__label">Apartment / Suite</span>
                                    <input
                                        id="billing_address_2"
                                        type="text"
                                        name="billing_address_2"
                                        placeholder="Apartment, suite, unit, etc."
                                        value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_address_2', true)); ?>"
                                    >
                                    <span class="auth__error"></span>
                                </label>
                                <div class="profile__row">
                                    <label class="profile-form__field" for="billing_city">
                                        <span class="profile-form__label">City</span>
                                        <input
                                            id="billing_city"
                                            type="text"
                                            name="billing_city"
                                            placeholder="City"
                                            value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_city', true)); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                    <label class="profile-form__field" for="billing_postcode">
                                        <span class="profile-form__label">Postal Code</span>
                                        <input
                                            id="billing_postcode"
                                            type="text"
                                            name="billing_postcode"
                                            placeholder="Postal Code"
                                            value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_postcode', true)); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                </div>
                                <div class="profile__row">
                                    <label class="profile-form__field" for="billing_state">
                                        <span class="profile-form__label">State / Province</span>
                                        <input
                                            id="billing_state"
                                            type="text"
                                            name="billing_state"
                                            placeholder="State / Province"
                                            value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_state', true)); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                    <label class="profile-form__field" for="billing_country">
                                        <span class="profile-form__label">Country</span>
                                        <input
                                            id="billing_country"
                                            type="text"
                                            name="billing_country"
                                            placeholder="Country"
                                            value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_country', true)); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                </div>
                                <div class="profile__row">
                                    <label class="profile-form__field" for="billing_phone">
                                        <span class="profile-form__label">Phone</span>
                                        <input
                                            id="billing_phone"
                                            type="tel"
                                            name="billing_phone"
                                            placeholder="Phone"
                                            value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_phone', true)); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                    <label class="profile-form__field" for="billing_email">
                                        <span class="profile-form__label">Email</span>
                                        <input
                                            id="billing_email"
                                            type="email"
                                            name="billing_email"
                                            placeholder="Email"
                                            value="<?php echo esc_attr(get_user_meta($current_user->ID, 'billing_email', true)); ?>"
                                        >
                                        <span class="auth__error"></span>
                                    </label>
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="profile-form__btn"
                            >
                                Save Address
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php get_footer(); ?>