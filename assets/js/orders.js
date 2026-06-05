// document.addEventListener("input", function (e) {
//     if (!e.target.classList.contains("cart-qty-input")) return;

//     const input = e.target;
//     const qty = parseInt(input.value) || 0;
//     const price = parseFloat(input.dataset.price) || 0;
//     const row = input.closest(".orders__row");
//     const subtotalEl = row.querySelector(".subtotal");

//     // Форматирование цены — простое, без учёта локали/валюты
//     const subtotal = qty * price;
//     // Если хочешь форматировать как в WooCommerce, лучше вернуть через AJAX или использовать серверный формат
//     subtotalEl.textContent = subtotal.toFixed(2);
// });
