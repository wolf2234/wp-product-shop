document.addEventListener("DOMContentLoaded", function () {
    const ratingBlock = document.querySelector(".rating-stars");

    const hiddenInput = document.getElementById("rating");

    if (ratingBlock) {
        ratingBlock.addEventListener("click", function (e) {
            const half = e.target.closest(".half");
            if (!half) return;

            const value = parseFloat(half.dataset.value);
            hiddenInput.value = value;

            paintStars(value);
        });
    }

    function paintStars(value) {
        if (ratingBlock) {
            const stars = ratingBlock.querySelectorAll(".star");
            stars.forEach((star, index) => {
                const starNumber = index + 1;

                star.classList.remove("filled", "half-filled");

                if (value >= starNumber) {
                    star.classList.add("filled");
                } else if (value >= starNumber - 0.5) {
                    star.classList.add("half-filled");
                }
            });
        }
    }
});
