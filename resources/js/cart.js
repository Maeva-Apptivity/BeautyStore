document.addEventListener("DOMContentLoaded", () => {
    const cartCountElement = document.getElementById("cartCount");
    const cartSidebar = document.getElementById("cart-sidebar");
    const cartProductDetails = document.getElementById("cart-product-details");
    const closeSidebar = document.getElementById("close-sidebar");
    const continueShopping = document.getElementById("continue-shopping");

    const addUrl = document.querySelector('meta[name="route-cart-add"]').content;
    const token = document.querySelector('meta[name="csrf-token"]').content;

    document.body.addEventListener("click", function (e) {
        const button = e.target.closest(".add-to-cart-btn");
        if (!button) return;

        const productId = button.dataset.id;

        fetch(addUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({ id: productId }),
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    if (cartCountElement) cartCountElement.textContent = data.cartCount;

                    if (cartSidebar && cartProductDetails) {
                        cartProductDetails.innerHTML = `
                            <div class="flex items-center gap-2">
                                <img src="${data.image}" width="70">
                                <div>
                                    <p class="font-bold">${data.name}</p>
                                    <p>${data.price} €</p>
                                </div>
                            </div>
                        `;
                        cartSidebar.classList.add("open");
                    }
                } else if (data.error) {
                    alert(data.error);
                }
            })
            .catch(err => console.error("Erreur AJAX :", err));
    });

    [closeSidebar, continueShopping].forEach(btn => {
        if (btn) btn.addEventListener("click", () => {
            cartSidebar.classList.remove("open");
        });
    });
});
