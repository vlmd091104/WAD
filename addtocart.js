// addtocart.js

// Initialize an empty cart
let cart = [];

// Function to add item to cart
function addToCart(productId, productName, productPrice) {
    // Create an item object
    const item = {
        id: productId,
        name: productName,
        price: productPrice,
    };

    // Add item to cart
    cart.push(item);
    updateCartDisplay();
}

// Function to update cart display
function updateCartDisplay() {
    const cartContainer = document.querySelector('.cart-items');
    const orderSummary = document.querySelector('.order-summary');
    cartContainer.innerHTML = ''; // Clear current cart items

    let subtotal = 0;

    // Display each item in the cart
    cart.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('item');
        itemDiv.innerHTML = `
            <div class="item-details">
                <h3>${item.name}</h3>
                <p>${item.price} VND</p>
                <i class="fa fa-trash" onclick="removeFromCart(${item.id})"></i>
            </div>
        `;
        cartContainer.appendChild(itemDiv);
        subtotal += item.price; // Update subtotal
    });

    // Update order summary
    orderSummary.querySelector('p:nth-child(1) span').textContent = `${subtotal} VND`;
    const shipping = 5000;
    const promotion = 0;
    const total = subtotal + shipping - promotion;

    orderSummary.querySelector('.total span').textContent = `${total} VND`;
}

// Function to remove item from the cart
function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId); // Remove item
    updateCartDisplay(); // Update display
}

// Event listener for all cart icons in the menu
document.querySelectorAll('.add-to-cart-icon').forEach(icon => {
    icon.addEventListener('click', () => {
        const productId = icon.dataset.id; // Assuming each icon has a data-id attribute
        const productName = icon.dataset.name; // Assuming each icon has a data-name attribute
        const productPrice = parseInt(icon.dataset.price); // Assuming each icon has a data-price attribute
        addToCart(productId, productName, productPrice);
    });
});