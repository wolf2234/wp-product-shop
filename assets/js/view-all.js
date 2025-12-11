document.addEventListener("DOMContentLoaded", function () {
    buttonLoads = document.querySelectorAll(".view-all");

    buttonLoads.forEach(function (buttonLoad) {
        let parentBlock = buttonLoad.closest(".goods");
        let productCards = parentBlock.querySelectorAll(".product-cards");
        productCards.forEach(function (productCard) {
            let cards = productCard.querySelectorAll(".product-cards__item");
            let count = parseInt(productCard.getAttribute("data-count"));
            // Скрываем все после 4-го
            cards.forEach((card, index) => {
                if (index >= count) {
                    card.style.display = "none";
                }
            });
        });

        if (buttonLoad) {
            buttonLoad.addEventListener("click", function (btn) {
                let parent = btn.target.closest(".goods");
                let elements = parent.querySelectorAll(".product-cards");
                elements.forEach(function (element) {
                    showPosts(element, parent);
                });
            });
        }
    });

    function showPosts(post, parent) {
        let currentItems = parseInt(post.getAttribute("data-count"));
        let postLength = post.querySelectorAll(".product-cards__item").length;
        let buttonLoad = parent.querySelector(".view-all");
        let elementList = [...post.querySelectorAll(".product-cards__item")];
        for (let i = currentItems; i <= currentItems + currentItems; i++) {
            if (elementList[i]) {
                setTimeout(function () {
                    elementList[i].style.display = "flex";
                });
            }
        }
        currentItems += currentItems;
        if (currentItems >= elementList.length) {
            buttonLoad.classList.add("hide");
        }
    }
});
