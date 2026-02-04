document.addEventListener("DOMContentLoaded", function () {
    const dropdownArrow = document.querySelector(".dropdown__arrow");
    const dropdownCpontent = document.querySelector(".dropdown__content");
    dropdownArrow.addEventListener("click", function () {
        dropdownArrow.classList.toggle("show");
        if (
            dropdownCpontent.style.display === "none" ||
            dropdownCpontent.style.display === ""
        ) {
            dropdownCpontent.style.display = "block";
        } else {
            dropdownCpontent.style.display = "none";
        }
    });

    // let infoItems = document.querySelectorAll(".info__item");
    // infoItems.forEach((infoItem) => {
    //     if (infoItem.querySelector(".info__title")) {
    //         infoItem.addEventListener("click", () => {
    //             infoItem.classList.toggle("is-open");
    //         });
    //     }
    // });
});
