document.addEventListener("DOMContentLoaded", function () {
    let offset = 0; // сколько товаров уже загружено
    const step = 4; // сколько товаров на один слайд
    const slidesCount = 3; // количество слайдов
    const slides = document.querySelectorAll(".slider .product-cards");

    function loadProducts() {
        fetch(product_obj.ajaxurl, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                action: "load_products",
                offset: offset,
                limit: step * slidesCount,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (!data.success) return;
                const temp = document.createElement("div");
                temp.innerHTML = data.data.html;
                const items = Array.from(temp.children);
                console.log(items);
                items.forEach((item, index) => {
                    const slideIndex = index % slidesCount;
                    let child = document.querySelector(
                        `[data-slide="${slideIndex}"]`,
                    );
                    if (child) {
                        child.appendChild(item);
                    }
                });

                offset += data.data.count;
                console.log(data.data.count);
                $(".slider").slick("refresh");
                console.log(data.data.count);
            });
    }
    loadProducts();
    let viewAllBtn = document.querySelector("[view-all-btn]");
    if (viewAllBtn) {
        viewAllBtn.addEventListener("click", loadProducts);
    }
});
