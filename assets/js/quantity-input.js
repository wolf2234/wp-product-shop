document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (e) {
        if (!e.target.classList.contains("qty-btn")) return;
        const wrapper = e.target.closest(".quantity");
        const input = wrapper.querySelector(".qty");
        let value = parseInt(input.value) || 0;
        const min = parseInt(input.min) || 1;
        const max = parseInt(input.max) || Infinity;
        if (e.target.classList.contains("qty-plus") && value < max) {
            input.value = value + 1;
        }
        if (e.target.classList.contains("qty-minus") && value > min) {
            input.value = value - 1;
        }
        input.dispatchEvent(new Event("change", { bubbles: true }));
    });
});
