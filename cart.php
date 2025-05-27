<?php
    include('connect.php');
    session_start();
    
    // Check if user is logged in
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: signOrReg.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IU Canteen - Cart</title>
    <link rel="stylesheet" href="styles/cart.css">
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <h1>IU Canteen</h1>
            <nav>
                <a href="menu.php">Menu</a>
                <a href="about_us.php">About us</a>
                <a href="profile.php">My profile</a>
            </nav>
        </div>
    </header>
    <main>
        <h2>Cart</h2>
        <div class="cart-container">
            <div class="cart-items" id="cartItems">
                <!-- Cart items will be populated by JavaScript -->
            </div>
            <div class="order-summary">
                <h3>Order summary</h3>
                <div id="orderSummary">
                    <!-- Order summary will be populated by JavaScript -->
                </div>
                <a href="payment.html" id="checkoutButton" style="display: none;">
                    <button class="continue-button">Continue to payment →</button>
                </a>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItemsContainer = document.getElementById('cartItems');
            const orderSummaryContainer = document.getElementById('orderSummary');
            const checkoutButton = document.getElementById('checkoutButton');
            
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
                orderSummaryContainer.innerHTML = '';
                return;
            }

            let subtotal = 0;
            cartItemsContainer.innerHTML = '';

            cart.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.className = 'item';
                itemElement.innerHTML = `
                    <div class="item-details">
                        <h3>${item.name}</h3>
                        <p>${item.price.toLocaleString()} VND</p>
                        <div class="quantity-controls">
                            <button onclick="updateQuantity('${item.id}', ${item.quantity - 1})">-</button>
                            <span>${item.quantity}</span>
                            <button onclick="updateQuantity('${item.id}', ${item.quantity + 1})">+</button>
                        </div>
                        <p class="item-total">${(item.price * item.quantity).toLocaleString()} VND</p>
                        <i class="fa fa-trash" onclick="removeFromCart('${item.id}')"></i>
                    </div>
                `;
                cartItemsContainer.appendChild(itemElement);
                subtotal += item.price * item.quantity;
            });

            const shipping = 5000;
            const promotion = 0;
            const total = subtotal + shipping - promotion;

            orderSummaryContainer.innerHTML = `
                <p>Subtotal: <span>${subtotal.toLocaleString()} VND</span></p>
                <p>Shipping: <span>${shipping.toLocaleString()} VND</span></p>
                <p>Promotion: <span>${promotion.toLocaleString()} VND</span></p>
                <p class="total">Total: <span>${total.toLocaleString()} VND</span></p>
            `;

            checkoutButton.style.display = 'block';
        });
    </script>
    <script src="addtocart.js"></script>
</body>
</html>
