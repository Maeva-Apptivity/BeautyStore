
document.addEventListener("DOMContentLoaded", () => {
    const cartSidebar = document.getElementById("cart-sidebar");
    const cartProductDetails = document.getElementById("cart-product-details");
    const closeSidebar = document.getElementById("close-sidebar");
    const continueShopping = document.getElementById("continue-shopping");
    const cartCountElement = document.getElementById("cartCount");
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const addUrl = document.querySelector('meta[name="route-cart-add"]')?.content;
    const detailUrl = document.querySelector('meta[name="route-cart-add-detail"]')?.content;
    const wishlistUrl = document.querySelector('meta[name="route-wishlist-toggle"]')?.content;
    const wishlistCountElement = document.getElementById("wishlistCount");

    // --- Recherche ---
    const searchToggle = document.getElementById("searchToggle");
    const searchOverlay = document.getElementById("searchOverlay");
    const searchClose = document.getElementById("searchClose");
    const searchInput = document.getElementById("searchInput");

    searchToggle?.addEventListener("click", () => {
        const isOpen = searchOverlay.classList.toggle("open");
        searchOverlay.setAttribute("aria-hidden", String(!isOpen));
        if (isOpen) searchInput?.focus();
    });

    searchClose?.addEventListener("click", () => {
        searchOverlay.classList.remove("open");
        searchOverlay.setAttribute("aria-hidden", "true");
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && searchOverlay?.classList.contains("open")) {
            searchOverlay.classList.remove("open");
            searchOverlay.setAttribute("aria-hidden", "true");
        }
    });

    // --- Favoris ---
    document.body.addEventListener("click", async (e) => {
        const btn = e.target.closest(".wishlist-toggle-btn");
        if (!btn || !wishlistUrl) return;

        const productId = btn.dataset.id;
        btn.disabled = true;

        try {
            const res = await fetch(wishlistUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfMeta.content,
                    Accept: "application/json",
                },
                body: JSON.stringify({ product_id: productId }),
            });

            if (!res.ok) throw new Error();

            const data = await res.json();
            const icon = btn.querySelector("i");
            if (icon) {
                icon.className = data.inWishlist ? "bx bxs-heart" : "bx bx-heart";
            }
            btn.classList.toggle("active", data.inWishlist);

            if (wishlistCountElement) {
                wishlistCountElement.textContent = data.count;
                wishlistCountElement.classList.add("bump");
                window.setTimeout(() => wishlistCountElement.classList.remove("bump"), 300);
            }
        } catch {
            // silently ignore
        } finally {
            btn.disabled = false;
        }
    });

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
