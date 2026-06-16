document.addEventListener("DOMContentLoaded", async function () {
    const form = document.querySelector("#signup-form");
    if (form) {
        form.addEventListener("submit", async function (e) {
            e.preventDefault();
            await registerUser(form);
        });
    }

    async function registerUser(form) {
        const formData = new FormData(form);
        formData.append("action", "register_user_ajax");
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
        console.log("User created");
    }
});
