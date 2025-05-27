<?php
    include('connect.php');
    session_start();
    
    // Check if user is logged in
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: signOrReg.php");
        exit();
    }
    
    // Insert order details into database if not already done
    if (isset($_SESSION['order_id'])) {
        $orderId = $_SESSION['order_id'];
    } else {
        // Generate a random shipper name for demo purposes
        $shippers = ['John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Wilson'];
        $randomShipper = $shippers[array_rand($shippers)];
        
        // Insert into delivery table
        $sql = "INSERT INTO delivery (date, deliverer_name, user_id) VALUES (NOW(), ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $randomShipper, $_SESSION['user_id']);
        $stmt->execute();
        $orderId = $conn->insert_id;
        $_SESSION['order_id'] = $orderId;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order complete</title>
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
    <link rel="stylesheet" href="styles/completion.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h1>IU Canteen</h1>
            <nav>
                <a href="index.html">Home</a>
                <a href="menu.php">Menu</a>
                <a href="#">Promotion</a>
                <a href="about_us.php">About Us</a>
            </nav>
            <div class="icons">
                <img src="https://www.coykendallchiropractic.com/wp-content/uploads/2021/09/food.png" alt="Food Icon">
                <a href="profile.php"><img src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=muXZvm3dsoQqwg&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-person-icon-png-people-person-user-icon-2240.png&ehk=MfHYkGonqy7I%2fGTKUAzUFpbYm9DhfXA9Q70oeFxWmH8%3d&risl=&pid=ImgRaw&r=0" alt="User Icon"></a>
            </div>
        </div>
        <div class="order-placed">
            <h2>Order Placed Successfully!</h2>
            <p>Thank you for your order. Your food is being prepared and will be delivered soon!</p>
            <p class="countdown">Estimated Delivery Time (Minutes): <strong id="timer">15:00</strong></p>
            <?php
                $sql = "SELECT * FROM delivery WHERE delivery.cart_id = ? AND delivery.user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $orderId, $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    echo '<p>Your order date: ' . htmlspecialchars($row['date']) . '</p>';
                    echo '<p>Your shipper: ' . htmlspecialchars($row['deliverer_name']) . '</p>';
                }
            ?>
        </div>
        <div class="order-summary">
            <h3>Order Summary</h3>
            <div id="orderItems">
                <!-- Order items will be populated by JavaScript -->
            </div>
        </div>
        <script>
            // Display order items from localStorage
            document.addEventListener('DOMContentLoaded', function() {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const orderItemsContainer = document.getElementById('orderItems');
                let subtotal = 0;

                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    subtotal += itemTotal;
                    
                    const itemElement = document.createElement('div');
                    itemElement.className = 'order-item';
                    itemElement.innerHTML = `
                        <div class="item-details">
                            <span>${item.name} x${item.quantity}</span>
                            <span>${itemTotal.toLocaleString()} VND</span>
                        </div>
                    `;
                    orderItemsContainer.appendChild(itemElement);
                });

                const shipping = 5000;
                const total = subtotal + shipping;

                // Add shipping and total
                const totalElement = document.createElement('div');
                totalElement.className = 'total-amount';
                totalElement.innerHTML = `
                    <div class="shipping">
                        <span>Shipping</span>
                        <span>${shipping.toLocaleString()} VND</span>
                    </div>
                    <div class="final-total">
                        <span>Total</span>
                        <span>${total.toLocaleString()} VND</span>
                    </div>
                `;
                orderItemsContainer.appendChild(totalElement);
            });

            // Countdown timer
            let countdownTime = 15 * 60;
            const timerElement = document.getElementById('timer');
            const countdownInterval = setInterval(() => {
                const minutes = Math.floor(countdownTime / 60);
                const seconds = countdownTime % 60;
                const formattedMinutes = String(minutes).padStart(2, '0');
                const formattedSeconds = String(seconds).padStart(2, '0');
                timerElement.textContent = `${formattedMinutes}:${formattedSeconds}`;
                countdownTime--;
                if (countdownTime < 0) {
                    clearInterval(countdownInterval);
                    timerElement.textContent = "Time's up!";
                }
            }, 1000);
        </script>
        <a href="logout.php" class="back-menu" onclick="localStorage.removeItem('cart');">Back to Home</a>
    </div>
</body>
</html>
