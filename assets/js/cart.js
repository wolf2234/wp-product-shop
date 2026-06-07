document.addEventListener("DOMContentLoaded", function () {
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

    document.querySelectorAll(".quantity-input").forEach(function (input) {
        input.addEventListener("input", function () {
            const row = input.closest(".orders__row");

            const price = parseFloat(
                row.querySelector(".product-price").dataset.price,
            );

            const qty = parseInt(input.value) || 0;

            const subtotal = price * qty;

            row.querySelector(".product-subtotal").textContent =
                "$" + subtotal.toFixed(2);
            updateCartTotal();
        });
    });
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".remove-item");

        if (!btn) return;

        const cartKey = btn.dataset.cartItemKey;

        const formData = new FormData();

        formData.append("action", "remove_cart_item_ajax");
        formData.append("cart_key", cartKey);
        console.log("cartKey =", cartKey);
        fetch(cart_obj.ajaxurl, {
            method: "POST",
            body: formData,
        })
            .then((res) => res.json())
            .then((data) => {
                console.log(document.querySelector(".cart-subtotal"));
                console.log(document.querySelector(".cart-total-price"));
                if (!data.success) return;

                btn.closest(".orders__row").remove();

                document.querySelector(".cart-subtotal").innerHTML =
                    data.data.cart_total;

                document.querySelector(".cart-total-price").innerHTML =
                    data.data.cart_total;
            });
    });
    function updateCartTotal() {
        let total = 0;

        document.querySelectorAll(".product-subtotal").forEach(function (item) {
            const value =
                parseFloat(item.textContent.replace(/[^0-9.]/g, "")) || 0;

            total += value;
        });

        document.querySelector(".cart-subtotal").textContent =
            "$" + total.toFixed(2);

        document.querySelector(".cart-total-price").textContent =
            "$" + total.toFixed(2);
    }
});
