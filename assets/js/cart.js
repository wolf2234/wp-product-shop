document.addEventListener("click", function (e) {
    const btn = e.target.closest(".product-cards__add");

    if (!btn) return;

    e.preventDefault();
    e.stopPropagation();

    const productId = btn.dataset.productId;

    const formData = new FormData();

    formData.append("action", "add_to_cart_ajax");
    formData.append("product_id", productId);

    fetch(cart_obj.ajaxurl, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {});
});
