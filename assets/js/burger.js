const hamMenu = document.querySelector(".burger");
const offScreenMenu = document.querySelector(".nav-menu");
const body = document.querySelector("body");
const header = document.querySelector(".header");

hamMenu.addEventListener("click", () => {
    hamMenu.classList.toggle("active");
    offScreenMenu.classList.toggle("active");
    header.classList.toggle("active");
    body.classList.toggle("lock");
});
