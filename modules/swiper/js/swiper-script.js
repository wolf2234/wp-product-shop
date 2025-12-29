document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".swiper", {
        direction: "horizontal",
        slidesPerView: 1,
        spaceBetween: 10,
        mousewheel: true,
        // If we need pagination
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        // And if we need scrollbar
        // scrollbar: {
        //     el: ".swiper-scrollbar",
        // },
    });
});
