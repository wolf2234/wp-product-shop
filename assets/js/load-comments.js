document.addEventListener("DOMContentLoaded", function () {
    const reviewsBlock = document.querySelector(".cart-wrapper__comments");
    if (!reviewsBlock) return;

    const productId = reviewsBlock.dataset.productId;
    const reviewsList = reviewsBlock.querySelector(".comments");
    const loadMoreBtn = reviewsBlock.querySelector(".cart-wrapper__view-all");

    const step = 6;
    let offset = 0;

    loadReviews();

    loadMoreBtn.addEventListener("click", function () {
        loadReviews();
    });

    function loadReviews() {
        const params = new URLSearchParams({
            action: "load_product_reviews",
            product_id: productId,
            offset: offset,
            limit: step,
        });

        fetch(`${comment_obj.ajaxurl}?${params.toString()}`, {
            method: "GET",
        })
            .then((res) => res.json())
            .then((data) => {
                if (!data.success) return;

                fillReviews(data, loadMoreBtn);
            });
    }

    function fillReviews(data, loadMoreBtn) {
        const reviews = data.data.reviews;

        reviews.forEach((review) => {
            const reviewItem = createReviewItem(review);
            reviewsList.appendChild(reviewItem);
        });

        offset += data.data.count;

        if (offset >= data.data.total) {
            loadMoreBtn.classList.add("hide");
        }
    }

    function createReviewItem(review) {
        const div = document.createElement("div");
        div.className = "comment";

        div.innerHTML = `
        <div class="comment__body">
            <div class="comment__header">
                <div class="review-rating">
                    <div
                        class="rating-stars-display"
                        style="--rating: ${review.rating};"
                        aria-label="Rating ${review.rating} out of 5"
                    >
                        ★★★★★
                    </div>
                </div>
            </div>
            <div class="comment__content">
                <h3 class="comment__user">
                    <span class="comment__user-name">
                        ${review.author}
                    </span>
                    <img src="${review.home_domain}/assets/img/check-user.svg" alt="Сheck User">
                </h3>
                <p class="comment__text">
                    ${review.content}
                </p>
                <div class="comment__date">
                    Posted on ${review.date}
                </div>
            </div>
        </div>
        `;
        return div;
    }
});
