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
    new Swiper(".employees", {
        direction: "horizontal",
        slidesPerView: 3,
        mousewheel: true,
        autoHeight: true,
        pagination: {
            el: ".employees__pagination",
            clickable: true,
        },
        simulateTouch: true,
        touchRatio: 1,
        TouchAngle: 45,
        grabCursor: true,
        watchOverflow: true,
        spaceBetween: 200,
        slidesPerGroup: 3,
    });
});
