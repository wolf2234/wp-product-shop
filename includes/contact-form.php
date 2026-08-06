
<div class="contact">
    <div class="container-large">
        <div class="contact__breadcrumbs">
            <div class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </div>
        </div>
        <div class="contact-form">
            <div class="contact-form__info">
                <?php if (have_rows('contact')) : ?>
                    <?php while (have_rows('contact')) : the_row(); ?>
                        <div class="contact-item">
                            <?php if (get_sub_field('title')): ?>
                                <h3><?php the_sub_field('title'); ?></h3>
                            <?php endif; ?>
                            <?php if (get_sub_field('text')): ?>
                                <p><?php the_sub_field('text'); ?></p>
                            <?php endif; ?>
                            <?php if (get_sub_field('phone')): ?>
                                <a href="tel:+<?php echo esc_attr(get_sub_field('phone')); ?>">
                                    <span>Phone: +<?php the_sub_field('phone'); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if (get_sub_field('email')): ?>
                                <a href="mailto:<?php echo esc_attr(get_sub_field('email')); ?>">
                                    <span>Email: <?php the_sub_field('email'); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <form class="contact-form__body" data-auth-type="contact" novalidate>
                <div class="contact-form__row">
                    <label>
                        <input
                            type="text"
                            name="contact-name"
                            placeholder="Your name"
                            required
                        >
                        <span class="auth__error"></span>
                    </label>

                    <label>
                        <input
                            type="email"
                            name="email"
                            placeholder="Your email"
                            required
                        >
                        <span class="auth__error"></span>
                    </label>

                    <label>
                        <input
                            type="tel"
                            name="phone"
                            placeholder="Your phone"
                            required
                        >
                        <span class="auth__error"></span>
                    </label>
                </div>
                <label>
                    <textarea
                        name="message"
                        placeholder="Your message"
                        rows="6"
                        required
                    ></textarea>
                    <span class="auth__error"></span>
                </label>
                <button type="submit">
                    Send message
                </button>
            </form>
        </div>
    </div>
</div>