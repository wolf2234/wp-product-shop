document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".product-cards__like");

        if (!btn) return;

        e.preventDefault();

        const productId = btn.dataset.productId;

        const formData = new FormData();

        formData.append("action", "add_to_wishlist_ajax");
        formData.append("product_id", productId);

        fetch(cart_obj.ajaxurl, {
            method: "POST",
            body: formData,
        })
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
            });
    });

    const container = document.querySelector(".wishlist-products");

    if (!container) return;

    const params = new URLSearchParams({
        action: "load_wishlist_ajax",
    });

    fetch(`${cart_obj.ajaxurl}?${params.toString()}`)
        .then((res) => res.json())
        .then((data) => {
            if (!data.success) return;

            container.innerHTML = "";

            data.data.products.forEach((product) => {
                const card = createProductCard(product);

                container.appendChild(card);
            });
        });
});
