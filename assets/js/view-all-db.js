document.addEventListener("DOMContentLoaded", function () {
    const step = 4; // сколько товаров на один слайд
    let viewAllButtons = document.querySelectorAll("[view-all-btn]");

    viewAllButtons.forEach(function (viewAllButton) {
        let parent = viewAllButton.closest("[data-parent-of-view-all]");
        let slider = parent.querySelector("[data-slider]");
        let sliderName = "." + slider.classList[0];
        let slides = document.querySelectorAll(
            `${sliderName} ${sliderName}__item:not(.slick-cloned) [data-items-wrapper]`,
        );
        if (!slides || slides.length === 0) {
            slides = slider.querySelectorAll("[data-items-wrapper]");
        }
        let slidesCount = slides.length;
        let offset = 0; // сколько товаров уже загружено

        loadProducts(slides, slidesCount, sliderName);
        viewAllButton.addEventListener("click", function () {
            loadProducts(slides, slidesCount, sliderName);
            console.log("Offset:", offset);
        });

        function loadProducts(slides, slidesCount, sliderName) {
            const params = new URLSearchParams({
                action: "load_products",
                offset: offset,
                limit: step * slidesCount,
            });

            fetch(`${product_obj.ajaxurl}?${params.toString()}`, {
                method: "GET",
            })
                .then((res) => res.json())
                .then((data) => {
                    if (!data.success) return;
                    console.log("Data received:", data);
                    fillSlids(slides, data, slidesCount, sliderName);
                });
        }
        function fillSlids(slides, data, slidesCount, sliderName) {
            const temp = document.createElement("div");
            temp.innerHTML = data.data.html;
            const items = Array.from(temp.children);

            items.forEach((item, index) => {
                const slideIndex = index % slidesCount;
                slides[slideIndex].appendChild(item);
            });

            offset += data.data.count;

            if ($(sliderName).hasClass("slick-initialized")) {
                $(sliderName).slick("refresh");
            }
        }
    });
});
