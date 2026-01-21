document.addEventListener("DOMContentLoaded", function () {
    buttonLoads = document.querySelectorAll("[view-all-btn]");

    buttonLoads.forEach(function (buttonLoad) {
        let parentBlock = buttonLoad.closest("[data-parent-of-view-all]");
        let productCards = parentBlock.querySelectorAll("[data-items-wrapper]");
        productCards.forEach(function (productCard) {
            let cards = productCard.querySelectorAll("[data-items-item]");
            let count = parseInt(productCard.getAttribute("data-count"));
            cards.forEach((card, index) => {
                if (index >= count) {
                    card.style.display = "none";
                }
            });
        });

        if (buttonLoad) {
            buttonLoad.addEventListener("click", function (btn) {
                let parent = btn.target.closest("[data-parent-of-view-all]");
                let elements = parent.querySelectorAll("[data-items-wrapper]");
                elements.forEach(function (element) {
                    showPosts(element, parent);
                });
            });
        }
    });

    function showPosts(post, parent) {
        let currentItems = parseInt(post.getAttribute("data-count"));
        let items = post.querySelectorAll("[data-items-item]");
        let button = parent.querySelector("[view-all-btn]");
        let step = parseInt(post.getAttribute("data-step"));
        // сколько показываем за клик

        // показываем следующие 2 элемента
        for (let i = currentItems; i < currentItems + step; i++) {
            if (items[i]) {
                items[i].style.display = "flex";
            }
        }

        // увеличиваем счётчик НА 2
        currentItems += step;
        post.setAttribute("data-count", currentItems);
        // если всё показано — скрываем кнопку
        if (currentItems >= items.length) {
            button.classList.add("hide");
        }
    }
});
