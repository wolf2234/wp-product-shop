document.addEventListener("DOMContentLoaded", function () {
    // let posts = document.querySelectorAll(".product-cards");
    // posts.forEach(function (post) {
    //     showPosts(post);
    // });
    buttonLoads = document.querySelectorAll(".view-all");
    buttonLoads.forEach(function (buttonLoad) {
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
        let currentItems = 4;
        let postLength = post.querySelectorAll(".product-cards__item").length;
        let buttonLoad = parent.querySelector(".view-all");
        buttonLoad.addEventListener("click", function (e) {
            let elementList = [
                ...post.querySelectorAll(".product-cards__item"),
            ];
            for (let i = currentItems; i <= currentItems + 4; i++) {
                if (elementList[i]) {
                    setTimeout(function () {
                        elementList[i].style.display = "flex";
                    });
                }
            }

            currentItems += 4;
            if (currentItems >= elementList.length) {
                buttonLoad.classList.add("hide");
            }
        });
    }
});
