// document.addEventListener("DOMContentLoaded", function () {
//     let parentFilters = document.querySelectorAll("[data-parent-filter]");
//     parentFilters.forEach((parentFilter) => {
//         let filterBtn = parentFilter.querySelector(".filters__btn");
//         filterBtn.addEventListener("click", function () {
//             const sliders = parentFilter.querySelector(".noui-body");
//             if (!sliders) return;
//             const vals = sliders.noUiSlider.get(); // может вернуть ["$50","$120"]
//             const min = Number(String(vals[0]).replace(/\D/g, "")) || 0;
//             const max = Number(String(vals[1]).replace(/\D/g, "")) || 0;
//             console.log(min, max);
//         });
//     });
// });
