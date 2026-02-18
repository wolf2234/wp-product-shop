document.addEventListener("DOMContentLoaded", function () {
    // let offset = 0; // сколько товаров уже загружено
    const step = 4; // сколько товаров на один слайд
    // const slidesCount = 3; // количество слайдов
    let viewAllButtons = document.querySelectorAll("[view-all-btn]");
    // const slides = document.querySelectorAll(
    //     ".slider .slider__item:not(.slick-cloned) [data-items-wrapper]",
    // );
    // const slidersNames = Array.from(
    //     document.querySelectorAll("[data-slider]"),
    // ).map((el) => "." + el.classList[0]);
    // const slidesCount = slides.length;

    // loadProducts();
    // slidersNames.forEach((sliderName) => {
    //     let sds = document.querySelectorAll(
    //         `${sliderName} ${sliderName}__item:not(.slick-cloned) [data-items-wrapper]`,
    //     );
    //     let sdslength = sds.length;
    //     sds.forEach((sd) => {
    //         console.log("Slider found:", sliderName, sd);
    //     });
    // });
    // let viewAllBtn = document.querySelector("[view-all-btn]");
    // if (viewAllBtn) {
    //     viewAllBtn.addEventListener("click", loadProducts);
    // }

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
        let offset = 0;
        function loadProducts(slides, slidesCount, sliderName) {
            fetch(product_obj.ajaxurl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
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
                    offset += data.data.count;
                    if ($(sliderName).hasClass("slick-initialized")) {
                        $(sliderName).slick("refresh");
                    }
                });
        }
        loadProducts(slides, slidesCount, sliderName);
        viewAllButton.addEventListener("click", function () {
            loadProducts(slides, slidesCount, sliderName);
            console.log("Offset:", offset);
        });
    });
});
