document.addEventListener("DOMContentLoaded", function () {
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");
    const overlay = document.getElementById("modalOverlay");

    function openModal() {
        overlay.classList.add("active");
        document.body.style.overflow = "hidden"; // блокируем скролл
    }

    function closeModal() {
        overlay.classList.remove("active");
        document.body.style.overflow = "";
    }
    if (!openBtn || !closeBtn || !overlay) return;
    openBtn.addEventListener("click", openModal);
    closeBtn.addEventListener("click", closeModal);

    // Закрытие по клику вне окна
    overlay.addEventListener("click", function (e) {
        if (e.target === overlay) {
            closeModal();
        }
    });

    // Закрытие по Esc
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeModal();
        }
    });
    console.log(openBtn);
});
