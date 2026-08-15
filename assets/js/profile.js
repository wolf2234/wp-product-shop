document.addEventListener("DOMContentLoaded", async function () {
    const profileTabs = document.querySelectorAll(
        ".profile-asidebar__item[data-profile-tab]",
    );

    const profileContents = document.querySelectorAll("[data-profile-content]");

    profileTabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const target = tab.dataset.profileTab;

            // Убираем active у всех пунктов меню
            profileTabs.forEach((item) => {
                item.classList.remove("active");
            });

            // Добавляем active на выбранный пункт
            tab.classList.add("active");

            // Скрываем все блоки
            profileContents.forEach((content) => {
                content.classList.remove("active");
            });

            // Показываем нужный блок
            const targetContent = document.querySelector(
                `[data-profile-content="${target}"]`,
            );

            if (targetContent) {
                targetContent.classList.add("active");
            }
        });
    });
});
