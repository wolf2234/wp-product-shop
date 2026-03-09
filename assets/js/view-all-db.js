document.addEventListener("DOMContentLoaded", function () {
    const step = 4;
    let sort = "popular";

    // состояние для каждого блока товаров
    const state = new Map();

    const viewAllButtons = document.querySelectorAll("[view-all-btn]");

    if (viewAllButtons.length === 0) {
        let goods = document.querySelectorAll("[data-parent-of-view-all]");
        if (goods.length === 0) {
            return;
        }
        goods.forEach(function (good) {
            let slider = good.querySelector("[data-slider]");
            let sliderName = "." + slider.classList[0];
            let slides = document.querySelectorAll(
                `${sliderName} ${sliderName}__item:not(.slick-cloned) [data-items-wrapper]`,
            );
            if (!slides || slides.length === 0) {
                slides = slider.querySelectorAll("[data-items-wrapper]");
            }
            let slidesCount = slides.length;
            state.set(good, {
                offset: 0,
                sort: sort,
            });
            loadProducts(good, slides, slidesCount, sliderName, good);
        });
    }

    viewAllButtons.forEach(function (viewAllButton) {
        const parent = viewAllButton.closest("[data-parent-of-view-all]");
        const slider = parent.querySelector("[data-slider]");
        const sliderName = "." + slider.classList[0];

        let slides = document.querySelectorAll(
            `${sliderName} ${sliderName}__item:not(.slick-cloned) [data-items-wrapper]`,
        );

        if (!slides || slides.length === 0) {
            slides = slider.querySelectorAll("[data-items-wrapper]");
        }

        const slidesCount = slides.length;

        // создаём состояние для этого блока
        state.set(parent, {
            offset: 0,
            sort: sort,
        });

        // первая загрузка
        loadProducts(parent, slides, slidesCount, sliderName, viewAllButton);

        viewAllButton.addEventListener("click", function () {
            loadProducts(
                parent,
                slides,
                slidesCount,
                sliderName,
                viewAllButton,
            );
        });
    });

    // функция загрузки товаров
    function loadProducts(
        parent,
        slides,
        slidesCount,
        sliderName,
        viewAllButton,
    ) {
        const blockState = state.get(parent);

        const params = new URLSearchParams({
            action: "load_products",
            offset: blockState.offset,
            limit: step * slidesCount,
            sort: blockState.sort,
        });

        fetch(`${product_obj.ajaxurl}?${params.toString()}`, {
            method: "GET",
        })
            .then((res) => res.json())
            .then((data) => {
                if (!data.success) return;

                fillSlides(
                    parent,
                    slides,
                    slidesCount,
                    sliderName,
                    viewAllButton,
                    data,
                );
            });
    }

    // функция заполнения слайдов
    function fillSlides(
        parent,
        slides,
        slidesCount,
        sliderName,
        viewAllButton,
        data,
    ) {
        const products = data.data.products;

        products.forEach((product, index) => {
            const slideIndex = index % slidesCount;
            const item = createProductCard(product);

            slides[slideIndex].appendChild(item);
        });

        const blockState = state.get(parent);

        blockState.offset += data.data.count;

        state.set(parent, blockState);

        if (blockState.offset >= data.data.total) {
            viewAllButton?.classList.add("hide");
        }

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
            <span class="discount product-cards__discount">${product.discount}</span>
            <div class="product-cards__icons">
                <span class="product-cards__like">
                    <img src="${product.home_domain}/assets/img/like.svg">
                </span>
                <span class="product-cards__view">
                    <img src="${product.home_domain}/assets/img/view.svg">
                </span>
            </div>
            <button class="product-cards__add">Add to Cart</button>
        </div>
        <div class="product-cards__info">
            <span class="product-cards__name">
                ${product.title}
            </span>
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
                    <span class="review__count">
                        ${product.reviews}
                    </span>
                </div>
            </span>
        </div>
        `;

        return a;
    }
});
