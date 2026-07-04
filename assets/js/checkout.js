const stripe = Stripe(stripe_data.publishable_key);
document.getElementById("pay-btn").addEventListener("click", async () => {
    const formData = new FormData();
    formData.append("action", "create_checkout_session");
    const response = await fetch(product_obj.ajaxurl, {
        method: "POST",
        body: formData,
    });
    const result = await response.json();
    stripe.redirectToCheckout({
        sessionId: result.data.session_id,
    });
});
