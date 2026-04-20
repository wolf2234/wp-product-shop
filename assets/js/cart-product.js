document.addEventListener("DOMContentLoaded", function () {
    let parentFilters = document.querySelectorAll("[data-parent-filter]");
    parentFilters.forEach((parentFilter) => {
        let colors = parentFilter.querySelectorAll(".color-radio");
        colors.forEach((color) => {
            color
                .querySelector("input")
                .addEventListener("change", function (c) {
                    chooseOptions(color);
                });
        });
        let sizes = parentFilter.querySelectorAll(".size-radio");
        sizes.forEach((size) => {
            size.querySelector("input").addEventListener(
                "change",
                function (s) {
                    chooseOptions(size);
                },
            );
        });
    });
    function chooseOptions(optionSelected) {
        console.log(optionSelected.querySelector("input").checked);
        if (optionSelected.querySelector("input").checked === true) {
            optionSelected.classList.add("active");
            optionSelected
                .querySelector("input")
                .setAttribute("checked", "true");
        } else {
            optionSelected.classList.remove("active");
            optionSelected
                .querySelector("input")
                .setAttribute("checked", "false");
        }
    }
});
