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
        // let postLength = post.querySelectorAll("[data-items-item]").length;
        let buttonLoad = parent.querySelector("[view-all-btn]");
        let elementList = [...post.querySelectorAll("[data-items-item]")];
        for (let i = currentItems; i <= elementList.length; i++) {
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
