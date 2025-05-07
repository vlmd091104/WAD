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
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            background-color: white;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            min-height: 100vh;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(90deg, purple, pink);
            color: white;
            width: 100%;
            padding: 10px 20px;
        }
        .navbar h1 {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        .navbar nav {
            display: flex;
            gap: 25px;
        }
        .navbar nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        .navbar .icons {
            display: flex;
            align-items: center;
        }
        .navbar .icons img {
            width: 24px;
            height: 24px;
            margin-left: 30px;
        }
        .order-placed {
            text-align: center;
            margin-top: 50px;
        }
        .order-placed h2 {
            font-size: 32px;
            color: #4caf50;
            margin-bottom: 10px;
        }
        .order-placed p {
            font-size: 18px;
            color: #555;
        }
        .order-summary {
            width: 100%;
            background-color: #ffe6f0; 
            padding: 20px;
            margin: 30px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .order-summary h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            color: #666;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .total-amount {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 18px;
            margin-top: 15px;
            color: #333;
        }
        .back-menu {
            display: inline-block;
            background-color: #e91e63;
            color: white;
            padding: 15px 30px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 20px;
        }
        .back-to-home:hover {
            background-color: #d81b60;
        }
    </style>
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
        <a href="index.html" class="back-menu">Back to Menu</a>
    </div>
</body>
</html>
