document.addEventListener("DOMContentLoaded", function () {
    let offset = 0; // сколько товаров уже загружено
    const step = 4; // сколько товаров на один слайд
    // const slidesCount = 3; // количество слайдов
    const slides = document.querySelectorAll(
        ".slider .slider__item:not(.slick-cloned) [data-slider]",
    );
    const slidesCount = slides.length;

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
                items.forEach((item, index) => {
                    const slideIndex = index % slidesCount;
                    slides[slideIndex].appendChild(item);
                });
                console.log("Items found:", items.length);
                console.log("STEP found:", step * slidesCount);
                console.log("Slides found:", slidesCount);
                console.log("Array items found:", slides);
                offset += data.data.count;
                $(".slider").slick("refresh");
            });
    }
    loadProducts();
    let viewAllBtn = document.querySelector("[view-all-btn]");
    if (viewAllBtn) {
        viewAllBtn.addEventListener("click", loadProducts);
    }
});
