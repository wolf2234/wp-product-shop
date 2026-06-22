document.addEventListener("DOMContentLoaded", async function () {
    const authForms = document.querySelectorAll("[data-auth-type]");
    authForms.forEach((form) => {
        if (!form) return;
        initAuthForm(form);
    });
    function initAuthForm(form) {
        const inputs = form.querySelectorAll("input");
        const mode = form.dataset.authType;
        const actions = {
            register: "register_user_ajax",
            login: "login_user_ajax",
            profile: "update_profile_ajax",
        };
        const action = actions[mode];
        if (!action) {
            return;
        }
        inputs.forEach((input) => {
            input.addEventListener("blur", () => {
                validateField(form, input, mode);
                updateSubmitButton(form, mode);
            });
            input.addEventListener("input", () => {
                clearFieldState(input);
                validateField(form, input, mode);
                updateSubmitButton(form, mode);
            });
        });
        form.addEventListener("submit", async function (e) {
            e.preventDefault();
            let hasErrors = false;
            inputs.forEach((input) => {
                const error = validateField(form, input, mode);
                if (error) {
                    hasErrors = true;
                }
            });
            updateSubmitButton(form, mode);
            if (hasErrors && mode !== "profile") {
                return;
            } else {
                await authRequest(form, action);
            }
            if (mode === "profile" && hasPasswordChanges(form, mode)) {
                await changePassword(form);
            }
            clearFieldState(form);
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
            if (result.errors) {
                Object.values(result.errors).forEach((message) => {
                    showAuthAlert(message, "error");
                });
            } else {
                showAuthAlert(result.errors || "Something went wrong", "error");
            }
            return;
        }
        showAuthAlert(
            action === "register_user_ajax"
                ? "Registration successful. You are now logged in."
                : "Login successful.",
            "success",
        );
        if (result.data.avatar) {
            document.querySelector("#profile-avatar-preview").src =
                result.data.avatar;
        }
        if (result.data.redirect) {
            setTimeout(() => {
                window.location.href = result.data.redirect;
            }, 2000);
        }
    }
    function hasPasswordChanges(form, mode) {
        return (
            form.password?.value.trim() ||
            form.new_password?.value.trim() ||
            form.confirm_password?.value.trim()
        );
    }
    async function changePassword(form) {
        const formData = new FormData(form);
        formData.append("action", "change_password_ajax");
        const request = {
            url: product_obj.ajaxurl,
            method: "POST",
            body: formData,
        };
        const result = await getProducts(request);
        if (!result.success) {
            if (result.errors) {
                Object.values(result.errors).forEach((message) => {
                    showAuthAlert(message, "error");
                });
            } else {
                showAuthAlert(result.errors || "Something went wrong", "error");
            }
            return;
        }
        showAuthAlert(result.message, "success");
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
        if (input instanceof HTMLFormElement) {
            input.querySelectorAll("input").forEach((field) => {
                field.classList.remove("error");
                field.classList.remove("valid");
                const errorEl =
                    field.parentElement.querySelector(".auth__error");
                if (errorEl) {
                    errorEl.textContent = "";
                }
            });
            return;
        }
        input.classList.remove("error");
        input.classList.remove("valid");
        const errorEl = input.parentElement.querySelector(".auth__error");
        if (errorEl) {
            errorEl.textContent = "";
        }
    }

    function validateField(form, input, mode) {
        const name = input.name;
        const value = input.value.trim();
        let error = "";
        if (value === "" && mode !== "profile") {
            error = "This field is required";
        } else {
            if (name === "email") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    error =
                        "Invalid email. Please enter a valid email address.";
                }
            }
            if (
                name === "password" ||
                name === "confirm_password" ||
                name === "new_password"
            ) {
                if (!value.length && mode !== "profile") {
                    error = "Password required";
                } else if (value.length < 4) {
                    error =
                        "Password too short. Must be at least 4 characters.";
                }
            }
            if (name === "username") {
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
        return error;
    }
    function updateSubmitButton(form, mode) {
        const btn = form.querySelector("button[type='submit']");
        const hasError = form.querySelector(".error");
        if (mode === "profile") return;
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
        const count = document.querySelectorAll(".auth-alert").length;
        alert.className = `auth-alert auth-alert_${type}`;
        alert.style.top = `${20 + count * 70}px`;
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
