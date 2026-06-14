document.addEventListener("DOMContentLoaded", function () {
    const reviewsBlock = document.querySelector(".cart-wrapper__comments");
    if (!reviewsBlock) return;

    const productId = reviewsBlock.dataset.productId;
    const reviewsList = reviewsBlock.querySelector(".comments");
    let loadMoreBtn = reviewsBlock.querySelector(".cart-wrapper__view-all");
    const sortSelect = document.querySelector(".select-custom");

    const step = 6;
    let offset = 0;
    let sort = "latest";

    // state.set(parent, {
    //     step: 6,
    //     offset: 0,
    //     sort: "latest",
    // });

    loadReviews();

    loadMoreBtn.addEventListener("click", function () {
        loadReviews();
    });

    if (sortSelect) {
        sortSelect.addEventListener("click", function (e) {
            sort = sortSelect
                .querySelector(".select-custom__value")
                .innerText.toLowerCase();
            offset = 0;
            reviewsList.innerHTML = "";
            loadMoreBtn.classList.remove("hide");
            loadReviews();
        });
    }

    async function loadReviews() {
        const params = new URLSearchParams({
            action: "load_product_reviews",
            product_id: productId,
            offset: offset,
            limit: step,
            sort: sort,
        });

        const requestData = {
            url: comment_obj.ajaxurl,
            method: "GET",
            params: params,
        };
        const result = await getProducts(requestData);
        if (result.success) {
            fillReviews(result.data, loadMoreBtn);
        } else {
            console.log("Ошибка:", result.error);
        }

        // fetch(`${comment_obj.ajaxurl}?${params.toString()}`, {
        //     method: "GET",
        // })
        //     .then((res) => res.json())
        //     .then((data) => {
        //         if (!data.success) return;
        //         fillReviews(data, loadMoreBtn);
        //     });
    }

    function fillReviews(data, loadMoreBtn) {
        const reviews = data.reviews;

        reviews.forEach((review) => {
            const reviewItem = createReviewItem(review);
            reviewsList.appendChild(reviewItem);
        });

        offset += data.count;

        if (offset >= data.total) {
            loadMoreBtn.classList.add("hide");
        }
    }

    function createReviewItem(review) {
        const comment = createElement("div", "comment");

        const body = createElement("div", "comment__body");

        const header = createElement("div", "comment__header");

        const content = createElement("div", "comment__content");

        const user = createElement("h3", "comment__user");

        const userName = createElement("span", "comment__user-name");

        userName.textContent = review.author;

        const userIcon = createElement("img");

        userIcon.src = `${review.home_domain}/assets/img/check-user.svg`;

        userIcon.alt = "Check User";

        const text = createElement("p", "comment__text");

        text.innerHTML = review.content;

        const date = createElement("div", "comment__date");

        date.textContent = `Posted on ${review.date}`;

        header.append(createProductRating(review));

        user.append(userName, userIcon);

        content.append(user, text, date);

        body.append(header, content);

        comment.append(body);

        return comment;
    }
});
