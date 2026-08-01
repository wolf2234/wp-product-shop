const stripe = Stripe(stripe_data.publishable_key);
if (document.getElementById("pay-btn")) {
    document.getElementById("pay-btn").addEventListener("click", async () => {
        const formData = new FormData();
        formData.append("action", "create_checkout_session");
        // formData.append(
        //     "first_name",
        //     document.getElementById("first-name").value,
        // );
        // formData.append(
        //     "company",
        //     document.getElementById("company-name").value,
        // );
        // formData.append(
        //     "street",
        //     document.getElementById("street-address").value,
        // );
        // formData.append(
        //     "apartment",
        //     document.getElementById("apartment-number").value,
        // );
        // formData.append("city", document.getElementById("town-city").value);
        // formData.append("phone", document.getElementById("phone-number").value);
        // formData.append(
        //     "email",
        //     document.getElementById("email-address").value,
        // );

        const response = await fetch(product_obj.ajaxurl, {
            method: "POST",
            body: formData,
        });
        const result = await response.json();
        stripe.redirectToCheckout({
            sessionId: result.data.session_id,
        });
    });
}
