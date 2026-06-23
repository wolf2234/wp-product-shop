<div class="contact">
    <div class="container-large">
        <div class="contact-form">
            <div class="contact-form__info">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum et numquam ipsa explicabo nemo! A vitae minus illum dolorum. Nostrum.
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