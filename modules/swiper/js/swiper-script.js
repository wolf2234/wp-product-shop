document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".swiper", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 15,
        mousewheel: true,
        autoHeight: true,
        // If we need pagination
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },

        // Navigation arrows
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },

        // And if we need scrollbar
        // scrollbar: {
        //     el: ".swiper-scrollbar",
        // },
        thumbs: {
            swiper: {
                el: ".mini-swiper",
                direction: "vertical",
                slidesPerView: 3,
                mousewheel: true,
            },
        },
    });
});
