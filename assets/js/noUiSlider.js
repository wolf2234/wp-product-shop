// var slider = document.getElementById("slider");

// noUiSlider.create(slider, {
//     start: [20, 80],
//     connect: true,
//     range: {
//         min: 0,
//         max: 100,
//     },
// });

document.addEventListener("DOMContentLoaded", function () {
    const sliders = document.querySelectorAll(".noui-body");
    sliders.forEach(function (slider) {
        if (!slider) return;
        noUiSlider.create(slider, {
            start: [50, 120],
            connect: true,
            step: 1,
            tooltips: true,
            range: {
                min: 1,
                max: 400,
            },
            format: {
                to: function (value) {
                    return "$" + Math.round(value);
                },
                from: function (value) {
                    return Number(value.replace("$", ""));
                },
            },
        });
    });

    // const values = slider.noUiSlider.get();
    // const minPrice = Number(values[0].replace("$", ""));
    // const maxPrice = Number(values[1].replace("$", ""));
    // console.log(minPrice, maxPrice);
});
