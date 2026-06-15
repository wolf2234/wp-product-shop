document.addEventListener("DOMContentLoaded", async function () {
    document.addEventListener("click", async function (e) {
        const btn = e.target.closest("[data-like]");
        if (!btn) return;
        e.preventDefault();
        addToWishlist(btn);
    });

    document.addEventListener("click", function (e) {
        const btn = e.target.closest("[data-remove]");
        if (!btn) return;
        e.preventDefault();
        removeFromWishlist(btn.dataset.productId, btn);
    });

    document.addEventListener("click", async function (e) {
        const btn = e.target.closest("[data-move-all-to-cart]");
        if (!btn) return;
        e.preventDefault();
        moveAllToCart();
    });

    const container = document.querySelector("[data-wishlist-products]");

    if (!container) return;

    const params = new URLSearchParams({
        action: "load_wishlist_ajax",
    });

    const requestData = {
        url: cart_obj.ajaxurl,
        method: "GET",
        params: params,
    };

    const result = await getProducts(requestData);
    if (result.success) {
        updateWishlistCount(result.data.wishlist_count);
        let productOptions = {
            discount: true,
            like: false,
            view: false,
            remove: true,
            rating: true,
            addToCart: true,
        };
        container.innerHTML = "";
        result.data.products.forEach((product) => {
            const card = createProductCard(product, productOptions);
            container.appendChild(card);
        });
    } else {
        console.log("Ошибка:", result.error);
    }

    async function addToWishlist(button) {
        const productId = button.dataset.productId;
        const formData = new FormData();

        formData.append("action", "add_to_wishlist_ajax");
        formData.append("product_id", productId);

        const requestData = {
            url: cart_obj.ajaxurl,
            method: "POST",
            body: formData,
        };

        const result = await getProducts(requestData);
        if (result.success) {
        } else {
            console.log("Ошибка:", result.error);
        }
    }

    async function removeFromWishlist(productId, btn) {
        const formData = new FormData();
        formData.append("action", "remove_from_wishlist_ajax");
        formData.append("product_id", productId);

        const request = {
            url: cart_obj.ajaxurl,
            method: "POST",
            body: formData,
        };

        const result = await getProducts(request);

        if (result.success) {
            // удаляем из DOM
            btn.closest(".product-cards__item")?.remove();
            updateWishlistCount(result.data.wishlist_count);
        } else {
            console.log(result.error);
        }
    }

    async function moveAllToCart() {
        const formData = new FormData();
        formData.append("action", "move_wishlist_to_cart_ajax");
        const request = {
            url: cart_obj.ajaxurl,
            method: "POST",
            body: formData,
        };
        const result = await getProducts(request);
        if (!result.success) {
            console.log(result.error);
            return;
        }
        document.querySelector("[data-wishlist-products]").innerHTML = "";
        updateWishlistCount(0);
    }
    function updateWishlistCount(count = 0) {
        const counter = document.querySelector("[data-wishlist-count]");
        if (!counter) return;
        counter.textContent = `(${count})`;
    }
});
