$(document).ready(function () {
    $(".banner").slick({
        arrows: false,
        dots: true,
        adaptiveHeight: true,
        Infinity: true,
        autoplay: true,
        autoplaySpeed: 2000,
    });
    $(".slider").slick({
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        Infinity: true,
        autoplay: false,
        autoplaySpeed: 2000,
        nextArrow: $("#next"),
        prevArrow: $("#prev"),
        draggable: false,
        swipe: false,
    });
    $(".slider-category").slick({
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        Infinity: true,
        autoplay: false,
        autoplaySpeed: 2000,
        nextArrow: $("#category-next"),
        prevArrow: $("#category-prev"),
        draggable: false,
        swipe: false,
    });
    $(".slider-products").slick({
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        Infinity: true,
        autoplay: false,
        autoplaySpeed: 2000,
        nextArrow: $("#products-next"),
        prevArrow: $("#products-prev"),
        draggable: false,
        swipe: false,
    });
    $(".slider-happy-customers").slick({
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        Infinity: true,
        autoplay: false,
        autoplaySpeed: 2000,
        nextArrow: $("#happy-customers-next"),
        prevArrow: $("#happy-customers-prev"),
        draggable: false,
        swipe: false,
    });
    // $("").slick({
    //     arrows: false,
    //     slidesToShow: 3,
    //     slidesToScroll: 3,
    //     dots: true,
    //     adaptiveHeight: true,
    //     Infinity: true,
    //     autoplay: true,
    //     autoplaySpeed: 2000,
    //     appendDots: $(".employees__dots"),
    //     responsive: [
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //                 vertical: true,
    //                 verticalSwiping: true,
    //                 swipe: true,
    //             },
    //         },
    //     ],
    // });
});
