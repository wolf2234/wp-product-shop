document.addEventListener("DOMContentLoaded", function () {
    let posts = document.querySelectorAll(".product-cards");
    posts.forEach(function (post) {
        showPosts(post);
    });
    function showPosts(post) {
        let buttonLoad = document.querySelector(".view-all");
        let currentItems = 4;
        let postLength = post.querySelectorAll(".product-cards__item").length;
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
