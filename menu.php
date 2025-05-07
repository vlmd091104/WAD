<?php
    session_start();
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - IU Canteen</title>
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
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
            background-color: white;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(90deg, purple, pink);
            color: white;
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

        .content {
            display: flex;
            padding: 20px;
            flex: 1;
        }

        .menu-categories {
            display: flex;
            justify-content: space-around;
            background:  #ffe6f0;
            color: lightslategrey;
            padding: 10px;
            font-weight: bold;
        }

        .menu-categories div {
            cursor: pointer;
        }

        .order-section {
            flex: 3;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            margin: 0;
        }
        .header {
            background-color: #9c27b0;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .menu-section {
            margin: 20px;
        }
        .menu-item {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 10px;
            background-color: #fff;
            border-radius: 5px;
        }
        .menu-item h3 {
            margin: 0;
        }
        .menu-item p {
            margin: 5px 0;
        }
        .menu-item i:hover{
            color: #555;
        }
        .order-sidebar {
            width: 300px;
            background-color:  #ffe6f0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            border-radius: 8px;
        }

        .order-sidebar h2 {
            margin-bottom: 20px;
        }

        .order-items {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .order-item {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .cash-out {
            background-color: #e91e63;
            color: white;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
            border: none;
            border-radius: 8px;
        }

        .cash-out:hover {
            background-color: #e91e63;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <div class="navbar">
            <h1>IU Canteen</h1>
            <nav>
                <a href="index.html">Home</a>
                <a href="menu.php">Menu</a>
                <a href="#">Promotion</a>
                <a href="about_us.php">About Us</a>
            </nav>
            <div class="icons">
                <a href="cart.php"><img src="https://www.coykendallchiropractic.com/wp-content/uploads/2021/09/food.png" alt="Cart"></a>
                <a href="profile.php"><img src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=muXZvm3dsoQqwg&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-person-icon-png-people-person-user-icon-2240.png&ehk=MfHYkGonqy7I%2fGTKUAzUFpbYm9DhfXA9Q70oeFxWmH8%3d&risl=&pid=ImgRaw&r=0" alt="User Icon"></a>
            </div>
        </div>

       
        <!-- Content Section -->
        <div class="content">
            <!-- Order Section -->
    
        <div class="menu-section">
            <h2>HD food</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 1";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['product_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    
        <div class="menu-section">
            <h2>Big U</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 2";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['product_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    
        <div class="menu-section">
            <h2>Com Viet</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 3";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['product_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <div class="menu-section">
            <h2>T&D</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 4";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['restaurant_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <div class="menu-section">
            <h2>Coffee Story</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 5";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['restaurant_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <script class="addtocart.js"></script>
        </div>
    </div>
</body>
</html>
