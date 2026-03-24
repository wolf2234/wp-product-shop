document.addEventListener("DOMContentLoaded", function () {
    const filters = document.querySelectorAll(".product-filters");
    filters.forEach(function (filter) {
        const head = filter.querySelector(".product-filters__head");
        head.addEventListener("click", function () {
            filter.classList.toggle("active");
        });
    });
});
