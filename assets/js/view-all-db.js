const state = new Map();
document.addEventListener("DOMContentLoaded", function () {
    // Хранилище состояний для каждого блока товаров на странице
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
            step: 4,
            offset: 0,
            sort: "popular",
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
                console.log("BUTTON HERE:", viewAllBtn);

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
});

// --- ФУНКЦИЯ ЗАГРУЗКИ ТОВАРОВ (AJAX) ---
async function loadProducts(
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
        limit: blockState.step * slidesCount,
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

    const requestData = {
        url: product_obj.ajaxurl,
        method: "GET",
        params: params,
    };
    const result = await getProducts(requestData);

    if (result.success) {
        fillSlides(
            parent,
            slides,
            slidesCount,
            sliderName,
            viewAllButton,
            result.data,
        );
    } else {
        console.log("Ошибка:", result.error);
    }
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
    const products = data.products;

    if (!products || products.length === 0) {
        // Если товары не найдены, можно вывести сообщение (опционально)
        slides[0].innerHTML =
            "<p class='no-products'>No products found matching your selection.</p>";
        if (viewAllButton) viewAllButton.classList.add("hide");
        return;
    }

    products.forEach((product, index) => {
        const slideIndex = index % slidesCount;
        const productOptions = {
            discount: true,
            like: true,
            view: true,
            rating: true,
            addToCart: true,
        };
        const item = createProductCard(product, productOptions);
        slides[slideIndex].appendChild(item);
    });

    const blockState = state.get(parent);
    blockState.offset += data.count;
    state.set(parent, blockState);

    if (blockState.offset >= data.total) {
        if (viewAllButton) viewAllButton.classList.add("hide");
    } else {
        if (viewAllButton) viewAllButton.classList.remove("hide");
    }

    if (
        typeof $ !== "undefined" &&
        $(sliderName).hasClass("slick-initialized")
    ) {
        $(sliderName).slick("refresh");
    }
}

async function getProducts(request) {
    try {
        const {
            url,
            method = "GET",
            params = null,
            body = null,
            headers = {},
        } = request;

        const upperMethod = method.trim().toUpperCase();
        console.log("body =", body);
        console.log("url =", url);

        let finalUrl = url;

        const options = {
            method: upperMethod,
            headers: {
                ...headers,
            },
        };

        // GET → query string
        if (upperMethod === "GET" && params) {
            const query = new URLSearchParams(params).toString();
            if (query) finalUrl += `?${query}`;
        }

        // POST → body
        if (upperMethod === "POST" && body) {
            if (body instanceof FormData) {
                options.body = body;
                // НЕ ставим headers вообще
            } else {
                options.headers["Content-Type"] =
                    "application/x-www-form-urlencoded";
                options.body = new URLSearchParams(body);
            }
        }

        const response = await fetch(finalUrl, options);
        const data = await response.json();

        if (!data.success) {
            return {
                success: false,
                error: data?.data?.message || "Request failed",
                data: null,
            };
        }

        return {
            success: true,
            error: null,
            data: data.data ?? data,
        };
    } catch (err) {
        return {
            success: false,
            error: err.message,
            data: null,
        };
    }
}

// function createProductCard(product) {
//     const div = document.createElement("div");
//     div.className = "product-cards__item";
//     div.setAttribute("data-items-item", "");

//     div.innerHTML = `
//             <div class="product-cards__image">
//                 <a href="${product.permalink}">
//                     <img src="${product.image}" alt="${product.title}">
//                 </a>
//                 ${product.discount ? `<span class="discount product-cards__discount">${product.discount}</span>` : ""}
//                 <div class="product-cards__icons">
//                     <span class="product-cards__like"
//                     data-product-id="${product.id}">
//                         <img src="${product.home_domain}/assets/img/like.svg" alt="">
//                     </span>
//                     <span class="product-cards__view">
//                         <img src="${product.home_domain}/assets/img/view.svg" alt="">
//                     </span>
//                 </div>
//             </div>
//             <div class="product-cards__info">
//                 <span class="product-cards__name">${product.title}</span>
//                 <span class="product-cards__price">
//                     ${
//                         product.is_on_sale
//                             ? `<span class="price product-cards__sale-price">${product.sale_price}</span>
//                             <span class="price product-cards__regular-price">${product.regular_price}</span>`
//                             : `<span class="price product-cards__regular-price">${product.regular_price}</span>`
//                     }
//                 </span>
//                 <span class="product-cards__stars">
//                     <div class="stars">
//                         <div class="review-rating">
//                             <div class="rating-stars-display" style="--rating: ${product.rating};">
//                                 ★★★★★
//                             </div>
//                             <span class="review-rating__count">${product.reviews}</span>
//                         </div>
//                     </div>
//                 </span>
//                 <a
//                     href="?add-to-cart=${product.id}"
//                     class="product-cards__add"
//                     data-product-id="${product.id}">
//                     Add to Cart
//                 </a>
//             </div>
//         `;
//     return div;
// }

function createElement(tag, className = "") {
    const element = document.createElement(tag);

    if (className) {
        element.className = className;
    }

    return element;
}

function createProductImage(product) {
    const link = document.createElement("a");

    link.href = product.permalink;

    const img = document.createElement("img");

    img.src = product.image;
    img.alt = product.title;

    link.append(img);

    return link;
}

function createDiscount(product) {
    if (!product.discount) {
        return null;
    }

    const discount = createElement("span", "discount product-cards__discount");

    discount.textContent = product.discount;

    return discount;
}

function createProductIcon(image, action, productId) {
    const icon = createElement("span", "product-cards__icon");

    icon.setAttribute(`data-${action}`, "");

    icon.dataset.productId = productId;

    const img = document.createElement("img");

    img.src = image;

    icon.append(img);

    return icon;
}

function createProductName(product) {
    const name = createElement("span", "product-cards__name");

    name.textContent = product.title;

    return name;
}

function createProductPrice(product) {
    const wrapper = createElement("span", "product-cards__price");

    if (product.is_on_sale) {
        const sale = createElement("span", "price");

        sale.innerHTML = product.sale_price;

        const regular = createElement("span", "price regular-price");

        regular.innerHTML = product.regular_price;

        wrapper.append(sale, regular);
    } else {
        const regular = createElement("span", "price");

        regular.innerHTML = product.regular_price;

        wrapper.append(regular);
    }

    return wrapper;
}

function createProductRating(product) {
    const wrapper = createElement("div", "review-rating");

    const stars = createElement("div", "rating-stars-display");

    stars.style.setProperty("--rating", product.rating);

    stars.textContent = "★★★★★";

    const count = createElement("span", "review-rating__count");

    count.textContent = product.reviews;

    wrapper.append(stars, count);

    return wrapper;
}

function createAddToCartButton(product) {
    const button = document.createElement("a");

    button.href = `?add-to-cart=${product.id}`;

    button.className = "product-cards__add";

    button.dataset.productId = product.id;

    button.textContent = "Add to Cart";

    return button;
}

function createProductCard(product, options = {}) {
    const settings = {
        discount: false,
        like: false,
        view: false,
        remove: false,
        rating: false,
        addToCart: false,
        ...options,
    };

    const card = createElement("div", "product-cards__item");

    card.dataset.itemsItem = "";

    const imageBlock = createElement("div", "product-cards__image");

    const iconsBlock = createElement("div", "product-cards__icons");

    const infoBlock = createElement("div", "product-cards__info");

    imageBlock.append(createProductImage(product));

    if (settings.discount) {
        const discount = createDiscount(product);

        if (discount) {
            imageBlock.append(discount);
        }
    }

    if (settings.like) {
        iconsBlock.append(
            createProductIcon(
                `${product.home_domain}/assets/img/like.svg`,
                "like",
                product.id,
            ),
        );
    }

    if (settings.view) {
        iconsBlock.append(
            createProductIcon(
                `${product.home_domain}/assets/img/view.svg`,
                "view",
                product.id,
            ),
        );
    }
    if (settings.remove) {
        iconsBlock.append(
            createProductIcon(
                `${product.home_domain}/assets/img/remove.svg`,
                "remove",
                product.id,
            ),
        );
    }

    if (iconsBlock.children.length) {
        imageBlock.append(iconsBlock);
    }

    infoBlock.append(createProductName(product), createProductPrice(product));

    if (settings.rating) {
        infoBlock.append(createProductRating(product));
    }

    if (settings.addToCart) {
        infoBlock.append(createAddToCartButton(product));
    }

    card.append(imageBlock, infoBlock);

    return card;
}
