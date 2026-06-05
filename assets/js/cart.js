// document.addEventListener("DOMContentLoaded", function () {
//     let products = document.querySelectorAll("[data-items-wrapper]");
//     products.forEach((product) => {
//         let addCartButtons = product.querySelectorAll("[data-product-id]");

//         addCartButtons.forEach((addCartButton) => {
//             addCartButton.addEventListener("click", function (e) {
//                 let productId = addCartButton.dataset.productId;
//                 const btn = e.target.closest(".product-cards__add");

//                 if (!btn) return;

//                 e.preventDefault();

//                 const productId = btn.dataset.productId;

//                 const formData = new FormData();

//                 formData.append("action", "add_to_cart_ajax");
//                 formData.append("product_id", productId);

//                 fetch(cart_obj.ajaxurl, {
//                     method: "POST",
//                     body: formData,
//                 })
//                     .then((res) => res.json())
//                     .then((data) => {
//                         console.log(data);

//                         if (data.success) {
//                             alert("Product added to cart");
//                         }
//                     })
//                     .catch((err) => console.error(err));
//             });
//         });
//     });
// });
