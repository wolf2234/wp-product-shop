document.addEventListener("DOMContentLoaded", function () {
    const filtersBtn = document.querySelector(".nav-menu__btn");
    const navFilters = document.querySelector(".nav-menu__filters");
    const filters = navFilters.querySelector(".filters");
    filtersBtn.addEventListener("click", function () {
        filtersBtn.classList.toggle("active");
        filtersBtn.textContent = filtersBtn.classList.contains("active")
            ? filtersBtn.dataset.textActive
            : filtersBtn.dataset.textDefault;
        navFilters.classList.toggle("active");
        filters.classList.toggle("active");
    });
});
