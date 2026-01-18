document.addEventListener("DOMContentLoaded", function () {
    const radios = document.querySelectorAll(
        '.rating-stars input[type="radio"]',
    );
    const hiddenRating = document.getElementById("rating");
    radios.forEach((radio) => {
        radio.addEventListener("change", function () {
            hiddenRating.value = this.value;
        });
    });
});
