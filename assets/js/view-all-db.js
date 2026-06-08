document.addEventListener("DOMContentLoaded", function () {
    const step = 4;
    let sort = "popular";

    // Хранилище состояний для каждого блока товаров на странице
    const state = new Map();
    const viewAllButtons = document.querySelectorAll("[view-all-btn]");

    // 1. Инициализация блоков товаров
    if (viewAllButtons.length === 0) {
        let goods = document.querySelectorAll("[data-parent-of-view-all]");
        goods.forEach(function (good) {
            initBlock(good);
        });
    } else {
        viewAllButtons.forEach(function (viewAllButton) {
            const parent = viewAllButton.closest("[data-parent-of-view-all]");
            if (!parent) return;
            initBlock(parent, viewAllButton);
        });
    }

    function initBlock(parent, btn = null) {
        let slider = parent.querySelector("[data-slider]");
        if (!slider) return;

        let sliderName = "." + slider.classList[0];
        let slides = parent.querySelectorAll("[data-items-wrapper]");
        let slidesCount = slides.length;

        state.set(parent, {
            offset: 0,
            sort: sort,
            minprice: 0,
            maxprice: 0,
            colors: "",
            sizes: "",
        });

        // Первая загрузка товаров при старте страницы
        loadProducts(parent, slides, slidesCount, sliderName, btn);

        if (btn) {
            btn.addEventListener("click", function () {
                loadProducts(parent, slides, slidesCount, sliderName, btn);
            });
        }
    }

    // --- ЛОГИКА ФИЛЬТРАЦИИ ПО КНОПКЕ "APPLY FILTER" ---
    const applyFilterButtons = document.querySelectorAll(".filters__btn");

    applyFilterButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            // Находим именно ту обертку фильтра, в которой была нажата кнопка (моб. или десктоп)
            const currentFilterContainer = btn.closest("[data-parent-filter]");
            if (!currentFilterContainer) return;

            // 1. Ищем ползунок цен внутри этого контейнера
            const priceSliderElem =
                currentFilterContainer.querySelector(".noui-body");
            let minPrice = 0;
            let maxPrice = 0;

            if (priceSliderElem && priceSliderElem.noUiSlider) {
                const values = priceSliderElem.noUiSlider.get();
                // Надежно очищаем от любых символов валют, пробелов и дефисов
                minPrice =
                    Math.round(
                        parseFloat(String(values[0]).replace(/[^0-9.]/g, "")),
                    ) || 0;
                maxPrice =
                    Math.round(
                        parseFloat(String(values[1]).replace(/[^0-9.]/g, "")),
                    ) || 0;
            }

            // 2. Собираем выбранные цвета
            const checkedColors = [];
            const colorInputs = currentFilterContainer.querySelectorAll(
                "input[name='attribute_pa_color[]']:checked",
            );
            colorInputs.forEach((input) => {
                checkedColors.push(input.value);
            });

            // 3. Собираем выбранные размеры
            const checkedSizes = [];
            const sizeInputs = currentFilterContainer.querySelectorAll(
                "input[name='attribute_pa_size[]']:checked",
            );
            sizeInputs.forEach((input) => {
                checkedSizes.push(input.value);
            });

            // 4. Находим ВСЕ блоки товаров на странице
            const allGoodsBlocks = document.querySelectorAll(
                "[data-parent-of-view-all]",
            );
            if (allGoodsBlocks.length === 0) return;

            allGoodsBlocks.forEach((goodsBlock) => {
                let slider = goodsBlock.querySelector("[data-slider]");
                if (!slider) return;

                let sliderName = "." + slider.classList[0];
                let slides = goodsBlock.querySelectorAll(
                    "[data-items-wrapper]",
                );
                let slidesCount = slides.length;
                let viewAllBtn = goodsBlock.querySelector("[view-all-btn]");

                const blockState = state.get(goodsBlock);
                if (blockState) {
                    blockState.offset = 0;
                    blockState.minprice = minPrice;
                    blockState.maxprice = maxPrice;
                    blockState.colors = checkedColors.join(",");
                    blockState.sizes = checkedSizes.join(",");
                    state.set(goodsBlock, blockState);
                }

                // ОЧИЩАЕМ старые карточки товаров перед выводом отфильтрованных
                slides.forEach((slide) => (slide.innerHTML = ""));

                if (viewAllBtn) viewAllBtn.classList.remove("hide");

                // Вызываем загрузку товаров
                loadProducts(
                    goodsBlock,
                    slides,
                    slidesCount,
                    sliderName,
                    viewAllBtn,
                );
            });
        });
    });

    // --- ФУНКЦИЯ ЗАГРУЗКИ ТОВАРОВ (AJAX) ---
    function loadProducts(
        parent,
        slides,
        slidesCount,
        sliderName,
        viewAllButton,
    ) {
        const blockState = state.get(parent);
        if (!blockState) return;

        const queryParams = {
            action: "load_products",
            offset: blockState.offset,
            limit: step * slidesCount,
            sort: blockState.sort,
        };

        // Передаем параметры только если они реально выбраны
        if (blockState.minprice > 0) queryParams.minprice = blockState.minprice;
        if (blockState.maxprice > 0) queryParams.maxprice = blockState.maxprice;
        if (blockState.colors && blockState.colors.trim() !== "")
            queryParams.colors = blockState.colors;
        if (blockState.sizes && blockState.sizes.trim() !== "")
            queryParams.sizes = blockState.sizes;

        // ЛОГ ДЛЯ ОТЛАДКИ: Показывает в консоли, что именно отправляется при клике
        console.log("Отправка AJAX параметров:", queryParams);

        const params = new URLSearchParams(queryParams);

        fetch(`${product_obj.ajaxurl}?${params.toString()}`, {
            method: "GET",
        })
            .then((res) => res.json())
            .then((data) => {
                console.log("Ответ от сервера:", data); // ЛОГ ДЛЯ ОТЛАДКИ
                if (!data.success) return;
                fillSlides(
                    parent,
                    slides,
                    slidesCount,
                    sliderName,
                    viewAllButton,
                    data,
                );
            })
            .catch((err) => console.error("Ошибка запроса:", err));
    }

    // --- ФУНКЦИЯ ЗАПОЛНЕНИЯ СЛАЙДОВ ---
    function fillSlides(
        parent,
        slides,
        slidesCount,
        sliderName,
        viewAllButton,
        data,
    ) {
        const products = data.data.products;

        if (!products || products.length === 0) {
            // Если товары не найдены, можно вывести сообщение (опционально)
            slides[0].innerHTML =
                "<p class='no-products'>No products found matching your selection.</p>";
            viewAllButton?.classList.add("hide");
            return;
        }

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
        } else {
            viewAllButton?.classList.remove("hide");
        }

        if (
            typeof $ !== "undefined" &&
            $(sliderName).hasClass("slick-initialized")
        ) {
            $(sliderName).slick("refresh");
        }
    }
});

function createProductCard(product) {
    const div = document.createElement("div");
    div.className = "product-cards__item";
    div.setAttribute("data-items-item", "");

    div.innerHTML = `
            <div class="product-cards__image">
                <a href="${product.permalink}">
                    <img src="${product.image}" alt="${product.title}">
                </a>
                ${product.discount ? `<span class="discount product-cards__discount">${product.discount}</span>` : ""}
                <div class="product-cards__icons">
                    <span class="product-cards__like" 
                    data-product-id="${product.id}">
                        <img src="${product.home_domain}/assets/img/like.svg" alt="">
                    </span>
                    <span class="product-cards__view">
                        <img src="${product.home_domain}/assets/img/view.svg" alt="">
                    </span>
                </div>
            </div>
            <div class="product-cards__info">
                <span class="product-cards__name">${product.title}</span>
                <span class="product-cards__price">
                    ${
                        product.is_on_sale
                            ? `<span class="price product-cards__sale-price">${product.sale_price}</span>
                            <span class="price product-cards__regular-price">${product.regular_price}</span>`
                            : `<span class="price product-cards__regular-price">${product.regular_price}</span>`
                    }
                </span>
                <span class="product-cards__stars">
                    <div class="stars">
                        <div class="review-rating">
                            <div class="rating-stars-display" style="--rating: ${product.rating};">
                                ★★★★★
                            </div>
                            <span class="review-rating__count">${product.reviews}</span>
                        </div>
                    </div>
                </span>
                <a 
                    href="?add-to-cart=${product.id}"
                    class="product-cards__add"
                    data-product-id="${product.id}">
                    Add to Cart
                </a>
            </div>
        `;
    return div;
}
