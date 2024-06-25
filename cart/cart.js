// scripts.js
document.addEventListener('DOMContentLoaded', function () {
    const openCartButton = document.getElementById('open-cart');
    const closeCartButton = document.getElementById('close-cart');
    const sideCart = document.getElementById('side-cart');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartEmptyMessage = document.getElementById('cart-empty-message');
    const itemCountDisplay = document.getElementById('item-count');
    const subtotalItemsDisplay = document.getElementById('subtotal-items');
    const subtotalPriceDisplay = document.getElementById('subtotal-price');

    let cart = [];

    openCartButton.addEventListener('click', () => {
        sideCart.classList.add('open');
    });

    closeCartButton.addEventListener('click', () => {
        sideCart.classList.remove('open');
    });

    function addToCart(planTitle, planPrice) {
        const existingItem = cart.find(item => item.title === planTitle);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ title: planTitle, price: planPrice, quantity: 1 });
        }
        updateCart();
    }

    function removeFromCart(planTitle) {
        cart = cart.filter(item => item.title !== planTitle);
        updateCart();
    }

    function updateCart() {
        cartItemsContainer.innerHTML = '';
        if (cart.length === 0) {
            cartEmptyMessage.style.display = 'block';
            cartItemsContainer.style.display = 'none';
        } else {
            cartEmptyMessage.style.display = 'none';
            cartItemsContainer.style.display = 'block';
            cart.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <span>${item.title} (${item.quantity})</span>
                    <span>RM${item.price * item.quantity}</span>
                    <button class="remove-item" data-title="${item.title}">&times;</button>
                `;
                cartItemsContainer.appendChild(cartItem);
            });
        }
        itemCountDisplay.textContent = cart.length;
        subtotalItemsDisplay.textContent = `(${cart.length} items)`;
        const subtotal = cart.reduce((total, item) => total + item.price * item.quantity, 0);
        subtotalPriceDisplay.textContent = subtotal.toFixed(2);

        const removeItemButtons = document.querySelectorAll('.remove-item');
        removeItemButtons.forEach(button => {
            button.addEventListener('click', () => {
                const title = button.getAttribute('data-title');
                removeFromCart(title);
            });
        });
    }

    // Example usage:
    document.getElementById('add-12-month-plan').addEventListener('click', () => {
        addToCart('12 Month Plan', 390);
    });

    document.getElementById('add-6-month-plan').addEventListener('click', () => {
        addToCart('6 Month Plan', 201);
    });

    document.getElementById('add-3-month-plan').addEventListener('click', () => {
        addToCart('3 Month Plan', 102);
    });

    document.getElementById('add-1-month-plan').addEventListener('click', () => {
        addToCart('1 Month Plan', 35);
    });
});
