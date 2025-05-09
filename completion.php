<?php
    include('connect.php');
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
                $sql = "SELECT * FROM delivery WHERE delivery.cart_id = 1";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<p>Your cart order date: '.$row['date'].'</p>';
                        echo '<p>Your shipper: '.$row['deliverer_name'].'</p>';
                }}
            ?>
        </div>
        <div class="order-summary">
            <h3>Order Summary</h3>
            <div class="order-item">
                <span>Com Chien Heo Xu</span>
                <span>35000 VND</span>
            </div>
            <div class="total-amount">
                <span>Total</span>
                <span>40000 VND</span>
            </div>
        </div>
        <script>
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
        <a href="index.html" class="back-menu">Back to Home</a>
    </div>
</body>
</html>
