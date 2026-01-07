document.addEventListener("DOMContentLoaded", function () {
    let sizes = document.querySelectorAll(".sizes__name");
    sizes.forEach((size) => {
        size.addEventListener("click", function () {
            sizes.forEach((size) => {
                size.classList.remove("active");
            });
            size.classList.add("active");
        });
    });
});
