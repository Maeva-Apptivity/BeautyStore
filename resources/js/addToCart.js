
document.addEventListener("DOMContentLoaded", () => {
    const cartSidebar = document.getElementById("cart-sidebar");
    const cartProductDetails = document.getElementById("cart-product-details");
    const closeSidebar = document.getElementById("close-sidebar");
    const continueShopping = document.getElementById("continue-shopping");
    const cartCountElement = document.getElementById("cartCount");
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const addUrl = document.querySelector('meta[name="route-cart-add"]')?.content;
    const detailUrl = document.querySelector('meta[name="route-cart-add-detail"]')?.content;

    if (!csrfMeta || !addUrl) return;

    let autoCloseTimer = null;

    const closeCartSidebar = () => {
        cartSidebar?.classList.remove("open");
        window.clearTimeout(autoCloseTimer);
    };

    const openCartSidebar = (product) => {
        if (!cartSidebar || !cartProductDetails) return;

        cartProductDetails.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <strong>${product.name}</strong>
            <span>${product.price}€</span>
        `;

        cartSidebar.classList.add("open");
        window.clearTimeout(autoCloseTimer);
        autoCloseTimer = window.setTimeout(closeCartSidebar, 4500);
    };

    closeSidebar?.addEventListener("click", closeCartSidebar);
    continueShopping?.addEventListener("click", closeCartSidebar);

    document.body.addEventListener("click", async (e) => {
        const button = e.target.closest(".add-to-cart-btn");

        if (!button) return;

        const quantityInput = document.getElementById("qtyInput");
        const quantity = quantityInput ? Math.max(1, parseInt(quantityInput.value, 10) || 1) : 1;
        const isDetailPage = Boolean(quantityInput && detailUrl);

        button.disabled = true;
        const originalText = button.textContent;
        button.textContent = "Ajout...";

        try {
            const response = await fetch(isDetailPage ? detailUrl : addUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfMeta.content,
                    Accept: "application/json",
                },
                body: JSON.stringify(
                    isDetailPage
                        ? { product_id: button.dataset.id, quantity }
                        : { id: button.dataset.id }
                ),
            });

            if (!response.ok) throw new Error("Erreur lors de l'ajout au panier");

            const data = await response.json();
            if (cartCountElement && data.cartCount !== undefined) {
                cartCountElement.textContent = data.cartCount;
                cartCountElement.classList.add("bump");
                window.setTimeout(() => cartCountElement.classList.remove("bump"), 300);
            }

            openCartSidebar({
                name: data.name || button.dataset.name,
                price: data.price || button.dataset.price,
                image: data.image || button.dataset.image,
            });
        } catch (error) {
            console.error(error);
            button.textContent = "Réessayer";
            window.setTimeout(() => {
                button.textContent = originalText;
            }, 1800);
            return;
        } finally {
            button.disabled = false;
        }

        button.textContent = originalText;
    });
});
