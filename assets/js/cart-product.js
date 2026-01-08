document.addEventListener("DOMContentLoaded", function () {
    let colors = document.querySelectorAll(".color-radio");
    colors.forEach((color) => {
        color.addEventListener("click", function (c) {
            chooseOptions(colors, color);
        });
    });
    let sizes = document.querySelectorAll(".size-radio");
    sizes.forEach((size) => {
        size.addEventListener("click", function (s) {
            chooseOptions(sizes, size);
        });
    });

    function chooseOptions(optionsList, optionSelected) {
        optionsList.forEach((option) => {
            option.classList.remove("active");
            option.querySelector("input").setAttribute("checked", "false");
        });
        optionSelected.classList.add("active");
        optionSelected.querySelector("input").setAttribute("checked", "true");
    }
});
