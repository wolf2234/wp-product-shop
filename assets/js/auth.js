document.addEventListener("DOMContentLoaded", async function () {
    const registerForm = document.querySelector("#signup-form");
    const loginForm = document.querySelector("#login-form");
    if (registerForm) {
        const inputs = registerForm.querySelectorAll("input");
        inputs.forEach((input) => {
            input.addEventListener("blur", () => {
                validateField(registerForm, input, "register");
                updateSubmitButton(registerForm);
            });
            input.addEventListener("input", () => {
                // clearFieldState(input);
                validateField(registerForm, input, "register");
                updateSubmitButton(registerForm);
            });
        });
        registerForm.addEventListener("submit", async function (e) {
            e.preventDefault();
            clearFieldState(registerForm);
            const inputs = registerForm.querySelectorAll("input");
            let hasErrors = false;
            inputs.forEach((input) => {
                const error = validateField(registerForm, input, "register");
                if (error) hasErrors = true;
            });
            updateSubmitButton(registerForm);
            if (hasErrors) return;
            await authRequest(registerForm, "register_user_ajax");
        });
    }
    if (loginForm) {
        const inputs = loginForm.querySelectorAll("input");
        inputs.forEach((input) => {
            input.addEventListener("blur", () => {
                validateField(loginForm, input, "login");
                updateSubmitButton(loginForm);
            });
            input.addEventListener("input", () => {
                clearFieldState(input);
                validateField(loginForm, input, "login");
                updateSubmitButton(loginForm);
            });
        });
        loginForm.addEventListener("submit", async function (e) {
            e.preventDefault();
            clearFieldState(loginForm);
            const inputs = loginForm.querySelectorAll("input");
            let hasErrors = false;
            inputs.forEach((input) => {
                const error = validateField(loginForm, input, "login");
                if (error) hasErrors = true;
            });
            updateSubmitButton(loginForm);
            if (hasErrors) return;
            await authRequest(loginForm, "login_user_ajax");
        });
    }

    async function authRequest(form, action) {
        const formData = new FormData(form);
        formData.append("action", action);
        const request = {
            url: product_obj.ajaxurl,
            method: "POST",
            body: formData,
        };
        const result = await getProducts(request);
        if (!result.success) {
            showAuthAlert(result.error || "Something went wrong", "error");
            return;
        }
        showAuthAlert(
            action === "register_user_ajax"
                ? "Registration successful. You are now logged in."
                : "Login successful.",
            "success",
        );
        if (result.data.redirect) {
            setTimeout(() => {
                window.location.href = result.data.redirect;
            }, 2000);
        }
        console.log("User created", action);
    }

    function validateAuthForm(form, mode = "register") {
        const errors = {};
        const email = form.email?.value.trim() || "";
        const password = form.password?.value || "";
        const username = form.username?.value.trim() || "";
        if (mode === "register" && username.length < 2) {
            errors.username =
                "Username is too short. Must be at least 2 characters";
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errors.email = "Invalid email. Please enter a valid email address.";
        }
        if (mode === "register" && password.length < 4) {
            errors.password =
                "Password is too short. Must be at least 4 characters";
        }
        if (mode === "login" && !password.length) {
            errors.password = "Password is required";
        }
        return errors;
    }

    function showFormErrors(form, errors) {
        Object.entries(errors).forEach(([field, message]) => {
            const input = form[field];
            if (!input) {
                return;
            }
            input.classList.add("error");
            const errorElement =
                input.parentElement.querySelector(".auth__error");
            if (errorElement) {
                errorElement.textContent = message;
            }
        });
    }
    function clearFieldState(input) {
        input.classList.remove("error");
        input.classList.remove("valid");
        const errorEl = input.parentElement.querySelector(".auth__error");
        if (errorEl) errorEl.textContent = "";
    }

    function validateField(form, input, mode) {
        const name = input.name;
        const value = input.value.trim();

        let error = "";

        if (value === "") {
            error = "This field is required";
        } else {
            if (name === "email") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    error =
                        "Invalid email. Please enter a valid email address.";
                }
            }

            if (name === "password") {
                if (mode === "register" && value.length < 4) {
                    error =
                        "Password too short. Must be at least 4 characters.";
                }
                if (mode === "login" && !value.length) {
                    error = "Password required";
                }
            }

            if (name === "username" && mode === "register") {
                if (value.length < 2) {
                    error =
                        "Username too short. Must be at least 2 characters.";
                }
            }
        }

        const errorEl = input.parentElement.querySelector(".auth__error");

        if (error) {
            input.classList.add("error");
            input.classList.remove("valid");
            if (errorEl) errorEl.textContent = error;
        } else {
            input.classList.remove("error");
            input.classList.add("valid");
            if (errorEl) errorEl.textContent = "";
        }
    }
    function updateSubmitButton(form) {
        const btn = form.querySelector("button[type='submit']");
        const hasError = form.querySelector(".error");
        if (hasError) {
            btn.classList.add("disabled");
            btn.disabled = true;
        } else {
            btn.classList.remove("disabled");
            btn.disabled = false;
        }
    }
    function showAuthAlert(message, type = "success") {
        const alert = document.createElement("div");
        alert.className = `auth-alert auth-alert_${type}`;
        alert.textContent = message;

        document.body.appendChild(alert);

        setTimeout(() => {
            alert.classList.add("auth-alert_show");
        }, 10);

        setTimeout(() => {
            alert.remove();
        }, 3000);
    }
});
