document.addEventListener("DOMContentLoaded", async function () {
    const registerForm = document.querySelector("#signup-form");
    const loginForm = document.querySelector("#login-form");
    if (registerForm) {
        registerForm.addEventListener("submit", async function (e) {
            e.preventDefault();
            let errors = validateAuthForm(registerForm, "register");
            if (errors.length > 0) {
                console.log(errors);
                return;
            }
            await authRequest(registerForm, "register_user_ajax");
        });
    }
    if (loginForm) {
        loginForm.addEventListener("submit", async function (e) {
            e.preventDefault();
            let errors = validateAuthForm(loginForm, "login");
            if (errors.length > 0) {
                console.log(errors);
                return;
            }
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
            console.log(result.error);
            return;
        }
        console.log("User created", action);
    }

    function validateAuthForm(form, mode = "register") {
        const errors = [];
        const email = form.email?.value.trim() || "";
        const password = form.password?.value || "";
        const username = form.username?.value.trim() || "";
        if (mode === "register" && username.length < 2) {
            errors.push("Username is too short");
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errors.push("Invalid email");
        }
        if (mode === "register" && password.length < 4) {
            errors.push("Password is too short");
        }
        if (mode === "login" && !password.length) {
            errors.push("Password is required");
        }
        return errors;
    }
});
