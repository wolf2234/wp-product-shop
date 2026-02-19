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
            const products = data.data.products;
            products.forEach((product, index) => {
                const slideIndex = index % slidesCount;
                const item = createProductCard(product);
                slides[slideIndex].appendChild(item);
            });
            offset += data.data.count;
            if ($(sliderName).hasClass("slick-initialized")) {
                $(sliderName).slick("refresh");
            }
        }

        function createProductCard(product) {
            const a = document.createElement("a");
            a.href = product.permalink;
            a.className = "product-cards__item";
            a.setAttribute("data-items-item", "");

            a.innerHTML = `
            <div class="product-cards__image">
                <img src="${product.image}" alt="${product.title}">
                <div class="product-cards__icons">
                    <span class="product-cards__like">
                        <img src="${product.home_domain}/assets/img/like.svg" alt="">
                    </span>
                    <span class="product-cards__view">
                        <img src="${product.home_domain}/assets/img/view.svg" alt="">
                    </span>
                </div>
                <button class="product-cards__add">Add to Cart</button>
            </div>

            <div class="product-cards__info">
                <span class="product-cards__name">${product.title}</span>

                <span class="product-cards__price">
                    ${
                        product.is_on_sale
                            ? `
                                <span class="price product-cards__sale-price">
                                    ${product.sale_price}
                                </span>
                                <span class="price product-cards__regular-price">
                                    ${product.regular_price}
                                </span>
                            `
                            : `
                                <span class="price product-cards__regular-price">
                                    ${product.regular_price}
                                </span>
                            `
                    }
                </span>

                <span class="product-cards__stars">
                    <div class="review-rating">
                        <div
                            class="rating-stars-display"
                            style="--rating: ${product.rating};"
                        >
                            ★★★★★
                        </div>
                        <span class="review-rating__count">
                            ${product.rating}/5
                        </span>
                    </div>
                </span>
            </div>
        `;
            return a;
        }
    });
});
